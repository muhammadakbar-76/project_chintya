<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
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
          <i class="fas fa-house-user"></i>
        </a>
        <div class="dropdown-menu">
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
    <a href="<?php echo base_url() ?>administrator/guru/dashboardguru" class="brand-link">
      <img src="<?php echo base_url() ?>assets/img/download.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>SIAKAD</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a class="d-block">SMK UNGGULAN HUSADA BJM</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
              <a class="nav-link" href="<?php echo base_url() ?>administrator/guru/dashboardguru">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Dashboard</p>
            </a>
          </li>         
          <li class="nav-item has-treeview">
                <a href="<?php echo base_url() ?>administrator/guru/datasiswa" class="nav-link">
                  <i class="nav-icon far fa-user"></i>
                  <p>Data Siswa</p>
                </a>
              </li>
            <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/guru/nilaisiswa" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Nilai Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/guru/perjurusan" class="nav-link">
                  <i class="fas fa-address-book nav-icon"></i>
                  <p> Data Perjurusan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/guru/absensiswa" class="nav-link">
                  <i class="fas fa-address-book nav-icon"></i>
                  <p>Absen Siswa</p>
                </a>
              </li>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>