<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="dashboard-container">

    <!-- TITRE + BOUTON RETOUR -->
    <div class="page-header">
        <div>
            <h1 class="page-title">🏄 Gestion des Cours</h1>
            <p class="page-subtitle">Créer et gérer les sessions de surf</p>
        </div>
        <a href="/surfschool-manager/dashboard.php" class="btn-action btn-ghost">
            ← Retour au Dashboard
        </a>
    </div>

    <!-- FORMULAIRE CRÉER UN COURS -->
    <div class="section-card">

        <div class="section-card-header">
            <h2 class="section-card-title">➕ Créer un cours</h2>
        </div>

        <div class="form-container">
            <form method="POST" action="/surfschool-manager/lessons.php?action=create">

                <div class="form-grid">

                    <div class="form-group">
                        <label class="form-label">Titre</label>
                        <input
                            type="text"
                            name="title"
                            placeholder="Session débutants matin"
                            class="form-input"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label">Coach</label>
                        <input
                            type="text"
                            name="coach"
                            placeholder="Nom du coach"
                            class="form-input"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label">Date et heure</label>
                        <input
                            type="datetime-local"
                            name="date"
                            class="form-input"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label">Prix (MAD)</label>
                        <input
                            type="number"
                            name="price"
                            placeholder="150"
                            class="form-input"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label">Niveau</label>
                        <select name="level" class="form-input" required>
                            <option value="" disabled selected>-- Choisir --</option>
                            <option value="beginner">🟢 Débutant</option>
                            <option value="intermediate">🟡 Intermédiaire</option>
                            <option value="advanced">🔴 Avancé</option>
                        </select>
                    </div>

                    <div class="form-group form-group-full">
                        <label class="form-label">Description</label>
                        <textarea
                            name="description"
                            placeholder="Description du cours..."
                            class="form-input form-textarea"
                        ></textarea>
                    </div>

                </div>

                <div class="form-footer">
                    <button type="submit" class="btn-action btn-primary">
                        ➕ Créer le cours
                    </button>
                </div>

            </form>
        </div>

    </div>

    <!-- LISTE DES COURS -->
    <div class="section-card">

        <div class="section-card-header">
            <h2 class="section-card-title">📋 Liste des cours</h2>
            <span class="badge badge-blue"><?= count($lessons) ?> cours</span>
        </div>

        <table class="data-table">
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
                    <td><strong><?= htmlspecialchars($lesson['title']) ?></strong></td>
                    <td><?= htmlspecialchars($lesson['coach']) ?></td>
                    <td><?= htmlspecialchars($lesson['date']) ?></td>
                    <td>
                        <?php
                            $badge = match($lesson['level']) {
                                'beginner'     => ['class' => 'badge-blue',   'label' => '🟢 Débutant'],
                                'intermediate' => ['class' => 'badge-purple', 'label' => '🟡 Intermédiaire'],
                                'advanced'     => ['class' => 'badge-green',  'label' => '🔴 Avancé'],
                                default        => ['class' => 'badge-gray',   'label' => $lesson['level']]
                            };
                        ?>
                        <span class="badge <?= $badge['class'] ?>">
                            <?= $badge['label'] ?>
                        </span>
                    </td>
                    <td><strong><?= htmlspecialchars($lesson['price']) ?> MAD</strong></td>
                    <td>
                        <a href="/surfschool-manager/lessons.php?action=delete&id=<?= $lesson['id'] ?>"
                           class="btn-action btn-danger">
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