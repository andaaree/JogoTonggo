<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="m-0 text-dark">&nbsp;</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content ml-2">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <span class="col-12 mt-3"></span>
                <div class="col-sm-12 col-lg-6">
                    <div class="card">
                        <div class="card-header mt-3">
                            <h3 class="card-title">
                                <a class="text-warning fas fa-arrow-left mr-3" href="<?= base_url('forms') ?>"></a>
                                Daftar Pertanyaan Hiburan
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="<?= base_url('') ?>forms/saveEnt">
                                <?php
                                $no = 1;
                                foreach ($ans as $o) { ?>
                                    <div class="form-group">
                                        <input type="text" value="<?= $o['quest_id']; ?>" name="qid<?= $no; ?>" id="qid<?= $no; ?>" hidden>
                                        <h3><?= $no . '. ' . $o['quest_full']; ?></h3>
                                    </div>
                                    <?php if ($o['quest_type'] == 'opt') { ?>
                                        <div class="form-group">
                                            <?php if (strpos($o['quest_full'], 'enis') != false) { ?>
                                                <div class="icheck-red d-inline">
                                                    <input value="Tradisional" type="radio" id="ans<?= $no; ?>a" name="ans<?= $no ?>" class="form-control">
                                                    <label for="ans<?= $no; ?>a">Tradisional</label>
                                                </div>
                                                <div class="icheck-red d-inline ml-5 ">
                                                    <input value="Modern" type="radio" id="ans<?= $no; ?>b" name="ans<?= $no; ?>" class="form-control">
                                                    <label for="ans<?= $no; ?>b">Modern</label>
                                                </div>
                                            <?php } else { ?>
                                                <div class="icheck-red d-inline">
                                                    <input value="Ada" type="radio" id="ans<?= $no; ?>a" name="ans<?= $no ?>" class="form-control">
                                                    <label for="ans<?= $no; ?>a">Ada</label>
                                                </div>
                                                <div class="icheck-red d-inline ml-5 ">
                                                    <input value="Tidak Ada" type="radio" id="ans<?= $no; ?>b" name="ans<?= $no; ?>" class="form-control">
                                                    <label for="ans<?= $no; ?>b">Tidak Ada</label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } elseif ($o['quest_type'] == 'total') { ?>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input class="form-control" type="number" name="ans<?= $no; ?>">
                                            </div>
                                        </div>
                                    <?php } elseif ($o['quest_type'] == 'percent') { ?>
                                        <div class="form-group">
                                            <div class="icheck-red d-inline">
                                                <input value="1%-25%" type="radio" name="ans<?= $no; ?>" id="ans<?= $no; ?>a">
                                                <label for="ans<?= $no; ?>a">1%-25%</label>
                                            </div>
                                            <div class="icheck-red d-inline ml-3">
                                                <input value="26%-50%" type="radio" name="ans<?= $no; ?>" id="ans<?= $no ?>b">
                                                <label for="ans<?= $no; ?>b">26%-50%</label>
                                            </div>
                                            <div class="icheck-red d-inline ml-3">
                                                <input value="51%-75%" type="radio" name="ans<?= $no; ?>" id="ans<?= $no ?>c">
                                                <label for="ans<?= $no; ?>c">51%-75%</label>
                                            </div>
                                            <div class="icheck-red d-inline ml-3">
                                                <input value="76%-100%" type="radio" name="ans<?= $no; ?>" id="ans<?= $no ?>d">
                                                <label for="ans<?= $no; ?>d">76%-100%</label>
                                            </div>
                                        </div>
                                    <?php } elseif ($o['quest_type'] == 'essay') { ?>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="ans<?= $no; ?>" placeholder="">
                                        </div>
                                <?php }
                                    $no++;
                                }; ?>
                                <a href="<?= base_url('forms') ?>" class="btn btn-default"> Batal</a>
                                <input type="submit" class="btn btn-flat btn-warning" value="Simpan">
                            </form>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>