<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="animated">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!--Title start-->
            <div class="row">
                <div class="col text-center mt-xl-5">
                    <p class="text-xl">Selamat Datang <?php echo ucfirst($this->session->userdata('uname')); ?></p>
                    <p class="text-xl"> di Website</p>
                    <p>
                        <img src="<?= base_url('') ?>assets/img/logo-brand.png">
                    </p>
                    <p class="text-xl">Pemerintah Provinsi Jawa Tengah</p>
                </div>
            </div>
            <!--Title end-->
            <?php if ($this->session->userdata('role') < 3) { ?>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="card">
                            <a href="<?= base_url('health') ?>" class="card-body bg-red shadow-lg btn btn-block">
                                <i class="text-xl fas fa-heartbeat float-right"></i>
                                <p>Kesehatan</p>
                            </a>
                        </div>
                        <!-- small box -->
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="card">
                            <a href="<?= base_url('economy') ?>" class="card-body bg-red shadow-lg btn btn-block">
                                <i class="text-xl fas fa-dollar-sign float-right"></i>
                                <p>Ekonomi</p>
                            </a>
                        </div>
                    </div> <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <div class="card">
                            <a href="<?= base_url('socials') ?>" class="card-body bg-red shadow-lg btn btn-block">
                                <i class="text-xl fas fa-user-friends float-right"></i>
                                <p>Sosial & Keamanan</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="card">
                            <a href="<?= base_url('entertainment') ?>" class="card-body bg-red shadow-lg btn btn-block">
                                <i class="text-xl fas fa-guitar float-right"></i>
                                <p>Hiburan</p>
                            </a>
                        </div>
                    </div> <!-- ./col -->
                </div>
            <?php } ?>
            <span class="col-12"></span>
            <div class="row">
                <?php foreach ($ans as $o) {
                    if ($o['quest_type'] == 'opt') { ?>
                        <div class="col-6">
                            <!-- DONUT CHART -->
                            <div class="card">
                                <div class="card-header bg-gradient-red">
                                    <h3 class="card-title text-center"><?= $o['quest_full']; ?></h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="<?= MD5('chart-'.$o['quest_id']);?>" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                <?php }
                } ?>
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
        <?php foreach ($ans as $o) {
            if ($o['quest_type'] == 'opt') { ?>
                <script type="text/javascript">
                    //-------------
                    //- DONUT CHART -
                    //-------------
                    // Get context with jQuery - using jQuery's .get() method.
                    $(document).ready(function() {
                        var link = "<?= base_url() ?>";

                        var donutChartCanvas = document.getElementById('<?= MD5('chart-'.$o['quest_id']);?>').getContext('2d');

                        $.ajax({
                            type: "GET",
                            url: link + "coba/fetchOpt/" + "<?= $this->encrypt->encode($o['quest_id']); ?>",
                            dataType: "JSON",
                            success: function(data) {

                                var ada = data.Ada
                                var tdk = data.Tidak

                                var donutData = {
                                    labels: ['Ada', 'Tidak Ada'],
                                    datasets: [{
                                        data: [ada, tdk],
                                        backgroundColor: ['#28a745', '#dc3545'],
                                    }]
                                };
                                var donutOptions = {
                                    maintainAspectRatio: false,
                                    responsive: true,
                                };
                                //Create pie or douhnut chart
                                // You can switch between pie and douhnut using the method below.
                                var donutChart = new Chart(donutChartCanvas, {
                                    type: 'doughnut',
                                    data: donutData,
                                    options: donutOptions
                                });

                            }
                        });

                    });
                </script>

        <?php
            }
        } ?>
    </section>
    <!-- /.content -->
</div>