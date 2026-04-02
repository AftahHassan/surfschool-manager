<?php
// on importe le controller student
require_once 'app/controllers/StudentController.php';

// on crée une instance du controller
$controller = new StudentController();

// on lit l'action dans l'URL
// ex: students.php?action=updateLevel
// ex: students.php?action=delete&id=3
// si pas d'action → on affiche la liste par défaut
$action = $_GET['action'] ?? 'index';

// on appelle la méthode correspondante
if ($action === 'updateLevel') {
    $controller->updateLevel();

} elseif ($action === 'delete') {
    $controller->delete();

} else {
    // action par défaut → affiche la liste
    $controller->index();
}
?>