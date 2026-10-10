
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="page-heading">
    <div class="eyebrow">ABOUT THE PROJECT / 01</div>

    <h1>Simple by design.<br>Organized by purpose.</h1>

    <p class="lead">
        Tolentino POS is a basic Point-of-Sale website developed
        with CodeIgniter 4. Its first version focuses on organizing
        customer and staff information through a clean, accessible interface.
    </p>
</section>

<section class="card-grid">
    <div class="card">
        <div class="card-number">01 / CUSTOMERS</div>
        <h3>Customer records</h3>
        <p>
            Display customer names, email addresses, and phone numbers
            from a static PHP array.
        </p>
    </div>

    <div class="card">
        <div class="card-number">02 / STAFF</div>
        <h3>User accounts</h3>
        <p>
            Display staff usernames, full names, and roles
            from a separate static PHP array.
        </p>
    </div>

    <div class="card">
        <div class="card-number">03 / FOUNDATION</div>
        <h3>Built with CodeIgniter</h3>
        <p>
            Practice routes, controllers, views, PHP loops,
            and reusable layouts.
        </p>
    </div>
</section>

<div class="info-panel">
    <h2>What this version includes</h2>

    <p>
        This is the first version of the project. The customer and staff
        lists use sample data stored in controller methods. There is no
        database connection, authentication, or transaction processing yet.
    </p>

    <div class="button-row">
        <a class="button" href="<?= site_url('customers') ?>">
            View customers
        </a>

        <a class="button button-outline" href="<?= site_url('users') ?>">
            View user accounts
        </a>
    </div>
</div>

<?= $this->endSection() ?>
