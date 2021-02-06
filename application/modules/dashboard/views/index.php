<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="animated">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!--Title start-->
      <div class="row">
        <div class="col-sm-12 text-center mt-xl-5">
          <p class="text-xl">Selamat Datang <?php echo ucfirst($this->session->userdata('uname')); ?></p>
          <p class="text-xl"> di Website</p>
          <p>
            <img class="img-fluid" src="<?= base_url('') ?>assets/img/logo-brand.png">
          </p>
          <p class="text-xl">Pemerintah Provinsi Jawa Tengah</p>
        </div>
      </div>
      <!--Title end-->
      <div class="row">
        <?php if (($this->session->userdata('role') == 5) or ($this->session->userdata('role') < 2)) { ?>
          <div class="col-6">
            <div class="card">
              <a href="<?= base_url('forms') ?>" class="card-body bg-orange shadow-lg btn btn-block">
                <i class="text-xl fas fa-check float-right"></i>
                <p>Survey</p>
              </a>
            </div>
          </div>
        <?php } ?>
        <?php if (($this->session->userdata('role') == 4) or ($this->session->userdata('role') < 2)) { ?>
          <div class="col-6">
            <div class="card">
              <a href="<?= base_url('answers') ?>" class="card-body bg-yellow shadow-lg btn btn-block">
                <i class="text-xl fas fa-check float-right"></i>
                <p>Verifikasi</p>
              </a>
            </div>
          </div>
        <?php } ?>
      </div>
      <?php if ($this->session->userdata('role') < 4) { ?>
        <hr>
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="card">
              <a href="<?= base_url('health') ?>" class="card-body bg-orange shadow-lg btn btn-block">
                <i class="text-xl fas fa-heartbeat float-right"></i>
                <p>Kesehatan</p>
              </a>
            </div>
            <!-- small box -->
          </div>
          <div class="col-lg-3 col-6">
            <div class="card">
              <a href="<?= base_url('economy') ?>" class="card-body bg-green shadow-lg btn btn-block">
                <i class="text-xl fas fa-dollar-sign float-right"></i>
                <p>Ekonomi</p>
              </a>
            </div>
          </div> <!-- ./col -->
          <div class="col-lg-3 col-6">
            <div class="card">
              <a href="<?= base_url('socials') ?>" class="card-body bg-blue shadow-lg btn btn-block">
                <i class="text-xl fas fa-user-friends float-right"></i>
                <p>Sosial & Keamanan</p>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="card">
              <a href="<?= base_url('entertain') ?>" class="card-body bg-yellow shadow-lg btn btn-block">
                <i class="text-xl fas fa-guitar float-right"></i>
                <p>Hiburan</p>
              </a>
            </div>
          </div> <!-- ./col -->
        </div>
      <?php } ?>
      <hr>
      <div class="row">
        <?php if (($this->session->userdata('role') == 0) or ($this->session->userdata('role') == 4) or ($this->session->userdata('role') == 1)) { ?>
          <div class="col-6">
            <div class="card">
              <a href="<?= base_url('users') ?>" class="card-body bg-teal shadow-lg btn btn-block">
                <i class="text-xl fas fa-user float-right"></i>
                <p>Users</p>
              </a>
            </div>
          </div>
        <?php } ?>
        <?php if ($this->session->userdata('role') < 2) { ?>
          <div class="col-6">
            <div class="card">
              <a href="<?= base_url('quests') ?>" class="card-body bg-lime shadow-lg btn btn-block">
                <i class="text-xl fas fa-question float-right"></i>
                <p>Questions</p>
              </a>
            </div>
          </div>
        <?php } ?>
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
  </section>
  <!-- /.content -->
</div>