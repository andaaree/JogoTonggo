<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="animated">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!--Title end-->
                <div class="row mt-2">
                    <div class="col-12">
                        <h2 class="text-center">Silahkan Pilih RW</h2>
                    </div>
                    <?php foreach ($rw as $r) {?>
                    <div class="col-lg-3 col-6">
                        <div class="card">
                            <h3 class="text-center">Kel. <?= $r['kel_name'];?></h3>
                            <a href="<?= base_url('answers/rw/'),$r['rw_id']?>" class="card-body bg-red shadow-lg btn btn-block">
                                <i class="text-xl fas fa-home float-right"></i>
                                <p><?= $r['rw_name']?></p>
                            </a>
                        </div>
                        <!-- small box -->
                    </div>
                    <?php }?>
                </div>
        </div>
        <!-- /.modal -->
        <script type="text/javascript">
            <?php if ($flash) { ?>
                $(document).ready(function() {
                    Swal.fire({
                        type: 'success',
                        title: 'Berhasil',
                        text: '<?= $flash; ?>',
                        showConfirmButton: false,
                        timer: 1000
                    });
                });
            <?php }; ?>
        </script>
        <script type="text/javascript">
            <?php if ($catch) { ?>
                $(document).ready(function() {
                    Swal.fire({
                        type: 'error',
                        title: 'Gagal',
                        text: '<?= $catch; ?>',
                        showConfirmButton: false,
                        timer: 1000
                    });
                });
            <?php }; ?>
        </script>
    </section>
    <!-- /.content -->
</div>