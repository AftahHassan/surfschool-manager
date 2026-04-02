<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="dashboard-container">

    <!-- TITRE -->
    <div class="dashboard-header">
        <div class="dashboard-title">👥 Gestion des Élèves</div>
    </div>

    <!-- LISTE ÉLÈVES -->
    <div class="admin-section">
        <table class="table">
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
                    <td><?= htmlspecialchars($student['name']) ?></td>
                    <td><?= htmlspecialchars($student['country']) ?></td>
                    <td><?= htmlspecialchars($student['level']) ?></td>

                    <!-- FORMULAIRE MODIFIER NIVEAU (US3) -->
                    <td>
                        <form method="POST" action="students.php?action=updateLevel">
                            <!-- on envoie l'id de l'élève en caché -->
                            <input type="hidden" name="id" value="<?= $student['id'] ?>">
                            <select name="level">
                                <option value="beginner"     <?= $student['level'] === 'beginner'     ? 'selected' : '' ?>>Débutant</option>
                                <option value="intermediate" <?= $student['level'] === 'intermediate' ? 'selected' : '' ?>>Intermédiaire</option>
                                <option value="advanced"     <?= $student['level'] === 'advanced'     ? 'selected' : '' ?>>Avancé</option>
                            </select>
                            <button type="submit" class="btn btn-category">✅ Modifier</button>
                        </form>
                    </td>

                    <!-- BOUTON SUPPRIMER -->
                    <td>
                        <a href="students.php?action=delete&id=<?= $student['id'] ?>" 
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