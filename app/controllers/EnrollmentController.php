<?php
require_once __DIR__ . '/../models/Enrollment.php';
require_once __DIR__ . '/../models/Student.php';
require_once __DIR__ . '/../models/Lesson.php';


class EnrollmentController{
    private $enrollmentModel;
    private $studentModel;
    private $lessonModel;

    public function __construct(){
        $this->enrollmentModel = new Enrollment();
        $this->studentModel    = new Student();
        $this->lessonModel     = new Lesson();


    }
    //afficher tous les inscription 

    public function index(){

     session_start();

        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
                header('Location: login.php');
                exit();
            

        }

        // on récupère toutes les inscriptions avec JOIN
        // $enrollments sera disponible dans la vue
        $enrollments = $this->enrollmentModel->findAll();

        // on récupère aussi les élèves et cours pour le formulaire
        // $students et $lessons seront disponibles dans la vue
        $students = $this->studentModel->findAll();
        $lessons  = $this->lessonModel->findAll();

       require_once __DIR__ . '/../views/admin/enrollments.php';
    }

    //inserer un eleve a un cours
    public function enroll(){
        session_start();

        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header('Location: login.php');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            $student_id = $_POST['student_id'];
            $lesson_id  = $_POST['lesson_id'];

            $this->enrollmentModel->enroll($student_id, $lesson_id);
            header('Location: enrollments.php');
            exit();
        }


    }

    //update le payment
    public function updatePayment(){
        session_start();

        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header('Location: login.php');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // on récupère l'id de l'inscription et le nouveau statut
            $id     = $_POST['id'];
            $status = $_POST['payment_status'];

            
            $this->enrollmentModel->updatePaymentStatus($id, $status);

            
            header('Location: enrollments.php');
            exit();
        }
        


    }




}














?>