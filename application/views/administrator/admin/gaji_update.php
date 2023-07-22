<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Gaji Pokok</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Update Gaji Pokok</li>
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
            <?php foreach($tb_gaji as $pg) : ?>
             <?php echo form_open_multipart('administrator/admin/gaji/update_aksi'); ?>
             

              <div class="form-group">
              <label for="inputName">ID Gaji</label>
              <input type="hidden" name="id" class="form-control" value="<?php echo $pg->id?>">
              <input type="text" name="id_gaji" class="form-control" value="<?php echo $pg->id_gaji?>" id="" >
                <?php echo form_error('id_gaji','<div class="text-danger small" ml-3>') ?>
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
                <label for="inputStatus">Posisi</label>
                <input readonly type="text" name="posisi" value="<?php echo $pg->posisi?>" class="form-control" id="">
                <?php echo form_error('posisi','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Tanggal</label>
                <input type="date" name="tgl" value="<?php echo $pg->tgl?>" class="form-control" id="">
                <?php echo form_error('tgl','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Gaji Pokok</label>
                <input readonly type="text" name="gaji" value="<?php echo $pg->gaji?>" class="form-control" id="">
                <?php echo form_error('gaji','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Status</label>
                <input readonly type="text" name="status" value="<?php echo $pg->status?>" class="form-control" id="">
                <?php echo form_error('status','<div class="text-danger small" ml-3>') ?>
              </div>

           

                  
                  </div>

                </div>
              <button type="submit" class="btn btn-primary mb-5">Simpan</button>
              <?php echo anchor('administrator/admin/gaji','<div class="btn mb-5 btn-primary">Kembali</div>') ?> 
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

 