<?php require_once __DIR__ . '/../includes/header.php'; ?>

<!-- wrapper pour centrer verticalement -->
<div class="auth-wrapper">

    <div class="auth-container">

        <!-- TITRE -->
        <h2>🔐 Connexion</h2>

        <!-- MESSAGE ERREUR -->
        <?php if (isset($error)) : ?>
            <div class="alert-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <!-- FORMULAIRE -->
        <form method="POST" action="/surfschool-manager/login.php">

            <div class="form-group">
                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    required
                >
            </div>

            <div class="form-group">
                <input
                    type="password"
                    name="password"
                    placeholder="Mot de passe"
                    required
                >
            </div>

            <button type="submit">Se connecter</button>

        </form>

        <!-- LIEN INSCRIPTION -->
        <p class="auth-link">
            Pas encore de compte ?
            <a href="/surfschool-manager/register.php">S'inscrire</a>
        </p>

    </div>

</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>