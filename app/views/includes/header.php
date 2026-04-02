<?php
// démarrer la session UNE seule fois pour toutes les pages
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SurfSchool Manager | Taghazout</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS GLOBAL — appelé une seule fois ici -->
    <link rel="stylesheet" href="/surfschool-manager/public/css/style.css">
</head>
<body>

<header>
    <nav>
        <div class="logo">🏄 SurfSchool</div>
        <ul>
            <?php if (isset($_SESSION['user_id'])) : ?>

                <!-- ✅ CONNECTÉ EN TANT QU'ADMIN -->
                <?php if ($_SESSION['role'] === 'admin') : ?>
                    <li><a href="/surfschool-manager/dashboard.php">Dashboard</a></li>
                    <li><a href="/surfschool-manager/students.php">👥 Élèves</a></li>
                    <li><a href="/surfschool-manager/lessons.php">🏄 Cours</a></li>
                    <li><a href="/surfschool-manager/enrollments.php">📋 Inscriptions</a></li>

                <!-- ✅ CONNECTÉ EN TANT QUE STUDENT -->
                <?php else : ?>
                    <li><a href="/surfschool-manager/dashboard.php">Dashboard</a></li>

                <?php endif; ?>

                <!-- DÉCONNEXION — visible pour tous les connectés -->
                <li>
                    <a href="/surfschool-manager/logout.php" class="logout-link">
                        Déconnexion (<?= htmlspecialchars($_SESSION['username']) ?>)
                    </a>
                </li>

            <?php else : ?>

                <!-- ❌ NON CONNECTÉ — page splash/login/register -->
                <li><a href="/surfschool-manager/login.php">🔐 Connexion</a></li>
                <li><a href="/surfschool-manager/register.php">📝 Inscription</a></li>

            <?php endif; ?>
        </ul>
    </nav>
</header>

<main>