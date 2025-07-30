<?= $this->extend('\App\Views\template\base') ?>

<?= $this->section('css'); ?>
<style>
    .profile-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background-color: #f0f0f0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2em;
        font-weight: bold;
        color: #666;
        margin: 0 auto 15px;
    }

    .card {
        border-radius: 10px;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page-wrapper mt-5">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('errors')): ?>
                    <?php foreach (session()->getFlashdata('errors') as $key => $value) { ?>
                        <div class="alert alert-danger"><?= $value ?></div>
                    <?php } ?>
                <?php endif; ?>

                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <div class="profile-avatar">
                            <?= strtoupper(substr($user['full_name'], 0, 1)); ?>
                        </div>
                        <h4 class="mb-1"><?= esc($user['full_name']); ?></h4>
                        <p class="text-muted mb-3"><?= esc($user['email']); ?></p>

                        <hr>

                        <form action="<?= base_url('profile/update'); ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="mb-3 text-start">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="full_name" class="form-control"
                                    value="<?= old('full_name', $user['full_name']); ?>">
                            </div>

                            <!-- <div class="mb-3 text-start">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="<?= old('email', $user['email']); ?>">
                            </div> -->

                            <div class="mb-3 text-start">
                                <label class="form-label">Password Baru (Opsionals)</label>
                                <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ganti">
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Update Profil</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>