<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="dashboard-container">

    <!-- TITRE -->
    <div class="dashboard-header">
        <div class="dashboard-title">
            🏄 Tableau de Bord Admin — Bonjour <?= htmlspecialchars($_SESSION['username']) ?>
        </div>
    </div>

    <!-- STATS -->
    <div class="stats-container">

        <div class="stat-card">
            <div class="stat-title">Total Élèves</div>
            <div class="stat-value"><?= count($students) ?></div>
            <div class="progress-bar">
                <div class="progress-fill"></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-title">Total Cours</div>
            <div class="stat-value"><?= count($lessons) ?></div>
            <div class="progress-bar">
                <div class="progress-fill"></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-title">Total Inscriptions</div>
            <div class="stat-value"><?= count($enrollments) ?></div>
            <div class="progress-bar">
                <div class="progress-fill"></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-title">Paiements en attente</div>
            <div class="stat-value">
                <?php
                    // on filtre les inscriptions avec statut pending
                    $pending = array_filter(
                        $enrollments, 
                        fn($e) => $e['payment_status'] === 'pending'
                    );
                    echo count($pending);
                ?>
            </div>
            <div class="progress-bar">
                <div class="progress-fill"></div>
            </div>
        </div>

    </div>

    <!-- GESTION -->
    <div class="admin-section">
        <h3 class="admin-links">Gestion</h3>
        <div class="admin-links">
            <a href="students.php"    class="btn btn-category">👥 Élèves</a>
            <a href="lessons.php"     class="btn btn-users">🏄 Cours</a>
            <a href="enrollments.php" class="btn btn-category">📋 Inscriptions</a>
        </div>
    </div>

    <!-- LISTE ÉLÈVES -->
    <div class="admin-section">
        <div class="dashboard-title">👥 Liste des Élèves</div>

        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Pays</th>
                    <th>Niveau</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student) : ?>
                <tr>
                    <td><?= htmlspecialchars($student['name']) ?></td>
                    <td><?= htmlspecialchars($student['country']) ?></td>
                    <td><?= htmlspecialchars($student['level']) ?></td>
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

    <!-- LISTE COURS -->
    <div class="admin-section">
        <div class="dashboard-title">🏄 Cours à venir</div>

        <table class="table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Coach</th>
                    <th>Date</th>
                    <th>Niveau</th>
                    <th>Prix</th>
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
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>