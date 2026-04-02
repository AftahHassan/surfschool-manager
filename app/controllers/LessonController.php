<?php
require_once __DIR__ . '/../models/Lesson.php';

class LessonController {
    private $lessonModel;

   // crée automatiquement le model Lesson
    public function __construct(){
        $this -> lessonModel =new Lesson();

    }

    public function index(){
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header('Location: login.php');
            exit();
        }

        $lessons = $this->lessonModel->findAll();

        require_once __DIR__ . '/../views/admin/lessons.php';

    }

    public function create(){
        session_start();

        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header('Location: login.php');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // on récupère toutes les données du formulaire
            $title       = trim($_POST['title']);
            $coach       = trim($_POST['coach']);
            $date        = trim($_POST['date']);
            $price       = trim($_POST['price']);
            $level       = trim($_POST['level']);
            $description = trim($_POST['description']);

            $this ->lessonModel->save($title, $coach, $date, $price, $level, $description);

            header('Location: lessons.php');
            exit();
        }else{
            require_once __DIR__ . '/../views/admin/lessons.php';
        }



    }


    public function update(){
        session_start();

        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header('Location: login.php');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // on récupère toutes les données du formulaire
            $id          = $_POST['id'];
            $title       = trim($_POST['title']);
            $coach       = trim($_POST['coach']);
            $date        = trim($_POST['date']);
            $price       = trim($_POST['price']);
            $level       = trim($_POST['level']);
            $description = trim($_POST['description']);

            $this->lessonModel->update($id, $title, $coach, $date, $price, $level, $description);

            // on redirige vers la liste des cours
            header('Location: lessons.php');
            exit();
        }

    }
        //supprimer lesson
    public function delete() {

        session_start();

        // sécurité : admin uniquement
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header('Location: login.php');
            exit();
        }

        // on récupère l'id du cours à supprimer depuis l'URL
        $id = $_GET['id'];

        // on appelle le model pour supprimer le cours
        $this->lessonModel->delete($id);

        // on redirige vers la liste des cours
        header('Location: lessons.php');
        exit();
    }



}

?>