<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Guru</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Guru</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>    

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <?php foreach($tb_admin as $ad) : ?>
           <form method="post" action="<?php echo base_url('administrator/pengguna/update_aksi') ?>">
            <div class="card-body">

               <div class="form-group">
                <label for="inputName">Username</label>
                <input type="hidden" name="id" value="<?php echo $ad->id ?>">
                <input type="text" name="username" value="<?php echo $ad->username ?>" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputName">Nama Pengguna</label>
                <input type="text" name="nama" value="<?php echo $ad->nama ?>" class="form-control">
              </div>


              <div class="form-group">
                <label for="inputName">Ganti Password</label>
                <input type="text" name="password" value="<?php echo $ad->password ?>" class="form-control" >
              </div>

              <div class="form-group">
                <label for="inputName">Email</label>
                <input type="text" name="email" value="<?php echo $ad->email ?>" class="form-control" >
              </div>

              <div class="form-group">
                <label for="inputStatus">Level</label>
                <select class="form-control" name="level" value="<?php echo $ad->level ?>">
                  <option>admin</option>
                  <option>guru</option>
                  <option>siswa</option>
                </select>
              </div>             
              <?php endforeach; ?>
            </div>
          </div>
        <button type="submit" class="btn btn-primary mb-5">Simpan</button>
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