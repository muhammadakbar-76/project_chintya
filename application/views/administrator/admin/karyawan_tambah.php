<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data karyawan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      
      <div class="row">  

        <div class="col-md-12">

           <?php echo form_open_multipart('administrator/admin/karyawan/input_aksi'); ?>
          <div class="card card-primary">

            <div class="card-body">
            
              
              <div class="form-group">
              <label for="inputName">ID Karyawan</label>
              <input type="text" name="id_karyawan" class="form-control" id="" >
                <?php echo form_error('id_karyawan','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
              <label for="inputName">Nama</label>
              <input type="text" name="nama_karyawan" class="form-control" id="">
                <?php echo form_error('nama_karyawan','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Jenis Kelamin</label>
                <select class="form-control custom-select" name="jk">
                  <option selected disabled>-Pilih-</option>
                  <option>Laki-Laki</option>
                  <option>Perempuan</option>
                </select>
                <?php echo form_error('jk','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Posisi</label>
                <input type="text" name="posisi" class="form-control" id="">
                <?php echo form_error('posisi','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="">
                <?php echo form_error('alamat','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select class="form-control custom-select" name="status">
                  <option selected disabled>-Pilih-</option>
                  <option>Honor</option>
                  <option>PNS</option>
                  <option>Pensiun</option>
                </select>
                <?php echo form_error('status','<div class="text-danger small" ml-3>') ?>
              </div>
            
              <div class="form-group">
                <label for="inputStatus">Masa Kerja</label>
                <input type="text" name="masa_kerja" class="form-control" id="">
                <?php echo form_error('masa_kerja','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Golongan</label>
                <select name="golongan" class="form-control custom-select" id="golongan" data-placeholder="-Pilih-" style="width: 100%;">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_golongan as $pg) : ?>
                    <option value="<?php echo $pg->golongan ?>" ><?php echo $pg->golongan; ?></option>
                <?php endforeach; ?>
                </select>
                <?php echo form_error('golongan','<div class="text-danger small" ml-3>') ?>
              </div>   
                  </div>

                </div>
         <button type="submit" class="btn btn-primary mb-5">Simpan</button>
              <?php echo anchor('administrator/admin/karyawan','<div class="btn mb-5 btn-primary">Kembali</div>') ?> 
              <?php echo form_close(); ?>
    </div>
    
    </section>
  </div>
  </div>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
 </div>

 