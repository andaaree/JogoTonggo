<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-warning elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('') ?>" class="brand-link navbar-red">
        <img src="<?php echo base_url('assets/img/logo.png') ?>" alt="Province-Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">JOGO TONGGO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="<?php echo base_url('dashboard') ?>" class="nav-link <?php if ($this->uri->uri_string() == 'dashboard') {
                                                                                        echo 'active';
                                                                                    } ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <?php if (($this->session->userdata('role') <  1) or ($this->session->userdata('role') ==  5)) { ?>
                    <li class="nav-divider"></li>
                    <li class="nav-item has-treeview <?php if (strpos($this->uri->uri_string(), 'forms') !== false) {
                                                            echo 'menu-open';
                                                        } else {
                                                            echo '';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if ($this->uri->uri_string() == 'forms') {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>
                                Survey
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('') ?>forms" class="nav-link">
                                    <i class="nav-icon far fa-<?php if ($this->uri->uri_string() == 'forms') {
                                                                    echo 'dot-circle';
                                                                } else {
                                                                    echo 'circle';
                                                                } ?>"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-divider"></li>
                <?php }; ?>
                <?php if (($this->session->userdata('role') < 2) or ($this->session->userdata('role') ==  4)) { ?>
                    <li class="nav-divider"></li>
                    <li class="nav-item has-treeview <?php if (strpos($this->uri->uri_string(), 'answers') !== false) {
                                                            echo 'menu-open';
                                                        } else {
                                                            echo '';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if ($this->uri->uri_string() == 'answers') {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fas fa-check"></i>
                            <p>
                                Verifikasi
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('') ?>answers" class="nav-link">
                                    <i class="nav-icon far fa-<?php if ($this->uri->uri_string() == 'answers') {
                                                                    echo 'dot-circle';
                                                                } else {
                                                                    echo 'circle';
                                                                } ?>"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-divider"></li>
                <?php } ?>
                <?php if ($this->session->userdata('role') < 4) { ?>
                    <li class="nav-header">Hasil Survey</li>
                    <li class="nav-divider"></li>
                    <li class="nav-item has-treeview <?php if (strpos($this->uri->uri_string(), 'health') !== false) {
                                                            echo 'menu-open';
                                                        } else {
                                                            echo '';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if ($this->uri->uri_string() == 'health') {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fas fa-heartbeat"></i>
                            <p>
                                Kesehatan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('') ?>health" class="nav-link">
                                    <i class="nav-icon far fa-<?php if ($this->uri->uri_string() == 'health') {
                                                                    echo 'dot-circle';
                                                                } else {
                                                                    echo 'circle';
                                                                } ?>"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-divider"></li>
                    <li class="nav-item has-treeview <?php if (strpos($this->uri->uri_string(), 'economy') !== false) {
                                                            echo 'menu-open';
                                                        } else {
                                                            echo '';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if ($this->uri->uri_string() == 'economy') {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fas fa-dollar-sign"></i>
                            <p>
                                Ekonomi
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('') ?>economy" class="nav-link">
                                    <i class="nav-icon far fa-<?php if ($this->uri->uri_string() == 'economy') {
                                                                    echo 'dot-circle';
                                                                } else {
                                                                    echo 'circle';
                                                                } ?>"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview <?php if (strpos($this->uri->uri_string(), 'socials') !== false) {
                                                            echo 'menu-open';
                                                        } else {
                                                            echo '';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if ($this->uri->uri_string() == 'socials') {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>
                                Sosial & Keamanan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('') ?>socials" class="nav-link">
                                    <i class="nav-icon far fa-<?php if ($this->uri->uri_string() == 'socials') {
                                                                    echo 'dot-circle';
                                                                } else {
                                                                    echo 'circle';
                                                                } ?>"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview <?php if (strpos($this->uri->uri_string(), 'entertain') !== false) {
                                                            echo 'menu-open';
                                                        } else {
                                                            echo '';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if ($this->uri->uri_string() == 'entertain') {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fas fa-guitar"></i>
                            <p>
                                Hiburan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('') ?>entertain" class="nav-link">
                                    <i class="nav-icon far fa-<?php if ($this->uri->uri_string() == 'entertain') {
                                                                    echo 'dot-circle';
                                                                } else {
                                                                    echo 'circle';
                                                                } ?>"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-divider"></li>

                <?php }
                if ($this->session->userdata('role') < 2) {
                ?>
                    <li class="nav-header">Management</li>
                    <li class="nav-divider"></li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('') ?>quests" class="nav-link <?php if ($this->uri->uri_string() == 'quests') {
                                                                                        echo 'active';
                                                                                    } ?>">
                            <i class="nav-icon fas fa-question"></i>
                            <p>Questions</p>
                        </a>
                    </li>
                <?php
                } ?>
                <?php if (($this->session->userdata('role') == 0) or ($this->session->userdata('role') == 4) or ($this->session->userdata('role') == 1)) { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('') ?>users" class="nav-link <?php if ($this->uri->uri_string() == 'users') {
                                                                                        echo 'active';
                                                                                    } ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Users</p>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>