<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="dashboard-container">

    <!-- TITRE -->
    <div class="dashboard-header">
        <div class="dashboard-title">📝 Créer un compte</div>
    </div>

    <!-- MESSAGE ERREUR -->
    <?php if (isset($error)) : ?>
        <div class="stat-card">
            <div class="stat-title"><?= htmlspecialchars($error) ?></div>
        </div>
    <?php endif; ?>

    <!-- FORMULAIRE -->
    <div class="admin-section">
        <form method="POST" action="register.php">

            <div class="stat-card">
                <div class="stat-title">Nom d'utilisateur</div>
                <input 
                    type="text" 
                    name="username" 
                    placeholder="Votre pseudo" 
                    required
                >
            </div>

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

            <div class="stat-card">
                <div class="stat-title">Pays</div>
                <input 
                    type="text" 
                    name="country" 
                    placeholder="Maroc, France..." 
                    required
                >
            </div>

            <div class="stat-card">
                <div class="stat-title">Niveau</div>
                <select name="level" required>
                    <option value="beginner">Débutant</option>
                    <option value="intermediate">Intermédiaire</option>
                    <option value="advanced">Avancé</option>
                </select>
            </div>

            <div class="admin-links">
                <button type="submit" class="btn btn-category">
                    📝 S'inscrire
                </button>
                <a href="login.php" class="btn btn-users">
                    🔐 Déjà un compte
                </a>
            </div>

        </form>
    </div>

</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>