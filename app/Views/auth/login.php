<?= $this->extend('\App\Views\template\base_without_nav') ?>

<?= $this->section('css'); ?>
<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    .h-custom {
        height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link p-0 my-4" href="<?= base_url('dashboard'); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l14 0" />
                                <path d="M5 12l4 4" />
                                <path d="M5 12l4 -4" />
                            </svg>
                            Kembali ke Dashboard
                        </a>
                    </li>
                </ul>
                <form action="<?= base_url('auth/login'); ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="name@example.com" value="<?= old('email'); ?>">
                        <?php if (session()->getFlashdata('errors.email')): ?>
                            <div class="text-danger mt-1"><?= session()->getFlashdata('errors.email') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" />
                        <?php if (session()->getFlashdata('errors.password')): ?>
                            <div class="text-danger mt-1"><?= session()->getFlashdata('errors.password') ?></div>
                        <?php endif; ?>
                    </div>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-md"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="<?= base_url('auth/register'); ?>"
                                class="link-danger">Register</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<?= $this->endSection(); ?>