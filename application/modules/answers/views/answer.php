<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="m-0 text-dark">Dashboard Verifikasi</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content ml-2">
        <div class="container-fluid">
            <div class="row">
                <span class="col-12 mt-3"></span>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-3">Daftar Jawaban RW</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Pertanyaan</th>
                                        <th>Kategori</th>
                                        <th>Jawaban</th>
                                        <th>Asal RW</th>
                                        <th>Status</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($quest as $q) {

                                    ?>
                                        <tr id="<?= $q['answer_id']; ?>">
                                            <td><?= $no; ?></td>
                                            <td><?= $q['quest_full']; ?></td>
                                            <td><?= $q['cat_name']; ?></td>
                                            <td><?= $q['rw_answer'] ?></td>
                                            <td><?= $q['rw_name'] . ', Kel. ' . $q['kel_name']?></td>
                                            <td class="text-center">
                                                <?php if ($q['stat'] == TRUE) {
                                                    echo "<i class='text-green fas fa-check'></i>";
                                                } else {
                                                    echo "<i class='text-red fas fa-times'></i>";
                                                }?>
                                            </td>
                                            <td class="text-center">
                                                <a class="delAns" href="<?= base_url() ?>answers/delAns/<?= $q['answer_id'] ?>">
                                                    <i class="btn btn-flat text-red fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <br>
                            <button class="btn btn-flat float-right btn-link" id="btnVerif">
                                <i class="fas fa-check"></i> Verifikasi
                            </button>
                            <h5>*) Hanya Hapus Jawaban Duplikasi</h5>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
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