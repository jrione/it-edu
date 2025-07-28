<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<title>IT Edu</title>
<!-- CSS files -->
<link href="<?= base_url(); ?>assets/tabler-template/dist/css/tabler.min.css?1668287865" rel="stylesheet" />
<link href="<?= base_url(); ?>assets/tabler-template/dist/css/tabler-flags.min.css?1668287865" rel="stylesheet" />
<link href="<?= base_url(); ?>assets/tabler-template/dist/css/tabler-payments.min.css?1668287865" rel="stylesheet" />
<link href="<?= base_url(); ?>assets/tabler-template/dist/css/tabler-vendors.min.css?1668287865" rel="stylesheet" />
<link href="<?= base_url(); ?>assets/tabler-template/dist/css/demo.min.css?1668287865" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/img/logo/it-edu-logo-mini.png">
<style>
    @import url('https://rsms.me/inter/inter.css');

    :root {
        --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }
</style>
<style>
    /*     Alert    */
    .alert {
        border: 0px;
        position: relative;
        padding: .95rem 1.25rem;
        border-radius: 1px;
        color: inherit;
        background-color: #ffffff;
        -webkit-box-shadow: 1px 1px 14px 0px rgba(18, 38, 63, 0.26);
        -moz-box-shadow: 1px 1px 14px 0px rgba(18, 38, 63, 0.26);
        box-shadow: 1px 1px 14px 0px rgba(18, 38, 63, 0.26);
    }

    .alert [data-notify="icon"] {
        display: block;
    }

    .alert [data-notify="icon"]::before {
        line-height: 35px;
        font-size: 22px;
        display: block;
        left: 15px;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 35px;
        height: 35px;
        border-radius: 30px;
        text-align: center;
        color: #fff;
    }

    .alert [data-notify="title"] {
        display: block;
        color: #2b2b2b;
        font-weight: 700;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .alert [data-notify="message"] {
        font-size: 13px;
        color: #908e8e;
    }

    .alert .close {
        background: rgba(255, 255, 255, 0.8);
        width: 25px;
        height: 25px;
        line-height: 25px;
        top: 12px !important;
        border-radius: 50%;
    }

    /*    Alert States    */
    .alert-black {
        border-left: 4px solid #1a2035;
    }

    .alert-black [data-notify="icon"]:before {
        background: #1a2035;
    }

    .alert-primary {
        border-left: 4px solid #1572E8;
    }

    .alert-primary [data-notify="icon"]:before {
        background: #1572E8;
    }

    .alert-secondary {
        border-left: 4px solid #6861CE;
    }

    .alert-secondary [data-notify="icon"]:before {
        background: #6861CE;
    }

    .alert-info {
        border-left: 4px solid #48ABF7;
    }

    .alert-info [data-notify="icon"]:before {
        background: #48ABF7;
    }

    .alert-success {
        border-left: 4px solid #31CE36;
    }

    .alert-success [data-notify="icon"]:before {
        background: #31CE36;
    }

    .alert-warning {
        border-left: 4px solid #FFAD46;
    }

    .alert-warning [data-notify="icon"]:before {
        background: #FFAD46;
    }

    .alert-danger {
        border-left: 4px solid #F25961;
    }

    .alert-danger [data-notify="icon"]:before {
        background: #F25961;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">