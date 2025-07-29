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
                <form action="<?= base_url('auth/register'); ?>" method="post">
                    <?= csrf_field() ?>
                    <p class="h4 mb-4 text-center">Register</p>

                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Enter your full name" value="<?= old('full_name'); ?>">
                        <?php if (session()->getFlashdata('errors.full_name')): ?>
                            <div class="text-danger mt-1"><?= session()->getFlashdata('errors.full_name') ?></div>
                        <?php endif; ?>
                    </div>

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

                    <div class="mb-3">
                        <label for="pass_confirm" class="form-label">Confirm Password</label>
                        <input type="password" name="pass_confirm" id="pass_confirm" class="form-control" placeholder="Confirm password" />
                        <?php if (session()->getFlashdata('errors.pass_confirm')): ?>
                            <div class="text-danger mt-1"><?= session()->getFlashdata('errors.pass_confirm') ?></div>
                        <?php endif; ?>
                    </div>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                    <?php endif; ?>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-md"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="<?= base_url('auth/login'); ?>"
                                class="link-danger">Login here</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<?= $this->endSection(); ?>