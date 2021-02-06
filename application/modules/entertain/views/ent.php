<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="m-0 text-dark">Dashboard Hiburan Provinsi</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="container-fluid ">
            <div class="row ml-2 mr-2">
                <b class="col-12">Jumlah Responden</b>
                <span class="col-12 mt-3"></span>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body bg-gradient-warning text-center text-lg">
                            <p>Kabupaten</p>
                            <p><?= $totKab; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body bg-gradient-warning text-center text-lg">
                            <p>Kecamatan</p>
                            <p><?= $totKec; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body bg-gradient-warning text-center text-lg">
                            <p>Kelurahan</p>
                            <p><?= $totKel; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body bg-gradient-warning text-center text-lg">
                            <p>RW</p>
                            <p><?= $totRw; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content  connectedSortable ui-sortable">
        <div class="row">
            <div class="col-12">
                <b>Chart Kesehatan</b>
            </div>
            <span class="col-12 mt-3"></span>
            <?php foreach ($out as $o) {
                if ($o['quest_type'] == 'opt') {
            ?>
                    <div class="col-sm-6">
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
                                    <canvas id="<?= MD5('chart-' . $o['quest_id']); ?>" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
            <?php }
            } ?>
            <span class="col-12 mt-3"></span>
            <?php foreach ($out as $o) {
                if ($o['quest_type'] == 'percent') { ?>
                    <div class="col-sm-6">
                        <!-- DONUT CHART -->
                        <div class="card">
                            <div class="card-header bg-gradient-warning">
                                <h3 class="card-title text-center"><?= $o['quest_full']; ?></h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="<?= MD5('chart-' . $o['quest_id']); ?>" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
            <?php }
            } ?>
            <?php foreach ($out as $o) {
                if ($o['quest_type'] == 'essay') { ?>
                    <!-- BAR CHART -->
                    <div class="col-sm-6">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title"><?= $o['quest_full'] ?></h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="<?= MD5('chart-' . $o['quest_id']); ?>" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

            <?php }
            } ?>
            <span class="col-12 mt-3"></span>
            <?php foreach ($out as $o) {
                if ($o['quest_type'] == 'total') { ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body bg-gradient-yellow text-center text-lg">
                                <p><?= $o['quest_full']; ?></p>
                                <p class="<?= MD5('tot-' . $o['quest_id']) ?>">0</p>
                            </div>
                        </div>
                    </div>
            <?php    }
            } ?>
        </div>
    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
    var link = "<?= base_url() ?>";

    function format_numeric(e) {
        return e.toString().replace(/"([^"]+(?="))"/g, '$1');
    }

    function removemark(e) {
        return e.replace(/"([^"]+(?="))"/g, '')
    }
    <?php foreach ($out as $o) {
        if ($o['quest_type'] == 'opt') { ?>
            //-------------
            //- DONUT CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            $(document).ready(function() {
                var donutChartCanvas = document.getElementById('<?= MD5('chart-' . $o['quest_id']); ?>').getContext('2d');
                var pl = [];
                var tot = [];
                $.ajax({
                    type: "GET",
                    url: link + "economy/AllLabel/" + "<?= $this->encrypt->encode($o['quest_id']); ?>",
                    dataType: "JSON",
                    success: function(data) {
                        data.forEach(element => {
                            pl.push(element.res)
                        });
                        pl.forEach(element => {
                            $.ajax({
                                type: "GET",
                                dataType: "JSON",
                                url: link + "economy/AllData?label=" + element + "&id=" + "<?= $this->encrypt->encode($o['quest_id']); ?>",
                                success: function(rs) {
                                    rs = rs.toString();
                                    tot.push(format_numeric(rs))
                                }
                            });
                        });
                        $.getJSON("economy/AllData").done(function() {
                            var donutData = {
                                labels: pl,
                                datasets: [{
                                    data: tot,
                                    backgroundColor: ['#28a745', '#dc3545']
                                }]
                            };
                            var donutOptions = {
                                legend: {
                                    paddingTop: '20',
                                    position: 'bottom'
                                },
                                maintainAspectRatio: false,
                                responsive: true
                            };
                            //Create pie or douhnut chart
                            // You can switch between pie and douhnut using the method below.
                            var donutChart = new Chart(donutChartCanvas, {
                                type: 'doughnut',
                                data: donutData,
                                options: donutOptions
                            });
                        });
                    }
                });
            });
        <?php } elseif ($o['quest_type'] == 'total') { ?>

            $.ajax({
                type: "GET",
                url: link + "economy/fetchTot/<?= $o['quest_id']; ?>",
                success: function(data) {
                    $('.tot-<?= $o['quest_id']; ?>').html(data);
                }
            });
        <?php } elseif ($o['quest_type'] == 'percent') { ?>
            $(document).ready(function() {
                var donutChartCanvas = document.getElementById('<?= MD5('chart-' . $o['quest_id']); ?>').getContext('2d');
                var pl = [];
                var tot = [];
                var plc = pl;
                $.ajax({
                    type: "GET",
                    url: link + "economy/AllLabel/" + "<?= $this->encrypt->encode($o['quest_id']); ?>",
                    dataType: "JSON",
                    success: function(data) {
                        data.forEach(element => {
                            pl.push(element.res)
                        });
                        plc.forEach(element => {
                            $.ajax({
                                type: "GET",
                                dataType: "JSON",
                                url: link + "economy/AllData?label=" + element + "&id=" + "<?= $this->encrypt->encode($o['quest_id']); ?>",
                                success: function(rs) {
                                    rs = rs.toString();
                                    tot.push(format_numeric(rs))
                                }
                            });
                        });
                        $.getJSON("economy/AllData").done(function() {
                            var donutData = {
                                labels: pl,
                                datasets: [{
                                    label: pl,
                                    data: tot,
                                    backgroundColor: ['#dc3545', '#f56954', '#f39c12', '#28a745']
                                }]
                            };
                            var donutOptions = {
                                legend: {
                                    paddingTop: '20',
                                    position: 'bottom'
                                },
                                maintainAspectRatio: false,
                                responsive: true
                            };
                            //Create pie or douhnut chart
                            // You can switch between pie and douhnut using the method below.
                            var donutChart = new Chart(donutChartCanvas, {
                                type: 'doughnut',
                                data: donutData,
                                options: donutOptions
                            });
                        });
                    }
                });

            });
        <?php } elseif ($o['quest_type'] == 'essay') { ?>
            //-------------
            //- BAR CHART -
            //-------------
            $(document).ready(function() {
                var barChartCanvas = document.getElementById('<?= MD5('chart-' . $o['quest_id']); ?>').getContext('2d')
                $.ajax({
                    type: "GET",
                    url: link + "economy/AllLabel/" + "<?= $this->encrypt->encode($o['quest_id']); ?>",
                    dataType: "JSON",
                    success: function(result) {
                        var wdh = [];
                        var tot = [];
                        result.forEach(element => {
                            wdh.push(element.res)
                        });
                        var lbs = wdh;
                        lbs.forEach(element => {
                            $.ajax({
                                type: "GET",
                                dataType: "JSON",
                                url: link + "economy/AllData?label=" + element + "&id=" + "<?= $this->encrypt->encode($o['quest_id']); ?>",
                                success: function(rs) {
                                    rs = rs.toString();
                                    tot.push(format_numeric(rs))
                                }
                            });
                        });
                        $.getJSON("economy/AllData").done(function() {
                            var lbl = wdh;
                            // JENIS KOMODITAS PANGAN
                            var barChartData = {
                                labels: lbl,
                                datasets: [{
                                    data: tot,
                                    backgroundColor: "#4caf50",
                                    hoverBackgroundColor: "#388e3c"
                                }]
                            };
                            var barChartOptions = {
                                responsive: true,
                                maintainAspectRatio: false,
                                legend: {
                                    display: false
                                },
                                scales: {
                                    xAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            };

                            var horizontalChart = new Chart(barChartCanvas, {
                                type: "horizontalBar",
                                options: barChartOptions,
                                data: barChartData
                            });
                        })

                    }
                });
            });
    <?php }
    } ?>
</script>