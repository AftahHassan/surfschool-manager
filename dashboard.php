<?php
// on démarre la session pour lire le rôle
session_start();

// sécurité : si pas connecté → retour au login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// on importe les models nécessaires pour le dashboard
require_once 'app/models/Student.php';
require_once 'app/models/Lesson.php';
require_once 'app/models/Enrollment.php';

// on prépare les données pour la vue
$studentModel    = new Student();
$lessonModel     = new Lesson();
$enrollmentModel = new Enrollment();

// selon le rôle on charge des données différentes
if ($_SESSION['role'] === 'admin') {

    // admin voit tout
    $students    = $studentModel->findAll();
    $lessons     = $lessonModel->findAll();
    $enrollments = $enrollmentModel->findAll();

    // on charge la vue admin
    require_once 'app/views/admin/dashboard.php';

} else {

    // client voit uniquement ses propres cours
    // on récupère le student_id lié au user connecté
    $student     = $studentModel->findByUserId($_SESSION['user_id']);
    $enrollments = $enrollmentModel->findByStudent($student['id']);

    // on charge la vue client
    require_once 'app/views/client/dashboard.php';
}
?>