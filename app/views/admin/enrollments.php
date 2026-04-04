<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="dashboard-container">

    <!-- TITRE + BOUTON RETOUR -->
    <div class="page-header">
        <div>
            <h1 class="page-title">📋 Gestion des Inscriptions</h1>
            <p class="page-subtitle">Inscrire les élèves et gérer les paiements</p>
        </div>
        <a href="/surfschool-manager/dashboard.php" class="btn-action btn-ghost">
            ← Retour au Dashboard
        </a>
    </div>

    <!-- FORMULAIRE INSCRIRE UN ÉLÈVE -->
    <div class="section-card">

        <div class="section-card-header">
            <h2 class="section-card-title">➕ Inscrire un élève</h2>
        </div>

        <div class="form-container">
            <form method="POST" action="/surfschool-manager/enrollments.php?action=enroll">

                <div class="form-grid">

                    <div class="form-group">
                        <label class="form-label">Élève</label>
                        <select name="student_id" class="form-input" required>
                            <option value="" disabled selected>-- Choisir un élève --</option>
                            <?php foreach ($students as $student) : ?>
                                <option value="<?= $student['id'] ?>">
                                    <?= htmlspecialchars($student['name']) ?>
                                    — <?= htmlspecialchars($student['level']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Cours</label>
                        <select name="lesson_id" class="form-input" required>
                            <option value="" disabled selected>-- Choisir un cours --</option>
                            <?php foreach ($lessons as $lesson) : ?>
                                <option value="<?= $lesson['id'] ?>">
                                    <?= htmlspecialchars($lesson['title']) ?>
                                    — <?= htmlspecialchars($lesson['date']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>

                <div class="form-footer">
                    <button type="submit" class="btn-action btn-primary">
                        ➕ Inscrire l'élève
                    </button>
                </div>

            </form>
        </div>

    </div>

    <!-- LISTE DES INSCRIPTIONS -->
    <div class="section-card">

        <div class="section-card-header">
            <h2 class="section-card-title">📋 Liste des inscriptions</h2>
            <span class="badge badge-blue"><?= count($enrollments) ?> inscriptions</span>
        </div>

        <table class="data-table">
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
                    <td><strong><?= htmlspecialchars($enrollment['name']) ?></strong></td>
                    <td><?= htmlspecialchars($enrollment['title']) ?></td>

                    <!-- BADGE STATUT PAIEMENT -->
                    <td>
                        <?php if ($enrollment['payment_status'] === 'paid') : ?>
                            <span class="badge badge-paid">✅ Payé</span>
                        <?php else : ?>
                            <span class="badge badge-pending">⏳ En attente</span>
                        <?php endif; ?>
                    </td>

                    <!-- FORMULAIRE MODIFIER STATUT -->
                    <td>
                        <form class="inline-form" method="POST" action="/surfschool-manager/enrollments.php?action=updatePayment">
                            <input type="hidden" name="id" value="<?= $enrollment['id'] ?>">
                            <select name="payment_status" class="table-select">
                                <option value="pending" <?= $enrollment['payment_status'] === 'pending' ? 'selected' : '' ?>>En attente</option>
                                <option value="paid"    <?= $enrollment['payment_status'] === 'paid'    ? 'selected' : '' ?>>Payé</option>
                            </select>
                            <button type="submit" class="btn-action btn-primary">
                                ✅ Modifier
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>