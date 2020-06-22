<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Jurusan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Update Jurusan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>  

     <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <?php foreach($tb_jrs as $jr) : ?>
           <form method="post" action="<?php echo base_url('administrator/admin/jurusan/update_aksi') ?>">
            <div class="card-body">

                <div class="form-group">
                <label for="inputStatus">NIS</label>
                <input type="hidden" name="id_jrs" value="<?php echo $jr->id_jrs ?>">
               <input type="text" name="nis" class="form-control" value="<?php echo $jr->nis ?>" placeholder="<?php foreach ($tb_siswa as $sw) : ?>
                    <?php echo $sw->nis; ?>
                <?php endforeach; ?>" readonly>
                <?php echo form_error('nis','<div class="text-danger small" ml-3>') ?>
              </div> 
              <div class="form-group">
                <label for="inputStatus">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" value="<?php echo $jr->nama_siswa ?>" placeholder="<?php foreach ($tb_siswa as $sw) : ?>
                    <?php echo $sw->nama_siswa; ?>
                <?php endforeach; ?>" readonly>
                
                <?php echo form_error('nama_siswa','<div class="text-danger small" ml-3>') ?>
              </div> 

              <div class="form-group">
              <label for="inputName">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" value="<?php echo $jr->jurusan ?>" readonly>
                <?php echo form_error('jurusan','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Kelas</label>
                <select class="form-control" name="kelas">
                  <option value="<?php echo $jr->kelas?>" selected="selected" disable=""><?php echo $jr->kelas; ?></option>
                  <?php foreach ($tb_kelas as $kl) :?>
                    <option value="<?php echo $kl->kelas?>"><?php echo $kl->kelas; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

               <div class="form-group">
                <label for="inputName">Semester</label>
                <select class="form-control custom-select" name="semester" value="<?php echo $jr->semester ?>">
                  <option selected="selected" disable=""><?php echo $jr->semester ?></option>
                  <option>Ganjil</option>
                  <option>Genap</option>
                </select>
                <?php echo form_error('semester','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
              <label for="inputName">Tahun Ajaran</label>
                <input type="text" name="thn_ajaran" value="<?php echo $jr->thn_ajaran ?>" class="form-control" data-inputmask='"mask": "2099/2099"' data-mask>
                <?php echo form_error('thn_ajaran','<div class="text-danger small" ml-3>') ?>
              </div>

            <?php endforeach; ?>
            </div>
          
      </div>
      <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    <?php echo anchor('administrator/admin/jurusan','<div class="btn mb-5 btn-primary">Kembali</div>') ?>
       
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