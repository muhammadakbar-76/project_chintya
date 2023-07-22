<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Promosi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Update Promosi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      
      <div class="row">  

        <div class="col-md-12">

          <div class="card card-primary">

            <div class="card-body">
            <?php foreach($tb_promosi as $pg) : ?>
             <?php echo form_open_multipart('administrator/admin/promosi/update_aksi'); ?>
             

              <div class="form-group">
              <label for="inputName">ID promosi</label>
              <input type="hidden" name="id" class="form-control" value="<?php echo $pg->id?>">
              <input type="text" name="id_promosi" class="form-control" value="<?php echo $pg->id_promosi?>" id="" >
                <?php echo form_error('id_promosi','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
              <label for="inputName">NIP</label>
              <input readonly type="text" name="id_karyawan" value="<?php echo $pg->id_karyawan?>" class="form-control" id="">
                <?php echo form_error('id_karyawan','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
              <label for="inputName">Nama</label>
              <input readonly type="text" name="nama_karyawan" value="<?php echo $pg->nama_karyawan?>" class="form-control" id="">
                <?php echo form_error('nama_karyawan','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Posisi Lama</label>
                <input readonly type="text" name="posisi" value="<?php echo $pg->posisi?>" class="form-control" id="">
                <?php echo form_error('posisi','<div class="text-danger small" ml-3>') ?>
              </div>

        

              <div class="form-group">
                <label for="inputStatus">Posisi Baru</label>
                <input type="text" name="posisi1" value="<?php echo $pg->posisi1?>" class="form-control" id="">
                <?php echo form_error('posisi1','<div class="text-danger small" ml-3>') ?>
              </div>


              

                  
                  </div>

                </div>
              <button type="submit" class="btn btn-primary mb-5">Simpan</button>
              <?php echo anchor('administrator/admin/promosi','<div class="btn mb-5 btn-primary">Kembali</div>') ?> 
              <?php echo form_close(); ?>
            <?php endforeach;?>
    </div>
    
    </section>
  </div>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
 </div>

 