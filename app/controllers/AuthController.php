<?php 
require_once __DIR__ .'/../models/User.php';

class AuthController {

    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    // ---- SPLASH ----
    public function splash() {
        require_once __DIR__ . '/../views/auth/splash.php';
    }

    // ---- LOGIN ----
    public function login() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email    = trim($_POST['email']);
            $password = trim($_POST['password']);

            // ✅ ICI on appelle le model pour vérifier les identifiants
            // c'est cette ligne qui manquait dans votre code
            $user = $this->userModel->login($email, $password);

            if ($user) {
                $_SESSION['user_id']  = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role']     = $user['role'];

                header('Location: dashboard.php');
                exit();

            } else {
                $error = 'Email ou mot de passe incorrect';
                require_once __DIR__ . '/../views/auth/login.php';
            }

        } else {
            require_once __DIR__ . '/../views/auth/login.php';
        }
    }

    // ---- REGISTER ----
    public function register() {
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $username = trim($_POST['username']);
        $email    = trim($_POST['email']);
        $password = trim($_POST['password']);
        $country  = trim($_POST['country']);
        $level    = trim($_POST['level']);

        if (empty($username) || empty($email) || empty($password)) {
            $error = 'Tous les champs sont obligatoires';
            require_once __DIR__ . '/../views/auth/register.php';
            return;
        }

        // ✅ ÉTAPE 1 — insert dans users
        $this->userModel->register($username, $email, $password);

        // ✅ ÉTAPE 2 — récupère le user créé pour avoir son id
        $user = $this->userModel->findByEmail($email);

        // ✅ ÉTAPE 3 — insert dans students lié au user
        require_once __DIR__ . '/../models/Student.php';
        $studentModel = new Student();
        $studentModel->save($username, $country, $level, $user['id']);

        // ✅ ÉTAPE 4 — redirige vers login
        header('Location: login.php');
        exit();

    } else {
        require_once __DIR__ . '/../views/auth/register.php';
    }
}

    // ---- LOGOUT ----
    public function logout() {

        session_start();

        /* 🔥 Vider toutes les données session */
        $_SESSION = [];

        /* 🔥 Détruire le cookie de session */
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        /* 🔥 Détruire la session */
        session_destroy();

        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");

        header('Location: /surfschool-manager/login.php');
        exit();
    }
}
?>