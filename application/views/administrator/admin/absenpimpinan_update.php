<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Absen pimpinan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Update Absen pimpinan</li>
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
            <?php foreach($tb_absenpimpinan as $pg) : ?>
             <?php echo form_open_multipart('administrator/admin/absenpimpinan/update_aksi'); ?>
             

              <div class="form-group">
              <label for="inputName">ID Absen</label>
              <input type="hidden" name="id" class="form-control" value="<?php echo $pg->id?>">
              <input type="text" name="id_absen" class="form-control" value="<?php echo $pg->id_absen?>" id="" >
                <?php echo form_error('id_absen','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
              <label for="inputName">Id pimpinan</label>
              <input readonly type="text" name="id_pimpinan" value="<?php echo $pg->id_pimpinan?>" class="form-control" id="">
                <?php echo form_error('id_pimpinan','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
              <label for="inputName">Nama</label>
              <input readonly type="text" name="nama_pimpinan" value="<?php echo $pg->nama_pimpinan?>" class="form-control" id="">
                <?php echo form_error('nama_pimpinan','<div class="text-danger small" ml-3>') ?>
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
                <label for="inputStatus">jam</label>
                <input type="text" name="jam" value="<?php echo $pg->jam?>" class="form-control" id="">
                <?php echo form_error('jam','<div class="text-danger small" ml-3>') ?>
              </div>


              <div class="form-group">
                <label for="inputStatus">Keterangan</label>
                <input type="text" name="keterangan" value="<?php echo $pg->keterangan?>" class="form-control" id="">
                <?php echo form_error('keterangan','<div class="text-danger small" ml-3>') ?>
              </div>

                  
                  </div>

                </div>
              <button type="submit" class="btn btn-primary mb-5">Simpan</button>
              <?php echo anchor('administrator/admin/absenpimpinan','<div class="btn mb-5 btn-primary">Kembali</div>') ?> 
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

 