<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Pengguna</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">

           <form method="post" action="<?php echo base_url('administrator/pengguna/input_aksi') ?>">

            <div class="card-body">

              <div class="form-group">
                <label for="inputName">Username</label>
           <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
            
          </div>
        </div>
          <?php echo form_error('username','<div class="text-danger small" ml-3>') ?>
        </div>

        <div class="form-group">
                <label for="inputName">Nama Pengguna</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nama" placeholder="Nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
            <?php echo form_error('nama','<div class="text-danger small" ml-3>') ?>
          </div>
        </div>

        <div class="form-group">
                <label for="inputName">Password</label>
        <div class="input-group mb-3">
          <input type="Password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          
        </div>
        <?php echo form_error('password','<div class="text-danger small" ml-3>') ?>
      </div>
        

        <div class="form-group">
                <label for="inputName">Email</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
           
          </div>
          
        </div>
        <?php echo form_error('email','<div class="text-danger small" ml-3>') ?>
        </div>
        

        <div class="form-group">
                <label for="inputName">Level</label>
                <select class="form-control custom-select" name="level">
                  <option selected disabled>-Pilih-</option>
                  <option>admin</option>
                  <option>guru</option>
                  <option>siswa</option>
                </select>
                
              </div>
          </div>
          <?php echo form_error('level','<div class="text-danger small" ml-3>') ?>
    </div>
  </div>
</div>
</div>
<button type="submit" class="btn btn-primary mb-5">Simpan</button>
<button type="reset" class="btn btn-primary mb-5">Reset</button>
    <?php echo anchor('administrator/pengguna','<div class="btn mb-5 btn-primary">Kembali</div>') ?>
</div>


      
       
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  
  <!-- /.control-sidebar -->
</div>