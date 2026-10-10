
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="hero">
    <div>
        <div class="eyebrow">POINT OF SALE MANAGEMENT</div>

        <h1>
            Manage your store.
            <span>Keep it simple.</span>
        </h1>

        <p class="lead">
            A clean, organized starting point for customer records
            and staff account management, designed with simplicity in mind.
        </p>

        <div class="button-row">
            <a class="button" href="<?= site_url('customers') ?>">
                Customer Accounts &rarr;
            </a>

            <a class="button button-outline" href="<?= site_url('about') ?>">
                Discover the project
            </a>
        </div>
    </div>

    <div class="hero-panel">
        <div class="panel-label">TOLENTINO / POS SYSTEM</div>

        <div>
            <div class="panel-title">
                The essentials.<br>
                All in one place.
            </div>
            <p style="color:#aaa; font-size:14px;">
                Explore the core sections of the project.
            </p>
        </div>

        <div class="panel-links">
            <a class="panel-link" href="<?= site_url('customers') ?>">
                Customer Accounts <span>&rarr;</span>
            </a>

            <a class="panel-link" href="<?= site_url('users') ?>">
                User Accounts <span>&rarr;</span>
            </a>
        </div>
    </div>
</section>

<section>
    <div class="section-heading">
        <div>
            <div class="eyebrow">EXPLORE THE SYSTEM</div>
            <h2>Everything starts here.</h2>
        </div>
    </div>

    <div class="card-grid">
        <a class="card" href="<?= site_url('about') ?>">
            <div class="card-number">01 / OVERVIEW</div>
            <h3>About the Project</h3>
            <p>Learn about the purpose and scope of this POS project.</p>
            <div class="card-arrow">&rarr;</div>
        </a>

        <a class="card" href="<?= site_url('customers') ?>">
            <div class="card-number">02 / RECORDS</div>
            <h3>Customer Accounts</h3>
            <p>Browse sample customer names, email addresses, and phone numbers.</p>
            <div class="card-arrow">&rarr;</div>
        </a>

        <a class="card" href="<?= site_url('users') ?>">
            <div class="card-number">03 / STAFF</div>
            <h3>User Accounts</h3>
            <p>Review sample staff usernames, names, and assigned roles.</p>
            <div class="card-arrow">&rarr;</div>
        </a>
    </div>
</section>

<?= $this->endSection() ?>
