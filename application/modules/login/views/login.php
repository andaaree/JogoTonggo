<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?= $title; ?> </title>
  <link rel="shortcut icon" href="../assets/img/logo-brand.png" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/AdminLTE/css/style.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/AdminLTE/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/AdminLTE/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/AdminLTE/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- SweetAlerts2 -->
  <link rel="stylesheet" href="../assets/AdminLTE/sweetalert2/sweetalert2.min.css">
  <script type="text/javascript" src="../assets/AdminLTE/sweetalert2/sweetalert2.min.js"></script>
</head>

<body class="hold-transition accent-yellow bg-warning">
  <div class="wrapper">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-sm-10">
        <div class="card o-hidden border-0 shadow-lg my-3">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="user row">
              <div class="col-lg-6 d-none d-lg-flex">
                <div class="login-box-msg align-self-center provlogin">
                  <img src="<?= base_url('') ?>assets/img/logo.png" style="width: 33%; height: 33%;" alt="prov-logo">
                  <h3><b>Provinsi Jawa Tengah</b></h3>
                  <p>Jl. Pahlawan No. 9, Mugassari, Semarang Sel.,</br>Kota Semarang, Jawa Tengah 50249</br>Telp: 024-8415548, 8453676 </p>
                </div>
              </div>
              <div class="col-lg-6 col-sm">
                <div class="p-5">
                  <div class="brandlogin text-center">
                    <img class="mb-4" src="<?= base_url('') ?>assets/img/logo-brand.png"><br>
                    <p class="login-box-msg"><b>Selamat Datang</b></p>
                    <?php // Cetak jika ada notifikasi
                    if ($this->session->flashdata('sukses')) {
                      echo '<p class="warning" style="margin: 10px 20px;">' . $this->session->flashdata('sukses') . '</p>';
                    } ?>

                  </div>
                  <form class="user" method="POST" action="<?= base_url('login') ?>" enctype="multipart/form-data">
                    <div class="input-group">
                      <span class="d-none form-control"><?= $flash; ?></span>
                      <span class="d-none form-control"><?= $catch; ?></span>
                    </div>
                    <div class="input-group bg-grey mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                      </div>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Username atau Kode">
                    </div>
                    <div class="input-group bg-grey mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                      </div>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <!-- <div class="form-group">
                    <?php // $cap_img
                    ?>
                    </div>
                    <div class="form-group">
                      <input type="text" name="kode_captcha" class="form-control">
                    </div> -->
                    <input class="btn btn-primary btn-user btn-block" type="submit" name="btnSubmit" value="Login">
                  </form>
                </div>
              </div>
            </div>

            <hr>
            <p class="text-center m-2">
              Aplikasi Jogo Tonggo ini dibuat sejalan dengan Instruksi Gubernur Nomor 1 Tahun 2020 tentang,<br>
              “Pemberdayaan Masyarakat dalam Percepatan Penanganan Covid-19 di Tingkat Rukun Warga (RW) melalui Pembentukan Satgas Jogo Tonggo”.<br>
              Aplikasi ini merupakan hasil kerja sama antara Pemerintah Provinsi Jawa Tengah, Telkom (PT. Telkom Indonesia Tbk) dan Universitas Dian Nuswantoro (UDINUS).
            </p>
            <hr>
            <p class="text-center">
              Supported by :
              <img style="width: 13%; height: 13%;" src="../assets/img/logo-telkom.png"><img style="width: 13%; height: 13%;" src="../assets/img/logo-udinus-1.png">
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../assets/AdminLTE/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../assets/AdminLTE/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- AdminLTE App -->
  <script src="../assets/AdminLTE/js/adminlte.min.js"></script>
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
</body>

</html>