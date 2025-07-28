<?= $this->extend('\App\Views\template\base') ?>

<?= $this->section('css'); ?>
<style>
    /* Styling for sidebar active link */
    .nav-link.active {
        background-color: #e0e7ff;
        color: #436cf5;
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

    /* CSS untuk area komentar */
    .comment-section {
        margin-top: 20px;
        border-top: 1px solid #eee;
        padding-top: 20px;
    }

    .comment-box {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
    }

    .comment-author {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .comment-date {
        font-size: 0.8em;
        color: #6c757d;
        margin-left: 10px;
    }

    .comment-text {
        margin-top: 5px;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page-wrapper mt-5">
    <div class="container-xl">
        <div class="row row-deck row-cards">

            <div class="col-md-3">
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
            </div>

            <div class="col-md-6">
                <?php if (isset($article) && !empty($article)): ?>
                    <div class="card mb-3">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <span class="avatar me-3 profile-avatar"><?= substr($article['author_name'], 0, 1); ?></span>
                                <div>
                                    <h4 class="mb-0"><?= esc($article['author_name']); ?></h4>
                                    <small class="text-muted">
                                        memposting materi
                                    </small>
                                    <div class="text-muted mt-1"><?= esc($article['posted_ago']); ?></div>
                                </div>
                            </div>

                            <div style="margin-top: 25px;">
                                <h3 class="card-title"><?= esc($article['title']); ?></h3>
                                <p><?= nl2br(esc($article['content'])); ?></p>
                            </div>

                            <!-- Example .pdf file -->
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
                                        <a href="<?= base_url("file/view/test.pdf") ?>" class="text-decoration-none" target="_blank">test.pdf</a>
                                        <a href="<?= base_url("file/download/test.pdf") ?>" class="ms-auto btn btn-ghost-light">
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

                            <!-- Example image file -->
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
                                        <a href="<?= base_url("file/view/test.png") ?>" class="text-decoration-none" target="_blank">test.png</a>
                                        <a href="<?= base_url("file/download/test.png") ?>" class="ms-auto btn btn-ghost-light">
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

                            <!-- Example video file -->
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
                                        <a href="<?= base_url("file/view/test.mp4") ?>" class="text-decoration-none" target="_blank">test.mp4</a>
                                        <a href="<?= base_url("file/download/test.mp4") ?>" class="ms-auto btn btn-ghost-light">
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

                            <?php if (!empty($article['file_name'])): ?>
                                <!-- <div class="card mt-4" style="background-color: aliceblue;">
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
                                            <a href="<?= base_url('uploads/' . $article['file_name']); ?>" class="text-decoration-none" target="_blank"><?= esc($article['file_name']); ?></a>
                                            <a href="<?= base_url('uploads/' . $article['file_name']); ?>" class="ms-auto btn btn-ghost-light" download>
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
                                </div> -->
                            <?php endif; ?>

                            <div class="comment-section">
                                <h5>Komentar (<?= count($article['comments']); ?>)</h5>
                                <?php if (!empty($article['comments'])): ?>
                                    <?php foreach ($article['comments'] as $comment): ?>
                                        <div class="comment-box">
                                            <div class="d-flex align-items-center mb-2">
                                                <span class="avatar avatar-sm me-2 profile-avatar"><?= substr($comment['comment_author'], 0, 1); ?></span>
                                                <div>
                                                    <div class="comment-author"><?= esc($comment['comment_author']); ?></div>
                                                    <div class="comment-date"><?= esc($comment['comment_posted_ago']); ?></div>
                                                </div>
                                            </div>
                                            <p class="comment-text"><?= nl2br(esc($comment['comment_text'])); ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="text-muted">Belum ada komentar.</p>
                                <?php endif; ?>

                                <form action="<?= base_url('lihat_artikel/addComment/' . $article['id']); ?>" method="post" class="mt-4">
                                    <?= csrf_field() ?>
                                    <div class="mb-3">
                                        <label for="comment_text" class="form-label">Tambahkan Komentar</label>
                                        <textarea name="comment_text" id="comment_text" class="form-control" rows="3" placeholder="Tulis komentar Anda di sini..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                                </form>
                            </div>

                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <div class="card-footer-item me-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
                                </svg>
                                <?= esc(count($article['comments'])); ?> Komentar
                            </div>
                            <div class="card-footer-item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-share" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M6 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                    <path d="M18 16m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                    <path d="M18 8m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                    <path d="M8.7 10.7l6.6 -3.4" />
                                    <path d="M8.7 13.3l6.6 3.4" />
                                </svg>
                                Bagikan
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning text-center" role="alert">
                        Artikel tidak ditemukan.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<?= $this->endSection(); ?>