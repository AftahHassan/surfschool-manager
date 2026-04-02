<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="dashboard-container">

    <!-- TITRE -->
    <div class="dashboard-header">
        <div class="dashboard-title">🏄 Gestion des Cours</div>
    </div>

    <!-- FORMULAIRE CRÉER UN COURS (US2) -->
    <div class="admin-section">
        <div class="dashboard-title">➕ Créer un cours</div>

        <form method="POST" action="lessons.php?action=create">

            <div class="stat-card">
                <div class="stat-title">Titre</div>
                <input type="text" name="title" placeholder="Session débutants matin" required>
            </div>

            <div class="stat-card">
                <div class="stat-title">Coach</div>
                <input type="text" name="coach" placeholder="Nom du coach" required>
            </div>

            <div class="stat-card">
                <div class="stat-title">Date et heure</div>
                <input type="datetime-local" name="date" required>
            </div>

            <div class="stat-card">
                <div class="stat-title">Prix (MAD)</div>
                <input type="number" name="price" placeholder="150" required>
            </div>

            <div class="stat-card">
                <div class="stat-title">Niveau</div>
                <select name="level" required>
                    <option value="beginner">Débutant</option>
                    <option value="intermediate">Intermédiaire</option>
                    <option value="advanced">Avancé</option>
                </select>
            </div>

            <div class="stat-card">
                <div class="stat-title">Description</div>
                <textarea name="description" placeholder="Description du cours..."></textarea>
            </div>

            <div class="admin-links">
                <button type="submit" class="btn btn-category">➕ Créer le cours</button>
            </div>

        </form>
    </div>

    <!-- LISTE DES COURS -->
    <div class="admin-section">
        <div class="dashboard-title">📋 Liste des cours</div>

        <table class="table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Coach</th>
                    <th>Date</th>
                    <th>Niveau</th>
                    <th>Prix</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lessons as $lesson) : ?>
                <tr>
                    <td><?= htmlspecialchars($lesson['title']) ?></td>
                    <td><?= htmlspecialchars($lesson['coach']) ?></td>
                    <td><?= htmlspecialchars($lesson['date']) ?></td>
                    <td><?= htmlspecialchars($lesson['level']) ?></td>
                    <td><?= htmlspecialchars($lesson['price']) ?> MAD</td>
                    <td>
                        <a href="lessons.php?action=delete&id=<?= $lesson['id'] ?>" 
                           class="btn btn-users">
                           🗑️ Supprimer
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>