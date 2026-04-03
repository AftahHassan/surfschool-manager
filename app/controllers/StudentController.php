<?php
require_once __DIR__ . '/../models/Student.php';

class StudentController{

    private $studentModel;
        public function __construct(){
            $this ->studentModel = new Student();
        }
    //affciher la liste de tous les eleves
        public function index(){
                session_start();
                // sécurité : si pas connecté → retour au login
                if(!isset($_SESSION['user_id'])){
                    header('Location: login.php');
                    exit();
                }

                // sécurité : si pas admin → retour au dashboard
                if ($_SESSION['role'] !== 'admin') {
                    header('Location: dashboard.php');
                    exit();
                }

                $students = $this->studentModel->findAll();
                require_once __DIR__ . '/../views/admin/students.php';
        }


        // dans StudentController.php
        public function updateLevel() {
            session_start();

            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
                header('Location: login.php');
                exit();
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $id    = $_POST['id'];
                $level = $_POST['level'];

                $this->studentModel->updateLevel($id, $level);

                // ✅ exit() obligatoire après header()
                header('Location: students.php');
                exit();
            }
        }


    //Supprimer un etudiant

    public function delete(){

        session_start();

            if(!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin'){
                    header('Location: login.php');
                    exit();
            }

            //recupere l id de leleve
            $id = $_GET['id'];

            $this->studentModel->delete($id);

             header('Location: students.php');
            exit();




    }

}







?>