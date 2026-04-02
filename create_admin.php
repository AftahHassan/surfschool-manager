<?php
// on importe la classe Database de notre projet
require_once 'app/models/Database.php';

// ================================
// CONFIGURATION DU COMPTE ADMIN
// ================================
$username = 'AdminSurf';
$email    = 'admin@surfschool.com';
$password = 'admin123'; // à changer après la première connexion

// hachage sécurisé du mot de passe
// jamais stocker en clair dans la BDD
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

try {
    // on récupère la connexion PDO via notre classe Database
    $db = Database::getInstance();

    // on insère l'admin dans la table users
    $db->query(
        'INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)',
        [$username, $email, $hashed_password, 'admin']
    );

    // message de succès
    echo "<div style='
        font-family: Outfit, sans-serif;
        max-width: 480px;
        margin: 60px auto;
        padding: 32px;
        border-radius: 18px;
        background: #d1fae5;
        border: 1px solid #a7f3d0;
        color: #065f46;
    '>";
    echo "<h2>✅ Compte admin créé avec succès !</h2><br>";
    echo "<b>Username :</b> $username<br>";
    echo "<b>Email :</b> $email<br>";
    echo "<b>Mot de passe :</b> $password<br><br>";
    echo "<small style='color:#047857'>
            ⚠️ Supprimez ce fichier après utilisation pour la sécurité.
          </small><br><br>";
    echo "<a href='login.php' style='
            background:#4f46e5;
            color:#fff;
            padding:10px 20px;
            border-radius:10px;
            text-decoration:none;
            font-weight:600;
          '>🔐 Aller à la page de connexion</a>";
    echo "</div>";

} catch (PDOException $e) {

    // message d'erreur
    echo "<div style='
        font-family: Outfit, sans-serif;
        max-width: 480px;
        margin: 60px auto;
        padding: 32px;
        border-radius: 18px;
        background: #fee2e2;
        border: 1px solid #fecaca;
        color: #991b1b;
    '>";
    echo "<h2>❌ Erreur</h2><br>";
    echo $e->getMessage();
    echo "</div>";
}
?>