
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="page-heading">
    <div class="eyebrow">RECORD MANAGEMENT / 01</div>
    <h1>Customer Accounts</h1>

    <p class="lead">
        Browse the customer directory and review its contact information.
    </p>

    <div class="button-row">
    <a class="button" href="<?= site_url('customers/new') ?>">
        + New Customer
    </a>
</div>

</section>


<section class="table-card">
    <div class="table-toolbar">
        <h2>Customer directory</h2>
        <span class="record-count">
            <?= count($customers) ?> records
        </span>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($customers as $index => $customer): ?>
                    <tr>
                        <td class="row-number">
                            <?= $index + 1 ?>
                        </td>

                        <td>
                            <strong><?= esc($customer['full_name']) ?></strong>
                        </td>

                        <td><?= esc($customer['email']) ?></td>
                        <td><?= esc($customer['phone']) ?></td>
                        <td>
                            <a
                                class="button button-outline"
                                href="<?= site_url('customers/' . $customer['id'] . '/edit') ?>"
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
        These entries are sample data stored in a PHP array.
        They are not saved to a database and will reset whenever
        the source code is changed.
    </p>
</div>

<?= $this->endSection() ?>
