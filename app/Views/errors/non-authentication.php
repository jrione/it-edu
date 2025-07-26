<!doctype html>

<html lang="en">

<head>
    <?= $this->include('\App\Views\template\partial\header') ?>
</head>

<body class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="<?= base_url(); ?>assets/img/logo/brainboost-logo.png" height="36" alt=""></a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    You can't access this page. <a href="<?= base_url('auth') ?>">Sign in</a> first.
                </div>
            </div>
        </div>
    </div>

    <?= $this->include('\App\Views\template\partial\js') ?>
</body>

</html>