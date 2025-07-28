<html lang="en">

<head>
    <?= $this->include('\App\Views\template\partial\header') ?>
    <?= $this->renderSection('css'); ?>
</head>

<body>
    <script src="<?= base_url(); ?>assets/tabler-template/dist/js/demo-theme.min.js?1668287865"></script>
    <div class="page">
        <!-- Navbar -->
        <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href=".">
                        <img src="<?= base_url(); ?>assets/img/logo/it-edu-logo.png" height="40">
                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <span class="avatar avatar-sm">
                            </span>
                            <div class="d-none d-xl-block ps-2">
                                <div><?= session()->get('full_name') ?></div>
                                <div class="mt-1 small text-muted"><?= session()->get('username') ?></div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="<?= base_url("profile") ?>" class="dropdown-item">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url("auth/logout") ?>" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <?= $this->include('\App\Views\template\partial\navbar') ?>
        <div class="page-wrapper">
            <?= $this->renderSection('content'); ?>

            <?= $this->include('\App\Views\template\partial\footer') ?>
        </div>
    </div>

    <?= $this->include('\App\Views\template\partial\js') ?>
    <?= $this->renderSection('javascript'); ?>
</body>

</html>