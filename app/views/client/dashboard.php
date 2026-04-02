<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="dashboard-container">

    <!-- TITRE -->
    <div class="dashboard-header">
        <div class="dashboard-title">
            🏄 Mon Espace — <?= htmlspecialchars($_SESSION['username']) ?>
        </div>
    </div>

    <!-- STATS -->
    <div class="stats-container">

        <div class="stat-card">
            <div class="stat-title">Mes cours</div>
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

    <!-- MES COURS (US5) -->
    <div class="admin-section">
        <div class="dashboard-title">📅 Mes cours à venir</div>

        <table class="table">
            <thead>
                <tr>
                    <th>Cours</th>
                    <th>Coach</th>
                    <th>Date</th>
                    <th>Niveau</th>
                    <th>Statut paiement</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($enrollments as $enrollment) : ?>
                <tr>
                    <td><?= htmlspecialchars($enrollment['title']) ?></td>
                    <td><?= htmlspecialchars($enrollment['coach']) ?></td>
                    <td><?= htmlspecialchars($enrollment['date']) ?></td>
                    <td><?= htmlspecialchars($enrollment['level']) ?></td>

                    <!-- statut paiement avec couleur différente -->
                    <td>
                        <?php if ($enrollment['payment_status'] === 'paid') : ?>
                            <span class="btn btn-category">✅ Payé</span>
                        <?php else : ?>
                            <span class="btn btn-users">⏳ En attente</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>