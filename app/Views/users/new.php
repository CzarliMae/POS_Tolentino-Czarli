
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="page-heading">
    <div class="eyebrow">USER MANAGEMENT / NEW RECORD</div>
    <h1>New User</h1>

    <p class="lead">
        Create a staff account. Both fields are required.
    </p>
</section>

<?php $errors = session('errors') ?? []; ?>

<section class="table-card" style="max-width:720px;padding:28px;">
    <form action="<?= site_url('users/store') ?>" method="post">
        <?= csrf_field() ?>

        <div style="margin-bottom:22px;">
            <label for="username"><strong>Username *</strong></label>

            <input
                id="username"
                name="username"
                type="text"
                value="<?= esc(old('username', '')) ?>"
                maxlength="50"
                required
                autocomplete="username"
                style="display:block;width:100%;padding:12px;margin-top:8px;border:1px solid #ddd;border-radius:5px;"
            >

            <?php if (isset($errors['username'])): ?>
                <p role="alert" style="color:#b00020;margin-top:6px;">
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
                value="<?= esc(old('full_name', '')) ?>"
                maxlength="100"
                required
                autocomplete="name"
                style="display:block;width:100%;padding:12px;margin-top:8px;border:1px solid #ddd;border-radius:5px;"
            >

            <?php if (isset($errors['full_name'])): ?>
                <p role="alert" style="color:#b00020;margin-top:6px;">
                    <?= esc($errors['full_name']) ?>
                </p>
            <?php endif; ?>
        </div>

        <p style="color:#777;font-size:13px;">
            * Required fields. Usernames must be unique.
        </p>

        <div class="button-row">
            <button class="button" type="submit">Save User</button>

            <a class="button button-outline" href="<?= site_url('users') ?>">
                Cancel
            </a>
        </div>
    </form>
</section>

<?= $this->endSection() ?>
