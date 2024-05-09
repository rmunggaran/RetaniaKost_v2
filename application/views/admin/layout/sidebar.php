<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('pages/index') ?>" class="brand-link">
        <img src="<?php echo base_url() ?>public/admin/img/SVG/Logo V!-1.svg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>Retania-Kost Sistem</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url() ?>public/admin/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= ucwords($_SESSION['username']) ?></a>
            </div>
        </div>
        <?php if ($this->session->userdata('admin_logged_in')): ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item <?= (uri_string() == 'admin/dashboard') ? 'activee' : '' ?>">
                    <a href="<?php echo base_url() . 'admin/dashboard'; ?>" class="nav-link">
                        <i class="nav-icon fas fa-home" style="color:#ff3d51"></i>
                        <p style="color:#ff3d51">
                        Home
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= (uri_string() == 'admin/kosan') ? 'activee' : '' ?>">
                    <a href="<?php echo base_url() . 'admin/kosan'; ?>" class="nav-link">
                        <i class="nav-icon fas fa-home" style="color: #ff3d51;"></i>
                        <p style="color: #ff3d51;">
                        Data Kosan
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= (uri_string() == 'penghuni/index') ? 'activee' : '' ?>">
                    <a href="<?php echo base_url() . 'penghuni/index'; ?>" class="nav-link">
                        <i class="nav-icon fas fa-user" style="color: #ff3d51;"></i>
                        <p style="color: #ff3d51;">
                        Data Penghuni
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= (uri_string() == 'admin/dataTransaksi') ? 'activee' : '' ?>">
                    <a href="<?php echo base_url() . 'admin/dataTransaksi'; ?>" class="nav-link">
                        <i class="nav-icon far fa-credit-card" style="color: #ff3d51;"></i>
                        <p style="color: #ff3d51;">
                        Data Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= (uri_string() == 'sosmed/index') ? 'activee' : '' ?>">
                    <a href="<?php echo base_url() . 'sosmed/index'; ?>" class="nav-link">
                        <i class="nav-icon fas fa-comment-alt" style="color: #ff3d51;"></i>
                        <p style="color: #ff3d51;">
                        Sosial Media
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('auth/logout'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-door-open" style="color: #ff3d51;"></i>
                        <p style="color: #ff3d51;">
                        Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        <?php else: ?>
            <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item <?= (uri_string() == 'user/index') ? 'activee' : '' ?>">
                    <a href="<?php echo base_url() . 'user/index'; ?>" class="nav-link">
                        <i class="nav-icon fas fa-home" style="color:#ff3d51"></i>
                        <p style="color:#ff3d51">
                        Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('auth/logout'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-door-open" style="color: #ff3d51;"></i>
                        <p style="color: #ff3d51;">
                        Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <?php endif; ?>
    </div>
    <!-- /.sidebar -->
</aside>