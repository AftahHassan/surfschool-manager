<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="dashboard-container">

    <!-- TITRE -->
    <div class="dashboard-header">
        <div class="dashboard-title">🔐 Connexion</div>
    </div>

    <!-- MESSAGE ERREUR -->
    <?php if (isset($error)) : ?>
        <div class="stat-card">
            <div class="stat-title"><?= htmlspecialchars($error) ?></div>
        </div>
    <?php endif; ?>

    <!-- FORMULAIRE -->
    <div class="admin-section">
        <form method="POST" action="login.php">

            <div class="stat-card">
                <div class="stat-title">Email</div>
                <input 
                    type="email" 
                    name="email" 
                    placeholder="votre@email.com" 
                    required
                >
            </div>

            <div class="stat-card">
                <div class="stat-title">Mot de passe</div>
                <input 
                    type="password" 
                    name="password" 
                    placeholder="Mot de passe" 
                    required
                >
            </div>

            <div class="admin-links">
                <button type="submit" class="btn btn-category">
                    🔐 Se connecter
                </button>
                <a href="register.php" class="btn btn-users">
                    📝 Créer un compte
                </a>
            </div>

        </form>
    </div>

</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>