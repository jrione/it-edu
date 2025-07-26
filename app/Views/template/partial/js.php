<!-- Libs JS -->
<script src="<?= base_url(); ?>assets/tabler-template/dist/libs/apexcharts/dist/apexcharts.min.js?1668287865" defer></script>
<script src="<?= base_url(); ?>assets/tabler-template/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1668287865" defer></script>
<script src="<?= base_url(); ?>assets/tabler-template/dist/libs/jsvectormap/dist/maps/world.js?1668287865" defer></script>
<script src="<?= base_url(); ?>assets/tabler-template/dist/libs/jsvectormap/dist/maps/world-merc.js?1668287865" defer></script>
<!-- Tabler Core -->
<script src="<?= base_url(); ?>assets/tabler-template/dist/js/tabler.min.js?1668287865" defer></script>
<script src="<?= base_url(); ?>assets/tabler-template/dist/js/demo.min.js?1668287865" defer></script>
<script src="<?= base_url(); ?>assets/js/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Sweet Alert berhasil -->
<script>
    $(function() {
        <?php if (session()->has('success_alert')) { ?>
            Swal.fire({
                text: "<?= session()->getFlashdata('success_alert') ?>",
                title: "Success !",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Oke",
                customClass: {
                    confirmButton: "btn btn-success"
                }
            })
        <?php } ?>
    });
</script>

<!-- Sweet Alert gagal -->
<script>
    $(function() {

        <?php if (session()->has('error_alert')) { ?>
            Swal.fire({
                text: "<?= session()->getFlashdata('error_alert') ?>",
                title: "Error !",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Oke",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            })
        <?php } ?>
    });
</script>