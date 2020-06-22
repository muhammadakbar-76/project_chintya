<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
        <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link">SMK UNGGULAN HUSADA BANJARMASIN</a>
      </li>
    </ul>
 
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
            <!-- Message End -->
          
      <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu">
          <a href="#" class="dropdown-item">
            <i class="fas fa-user mr-2"></i>Profil
          </a>
          <div class="dropdown-divider"></div>
         <a href="<?php echo base_url() ?>administrator/pengguna" class="dropdown-item">
          <i class="far fa-plus-square mr-2"></i>Tambah Pengguna
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url() ?>administrator/admin/dashboardadmin" class="brand-link">
      <img src="<?php echo base_url() ?>assets/img/download.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: 200">
      <span class="brand-text font-weight-light"><b>SIAKAD</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a class="d-block"><strong><!-- <?php echo $nama;?> --> ADMIN</strong></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
              <a class="nav-link" href="<?php echo base_url() ?>administrator/admin/dashboardadmin">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Dashboard</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/admin/dataguru" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/admin/datasiswa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/admin/tambahjurusan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Jurusan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/admin/matpel" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mata Pelajaran</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/admin/jurusan" class="nav-link">
                  <i class="nav-icon fas fa-edit nav-icon"></i>
                  <p>Jurusan</p>
                </a>
              </li>
         
              
          <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/admin/nilaisiswa" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>Nilai Siswa</p>
                </a>
              </li>
               <li class="nav-item has-treeview">
                <a href="<?php echo base_url() ?>administrator/admin/jadwalguru" class="nav-link">
                  <i class="nav-icon far fa-clock"></i>
                  <p>Jadwal Guru</p>
                </a>
              </li>
          <li class="nav-item has-treeview">
          <li class="nav-item has-treeview">
                <a href="<?php echo base_url() ?>administrator/admin/absenguru" class="nav-link">
                  <i class="nav-icon far fa-copy"></i>
                  <p>Absen Guru</p>
                </a>
              </li>          
            <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/admin/alumni" class="nav-link">
                  <i class="nav-icon fas fa-university"></i>
                  <p>Alumni</p>
                </a>
              </li>
              
           <!--   <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/admin/laporan/laporandataguru" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/admin/datasiswa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/admin/datasiswa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mata Pelajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/admin/laporan/laporanjurusan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jurusan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/admin/datasiswa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nilai Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/admin/datasiswa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jadwal Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/admin/datasiswa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Absen Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/admin/datasiswa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alumni</p>
                </a>
              </li> -->

        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  