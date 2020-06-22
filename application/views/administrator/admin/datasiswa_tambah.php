<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Siswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      
      <div class="row">  

        <div class="col-md-12">

           <?php echo form_open_multipart('administrator/admin/datasiswa/input_aksi'); ?>
          <div class="card card-primary">

            <div class="card-body">
              <div class="form-group">
                  <label>NIS</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="nis" data-inputmask='"mask": "9999 9999"' data-mask>
                  </div>
                  <?php echo form_error('nis','<div class="text-danger small" ml-3>') ?>
                </div>

              <div class="form-group">
                <label for="inputName">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control">
                <?php echo form_error('nama_siswa','<div class="text-danger small" ml-3>') ?>
              </div>
              
              <div class="form-group">
                <label for="inputName">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control">
                <?php echo form_error('tempat_lahir','<div class="text-danger small" ml-3>') ?>
              </div>
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" name="tgl_lahir" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  </div>
                  <?php echo form_error('tgl_lahir','<div class="text-danger small" ml-3>') ?>
                </div>

              <div class="form-group">
                <label for="inputStatus">Jenis Kelamin</label>
                <select class="form-control custom-select" name="jenis_kelamin">
                  <option selected disabled>-Pilih-</option>
                  <option>Laki-Laki</option>
                  <option>Perempuan</option>
                </select>
                <?php echo form_error('jenis_kelamin','<div class="text-danger small" ml-3>') ?>
              </div>

               <div class="form-group">
                <label for="inputStatus">Agama</label>
                <select class="form-control custom-select" name="agama">
                  <option selected disabled>-Pilih-</option>
                  <option>Islam</option>
                  <option>Kristen</option>
                  <option>Katolik</option>
                  <option>Buddha</option>
                  <option>Hindu</option>
                  <option>Konghucu</option>
                </select>
                <?php echo form_error('agama','<div class="text-danger small" ml-3>') ?>
              </div>

                <div class="form-group">
                  <label>Telepon</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" name="telp" class="form-control" data-inputmask='"mask": "(+62)89-9999-9999"' data-mask>
                  </div>
                  <?php echo form_error('telp','<div class="text-danger small" ml-3>') ?>
                </div>

                <div class="form-group">
                <label for="inputDescription">Alamat</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="alamat"></textarea>
                <?php echo form_error('alamat','<div class="text-danger small" ml-3>') ?>
              </div>


               <div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Masukkan Gambar</label>
                      </div>
                    </div>
                  </div>
                  </div>

                </div>
         <button type="submit" class="btn btn-primary mb-5">Simpan</button>
              <?php echo anchor('administrator/admin/datasiswa','<div class="btn mb-5 btn-primary">Kembali</div>') ?> 
              <?php echo form_close(); ?>
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