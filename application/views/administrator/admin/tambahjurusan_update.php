<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Tambah Jurusan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Update Tambah Jurusan</li>
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
          <?php foreach($tb_tambahjurusan as $tj) : ?>
           <form method="post" action="<?php echo base_url('administrator/admin/tambahjurusan/update_aksi') ?>">
            <div class="card-body">

              <div class="form-group">
                <label for="inputName">Kode Jurusan</label>
                <input type="hidden" name="id_tambahjurusan" class="form-control" value="<?php echo $tj->id_tambahjurusan ?>">
                <input type="text" name="kode_jrs" class="form-control" data-inputmask='"mask": "3-(JRS)0.9"'value="<?php echo $tj->kode_jrs ?>" data-mask readonly>
                <?php echo form_error('kode_jrs','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputName">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" value="<?php echo $tj->jurusan ?>">
                <?php echo form_error('jurusan','<div class="text-danger small" ml-3>') ?>
              </div>            

          
                          

            </div>
          
      </div>
       <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    <?php echo anchor('administrator/admin/tambahjurusan','<div class="btn mb-5 btn-primary">Kembali</div>') ?>
  <?php endforeach; ?>
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