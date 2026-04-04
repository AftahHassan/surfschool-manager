<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="dashboard-container">

    <!-- TITRE + BOUTON RETOUR -->
    <div class="page-header">
        <div>
            <h1 class="page-title">👥 Gestion des Élèves</h1>
            <p class="page-subtitle">Modifier les niveaux et gérer les élèves</p>
        </div>
        <a href="/surfschool-manager/dashboard.php" class="btn-action btn-ghost">
            ← Retour au Dashboard
        </a>
    </div>

    <!-- TABLEAU ÉLÈVES -->
    <div class="section-card">

        <div class="section-card-header">
            <h2 class="section-card-title">👥 Liste des Élèves</h2>
            <span class="badge badge-blue"><?= count($students) ?> élèves</span>
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Pays</th>
                    <th>Niveau actuel</th>
                    <th>Modifier niveau</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student) : ?>
                <tr>
                    <!-- NOM -->
                    <td>
                        <strong><?= htmlspecialchars($student['name']) ?></strong>
                    </td>

                    <!-- PAYS -->
                    <td><?= htmlspecialchars($student['country']) ?></td>

                    <!-- NIVEAU ACTUEL — badge coloré -->
                    <td>
                        <?php
                            $badge = match($student['level']) {
                                'beginner'     => ['class' => 'badge-blue',   'label' => '🟢 Débutant'],
                                'intermediate' => ['class' => 'badge-purple', 'label' => '🟡 Intermédiaire'],
                                'advanced'     => ['class' => 'badge-green',  'label' => '🔴 Avancé'],
                                default        => ['class' => 'badge-gray',   'label' => $student['level']]
                            };
                        ?>
                        <span class="badge <?= $badge['class'] ?>">
                            <?= $badge['label'] ?>
                        </span>
                    </td>

                    <!-- FORMULAIRE MODIFIER NIVEAU -->
                    <td>
                        <form class="inline-form" method="POST" action="/surfschool-manager/students.php?action=updateLevel">
                            <input type="hidden" name="id" value="<?= $student['id'] ?>">
                            <select class="table-select" name="level">
                                <option value="beginner"     <?= $student['level'] === 'beginner'     ? 'selected' : '' ?>>Débutant</option>
                                <option value="intermediate" <?= $student['level'] === 'intermediate' ? 'selected' : '' ?>>Intermédiaire</option>
                                <option value="advanced"     <?= $student['level'] === 'advanced'     ? 'selected' : '' ?>>Avancé</option>
                            </select>
                            <button type="submit" class="btn-action btn-primary">
                                ✅ Modifier
                            </button>
                        </form>
                    </td>

                    <!-- SUPPRIMER -->
                    <td>
                        <a href="/surfschool-manager/students.php?action=delete&id=<?= $student['id'] ?>"
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