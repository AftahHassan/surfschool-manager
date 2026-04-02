<?php
// on importe le controller auth
require_once 'app/controllers/AuthController.php';

// on crée une instance du controller
$controller = new AuthController();

// on appelle la méthode login
// si POST → vérifie identifiants → redirige dashboard
// si GET  → affiche le formulaire
$controller->login();
?>