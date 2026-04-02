<?php
// on importe le controller auth
require_once 'app/controllers/AuthController.php';

// on crée une instance du controller
$controller = new AuthController();

// on appelle la méthode splash qui charge la vue
$controller->splash();
?>