<?php
// on importe le controller auth
require_once 'app/controllers/AuthController.php';

// on crée une instance du controller
$controller = new AuthController();

// on appelle la méthode logout
// détruit la session → redirige login
$controller->logout();
?>