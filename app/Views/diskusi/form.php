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
                echo '<div class="alert alert-success mx-4 mt-3 position-relative" style="padding-left: 65px;">';
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
                                <label class="form-label">Lampiran Saat Ini</label>
                                <ul>
                                    <?php foreach ($files as $file): ?>
                                        <li>
                                            <a style="padding-right: 20px;" href="<?= base_url("file/view/" . $file['nama_file_simpan']) ?>" class="text-decoration-none" target="_blank"><?= $file['nama_file_ori'] ?></a>
                                            <input type="checkbox" name="delete_files[]" value="<?= $file['id']; ?>"> Hapus
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tambah / Ganti File</label>
                                <input type="file" name="file_upload[]" class="form-control" multiple>
                                <small class="text-muted">Kosongkan jika tidak ingin menambah file.</small><br>
                                <small class="text-danger">* Tipe File yang bisa diupload: .pdf, .png, .jpg, .jpeg, .mp4, .webm, .ogg, .doc, .docx, .ppt, .pptx, .zip, .rar</small>
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