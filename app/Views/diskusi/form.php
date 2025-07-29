<!-- app/Views/artikel/form.php -->
<?= $this->extend('\App\Views\template\base') ?>

<?= $this->section('css'); ?>
<style>
    /* Styling for sidebar active link */
    .nav-link.active {
        background-color: #e0e7ff;
        color: #436cf5;
        font-weight: bold;
    }

    .profile-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #f0f0f0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2em;
        font-weight: bold;
        color: #666;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page-wrapper mt-5">
    <div class="container-xl">
        <div class="row row-deck row-cards justify-content-center">
            <?php
            if (session()->getFlashdata('success')) {
                echo 'div class="alert alert-success mx-4 mt-3 position-relative" style="padding-left: 65px;">';
                echo '<span data-notify="icon" class="fas fa-check-circle"></span>';
                echo '<span data-notify="title">SUKSES!</span>';
                echo '<span data-notify="message">' . session()->getFlashdata('success') . '</span>';
                echo '</div>';
            }
            if (session()->getFlashdata('error')) {
                echo '<div class="alert alert-danger mx-4 mt-3" style="padding-left: 65px;">';
                echo '<span data-notify="icon" class="fas fa-times-circle"></span>';
                echo '<span data-notify="title">GAGAL!</span>';
                echo '<span data-notify="message">' . session()->getFlashdata('error') . '</span>';
                echo '</div>';
            }
            if (session()->getFlashdata('errors')) {
                foreach (session()->getFlashdata('errors') as $key => $value) {
                    echo '<div class="alert alert-danger mx-4 mt-3" style="padding-left: 65px;">';
                    echo '<span data-notify="icon" class="fas fa-times-circle"></span>';
                    echo '<span data-notify="title">GAGAL!</span>';
                    echo '<span data-notify="message">' . $value . '</span>';
                    echo '</div>';
                }
            }
            ?>
            <!-- Main Content Area - Form Artikel -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= isset($article['id']) ? 'Edit Artikel' : 'Tambah Artikel Baru'; ?></h3>
                    </div>
                    <div class="card-body">
                        <!-- Form untuk Tambah/Edit Artikel -->
                        <form action="<?= isset($article['id']) ? base_url('artikel/update/' . $article['id']) : base_url('artikel/store'); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label for="title" class="form-label">Judul Artikel</label>
                                <input type="text" class="form-control <?= session()->getFlashdata('errors.title') ? 'is-invalid' : ''; ?>" id="title" name="title" value="<?= old('title', $article['title'] ?? ''); ?>" placeholder="Masukkan judul artikel">
                                <?php if (session()->getFlashdata('errors.title')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors.title') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Isi Artikel</label>
                                <textarea class="form-control <?= session()->getFlashdata('errors.content') ? 'is-invalid' : ''; ?>" id="content" name="content" rows="6" placeholder="Tulis isi artikel di sini..."><?= old('content', $article['content'] ?? ''); ?></textarea>
                                <?php if (session()->getFlashdata('errors.content')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors.content') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="file_upload" class="form-label">Lampiran File (Opsional)</label>
                                <input type="file" class="form-control <?= session()->getFlashdata('errors.file_upload') ? 'is-invalid' : ''; ?>" id="file_upload" name="file_upload[]" multiple>
                                <?php if (isset($article['file_name']) && !empty($article['file_name'])): ?>
                                    <small class="form-text text-muted">File saat ini: <?= esc($article['file_name']); ?>. Upload file baru untuk mengganti.</small>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('errors.file_upload')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors.file_upload') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <a href="<?= base_url('artikel'); ?>" class="btn btn-secondary me-2">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Artikel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<?= $this->endSection(); ?>