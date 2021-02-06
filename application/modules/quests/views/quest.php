<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="m-0 text-dark">Dashboard Management Pertanyaan</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content ml-2">
        <div class="container-fluid">
            <?php if ($this->session->flashdata('flash')) { ?>
                <div id="flash-data" data-flash="<?= $flash; ?>"> </div>
            <?php } ?>
            <div class="row">
                <span class="col-12 mt-3"></span>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-flat float-right btn-link" type="button" data-toggle="modal" data-target="#add-quest">
                                <i class="fas fa-plus-circle"></i> Tambah
                            </button>
                            <h3 class="card-title mt-3">Daftar Pertanyaan</h3>
                            <p class="card-title ml-3"></p>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Pertanyaan</th>
                                            <th>Tipe</th>
                                            <th>Kategori</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Aktivasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($quest as $q) {
                                        ?>
                                            <tr id="<?= $q['quest_id']; ?>">

                                                <td class="text-center"><?= $no ?></td>
                                                <td><?= $q['quest_full']; ?></td>
                                                <td class="text-center"><?= $q['quest_type']; ?></td>
                                                <td class="text-center"><?= $q['cat_name']; ?></td>
                                                <td class="text-center">
                                                    <?php if ($q['last_mod'] != NULL) { ?>
                                                        <i class='text-green fas fa-check'></i>
                                                    <?php } else { ?>
                                                        <i class='text-red fas fa-times'></i>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:;" data-eq_id="<?php echo $q['quest_id']; ?>" data-eq_full="<?php echo $q['quest_full']; ?>" data-eqtype="<?php echo $q['quest_type']; ?>" data-eq_cat="<?php echo $q['cat_name']; ?>" data-toggle="modal" data-target="#edit-quest">
                                                        <button data-toggle="modal" data-target="" class="btn text-green fas fa-edit"></button>
                                                    </a>
                                                    <a class="flush" href="<?= base_url() ?>quests/delete/<?= $q['quest_id'] ?>"><i class="btn btn-flat text-red fas fa-trash-alt"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($q['last_mod'] != NULL) { ?>
                                                        <a class="qnon" href="<?= base_url('') ?>quests/non/<?= $q['quest_id'] ?>">
                                                            <button class="btn btn-link">
                                                                <i class="text-red fas fa-times"></i> Nonaktifkan
                                                            </button>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a class="qact" href="<?= base_url('') ?>quests/aktif/<?= $q['quest_id'] ?>">
                                                            <button class="btn btn-link">
                                                                <i class="text-green fas fa-check"></i> Aktifkan
                                                            </button>
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        }; ?>
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
        <!-- Input Modal -->
        <div class="modal fade" id="add-quest">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form method="POST" action="<?= base_url('quests/addQuests') ?>">
                        <div class="modal-header">
                            <h4 class="modal-title">Input Data Pertanyaan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php
                            foreach ($qtype as $qt) {
                                $qt;
                            }
                            $enumList = explode(",", str_replace("'", "", substr($qt['COLUMN_TYPE'], 5, (strlen($qt['COLUMN_TYPE']) - 6))));
                            ?>
                            <div class="form-group">
                                <label for="quest_full">Pertanyaan</label>
                                <input type="text" id="quest_id" name="quest_id" class="form-control" value="q<?php echo sprintf("%04s", $lastqid) ?>" hidden>
                                <input type="text" id="quest_full" name="quest_full" class="form-control" placeholder="Masukkan Pertanyaan">
                            </div>
                            <div class="form-group">
                                <label for="quest_type">Tipe Pertanyaan</label>
                                <select class="form-control" name="quest_type" id="quest_type">
                                    <option value="">--- Pilih Tipe ---</option>
                                    <?php foreach ($enumList as $qty) {
                                    ?>
                                        <option><?= $qty; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="quest_cat">Kategori Pertanyaan</label>
                                <select class="form-control" name="quest_cat" id="quest_cat">
                                    <option value="">--- Pilih Kategori ---</option>
                                    <?php
                                    foreach ($qcat as $qc) {
                                    ?>
                                        <option value="<?= $qc['cat_id']; ?>"><?= $qc['cat_name']; ?></option>
                                    <?php }; ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-warning" id="btnSubmit" name="btnSubmit" value="Tambah">
                        </div>
                    </form>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- End of Input modal -->
        <!-- --- -->
        <!-- Edit Modal -->
        <div class="modal fade" id="edit-quest">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form method="post" action="<?= base_url('quests/edit') ?>">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Data Pertanyaan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="quest_full">Pertanyaan</label>
                                <input type="text" id="eq_id" name="eq_id" hidden>
                                <input type="text" id="eq_full" name="eq_full" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="eq_type">Tipe Pertanyaan</label>
                                <select class="form-control" name="eq_type" id="eq_type">
                                    <option value="">--- Pilih Tipe ---</option>
                                    <?php
                                    foreach ($enumList as $qty) {
                                    ?>
                                        <option><?= $qty; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="eq_cat">Kategori Pertanyaan</label>
                                <select class="form-control" name="eq_cat" id="eq_cat">
                                    <option value="">--- Pilih Kategori ---</option>
                                    <?php
                                    foreach ($qcat as $qc) {
                                    ?>
                                        <option value="<?= $qc['cat_id'] ?>"><?= $qc['cat_name']; ?></option>
                                    <?php }; ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-warning" id="btnSubmit" name="Tambah" value="Ubah">
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
        </script>
    </section>


</div>