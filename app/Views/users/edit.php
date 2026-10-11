
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="page-heading">
    <div class="eyebrow">USER MANAGEMENT / EDIT RECORD</div>
    <h1>Edit User</h1>
    <p class="lead">Update staff information and profile picture.</p>
</section>

<?php $errors = session('errors') ?? []; ?>

<section class="table-card" style="max-width:720px;padding:28px;">
    <form
        action="<?= site_url('users/' . $user['id'] . '/update') ?>"
        method="post"
        enctype="multipart/form-data"
    >
        <?= csrf_field() ?>

        <div style="margin-bottom:22px;">
            <label for="username"><strong>Username *</strong></label>
            <input
                id="username"
                name="username"
                type="text"
                required
                maxlength="50"
                value="<?= esc(old('username', $user['username'])) ?>"
                style="display:block;width:100%;padding:12px;margin-top:8px;border:1px solid #ddd;border-radius:5px;"
            >
            <?php if (isset($errors['username'])): ?>
                <p role="alert" style="color:#b00020;">
                    <?= esc($errors['username']) ?>
                </p>
            <?php endif; ?>
        </div>

        <div style="margin-bottom:22px;">
            <label for="full_name"><strong>Full Name *</strong></label>
            <input
                id="full_name"
                name="full_name"
                type="text"
                required
                maxlength="100"
                value="<?= esc(old('full_name', $user['full_name'])) ?>"
                style="display:block;width:100%;padding:12px;margin-top:8px;border:1px solid #ddd;border-radius:5px;"
            >
            <?php if (isset($errors['full_name'])): ?>
                <p role="alert" style="color:#b00020;">
                    <?= esc($errors['full_name']) ?>
                </p>
            <?php endif; ?>
        </div>

        <div style="margin-bottom:22px;">
            <label for="avatar"><strong>Profile Picture</strong></label>

            <?php if (! empty($user['avatar'])): ?>
                <div style="margin:12px 0;">
                    <img
                        src="<?= base_url('uploads/avatars/' . rawurlencode($user['avatar'])) ?>"
                        alt="Current profile picture"
                        width="90"
                        height="90"
                        style="border-radius:50%;object-fit:cover;"
                    >
                </div>
            <?php endif; ?>

            <input
                id="avatar"
                name="avatar"
                type="file"
                accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                style="display:block;margin-top:10px;"
            >

            <p style="font-size:13px;color:#777;margin-top:8px;">
                JPG or PNG only. Maximum 2 MB.
            </p>

            <?php if (isset($errors['avatar'])): ?>
                <p role="alert" style="color:#b00020;">
                    <?= esc($errors['avatar']) ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="button-row">
            <button class="button" type="submit">Save Changes</button>
            <a class="button button-outline" href="<?= site_url('users') ?>">
                Cancel
            </a>
        </div>
    </form>
</section>

<?= $this->endSection() ?>
