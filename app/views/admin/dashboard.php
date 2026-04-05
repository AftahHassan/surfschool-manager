<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="dashboard-container">

    <!-- TITRE -->
    <div class="page-header">
        <div>
            <h1 class="page-title">🏄 Tableau de Bord</h1>
            <p class="page-subtitle">Bienvenue, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></p>
        </div>
    </div>

    <!-- STATS -->
    <div class="stats-grid">

        <div class="stat-card stat-blue">
            <div class="stat-card-inner">
                <div class="stat-icon">👥</div>
                <div class="stat-info">
                    <div class="stat-label">Total Élèves</div>
                    <div class="stat-number"><?= count($students) ?></div>
                </div>
            </div>
            <div class="stat-bar"><div class="stat-bar-fill"></div></div>
        </div>

        <div class="stat-card stat-purple">
            <div class="stat-card-inner">
                <div class="stat-icon">🏄</div>
                <div class="stat-info">
                    <div class="stat-label">Total Cours</div>
                    <div class="stat-number"><?= count($lessons) ?></div>
                </div>
            </div>
            <div class="stat-bar"><div class="stat-bar-fill"></div></div>
        </div>

        <div class="stat-card stat-green">
            <div class="stat-card-inner">
                <div class="stat-icon">📋</div>
                <div class="stat-info">
                    <div class="stat-label">Total Inscriptions</div>
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

    </div>

    <!-- GESTION -->
    <div class="section-card">
        <div class="section-card-header">
            <h2 class="section-card-title">⚙️ Gestion</h2>
        </div>
        <div class="gestion-grid">

            <div class="gestion-card">
                <div class="gestion-card-icon">👥</div>
                <div class="gestion-card-title">Élèves</div>
                <div class="gestion-card-desc">Gérer les surfeurs inscrits</div>
                <div class="gestion-card-actions">
                    <a href="students.php?action=index" class="btn-action btn-primary">
                        ✏️ ManageNiveaux
                    </a>
                    <!-- <a href="students.php?action=index" class="btn-action btn-ghost">
                        ✏️ Niveaux
                    </a> -->
                </div>
            </div>

            <div class="gestion-card">
                <div class="gestion-card-icon">🏄</div>
                <div class="gestion-card-title">Cours</div>
                <div class="gestion-card-desc">Planifier les sessions de surf</div>
                <div class="gestion-card-actions">
                    <a href="lessons.php?action=index" class="btn-action btn-primary">
                        ✏️ ManageCourses
                    </a>
                    <!-- <a href="lessons.php?action=create" class="btn-action btn-ghost">
                        ➕📋 Ajouter
                    </a> -->
                </div>
            </div>

            <div class="gestion-card">
                <div class="gestion-card-icon">📋</div>
                <div class="gestion-card-title">Inscriptions</div>
                <div class="gestion-card-desc">Suivre les paiements</div>
                <div class="gestion-card-actions">
                    <a href="enrollments.php?action=index" class="btn-action btn-primary">
                        ✏️ ManageInscriptions
                    </a>
                    <!-- <a href="enrollments.php?action=enroll" class="btn-action btn-ghost">
                        ➕ Inscrire
                    </a> -->
                </div>
            </div>

        </div>
    </div>

    <!-- LISTE ÉLÈVES -->
    <div class="section-card">
        <div class="section-card-header">
            <h2 class="section-card-title">👥 Liste des Élèves</h2>
        </div>
        <table class="data-table">
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
                    <td>
                        <?php
                            $level = $student['level'];
                            $badge = match($level) {
                                'beginner'     => ['class' => 'badge-blue',   'label' => '🟢 Débutant'],
                                'intermediate' => ['class' => 'badge-purple', 'label' => '🟡 Intermédiaire'],
                                'advanced'     => ['class' => 'badge-green',  'label' => '🔴 Avancé'],
                                default        => ['class' => 'badge-gray',   'label' => $level]
                            };
                        ?>
                        <span class="badge <?= $badge['class'] ?>">
                            <?= $badge['label'] ?>
                        </span>
                    </td>
                    <td>
                        <a href="students.php?action=delete&id=<?= $student['id'] ?>"
                           class="btn-action btn-danger">
                           🗑️ Supprimer
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- LISTE COURS -->
    <div class="section-card">
        <div class="section-card-header">
            <h2 class="section-card-title">🏄 Cours à venir</h2>
        </div>
        <table class="data-table">
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
                    <td><strong><?= htmlspecialchars($lesson['title']) ?></strong></td>
                    <td><?= htmlspecialchars($lesson['coach']) ?></td>
                    <td><?= htmlspecialchars($lesson['date']) ?></td>
                    <td><?= htmlspecialchars($lesson['level']) ?></td>
                    <td><strong><?= htmlspecialchars($lesson['price']) ?> MAD</strong></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>