<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-primary">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <!-- Message End -->

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">
                            <?php foreach ($tb_notif as $pg) : ?>
                                <?php echo $pg->jumlah ?>
                            <?php endforeach; ?>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">
                            <?php foreach ($tb_notif as $pg) : ?>
                                <?php echo $pg->jumlah ?> Data Cuti Baru
                            <?php endforeach; ?>
                        </span>

                </li>



                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>

                    <div class="dropdown-menu">
                        <a href="<?php echo base_url() ?>administrator/user/change_password" class="dropdown-item">
                            <i class="far fa-plus-square mr-2"></i>Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo base_url() ?>auth" class="dropdown-item">
                            <i class="fas fa-sign-out-alt fa-sm mr-2"></i>Logout
                        </a>
                </li>

            </ul>
        </nav>


        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 bg-dark ">
            <!-- Brand Logo -->


            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url() ?>assets/img/2.png" alt="" class="brand-image img-circle elevation-3" style="opacity: 200">
                    </div>
                    <div class="info">
                        <a class="d-block">
                            <h5>PT BASIRIH</h5>
                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview">
                            <a class="nav-link" href="<?php echo base_url() ?>administrator/hrd/dashboardhrd">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>administrator/hrd/gaji" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gaji</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>administrator/hrd/cuti" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cuti</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>administrator/hrd/izin" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Izin</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>administrator/hrd/jatah_cuti" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jatah Cuti</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>