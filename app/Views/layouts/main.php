
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Tolentino POS') ?></title>

    <style>
        :root {
            --black: #111111;
            --white: #ffffff;
            --gray: #777777;
            --light: #f5f5f5;
            --line: #e8e8e8;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--white);
            color: var(--black);
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .container {
            width: min(1120px, calc(100% - 40px));
            margin: 0 auto;
        }

        .site-header {
            background: #fff;
            border-bottom: 1px solid var(--line);
        }

        .header-inner {
            width: min(1200px, calc(100% - 40px));
            min-height: 82px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            font-weight: 900;
            letter-spacing: -1px;
            font-size: 18px;
        }

        .brand-mark {
            display: grid;
            place-items: center;
            width: 38px;
            height: 38px;
            background: var(--black);
            color: white;
            font-size: 21px;
            border-radius: 50%;
        }

        .brand small {
            font-size: 10px;
            letter-spacing: 2px;
            display: block;
            color: var(--gray);
        }

        .nav {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 25px;
        }

        .nav a {
            font-size: 13px;
            font-weight: 700;
            color: #555;
        }

        .nav a:hover,
        .nav a.active {
            color: #000;
        }

        .nav a.active {
            text-decoration: underline;
            text-underline-offset: 6px;
        }

        main.container {
            flex: 1;
            padding-top: 54px;
            padding-bottom: 72px;
        }

        .eyebrow {
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #666;
        }

        h1, h2, h3, p {
            margin-top: 0;
        }

        h1 {
            font-size: clamp(38px, 6vw, 68px);
            line-height: 1.04;
            letter-spacing: -3px;
            margin: 18px 0;
        }

        h2 {
            font-size: clamp(25px, 4vw, 38px);
            line-height: 1.15;
            letter-spacing: -1.2px;
        }

        .lead {
            max-width: 580px;
            color: #666;
            font-size: 17px;
        }

        .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-height: 46px;
            padding: 12px 20px;
            background: #111;
            color: #fff;
            border: 1px solid #111;
            border-radius: 5px;
            font-weight: 700;
            font-size: 13px;
            transition: .2s ease;
        }

        .button:hover {
            background: #333;
        }

        .button-outline {
            background: #fff;
            color: #111;
        }

        .button-outline:hover {
            background: #f0f0f0;
        }

        .button-row {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 28px;
        }

        .hero {
            display: grid;
            grid-template-columns: 1.15fr .85fr;
            align-items: center;
            gap: 48px;
            padding: 28px 0 65px;
        }

        .hero h1 span {
            display: block;
        }

        .hero-panel {
            background: #111;
            color: white;
            border-radius: 18px;
            padding: 30px;
            min-height: 310px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 15px 35px #00000012;
        }

        .panel-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #aaa;
        }

        .panel-title {
            font-size: 35px;
            line-height: 1.1;
            font-weight: 800;
            letter-spacing: -1px;
            margin: 18px 0;
        }

        .panel-links {
            display: grid;
            gap: 10px;
        }

        .panel-link {
            border: 1px solid #444;
            border-radius: 8px;
            padding: 13px 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-weight: 700;
            font-size: 13px;
        }

        .panel-link:hover {
            background: #292929;
        }

        .section-heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 24px;
        }

        .section-heading h2 {
            margin-bottom: 0;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .card {
            display: block;
            background: white;
            border: 1px solid #eee;
            border-radius: 14px;
            padding: 26px;
            box-shadow: 0 6px 17px #0000000d;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        a.card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 25px #00000012;
        }

        .card-number {
            font-size: 12px;
            font-weight: 800;
            color: #888;
            letter-spacing: 1px;
        }

        .card h3 {
            font-size: 20px;
            margin: 21px 0 8px;
        }

        .card p {
            color: #777;
            font-size: 14px;
            margin-bottom: 22px;
        }

        .card-arrow {
            font-size: 24px;
            font-weight: 800;
        }

        .page-heading {
            margin-bottom: 35px;
        }

        .page-heading h1 {
            font-size: clamp(36px, 5vw, 54px);
        }

        .table-card {
            background: white;
            border: 1px solid #eaeaea;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 7px 20px #00000008;
        }

        .table-toolbar {
            padding: 22px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .table-toolbar h2 {
            font-size: 20px;
            margin: 0;
            letter-spacing: -.4px;
        }

        .record-count {
            background: #f1f1f1;
            color: #333;
            padding: 6px 10px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 12px;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 14px;
        }

        thead {
            background: #111;
            color: #fff;
        }

        th, td {
            padding: 17px 24px;
            border-bottom: 1px solid #eee;
            white-space: nowrap;
        }

        th {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        tbody tr:hover {
            background: #fafafa;
        }

        tbody tr:last-child td {
            border-bottom: 0;
        }

        .row-number {
            color: #888;
            width: 55px;
        }

        .role-tag {
            background: #f1f1f1;
            border-radius: 4px;
            padding: 5px 9px;
            display: inline-block;
            font-weight: 700;
            font-size: 12px;
        }

        .info-panel {
            background: #f5f5f5;
            border-radius: 14px;
            padding: 28px;
            margin-top: 28px;
        }

        .info-panel p:last-child {
            margin-bottom: 0;
        }

        .footer {
            background: #080808;
            color: white;
            padding: 40px 0 24px;
        }

        .footer-inner {
            width: min(1200px, calc(100% - 40px));
            margin: auto;
        }

        .footer-top {
            display: grid;
            grid-template-columns: 1.1fr 1fr 1fr;
            gap: 40px;
            padding-bottom: 35px;
        }

        .footer-brand {
            font-size: 25px;
            font-weight: 900;
            letter-spacing: -1px;
        }

        .footer p, .footer a {
            color: #aaa;
            font-size: 13px;
        }

        .footer h3 {
            font-size: 13px;
            margin-bottom: 15px;
        }

        .footer-links {
            display: grid;
            gap: 9px;
        }

        .footer a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid #333;
            padding-top: 18px;
            color: #888;
            font-size: 12px;
        }

        @media (max-width: 760px) {
            .header-inner {
                padding: 18px 0;
                align-items: flex-start;
                flex-direction: column;
                gap: 18px;
            }

            .nav {
                gap: 15px;
            }

            main.container {
                padding-top: 30px;
            }

            .hero {
                grid-template-columns: 1fr;
                gap: 28px;
                padding-top: 10px;
            }

            .hero-panel {
                min-height: 280px;
            }

            .card-grid {
                grid-template-columns: 1fr;
            }

            .footer-top {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .section-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            h1 {
                letter-spacing: -2px;
            }

            th, td {
                padding: 14px 16px;
            }
        }
    </style>
</head>

<body>
    <header class="site-header">
        <div class="header-inner">
            <a class="brand" href="<?= site_url('/') ?>">
                <span class="brand-mark">T</span>
                <span>
                    TOLENTINO
                    <small>POINT OF SALE</small>
                </span>
            </a>

            <nav class="nav" aria-label="Main navigation">
                <a class="<?= ($activePage ?? '') === 'home' ? 'active' : '' ?>"
                   href="<?= site_url('/') ?>">Home</a>

                <a class="<?= ($activePage ?? '') === 'about' ? 'active' : '' ?>"
                   href="<?= site_url('about') ?>">About</a>

                <a class="<?= ($activePage ?? '') === 'customers' ? 'active' : '' ?>"
                   href="<?= site_url('customers') ?>">Customers</a>

                <a class="<?= ($activePage ?? '') === 'users' ? 'active' : '' ?>"
                   href="<?= site_url('users') ?>">User Accounts</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="footer">
        <div class="footer-inner">
            <div class="footer-top">
                <div>
                    <div class="footer-brand">T / POS</div>
                    <p>A simple starting point for better store management.</p>
                </div>

                <div>
                    <h3>QUICK LINKS</h3>
                    <div class="footer-links">
                        <a href="<?= site_url('/') ?>">Home</a>
                        <a href="<?= site_url('about') ?>">About</a>
                        <a href="<?= site_url('customers') ?>">Customer Accounts</a>
                        <a href="<?= site_url('users') ?>">User Accounts</a>
                    </div>
                </div>

                <div>
                    <h3>THE PROJECT</h3>
                    <p>A CodeIgniter 4 practice project using static PHP arrays
                       for customer and staff records.</p>
                </div>
            </div>

            <div class="footer-bottom">
                &copy; <?= date('Y') ?> Tolentino POS. Academic project.
            </div>
        </div>
    </footer>
</body>
</html>
