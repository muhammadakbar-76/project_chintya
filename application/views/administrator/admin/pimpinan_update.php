<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Data pimpinan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Update Data pimpinan</li>
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
            <?php foreach($tb_pimpinan as $pg) : ?>
             <?php echo form_open_multipart('administrator/admin/pimpinan/update_aksi'); ?>
             

              <div class="form-group">
              <label for="inputName">id pimpinan</label>
              <input type="hidden" name="id" class="form-control" value="<?php echo $pg->id?>">
              <input type="text" name="id_pimpinan" class="form-control" value="<?php echo $pg->id_pimpinan?>" id="" >
                <?php echo form_error('id_pimpinan','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
              <label for="inputName">Nama</label>
              <input type="text" name="nama_pimpinan" value="<?php echo $pg->nama_pimpinan?>" class="form-control" id="">
                <?php echo form_error('nama_pimpinan','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Jenis Kelamin</label>
                <select class="form-control custom-select" name="jk">
                  <option value="<?php echo $pg->jk?>" ><?php echo $pg->jk?></option>
                  <option>Laki-Laki</option>
                  <option>Perempuan</option>
                </select>
                <?php echo form_error('jk','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Posisi</label>
                <input type="text" name="posisi" value="<?php echo $pg->posisi?>" class="form-control" id="">
                <?php echo form_error('posisi','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Alamat</label>
                <input type="text" name="alamat" value="<?php echo $pg->alamat?>" class="form-control" id="">
                <?php echo form_error('alamat','<div class="text-danger small" ml-3>') ?>
              </div>

         

             
                  
                  </div>

                </div>
              <button type="submit" class="btn btn-primary mb-5">Simpan</button>
              <?php echo anchor('administrator/admin/pimpinan','<div class="btn mb-5 btn-primary">Kembali</div>') ?> 
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

 