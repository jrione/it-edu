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

    .for-you-title {
        font-weight: 700;
        color: #000000ff;
        position: relative;
        display: inline-block;
    }

    .for-you-title::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 3px;
        bottom: -4px;
        left: 0;
        background-color: #000000ff;
        border-radius: 2px;
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s ease;
    }

    .for-you-title:hover::after {
        transform: scaleX(1);
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
                    <div class="text-center mb-3">
                        <h3 class="for-you-title">For You Page</h3>
                    </div>
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
                                            <a class="nav-link" href="<?= base_url("lihat_artikel/" . $value['id']) ?>">
                                                <h3 class="card-title"><?= $value['title'] ?></h3>
                                            </a>
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
                    </div>
                </div>
            </div>

            <!-- menu di kiri -->
            <div class="col-md-3">
                <div class="container">
                    <div class="text-center mb-3">
                        <h3 class="for-you-title">Anggota Kelompok</h3>
                    </div>
                    <div class="row">
                        <table border="1" cellpadding="8" cellspacing="0">
                            <tr>
                                <th>Nama</th>
                                <th>NIM</th>
                            </tr>
                            <tr>
                                <td>Ibnu Farhan Ramadhan</td>
                                <td>230401010323</td>
                            </tr>
                            <tr>
                                <td>Pajri Zahrawaani Ahmad</td>
                                <td>230401010279</td>
                            </tr>
                            <tr>
                                <td>Ragan Septayuda Lesmana</td>
                                <td>230401010224</td>
                            </tr>
                            <tr>
                                <td>Yoga Adi Putra</td>
                                <td>230401020081</td>
                            </tr>
                            <tr>
                                <td>Muhamad Lambda Gibran Ramadhan</td>
                                <td>230401010320</td>
                            </tr>
                        </table>
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