
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="page-heading">
    <div class="eyebrow">RECORD MANAGEMENT / 02</div>
    <h1>User Accounts</h1>

    <p class="lead">
        Review the staff directory and the date each account was created.
    </p>

    <div class="button-row">
        <a class="button" href="<?= site_url('users/new') ?>">
            + New User
        </a>
    </div>
</section>

<section class="table-card">
    <div class="table-toolbar">
        <h2>Staff directory</h2>

        <span class="record-count">
            <?= count($users) ?> records
        </span>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Avatar</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users as $index => $user): ?>
                    <tr>
                        <td class="row-number">
                            <?= $index + 1 ?>
                        </td>

                        <td>
                            <?php if (! empty($user['avatar'])): ?>
                                <img
                                    src="<?= base_url('uploads/avatars/' . rawurlencode($user['avatar'])) ?>"
                                    alt="<?= esc($user['full_name']) ?>"
                                    width="44"
                                    height="44"
                                    style="border-radius:50%;object-fit:cover;"
                                >
                            <?php else: ?>
                                <div
                                    role="img"
                                    aria-label="No profile picture"
                                    style="width:44px;height:44px;border-radius:50%;background:#eee;display:grid;place-items:center;font-size:18px;color:#555;"
                                >
                                    &#128100;
                                </div>
                            <?php endif; ?>
                        </td>


                        <td>
                            <strong><?= esc($user['username']) ?></strong>
                        </td>

                        <td><?= esc($user['full_name']) ?></td>

                        <td>
                            <?= esc($user['created_at']) ?>
                        </td>
                        <td>
                            <a
                                class="button button-outline"
                                href="<?= site_url('users/' . $user['id'] . '/edit') ?>"
                            >
                                Edit
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<div class="info-panel">
    <div class="eyebrow">ABOUT THESE RECORDS</div>

    <p>
        These user accounts are retrieved from the MySQL database.
        The current version displays account information without
        implementing authentication or role-based permissions.
    </p>
</div>

<?= $this->endSection() ?>
