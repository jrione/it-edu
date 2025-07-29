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
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href=".">
                        <img src="<?= base_url(); ?>assets/img/logo/it-edu-logo.png" height="40">
                    </a>
                </h1>
                <?php if (session()->get('isLoggedIn')) { ?>
                    <div class="navbar-nav flex-row order-md-last">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link d-flex align-items-center lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                                <img src="https://ui-avatars.com/api/?name=<?= session()->get('nama_user') ?>&background=0D8ABC&color=fff&size=32" alt="User" class="rounded-circle me-2" width="32" height="32">
                                <div class="d-none d-xl-block text-start ps-1">
                                    <div class="fw-semibold"><?= session()->get('nama_user') ?></div>
                                    <div class="small text-muted text-capitalize"><?= session()->get('user_role') ?></div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow shadow-sm mt-2">
                                <a href="<?= base_url("profile") ?>" class="dropdown-item">
                                    <i class="fa fa-user me-2"></i> Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="<?= base_url("auth/logout") ?>" class="dropdown-item text-danger">
                                    <i class="fa fa-sign-out-alt me-2"></i> Logout
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <a type="submit" class="btn btn-primary btn-sm" style="padding-left: 2.5rem; padding-right: 2.5rem;" href="<?= base_url("auth/login") ?>">Login</a>
                <?php } ?>
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