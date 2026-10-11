
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="page-heading">
    <div class="eyebrow">CUSTOMER MANAGEMENT / NEW RECORD</div>
    <h1>New Customer</h1>
    <p class="lead">
        Enter the customer's contact details. Full name and email are required.
    </p>
</section>

<?php $errors = session('errors') ?? []; ?>

<section class="table-card" style="max-width: 720px; padding: 28px;">
    <?php if (isset($errors['_general'])): ?>
        <p role="alert"><?= esc($errors['_general']) ?></p>
    <?php endif; ?>

    <form action="<?= site_url('customers/store') ?>" method="post">
        <?= csrf_field() ?>

        <div style="margin-bottom: 22px;">
            <label for="full_name"><strong>Full Name *</strong></label>
            <input
                id="full_name"
                name="full_name"
                type="text"
                value="<?= esc(old('full_name', '')) ?>"
                maxlength="100"
                required
                style="display:block;width:100%;padding:12px;margin-top:8px;border:1px solid #ddd;border-radius:5px;"
            >

            <?php if (isset($errors['full_name'])): ?>
                <p role="alert" style="color:#b00020;margin-top:6px;">
                    <?= esc($errors['full_name']) ?>
                </p>
            <?php endif; ?>
        </div>

        <div style="margin-bottom: 22px;">
            <label for="email"><strong>Email Address *</strong></label>
            <input
                id="email"
                name="email"
                type="email"
                value="<?= esc(old('email', '')) ?>"
                maxlength="100"
                required
                style="display:block;width:100%;padding:12px;margin-top:8px;border:1px solid #ddd;border-radius:5px;"
            >

            <?php if (isset($errors['email'])): ?>
                <p role="alert" style="color:#b00020;margin-top:6px;">
                    <?= esc($errors['email']) ?>
                </p>
            <?php endif; ?>
        </div>

        <div style="margin-bottom: 22px;">
            <label for="phone"><strong>Phone Number</strong></label>
            <input
                id="phone"
                name="phone"
                type="tel"
                value="<?= esc(old('phone', '')) ?>"
                maxlength="20"
                style="display:block;width:100%;padding:12px;margin-top:8px;border:1px solid #ddd;border-radius:5px;"
            >

            <?php if (isset($errors['phone'])): ?>
                <p role="alert" style="color:#b00020;margin-top:6px;">
                    <?= esc($errors['phone']) ?>
                </p>
            <?php endif; ?>
        </div>

        <p style="color:#777;font-size:13px;">* Required fields</p>

        <div class="button-row">
            <button class="button" type="submit">Save Customer</button>
            <a class="button button-outline" href="<?= site_url('customers') ?>">
                Cancel
            </a>
        </div>
    </form>
</section>

<?= $this->endSection() ?>
