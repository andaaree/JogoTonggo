<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="m-0 text-dark">Dashboard Profil User</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content ml-2">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <?php foreach ($bio as $b) { ?>
                    <p class="col-sm-6 mt-3 text-xl">Selamat Datang, &emsp;<b><?= $b['user_nama'] ?></b></p>
                    <span class="col-sm-12"></span>
                    <div class="col-sm-6">
                        <p class="text-xl"></p>
                        <p class="text-lg"><b>Username</b> : <?= $b['username'] ?></p>
                        <p class="text-lg"><b>Hak Akses</b> : <?php if ($b['role'] < 2) {  ?>
                                <?= 'Admin'; ?>
                            <?php } elseif ($b['role'] == 2) { ?>
                                <?= 'Kabupaten'; ?>
                            <?php } elseif ($b['role'] == 3) { ?>
                                <?= 'Kecamatan'; ?>
                            <?php } elseif ($b['role'] == 4) { ?>
                                <?= 'Kelurahan'; ?>
                            <?php } else { ?>
                                <?= 'RW'; ?>
                            <?php } ?></p>
                        <p class="text-lg"><b>Nomor HP</b> : <?= $b['phone'] ?></p>
                        <a href="javascript:;" data-eu_id="<?= $b['users_id']; ?>" data-eu_uname="<?= $b['user_nama']; ?>" data-eu_phone="<?= $b['phone']; ?>" data-toggle="modal" data-target="#edit-user">
                            <button class="btn btn-green">Ubah Profil</button>
                        </a>
                        <!-- <a href="javascript:;" data-toggle="modal" data-target="#edit-pass">
                            <button class="btn btn-green">Ubah Password</button>
                        </a> -->
                    <?php } ?>
                    </div>
            </div>
        </div>
        <!-- Container Fluid -->
        <!-- Edit Modal -->
        <div class="modal fade" id="edit-user">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form method="POST" action="<?= base_url('users/saveprofile') ?>">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Data User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="eu_uname">Nama</label>
                                <input type="text" id="eu_id" name="eu_id" class="form-control" hidden>
                                <input type="text" id="eu_uname" name="eu_uname" class="form-control" placeholder="Masukkan Nama">
                            </div>
                            <div class="form-group">
                                <label for="eu_phone">Nomor Handphone</label>
                                <input type="tel" id="eu_phone" name="eu_phone" class="form-control" placeholder="Masukkan Nomor">
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" id="eu_pass" name="eu_pass" class="form-control" placeholder="Masukkan Password sebagai keamanan">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-warning" name="Tambah" value="Tambah">
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- Edit Modal -->
        <div class="modal fade" id="edit-pass">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form method="POST" action="<?= base_url('users/changePass') ?>">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Password</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" id="eu_id" name="eu_id" class="form-control" hidden disabled>
                                <label for="eu_passw">Old Password</label>
                                <input type="password" id="eu_passw" name="eu_passw" class="form-control" placeholder="Masukkan Password">
                            </div>
                            <div class="form-group">
                                <label for="pass">New Password</label>
                                <input type="password" id="eu_pass" name="eu_pass" class="form-control" placeholder="Masukkan Password">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-warning" name="Update" value="Update">
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
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
            $(function() {
                $('#usertable').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": false,
                    "autoWidth": false
                });
            })
        </script>
    </section>
    <!-- /.content -->

</div>