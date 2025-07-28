<?= $this->extend('\App\Views\template\base') ?>
<?= $this->section('css'); ?>
<style>
    /* Styling for sidebar active link */
    .nav-link.active {
        background-color: #e0e7ff;
        /* Lighter blue for active state */
        color: #436cf5;
        /* Darker blue for text */
        font-weight: bold;
    }

    .card-footer-item {
        color: #555;
        font-size: 0.9em;
        padding-top: 10px;
        display: flex;
        align-items: center;
    }

    .card-footer-item i {
        margin-right: 5px;
    }

    .card-footer {
        border-top: 1px solid #eee;
        padding-top: 10px;
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
        <div class="row row-deck row-cards">

            <?php
            if (session()->getFlashdata('success')) {
                echo '<div class="alert alert-success mx-4 mt-3" style="padding-left: 65px;">';
                echo '<span data-notify="title">SUKSES!</span>';
                echo '<span data-notify="message">' . session()->getFlashdata('success') . '</span>';
                echo '</div>';
            }
            if (session()->getFlashdata('error')) {
                echo '<div class="alert alert-danger mx-4 mt-3" style="padding-left: 65px;">';
                echo '<span data-notify="title">GAGAL! </span>';
                echo '<span data-notify="message">' . session()->getFlashdata('error') . '</span>';
                echo '</div>';
            }
            ?>

            <!-- menu di kiri -->
            <div class="col-md-3">
                <!-- <div class="card"> -->
                <!-- card-body  -->
                <div class="p-3">
                    <ul class="nav nav-pills flex-column">
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l14 0" />
                                    <path d="M5 12l4 4" />
                                    <path d="M5 12l4 -4" />
                                </svg>
                                Kembali
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Informasi Kelas</a>
                        </li> -->
                    </ul>
                </div>
                <!-- </div> -->
            </div>

            <!-- content -->
            <div class="col-md-6">
                <div class="container">
                    <div class="row">
                        <?php foreach ($artikel as $key => $value) { ?>
                            <div class="col-md-12">
                                <div class="card mb-3">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="avatar me-3 profile-avatar">.</span>
                                            <div>
                                                <h4 class="mb-0"><?= $value['author_name'] ?></h4>
                                                <small class="text-muted">memposting materi <?= $value['posted_ago'] ?></small>
                                            </div>
                                        </div>
                                        <div style="margin-top: 25px;">
                                            <a class="nav-link" href="<?= base_url("artikel/" . $value['id']) ?>">
                                                <h3 class="card-title"><?= $value['title'] ?></h3>
                                            </a>
                                            <!-- <p><?= $value['content'] ?></p> -->
                                        </div>
                                        <div class="card mt-4" style="background-color: aliceblue;">
                                            <div class="card-body pt-1 pb-1">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-text" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                                            <path d="M9 9l1 0" />
                                                            <path d="M9 13l6 0" />
                                                            <path d="M9 17l6 0" />
                                                        </svg>
                                                    </div>
                                                    <a href="#" class="text-decoration-none">Persamaan_Diferensial_Lanjutan.pdf</a>
                                                    <a href="#" class="ms-auto btn btn-ghost-light">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                                            <path d="M7 11l5 5l5 -5" />
                                                            <path d="M12 4v12" />
                                                        </svg>
                                                        Unduh
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="card-footer-item me-auto pt-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
                                            </svg>
                                            <div style="margin-bottom: 2px;">
                                                <?= $value['komens_count'] ?> Komentar
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <!-- <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="avatar me-3 profile-avatar">BD</span>
                                        <div>
                                            <h4 class="mb-0">Budi Santoso</h4>
                                            <small class="text-muted">memposting materi pada tangaal</small>
                                        </div>
                                    </div>
                                    <div style="margin-top: 25px;">
                                        <h3 class="card-title">Materi Aljabar Linear</h3>
                                        <p>Catatan penting tentang Aljabar Linear untuk persiapan ujian.</p>
                                    </div>
                                    <div class="card mt-4" style="background-color: aliceblue;">
                                        <div class="card-body pt-1 pb-1">
                                            <div class="d-flex align-items-center">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-text" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                                        <path d="M9 9l1 0" />
                                                        <path d="M9 13l6 0" />
                                                        <path d="M9 17l6 0" />
                                                    </svg>
                                                </div>
                                                <a href="#" class="text-decoration-none">Aljabar_Linear_Dasar.pdf</a>
                                                <a href="#" class="ms-auto btn btn-ghost-light">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                                        <path d="M7 11l5 5l5 -5" />
                                                        <path d="M12 4v12" />
                                                    </svg>
                                                    Unduh
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center">
                                    <div class="card-footer-item me-auto pt-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
                                        </svg>
                                        <div style="margin-bottom: 2px;">
                                            3 Komentar
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="avatar me-3 profile-avatar">CC</span>
                                        <div>
                                            <h4 class="mb-0">Citra Lestari</h4>
                                            <small class="text-muted">memposting materi pada tangaal</small>
                                        </div>
                                    </div>
                                    <div style="margin-top: 25px;">
                                        <h3 class="card-title">Materi Fisika Modern</h3>
                                        <p>Ringkasan materi Fisika Modern untuk sesi diskusi kelompok.</p>
                                    </div>
                                    <div class="card mt-4" style="background-color: aliceblue;">
                                        <div class="card-body pt-1 pb-1">
                                            <div class="d-flex align-items-center">
                                                <div class="me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-text" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                                        <path d="M9 9l1 0" />
                                                        <path d="M9 13l6 0" />
                                                        <path d="M9 17l6 0" />
                                                    </svg>
                                                </div>
                                                <a href="#" class="text-decoration-none">Fisika_Modern_Ringkasan.pdf</a>
                                                <a href="#" class="ms-auto btn btn-ghost-light">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                                        <path d="M7 11l5 5l5 -5" />
                                                        <path d="M12 4v12" />
                                                    </svg>
                                                    Unduh
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center">
                                    <div class="card-footer-item me-auto pt-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
                                        </svg>
                                        <div style="margin-bottom: 2px;">
                                            5 Komentar
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<script>
</script>
<?= $this->section('javascript'); ?>
<?= $this->endSection(); ?>