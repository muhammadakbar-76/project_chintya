<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Data Alumni</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Update Data Alumni</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      
      <div class="row">  

        <div class="col-md-12">
          <?php foreach($tb_alumni as $al) : ?>
           <?php echo form_open_multipart('administrator/admin/alumni/update_aksi'); ?>
          <div class="card card-primary">

            <div class="card-body">
              <div class="form-group">
                <label for="inputStatus">NIS</label>
                <input type="hidden" name="id" value="<?php echo $al->id ?>">
                <input type="text" name="nis" class="form-control" value="<?php echo $al->nis ?>" placeholder="<?php foreach ($tb_siswa as $sw) : ?>
                    <?php echo $sw->nis; ?>
                <?php endforeach; ?>" readonly>
                <?php echo form_error('nis','<div class="text-danger small" ml-3>') ?>
              </div>

               
              <div class="form-group">
                <label for="inputStatus">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" value="<?php echo $al->nama_siswa ?>" placeholder="<?php foreach ($tb_siswa as $sw) : ?>
                    <?php echo $sw->nama_siswa; ?>
                <?php endforeach; ?>" readonly>
                <?php echo form_error('nama_siswa','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputName">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $al->tempat_lahir ?>" placeholder="<?php foreach ($tb_siswa as $sw) : ?>
                    <?php echo $sw->tempat_lahir; ?>
                <?php endforeach; ?>" readonly>
                <?php echo form_error('tempat_lahir','<div class="text-danger small" ml-3>') ?>
              </div>
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="text" name="tgl_lahir" class="form-control" value="<?php echo $al->tgl_lahir ?>" placeholder="<?php foreach ($tb_siswa as $sw) : ?>
                    <?php echo $sw->tgl_lahir; ?>
                <?php endforeach; ?>" readonly>
                  <?php echo form_error('tgl_lahir','<div class="text-danger small" ml-3>') ?>
                </div>

                 <div class="form-group">
                <label for="inputStatus">Agama</label>
               <input type="text" name="agama" class="form-control" value="<?php echo $al->agama ?>" placeholder="<?php foreach ($tb_siswa as $sw) : ?>
                    <?php echo $sw->agama; ?>
                <?php endforeach; ?>" readonly>
                <?php echo form_error('agama','<div class="text-danger small" ml-3>') ?>
              </div>


              <div class="form-group">
                <label for="inputStatus">Jenis Kelamin</label>
               <input type="text" name="jenis_kelamin" class="form-control" value="<?php echo $al->jenis_kelamin ?>" placeholder="<?php foreach ($tb_siswa as $sw) : ?>
                    <?php echo $sw->jenis_kelamin; ?>
                <?php endforeach; ?>" readonly>
                <?php echo form_error('jenis_kelamin','<div class="text-danger small" ml-3>') ?>
              </div>

               <div class="form-group">
                <label for="inputStatus">Jurusan</label>
               <input type="text" name="jurusan" class="form-control" value="<?php echo $al->jurusan ?>" placeholder="<?php foreach ($tb_tambahjurusan as $tj) : ?>
                    <?php echo $tj->jurusan; ?>
                <?php endforeach; ?>" readonly>
                <?php echo form_error('jurusan','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
              <label for="inputName">Angkatan</label>
                <input type="text" name="angkatan" class="form-control" data-inputmask='"mask": "2099/2099"' data-mask value="<?php echo $al->angkatan ?>">
                <?php echo form_error('angkatan','<div class="text-danger small" ml-3>') ?>
              </div>

                <div class="form-group">
                  <label>Telepon</label>
                  <input type="text" name="telp" class="form-control" value="<?php echo $al->telp ?>" placeholder="<?php foreach ($tb_siswa as $sw) : ?>
                    <?php echo $sw->telp; ?>
                <?php endforeach; ?>" readonly>
                  <?php echo form_error('telp','<div class="text-danger small" ml-3>') ?>
                </div>


               <div class="form-group">
                    <label for="exampleInputFile">Foto</label><br>
                    <?php foreach($detail as $dt ) : ?>
                      <img src="<?php echo base_url(). 'assets/img/'. $dt->foto ?>" witdh="150" height="150">
                    <?php endforeach; ?><br><br>

                    <div class="input-group">

                      <div class="custom-file">
                        <input type="file" name="userfile" class="custom-file-input" id="exampleInputFile" value="<?php echo $al->foto ?>">
                        <label class="custom-file-label" for="exampleInputFile">Masukkan Gambar</label>
                      </div>
                    </div>
                  </div>
                  </div>

                </div>
         <button type="submit" class="btn btn-primary mb-5">Simpan</button>
              <?php echo anchor('administrator/admin/alumni','<div class="btn mb-5 btn-primary">Kembali</div>') ?> 
              <?php echo form_close(); ?>
              <?php endforeach; ?>
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

 <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>