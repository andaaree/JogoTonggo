<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-black navbar-red">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo base_url('') ?>" class="nav-link">Home</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item text-sm-right text-xs text-white mr-2">
            <p class="mt-lg-n1"><?php echo ucfirst($this->session->userdata('uname')); ?></p>
            <p style="margin-top: -10px;">Provinsi Jawa Tengah</p>
        </li>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#dropItem" id="userDropdown" role="button" data-toggle="dropdown">
                <span class="mr-3 d-none d-lg-inline text-gray-600 large text-uppercase"><i class="fas fa-user"></i></span>
            </a>
            <!-- Dropdown - User Information -->
            <div id="dropItem" class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url('') ?>./login/logout">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Log Out
                </a>
                <a class="dropdown-item" href="<?=base_url('users/profile/').$this->session->userdata('username');?>">
                <i class="fas fa-user-cog fa-sm fa-fw mr-2 -text-gray-400"></i>
                    Profile
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->