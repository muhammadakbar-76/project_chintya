<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Alumni</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Alumni</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      
      <div class="row">  

        <div class="col-md-12">

           <?php echo form_open_multipart('administrator/admin/alumni/input_aksi'); ?>
          <div class="card card-primary">

            <div class="card-body">
              <div class="form-group">
                <label for="inputStatus">NIS</label>
                <select name="nis" class="form-control select2bs4" data-placeholder="-Pilih-" style="width: 100%;" id="nis">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_siswa as $sw) : ?>
                    <option value="<?php echo $sw->nis ?>" nama_siswa="<?php echo $sw->nama_siswa?>" tempat_lahir="<?php echo $sw->tempat_lahir?>" tgl_lahir="<?php echo $sw->tgl_lahir?>" agama="<?php echo $sw->agama?>" jenis_kelamin="<?php echo $sw->jenis_kelamin?>" telp="<?php echo $sw->telp?>" foto="<?php echo $sw->foto?>"><?php echo $sw->nis; ?></option>
                <?php endforeach; ?>
                </select>
                <?php echo form_error('nis','<div class="text-danger small" ml-3>') ?>
              </div>

               
              <div class="form-group">
                <label for="inputStatus">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" id="nama" value="" readonly>
                <?php echo form_error('nama_siswa','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputName">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" id="lahir" value="" readonly>
                <?php echo form_error('tempat_lahir','<div class="text-danger small" ml-3>') ?>
              </div>
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="text" name="tgl_lahir" class="form-control" id="tgl" value="" readonly>
                  <?php echo form_error('tgl_lahir','<div class="text-danger small" ml-3>') ?>
                </div>

                 <div class="form-group">
                <label for="inputStatus">Agama</label>
                <input type="text" name="agama" class="form-control" id="agama" value="" readonly>
                <?php echo form_error('agama','<div class="text-danger small" ml-3>') ?>
              </div>


              <div class="form-group">
                <label for="inputStatus">Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin" class="form-control" id="kelamin" value="" readonly>
                <?php echo form_error('jenis_kelamin','<div class="text-danger small" ml-3>') ?>
              </div>

               <div class="form-group">
                <label for="inputStatus">Jurusan</label>
                <select class="form-control custom-select" name="jurusan">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_tambahjurusan as $tj) : ?>
                    <option value="<?php echo $tj->jurusan ?>"><?php echo $tj->jurusan; ?></option>
                <?php endforeach; ?>
                </select>
                <?php echo form_error('jurusan','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
              <label for="inputName">Angkatan</label>
                <input type="text" name="angkatan" class="form-control" data-inputmask='"mask": "2099/2099"' data-mask>
                <?php echo form_error('angkatan','<div class="text-danger small" ml-3>') ?>
              </div>

                <div class="form-group">
                  <label>Telepon</label>
                  <input type="text" name="telp" class="form-control" id="tlp" value="" readonly>
                  <?php echo form_error('telp','<div class="text-danger small" ml-3>') ?>
                </div>


               <div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="foto">
                        <label class="custom-file-label" for="foto">Masukkan Gambar</label>
                      </div>
                    </div>
                  </div>
                  </div>

                </div>
         <button type="submit" class="btn btn-primary mb-5">Simpan</button>
              <?php echo anchor('administrator/admin/alumni','<div class="btn mb-5 btn-primary">Kembali</div>') ?> 
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

 <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#nis").on("change", function(){
      var nama_siswa = $("#nis option:selected").attr("nama_siswa"),
          tempat_lahir = $("#nis option:selected").attr("tempat_lahir"),
          tgl_lahir = $("#nis option:selected").attr("tgl_lahir"),
          agama = $("#nis option:selected").attr("agama"),
          jenis_kelamin = $("#nis option:selected").attr("jenis_kelamin"),
          telp = $("#nis option:selected").attr("telp");
      $("#nama").val(nama_siswa);
      $("#lahir").val(tempat_lahir);
      $("#tgl").val(tgl_lahir);
      $("#agama").val(agama);
      $("#kelamin").val(jenis_kelamin);
      $("#tlp").val(telp);
    });
  });

</script>