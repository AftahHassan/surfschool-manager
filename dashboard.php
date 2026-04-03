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

}else {

    // on cherche l'élève lié au user connecté
    $student = $studentModel->findByUserId($_SESSION['user_id']);

    // ✅ vérification avant d'utiliser $student
    if (!$student) {
        // aucun élève trouvé → tableau vide pour éviter le crash
        $enrollments = [];
    } else {
        // élève trouvé → on récupère ses cours
        $enrollments = $enrollmentModel->findByStudent($student['id']);
    }

    require_once 'app/views/client/dashboard.php';
}
?>