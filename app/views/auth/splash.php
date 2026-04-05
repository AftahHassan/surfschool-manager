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

        <!-- VAGUES DÉCORATIVES -->
        <div class="splash-waves">
            <div class="wave wave-1"></div>
            <div class="wave wave-2"></div>
            <div class="wave wave-3"></div>
        </div>

        <!-- CONTENU -->
        <div class="splash-content">

            <!-- EMOJI SURFEUR -->
            <div class="splash-logo">🏄</div>

            <!-- TITRE -->
            <h1 class="splash-title">SurfSchool Manager</h1>
            <p class="splash-subtitle">Taghazout Surf Expo</p>

            <!-- POINTS ANIMÉS -->
            <div class="splash-dots">
                <span class="dot dot-1"></span>
                <span class="dot dot-2"></span>
                <span class="dot dot-3"></span>
            </div>

            <!-- BARRE DE CHARGEMENT -->
            <div class="splash-loader">
                <div class="splash-loader-bar"></div>
            </div>

            <p class="splash-loading-text">Chargement en cours...</p>

        </div>

    </div>

<script>
    setTimeout(() => {
        <?php if (isset($_SESSION['user_id'])) : ?>
            window.location.href = "/surfschool-manager/dashboard.php";
        <?php else : ?>
            window.location.href = "/surfschool-manager/login.php";
        <?php endif; ?>
    }, 3000);
</script>

</body>
</html>