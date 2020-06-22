<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Mata Pelajaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Tambah Mata Pelajaran</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
           <form method="post" action="<?php echo base_url('administrator/admin/matpel/input_aksi') ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Kode Mata Pelajaran</label>
                <input type="text" name="kode_matpel" class="form-control" data-inputmask='"mask": "4-(MP)0.9.9"' data-mask>
                <?php echo form_error('kode_matpel','<div class="text-danger small" ml-3>') ?>
              </div>
              
              <div class="form-group">
              <label for="inputName">Mata Pelajaran</label>
                <input type="text" name="matpel" class="form-control">
                <?php echo form_error('matpel','<div class="text-danger small" ml-3>') ?>
              </div>

                <div class="form-group">
                <label for="inputStatus">Jurusan</label>
                <select name="jurusan" class="form-control custom-select" data-placeholder="-Pilih-" style="width: 100%;">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_tambahjurusan as $tj) : ?>
                    <option value="<?php echo $tj->jurusan ?>"><?php echo $tj->jurusan; ?></option>
                <?php endforeach; ?>
                </select>
                <?php echo form_error('jurusan','<div class="text-danger small" ml-3>') ?>
              </div> 

              <div class="form-group">
                <label for="inputStatus">Kelas</label>
                <select name="kelas" class="form-control custom-select" data-placeholder="-Pilih-" style="width: 100%;">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_kelas as $kl) : ?>
                    <option value="<?php echo $kl->kelas ?>"><?php echo $kl->kelas; ?></option>
                <?php endforeach; ?>
                </select>
                <?php echo form_error('kelas','<div class="text-danger small" ml-3>') ?>
              </div>

              
                          

            </div>
          
      </div>
       <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    <?php echo anchor('administrator/admin/matpel','<div class="btn mb-5 btn-primary">Kembali</div>') ?>
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