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
                            <button class="btn btn-flat float-right btn-link" type="button" data-toggle="modal" data-target="#add-users">
                                <i class="fas fa-plus-circle"></i> Tambah
                            </button>
                            <h3 class="card-title mt-3">Daftar User</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="usertable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Hak Akses</th>
                                            <th>Nomor Handphone</th>
                                            <?php if ($this->session->userdata('role') == 4) {
                                            } else { ?>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                                <th>Aktivasi</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($userlist as $u) { ?>
                                            <tr id="<?= $u['users_id']; ?>">
                                                <td><?= $no; ?></td>
                                                <td><?= $u['user_nama']; ?></td>
                                                <td><?= $u['username']; ?></td>
                                                <td><?php if ($u['role'] < 2) {  ?>
                                                        <?= 'Admin'; ?>
                                                    <?php } elseif ($u['role'] == 2) { ?>
                                                        <?= 'Kabupaten'; ?>
                                                    <?php } elseif ($u['role'] == 3) { ?>
                                                        <?= 'Kecamatan'; ?>
                                                    <?php } elseif ($u['role'] == 4) { ?>
                                                        <?= 'Kelurahan'; ?>
                                                    <?php } else { ?>
                                                        <?= 'RW'; ?>
                                                    <?php } ?>
                                                </td>
                                                <td><?= $u['phone'] ?></td>
                                                <?php if ($this->session->userdata('role') == 4) { ?>

                                                <?php } else { ?>
                                                    <td class="text-center">
                                                        <?php if ($u['last_mod'] != NULL) { ?>
                                                            <i class='text-green fas fa-check'></i>
                                                        <?php } else {
                                                            echo "<i class='text-red fas fa-times'></i>";
                                                        } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="javascript:;" data-eu_id="<?php echo $u['users_id']; ?>" data-eu_uname="<?= $u['user_nama']; ?>" data-eu_name="<?php echo $u['username']; ?>" data-eu_pass="<?= $u['password']; ?>" data-eu_role="<?php echo $u['role']; ?>" data-eu_phone="<?= $u['phone']; ?>" data-toggle="modal" data-target="#edit-users">
                                                            <button class="btn btn-flat text-green fas fa-edit" data-toggle="" data-target="#eu-users"></button>
                                                        </a>
                                                        <a class="delUser" href="<?= base_url() ?>users/delU/<?= $u['users_id'] ?>" <?php if (
                                                                                                                                        $this->session->userdata('id') == $u['users_id']
                                                                                                                                    ) {
                                                                                                                                        echo "hidden";
                                                                                                                                    } else {
                                                                                                                                        echo "";
                                                                                                                                    } ?>>
                                                            <i class="btn btn-flat text-red fas fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php if ($u['last_mod'] != NULL) { ?>
                                                            <a class="unon" href="<?= base_url('') ?>users/non/<?= $u['users_id'] ?>">
                                                                <button class="btn btn-link">
                                                                    <i class="text-red fas fa-times"></i> Nonaktifkan
                                                                </button>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a class="uact" href="<?= base_url('') ?>users/aktif/<?= $u['users_id'] ?>">
                                                                <button class="btn btn-link">
                                                                    <i class="text-green fas fa-check"></i> Aktifkan
                                                                </button>
                                                            </a>
                                                        <?php } ?>

                                                    </td>
                                                <?php } ?>

                                            </tr>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>

        <div class="modal fade" id="add-users">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form method="POST" action="<?= base_url('users/regis') ?>">
                        <div class="modal-header">
                            <h4 class="modal-title">Input Data User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="frole">Hak Akses</label>
                                <select class="form-control" name="frole" id="frole">
                                    <?php $dsc = null;
                                    for ($i = 0; $i < 6; $i++) {
                                        if ($this->session->userdata('role') == 4) {
                                            if ($i = 5) {
                                                $dsc = "RW";
                                                echo "<option value='" . $i . "'>" . $dsc . "</option>";
                                            };
                                        } else {
                                            if ($i = 1) {
                                                $dsc = "Provinsi";
                                                echo "<option value='" . $i . "'>" . $dsc . "</option>";
                                            };
                                            if ($i = 2) {
                                                $dsc = "Kabupaten";
                                                echo "<option value='" . $i . "'>" . $dsc . "</option>";
                                            };
                                            if ($i = 3) {
                                                $dsc = "Kecamatan";
                                                echo "<option value='" . $i . "'>" . $dsc . "</option>";
                                            };
                                            if ($i = 4) {
                                                $dsc = "Kelurahan";
                                                echo "<option value='" . $i . "'>" . $dsc . "</option>";
                                            };
                                            if ($i = 5) {
                                                $dsc = "RW";
                                                echo "<option value='" . $i . "'>" . $dsc . "</option>";
                                            };
                                        }
                                    } ?>
                                </select>
                            </div>
                            <?php if ($this->session->userdata('role') == 4) {
                            } else { ?>
                                <div class="form-group">
                                    <label for="kab">Kabupaten</label>
                                    <select class="form-control" name="kab" id="kab">
                                        <option value="">--- Pilih Kabupaten ---</option>
                                        <?php foreach ($kab as $kb) { ?>
                                            <option value="<?= $kb['kab_id']; ?>"><?= $kb['kab_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label id="lbkec" for="kec">Kecamatan</label>
                                    <select class="form-control" name="kec" id="kec">
                                        <option value="">--- Pilih Kecamatan ---</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label id="lbkel" for="kel">Kelurahan</label>
                                    <select class="form-control" name="kel" id="kel">
                                        <option value="">--- Pilih Kelurahan ---</option>
                                    </select>
                                </div>
                            <?php } ?>

                            <div class="form-group">
                                <label id="lbrw" for="rw">RW</label>
                                <input type="number" min="0" id="rw" name="rw" class="form-control" placeholder="Masukkan RW" value="">
                            </div>
                            <div class="form-group">
                                <label for="user_nama">Nama</label>
                                <input type="text" id="user_nama" name="user_nama" class="form-control" placeholder="Masukkan Nama">
                            </div>
                            <div class="form-group">
                                <label for="users_name">Username</label>
                                <input type="text" id="users_name" name="users_name" class="form-control" placeholder="Masukkan Username" value="">
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" id="pass" name="pass" class="form-control" placeholder="Masukkan Password">
                            </div>
                            <div class="form-group">
                                <label for="phone">Nomor Handphone</label>
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Masukkan Nomor">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-warning" name="Simpan" value="Simpan">
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- Edit Modal -->
        <div class="modal fade" id="edit-users">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form method="POST" action="<?= base_url('users/edit') ?>">
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
                                <label for="eu_name">Username</label>
                                <input type="text" id="eu_name" name="eu_name" class="form-control" placeholder="Masukkan Username">
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" id="eu_pass" name="eu_pass" class="form-control" placeholder="Masukkan Password">
                            </div>
                            <div class="form-group">
                                <label for="eu_role">Hak Akses</label>
                                <select class="form-control" name="eu_role" id="eu_role">
                                    <?php $dsc = null;
                                    for ($i = 0; $i < 6; $i++) {
                                        if ($i == 1) {
                                            $dsc = "Provinsi";
                                            echo "<option value='" . $i . "'>" . $dsc . "</option>";
                                        };
                                        if ($i == 2) {
                                            $dsc = "Kabupaten";
                                            echo "<option value='" . $i . "'>" . $dsc . "</option>";
                                        };
                                        if ($i == 3) {
                                            $dsc = "Kecamatan";
                                            echo "<option value='" . $i . "'>" . $dsc . "</option>";
                                        };
                                        if ($i == 4) {
                                            $dsc = "Kelurahan";
                                            echo "<option value='" . $i . "'>" . $dsc . "</option>";
                                        };
                                        if ($i == 5) {
                                            $dsc = "RW";
                                            echo "<option value='" . $i . "'>" . $dsc . "</option>";
                                        };
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="eukab">Kabupaten</label>
                                <select class="form-control" name="eukab" id="eukab">
                                    <option value="">--- Pilih Kabupaten ---</option>
                                    <?php foreach ($kab as $kb) { ?>
                                        <option value="<?= $kb['kab_id']; ?>"><?= $kb['kab_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label id="lbeukec" for="eukec">Kecamatan</label>
                                <select class="form-control" name="eukec" id="eukec">
                                    <option value="">--- Pilih Kecamatan ---</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label id="lbeukel" for="eukel">Kelurahan</label>
                                <select class="form-control" name="eukel" id="eukel">
                                    <option value="">--- Pilih Kelurahan ---</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label id="lbeurw" for="eurw">RW</label>
                                <input type="number" min="0" id="eurw" name="eurw" class="form-control" placeholder="Masukkan RW">
                            </div>
                            <div class="form-group">
                                <label for="eu_phone">Nomor Handphone</label>
                                <input type="tel" id="eu_phone" name="eu_phone" class="form-control" placeholder="Masukkan Nomor">
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
            $(document).ready(function() {
                var link = "http://localhost/tugas/kki1/uas/";
                $('#kec').change(function() {
                    $('#kel').show();
                    $('#lbkel').show();
                    var kec_id = $('#kec').val();
                    $.ajax({
                        type: "POST",
                        url: link + "users/fetch_kel/" + kec_id,
                        data: {
                            kec_id: kec_id
                        },
                        success: function(data) {
                            $('#kel').html(data);
                        }
                    });
                });
                <?php if ($this->session->userdata('role') == 4) { ?>
                    $('#rw').show();
                    $('#lbrw').show();
                <?php } else { ?>
                    $('#rw').hide();
                    $('#lbrw').hide();
                    $('#kel').change(function() {
                        $('#rw').show();
                        $('#lbrw').show();
                    });

                <?php } ?>
                $('#rw').on("input", function(e) {
                    e.preventDefault();
                    <?php if ($this->session->userdata('role') == 4) { ?>
                        var tkel = <?= $this->session->userdata('username'); ?>;
                    <?php } else { ?>
                        var tkel = $('#kel').val();
                    <?php } ?>
                    $('#users_name').val(tkel + $(this).val());
                });
            });
        </script>
    </section>
    <!-- /.content -->

</div>