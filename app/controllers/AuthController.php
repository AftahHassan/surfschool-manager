<?php 
require_once __DIR__ .'/../models/Users.php';
class AuthController{
    //propriete qui contient une instance du model user 
    private $userModel;

    public function __construct(){
        $this -> userModel = new User();
    }

    //splash :la page d accueil avant le login

    public function splash(){
        require_once __DIR__ . '/../views/auth/splash.php';
    }

    public function login(){
        session_start();
             // on récupère les données du formulaire
            // trim() supprime les espaces inutiles avant/après
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $email =trim($_POST['email']);
                $password = trim($_POST['password']);

                //si le user existe et mot de passe correct on stock les info 
                //en session
                if($user){
                    $_SESSION['user_id'] =$user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['role']     = $user['role'];

                    //redirige vers le dashboard
                    header('Location: dashboard.php');

                }else{
                    $error = 'Email ou mot de passe incorrect';
                    require_once __DIR__ . '/../views/auth/login.php';
                }
                
            }else{
                require_once __DIR__ . '/../views/auth/login.php';
            }


    }




    //la partie di register 

    public function register(){
        session_start();

            if ($_SERVER['REQUEST_METHOD'] === 'POST'){

                $username = trim($_POST['username']);
                $email    = trim($_POST['email']);
                $password = trim($_POST['password']);
                $country  = trim($_POST['country']);
                $level    = trim($_POST['level']);
                

                if(empty($username) || empty($email) || empty($password)){
                     $error = 'Tous les champs sont obligatoires';
                     require_once __DIR__ . '/../views/auth/register.php';
                     return;
                }


                // on appelle le model pour créer le compte user
             $this->userModel->register($username, $email, $password);

                
                header('Location: login.php');
                exit();


            }else{
                require_once __DIR__ . '/../views/auth/register.php';
            }

    }



    public function logout(){
        session_start();
        session_destroy();
        header('Location :login.php');
        exit();
    }
}
?>