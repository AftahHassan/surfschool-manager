<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="dashboard-container">

    <!-- TITRE -->
    <div class="page-header">
        <div>
            <h1 class="page-title">🏄 Mon Espace</h1>
            <p class="page-subtitle">Bienvenue, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></p>
        </div>
    </div>

    <!-- STATS -->
    <div class="stats-grid">

        <div class="stat-card stat-blue">
            <div class="stat-card-inner">
                <div class="stat-icon">🏄</div>
                <div class="stat-info">
                    <div class="stat-label">Mes cours</div>
                    <div class="stat-number"><?= count($enrollments) ?></div>
                </div>
            </div>
            <div class="stat-bar"><div class="stat-bar-fill"></div></div>
        </div>

        <div class="stat-card stat-orange">
            <div class="stat-card-inner">
                <div class="stat-icon">⏳</div>
                <div class="stat-info">
                    <div class="stat-label">Paiements en attente</div>
                    <div class="stat-number">
                        <?php
                            $pending = array_filter(
                                $enrollments,
                                fn($e) => $e['payment_status'] === 'pending'
                            );
                            echo count($pending);
                        ?>
                    </div>
                </div>
            </div>
            <div class="stat-bar"><div class="stat-bar-fill"></div></div>
        </div>

        <div class="stat-card stat-green">
            <div class="stat-card-inner">
                <div class="stat-icon">✅</div>
                <div class="stat-info">
                    <div class="stat-label">Paiements effectués</div>
                    <div class="stat-number">
                        <?php
                            $paid = array_filter(
                                $enrollments,
                                fn($e) => $e['payment_status'] === 'paid'
                            );
                            echo count($paid);
                        ?>
                    </div>
                </div>
            </div>
            <div class="stat-bar"><div class="stat-bar-fill"></div></div>
        </div>

    </div>

    <!-- MES COURS -->
    <div class="section-card">

        <div class="section-card-header">
            <h2 class="section-card-title">📅 Mes cours à venir</h2>
            <span class="badge badge-blue"><?= count($enrollments) ?> cours</span>
        </div>

        <?php if (empty($enrollments)) : ?>

            <!-- AUCUN COURS -->
            <div class="empty-state">
                <div class="empty-icon">🏄</div>
                <div class="empty-title">Aucun cours pour le moment</div>
                <div class="empty-desc">Contactez l'administration pour vous inscrire à un cours</div>
            </div>

        <?php else : ?>

            <table class="data-table">
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
                        <td><strong><?= htmlspecialchars($enrollment['title']) ?></strong></td>
                        <td><?= htmlspecialchars($enrollment['coach']) ?></td>
                        <td><?= htmlspecialchars($enrollment['date']) ?></td>
                        <td>
                            <?php
                                $badge = match($enrollment['level']) {
                                    'beginner'     => ['class' => 'badge-blue',   'label' => '🟢 Débutant'],
                                    'intermediate' => ['class' => 'badge-purple', 'label' => '🟡 Intermédiaire'],
                                    'advanced'     => ['class' => 'badge-green',  'label' => '🔴 Avancé'],
                                    default        => ['class' => 'badge-gray',   'label' => $enrollment['level']]
                                };
                            ?>
                            <span class="badge <?= $badge['class'] ?>">
                                <?= $badge['label'] ?>
                            </span>
                        </td>
                        <td>
                            <?php if ($enrollment['payment_status'] === 'paid') : ?>
                                <span class="badge badge-paid">✅ Payé</span>
                            <?php else : ?>
                                <span class="badge badge-pending">⏳ En attente</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php endif; ?>

    </div>

</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>