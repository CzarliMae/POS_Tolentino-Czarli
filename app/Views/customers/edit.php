
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="page-heading">
    <div class="eyebrow">CUSTOMER MANAGEMENT / EDIT RECORD</div>
    <h1>Edit Customer</h1>
    <p class="lead">Update the customer's contact information.</p>
</section>

<?php $errors = session('errors') ?? []; ?>

<section class="table-card" style="max-width:720px;padding:28px;">
    <form
        action="<?= site_url('customers/' . $customer['id'] . '/update') ?>"
        method="post"
    >
        <?= csrf_field() ?>

        <div style="margin-bottom:22px;">
            <label for="full_name"><strong>Full Name *</strong></label>
            <input
                id="full_name"
                name="full_name"
                type="text"
                maxlength="100"
                required
                value="<?= esc(old('full_name', $customer['full_name'])) ?>"
                style="display:block;width:100%;padding:12px;margin-top:8px;border:1px solid #ddd;border-radius:5px;"
            >
            <?php if (isset($errors['full_name'])): ?>
                <p role="alert" style="color:#b00020;">
                    <?= esc($errors['full_name']) ?>
                </p>
            <?php endif; ?>
        </div>

        <div style="margin-bottom:22px;">
            <label for="email"><strong>Email Address *</strong></label>
            <input
                id="email"
                name="email"
                type="email"
                maxlength="100"
                required
                value="<?= esc(old('email', $customer['email'])) ?>"
                style="display:block;width:100%;padding:12px;margin-top:8px;border:1px solid #ddd;border-radius:5px;"
            >
            <?php if (isset($errors['email'])): ?>
                <p role="alert" style="color:#b00020;">
                    <?= esc($errors['email']) ?>
                </p>
            <?php endif; ?>
        </div>

        <div style="margin-bottom:22px;">
            <label for="phone"><strong>Phone Number</strong></label>
            <input
                id="phone"
                name="phone"
                type="tel"
                maxlength="20"
                value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>"
                style="display:block;width:100%;padding:12px;margin-top:8px;border:1px solid #ddd;border-radius:5px;"
            >
            <?php if (isset($errors['phone'])): ?>
                <p role="alert" style="color:#b00020;">
                    <?= esc($errors['phone']) ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="button-row">
            <button class="button" type="submit">Save Changes</button>
            <a class="button button-outline" href="<?= site_url('customers') ?>">
                Cancel
            </a>
        </div>
    </form>
</section>

<?= $this->endSection() ?>
