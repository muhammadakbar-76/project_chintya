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
  <?php echo $pg->jumlah?>
<?php endforeach; ?>
</span>
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
<span class="dropdown-item dropdown-header">
<?php foreach ($tb_notif as $pg) : ?>
  <?php echo $pg->jumlah?> Data Cuti Baru
<?php endforeach; ?>
</span>

</li>

<li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>

        <div class="dropdown-menu">
           <a href="<?php echo base_url() ?>administrator/pengguna" class="dropdown-item">
          <i class="far fa-plus-square mr-2"></i>Pengguna
          </a>   
         <div class="dropdown-divider"></div>
         <a href="<?php echo base_url() ?>auth" class="dropdown-item">
          <i class="fas fa-sign-out-alt fa-sm mr-2"></i>Logout
          </a>
      </li> 

    </ul>
  </nav>


    

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
        <img src="<?php echo base_url() ?>assets/img/o.png" alt="" class="brand-image img-circle elevation-3"
           style="opacity: 200">
        </div>
        <div class="info">
          <a class="d-block"><h5>DPPKBPM</h5></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
              <a class="nav-link" href="<?php echo base_url() ?>administrator/admin/dashboarduser">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Dashboard</p>
            </a>
          </li>

        
          <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/user/cuti" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cuti</p>
                </a>
              </li>

         
         
           

            

        
              


              
             <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/report/reportkaryawan/print" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Data Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/report/reportabsenlembur/print" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Data Lembur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/report/reportgaji/print" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Gajih</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/report/reportcuti/print" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan cuti</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/report/reportpenilaian/print" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Penilaian</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/report/reportpromosi/print" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Kenaikan Pangkat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/report/reportgajilembur/print" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Gajih Lembur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>administrator/report/reportgajihan/print" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Total Gajih</p>
                </a>
              </li>
     

        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  