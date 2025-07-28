<html lang="en">

<head>
    <?= $this->include('\App\Views\template\partial\header') ?>
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
    </style>
    <?= $this->renderSection('css'); ?>
</head>

<body>
    <script src="<?= base_url(); ?>assets/tabler-template/dist/js/demo-theme.min.js?1668287865"></script>
    <div class="page">
        <div class="page-wrapper">

            <?= $this->renderSection('content'); ?>

            <?= $this->include('\App\Views\template\partial\footer') ?>
        </div>
    </div>

    <?= $this->include('\App\Views\template\partial\js') ?>
    <?= $this->renderSection('javascript'); ?>
</body>

</html>