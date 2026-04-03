<?php
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
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/surfschool-manager/public/css/style.css">
</head>
<body class="splash-body">

<div class="splash-container">

    <!-- EMOJI SURFEUR au lieu de l'image -->
    <div class="splash-logo">🏄</div>

    <h1 class="splash-title">SurfSchool Manager</h1>
    <p class="splash-subtitle">Taghazout Surf Expo</p>

    <!-- BARRE DE CHARGEMENT -->
    <div class="splash-loader">
        <div class="splash-loader-bar"></div>
    </div>

</div>

<script>
    setTimeout(() => {
        <?php if (isset($_SESSION['user_id'])) : ?>
            <?php if ($_SESSION['role'] === 'admin') : ?>
                window.location.href = "/surfschool-manager/dashboard.php";
            <?php else : ?>
                window.location.href = "/surfschool-manager/dashboard.php";
            <?php endif; ?>
        <?php else : ?>
            window.location.href = "/surfschool-manager/login.php";
        <?php endif; ?>
    }, 3000);
</script>

</body>
</html>