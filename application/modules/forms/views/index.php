<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="animated">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!--Title end-->
                <div class="row mt-2">
                    <div class="col-12">
                        <h2 class="text-center">Silahkan Pilih Kategori Pertanyaan</h2>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="card">
                            <a href="<?= base_url('forms/health') ?>" class="card-body bg-red shadow-lg btn btn-block">
                                <i class="text-xl fas fa-heartbeat float-right"></i>
                                <p>Kesehatan</p>
                            </a>
                        </div>
                        <!-- small box -->
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="card">
                            <a href="<?= base_url('forms/economy') ?>" class="card-body bg-red shadow-lg btn btn-block">
                                <i class="text-xl fas fa-dollar-sign float-right"></i>
                                <p>Ekonomi</p>
                            </a>
                        </div>
                    </div> <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <div class="card">
                            <a href="<?= base_url('forms/socials') ?>" class="card-body bg-red shadow-lg btn btn-block">
                                <i class="text-xl fas fa-user-friends float-right"></i>
                                <p>Sosial & Keamanan</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="card">
                            <a href="<?= base_url('forms/entertain') ?>" class="card-body bg-red shadow-lg btn btn-block">
                                <i class="text-xl fas fa-guitar float-right"></i>
                                <p>Hiburan</p>
                            </a>
                        </div>
                    </div> <!-- ./col -->
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