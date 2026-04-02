<?php
// on importe le controller enrollment
require_once 'app/controllers/EnrollmentController.php';

// on crée une instance du controller
$controller = new EnrollmentController();

// on lit l'action dans l'URL
// ex: enrollments.php?action=enroll
// ex: enrollments.php?action=updatePayment
// si pas d'action → on affiche la liste par défaut
$action = $_GET['action'] ?? 'index';

// on appelle la méthode correspondante
if ($action === 'enroll') {
    $controller->enroll();

} elseif ($action === 'updatePayment') {
    $controller->updatePayment();

} else {
    // action par défaut → affiche la liste
    $controller->index();
}
?>