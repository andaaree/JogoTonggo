<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="m-0 text-dark">Dashboard Management User</h1>
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
                            <button class="btn btn-flat float-right btn-link" type="button" id="btnpost">
                                <i class="fas fa-plus-circle"></i> Tambah
                            </button>
                            <h3 class="card-title mt-3">Daftar User</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="olduser" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Parent User</th>
                                        <th>Username</th>
                                        <th>Hak Akses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($userlist as $u) {
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td id="uname-<?= $no; ?>"><?= $u['name']; ?></td>
                                            <td id="<?= MD5('parwil-' . $no); ?>"><?= $u['parent_id']; ?></td>
                                            <td id="<?= MD5('reg-' . $no); ?>"><?= $u['kode_wilayah']; ?></td>
                                            <?php if ($u['level'] < 2) {  ?>
                                                <td><?= 'admin'; ?></td>
                                            <?php } elseif ($u['level'] == 2) { ?>
                                                <td><?= 'kabupaten'; ?></td>
                                            <?php } elseif ($u['level'] == 3) { ?>
                                                <td><?= 'kecamatan'; ?></td>
                                            <?php } elseif ($u['level'] == 4) { ?>
                                                <td><?= 'kelurahan'; ?></td>
                                            <?php } else { ?>
                                                <td><?= 'rw'; ?></td>
                                            <?php } ?>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <script type="text/javascript">
            var link = "<?= base_url('') ?>";
            $(function() {
                $('#olduser').DataTable({
                    "paging": false,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": false,
                    "autoWidth": false,
                });
            });
            <?php if ($flash) { ?>
                $(document).ready(function() {
                    Swal.fire({
                        type: 'success',
                        title: 'Berhasil',
                        text: '<?= $flash; ?>',
                        showConfirmButton: false,
                        timer: 1500
                    });
                });
            <?php }; ?>
            <?php if ($catch) { ?>
                $(document).ready(function() {
                    Swal.fire({
                        type: 'error',
                        title: 'Gagal',
                        text: '<?= $catch; ?>',
                        showConfirmButton: false,
                        timer: 2000
                    });
                });
            <?php }; ?>
            $(document).ready(function() {
                Swal.fire({
                    type: 'warning',
                    title: 'Post Data?',
                    text: 'Data akan di upload',
                    showCancelButton: true,
                    showConfirmButton: true,
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#FFC107',
                    confirmButtonText: 'Hapus'
                }).then((result) => {
                    if (result.value) {
                        <?php
                        $no = 1;
                        foreach ($userlist as $u) { ?>
                            var uname = $('#uname-<?= $no; ?>').html();
                            var parent = $("#<?= MD5('parwil-' . $no); ?>").html();
                            var reg = $("#<?= MD5('reg-' . $no); ?>").html();
                            var rol = "<?= $u['level']; ?>"
                            $.ajax({
                                type: "POST",
                                url: link + "users/saveWil?uname=" + uname + "&parent=" + parent + "&reg=" + reg + "&rol=" + rol,
                                success: function(res) {
                                    <?php if ($no === array_key_last($userlist)) { ?>
                                        Swal.fire({
                                            type: 'success',
                                            title: 'Berhasil',
                                            text: res + ' Data terisi',
                                            showCloseButton: true,
                                            closeButtonColor: '#D19A66',
                                            showConfirmButton: false
                                        });
                                    <?php } ?>
                                },
                                error: function(res) {
                                    <?php if ($no === array_key_last($userlist)) { ?>
                                        Swal.fire({
                                            type: 'error',
                                            title: 'Gagal',
                                            text: res + ' Data gagal terisi',
                                            showCloseButton: true,
                                            closeButtonColor: '#D19A66',
                                            showConfirmButton: false
                                        });
                                    <?php } ?>
                                }
                            });
                        <?php
                            $no++;
                        } ?>
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Batal',
                            text: 'Upload data dibatalkan',
                            showConfirmButton: false,
                            timer: 1000
                        })
                    }
                });
            });
        </script>
    </section>
    <!-- /.content -->

</div>