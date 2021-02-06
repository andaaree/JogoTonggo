<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="m-0 text-dark text-center"><b>Ringkasan Admin Provinsi</b></h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="container-fluid ">
            <div class="row ml-2 mr-2 mt-5">
                <h3 class="col-12 text-center">Jumlah Responden RW Tiap Kategori</h3>
                <span class="col-12 mt-3"></span>
                <div class="col-lg-3 col-6">
                    <div class="card">
                        <div class="card-body bg-gradient-red text-center text-lg">
                            <p>Kesehatan</p>
                            <p><?= $totH; ?> RW</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card">
                        <div class="card-body bg-gradient-orange text-center text-lg">
                            <p>Ekonomi</p>
                            <p><?= $totEco; ?> RW</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card">
                        <div class="card-body bg-gradient-yellow text-center text-lg">
                            <p>Sosial</p>
                            <p><?= $totSoc; ?> RW</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card">
                        <div class="card-body bg-gradient-green text-center text-lg">
                            <p>Hiburan</p>
                            <p><?= $totEnt; ?> RW</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ml-2 mr-2 mt-5 justify-content-center">
                <h4 class="col-12 text-center"><b>Ringkasan Admin</b></h4>
                <span class="col-12 mt-3"></span>
                <h5 class="col-12 text-center">Ringkasan Survey</h5>
                <span class="col-12"></span>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body bg-gradient-warning text-center text-lg">
                            <p>Total RW Sudah Respon</p>
                            <p><?= $totRw; ?> RW</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body bg-gradient-warning text-center text-lg">
                            <p>Total RW Belum Respon</p>
                            <p><?= $totRwNR; ?> RW</p>
                        </div>
                    </div>
                </div>
                <span class="col-12"></span>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body bg-gradient-orange text-center text-lg">
                            <p>Total RW Sudah Verif</p>
                            <p><?= $totRwVer; ?> RW</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body bg-gradient-orange text-center text-lg">
                            <p>Total RW Belum Verif</p>
                            <p><?= $totRwNV; ?> RW</p>
                        </div>
                    </div>
                </div>
                <span class="col-12 mt-3"></span>
                <h5 class="col-12 text-center">Total Data</h5>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body bg-gradient-green text-center text-lg">
                            <p>Total User</p>
                            <p><?= $totUser; ?> User</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body bg-gradient-green text-center text-lg">
                            <p>Total User Aktif</p>
                            <p><?= $totUA; ?> User</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body bg-gradient-green text-center text-lg">
                            <p>Total User Non-Aktif</p>
                            <p><?= $totNA; ?> User</p>
                        </div>
                    </div>
                </div>
                <span class="col-12 mt-3"></span>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body bg-gradient-red text-center text-lg">
                            <p>Total Pertanyaan</p>
                            <p><?= $totQuest; ?> Pertanyaan</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body bg-gradient-red text-center text-lg">
                            <p>Total Pertanyaan Aktif</p>
                            <p><?= $totQA; ?> Pertanyaan</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body bg-gradient-red text-center text-lg">
                            <p>Total Pertanyaan Non-Aktif</p>
                            <p><?= $totQN; ?> Pertanyaan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
</div>