<?php
// on importe le controller lesson
require_once 'app/controllers/LessonController.php';

// on crée une instance du controller
$controller = new LessonController();

// on lit l'action dans l'URL
// ex: lessons.php?action=create
// ex: lessons.php?action=delete&id=2
// si pas d'action → on affiche la liste par défaut
$action = $_GET['action'] ?? 'index';

// on appelle la méthode correspondante
if ($action === 'create') {
    $controller->create();

} elseif ($action === 'update') {
    $controller->update();

} elseif ($action === 'delete') {
    $controller->delete();

} else {
    // action par défaut → affiche la liste
    $controller->index();
}
?>