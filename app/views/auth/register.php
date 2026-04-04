<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="auth-wrapper">

    <div class="auth-container">

        <!-- TITRE -->
        <h2>📝 Créer un compte</h2>

        <!-- MESSAGE ERREUR -->
        <?php if (isset($error)) : ?>
            <div class="alert-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <!-- FORMULAIRE -->
        <form method="POST" action="/surfschool-manager/register.php">

            <div class="form-group">
                <input
                    type="text"
                    name="username"
                    placeholder="Nom d'utilisateur"
                    required
                >
            </div>

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

            <div class="form-group">
                <input
                    type="text"
                    name="country"
                    placeholder="Pays (ex: Maroc)"
                    required
                >
            </div>

            <div class="form-group">
                <select name="level" required>
                    <option value="" disabled selected>-- Votre niveau --</option>
                    <option value="beginner">🟢 Débutant</option>
                    <option value="intermediate">🟡 Intermédiaire</option>
                    <option value="advanced">🔴 Avancé</option>
                </select>
            </div>

            <button type="submit">S'inscrire</button>

        </form>

        <!-- LIEN CONNEXION -->
        <p class="auth-link">
            Déjà un compte ?
            <a href="/surfschool-manager/login.php">Se connecter</a>
        </p>

    </div>

</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>