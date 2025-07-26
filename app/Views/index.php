<!doctype html>

<html lang="en">

<head>
    <?= $this->include('\App\Views\template\partial\header') ?>
</head>

<body class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="<?= base_url(); ?>assets/img/logo/it-edu-logo.png" height="36" alt=""></a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Login to your account</h2>
                    <form action="<?= base_url('auth/sign_in'); ?>" method="post" autocomplete="off" novalidate>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="username" class="form-control" name="username">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Password
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control" name="password">
                                <span class="input-group-text">
                                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="12" cy="12" r="2" />
                                            <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                        </svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center text-muted mt-3">
                Don't have account yet? <a href="<?= base_url('auth/sign_up'); ?>" tabindex="-1">Sign up</a>
            </div>
        </div>
    </div>

    <?= $this->include('\App\Views\template\partial\js') ?>
</body>

</html>