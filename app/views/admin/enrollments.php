<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="dashboard-container">

    <!-- TITRE -->
    <div class="dashboard-header">
        <div class="dashboard-title">📋 Gestion des Inscriptions</div>
    </div>

    <!-- FORMULAIRE INSCRIRE UN ÉLÈVE -->
    <div class="admin-section">
        <div class="dashboard-title">➕ Inscrire un élève</div>

        <form method="POST" action="enrollments.php?action=enroll">

            <div class="stat-card">
                <div class="stat-title">Élève</div>
                <select name="student_id" required>
                    <?php foreach ($students as $student) : ?>
                        <option value="<?= $student['id'] ?>">
                            <?= htmlspecialchars($student['name']) ?> 
                            — <?= htmlspecialchars($student['level']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="stat-card">
                <div class="stat-title">Cours</div>
                <select name="lesson_id" required>
                    <?php foreach ($lessons as $lesson) : ?>
                        <option value="<?= $lesson['id'] ?>">
                            <?= htmlspecialchars($lesson['title']) ?> 
                            — <?= htmlspecialchars($lesson['date']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="admin-links">
                <button type="submit" class="btn btn-category">➕ Inscrire</button>
            </div>

        </form>
    </div>

    <!-- LISTE DES INSCRIPTIONS -->
    <div class="admin-section">
        <div class="dashboard-title">📋 Liste des inscriptions</div>

        <table class="table">
            <thead>
                <tr>
                    <th>Élève</th>
                    <th>Cours</th>
                    <th>Statut paiement</th>
                    <th>Modifier statut</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($enrollments as $enrollment) : ?>
                <tr>
                    <td><?= htmlspecialchars($enrollment['name']) ?></td>
                    <td><?= htmlspecialchars($enrollment['title']) ?></td>
                    <td><?= htmlspecialchars($enrollment['payment_status']) ?></td>

                    <!-- FORMULAIRE MODIFIER STATUT PAIEMENT -->
                    <td>
                        <form method="POST" action="enrollments.php?action=updatePayment">
                            <!-- on envoie l'id de l'inscription en caché -->
                            <input type="hidden" name="id" value="<?= $enrollment['id'] ?>">
                            <select name="payment_status">
                                <option value="pending" <?= $enrollment['payment_status'] === 'pending' ? 'selected' : '' ?>>En attente</option>
                                <option value="paid"    <?= $enrollment['payment_status'] === 'paid'    ? 'selected' : '' ?>>Payé</option>
                            </select>
                            <button type="submit" class="btn btn-category">✅ Modifier</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>