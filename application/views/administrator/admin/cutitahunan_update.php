<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Cuti tahunan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Update Cuti tahunan</li>
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
            <?php foreach($tb_cutitahunan as $pg) : ?>
             <?php echo form_open_multipart('administrator/admin/cutitahunan/update_aksi'); ?>
             

              <div class="form-group">
              <label for="inputName">NIP</label>
              <input type="hidden" name="id" class="form-control" value="<?php echo $pg->id?>">
              <input readonly type="text" name="id_karyawan" class="form-control" value="<?php echo $pg->id_karyawan?>" id="" >
                <?php echo form_error('id_karyawan','<div class="text-danger small" ml-3>') ?>
              </div>

             

              <div class="form-group">
              <label for="inputName">Nama</label>
              <input readonly type="text" name="nama_karyawan" value="<?php echo $pg->nama_karyawan?>" class="form-control" id="">
                <?php echo form_error('nama_karyawan','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Tanggal</label>
                <input type="date" name="tgl_surat" value="<?php echo $pg->tgl_surat?>" class="form-control" id="">
                <?php echo form_error('tgl_surat','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Tanggal Mulai</label>
                <input type="date" name="tgl_mulai" value="<?php echo $pg->tgl_mulai?>" class="form-control" id="">
                <?php echo form_error('tgl_mulai','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Tanggal akhir</label>
                <input type="text" name="tgl_akhir" value="<?php echo $pg->tgl_akhir?>" class="form-control" id="">
                <?php echo form_error('tgl_akhir','<div class="text-danger small" ml-3>') ?>
              </div>


          

                  
                  </div>

                </div>
              <button type="submit" class="btn btn-primary mb-5">Simpan</button>
              <?php echo anchor('administrator/admin/cutitahunan','<div class="btn mb-5 btn-primary">Kembali</div>') ?> 
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

 