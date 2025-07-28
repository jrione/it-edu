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

    .dropdown-toggle::after {
        vertical-align: 0.255em;
        transform: none !important;
        margin-left: 0.255em;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page-wrapper mt-5">
    <div class="container-xl">
        <div class="row row-deck row-cards">

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

            <!-- menu di kiri -->
            <!-- <div class="col-md-3">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('dashboard'); ?>">
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
            </div> -->

            <!-- content -->
            <div class="col-md-12">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <p class="fs-3 m-0">Data Artikel Saya</p>
                        <a href="<?= base_url('artikel/create'); ?>" class="btn btn-primary btn-sm">Tambah Data</a>
                    </div>
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center fw-bold">No</th>
                                    <th scope="col" class="text-center fw-bold">Author</th>
                                    <th scope="col" class="text-center fw-bold">Title</th>
                                    <th scope="col" class="text-center fw-bold">Content</th>
                                    <th scope="col" class="text-center fw-bold">Status</th>
                                    <th scope="col" class="text-center fw-bold"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($artikel as $key => $value) { ?>
                                    <tr>
                                        <td class="text-center" style="width: 50px;"><?= $no++ ?></td>
                                        <td style="width: 200px;"><?= $value['author_name'] ?></td>
                                        <td style="width: 250px;"><?= $value['title'] ?></td>
                                        <td><?= $value['content'] ?></td>
                                        <td class="text-center" style="width: 200px;">
                                            <?= $value['is_approved'] == 0 ? "Not approved" : "Approved" ?>
                                            <!-- <span class="badge bg-<?= $value['is_approved'] == 0 ? "danger" : "success" ?>">
                                            </span> -->
                                        </td>
                                        <td class="text-center" style="width: 100px;">
                                            <div class="dropdown">
                                                <button class="badge bg-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Aksi
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item" href="<?= base_url('artikel/edit/' . $value['id']); ?>">Update</a></li>
                                                    <?php if (session()->get('user_role') == 'admin') { ?>
                                                        <li>
                                                            <form style="margin-bottom: 0px;" action="<?= base_url('artikel/approve/' . $value['id']); ?>" method="post" onsubmit="return confirm('Yakin ingin <?= $value['is_approved'] == 0 ? 'meng-' : 'menolak ' ?>approve artikel?');">
                                                                <?= csrf_field() ?>
                                                                <button type="submit" class="dropdown-item" style="border: none; background: none;">
                                                                    <?= $value['is_approved'] == 0 ? "Approve" : "Tolak Approve" ?>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    <?php } ?>
                                                    <li>
                                                        <form style="margin-bottom: 0px;" action="<?= base_url('artikel/delete/' . $value['id']); ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus artikel?');">
                                                            <?= csrf_field() ?>
                                                            <button type="submit" class="dropdown-item text-danger" style="border: none; background: none;">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
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