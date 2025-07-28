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

<!--  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

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