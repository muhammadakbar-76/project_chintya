<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Cuti tahunan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Tambah Cuti tahunan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      
      <div class="row">  

        <div class="col-md-12">

           <?php echo form_open_multipart('administrator/admin/cutitahunan/input_aksi'); ?>
          <div class="card card-primary">

            <div class="card-body">
            <div class="form-group">
                <label for="inputStatus">NIP</label>
                <select name="id_karyawan" class="form-control custom-select" id="id_karyawan" data-placeholder="-Pilih-" style="width: 100%;">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_karyawan as $pg) : ?>
                    <option value="<?php echo $pg->id_karyawan ?>" nama_karyawan="<?php echo $pg->nama_karyawan ?>"  ><?php echo $pg->id_karyawan; ?></option>
                <?php endforeach; ?>
                </select>
                <?php echo form_error('id_karyawan','<div class="text-danger small" ml-3>') ?>
              </div>   

              <div class="form-group">
              <label for="inputName">Nama</label>
              <input type="text" name="nama_karyawan" class="form-control" id="nama_karyawan" readonly>
                
              </div>

              <div class="form-group">
                <label for="inputStatus">Tanggal</label>
                <input type="date" name="tgl_surat" class="form-control" id="tgl_surat">
               
              </div>

              <div class="form-group">
                <label for="inputStatus">Tanggal Mulai</label>
                <input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai">
               
              </div>

              <div class="form-group">
                <label for="inputStatus">Tanggal akhir</label>
                <input type="date" name="tgl_akhir" class="form-control" id="tgl_akhir" >
                
              </div>
             

              
            
                  </div>

                </div>
         <button type="submit" class="btn btn-primary mb-5">Simpan</button>
              <?php echo anchor('administrator/admin/cutitahunan','<div class="btn mb-5 btn-primary">Kembali</div>') ?> 
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

 <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 <script type="text/javascript">
  $(document).ready(function(){
    $("#id_karyawan").on("change", function(){
      var nama_karyawan = $("#id_karyawan option:selected").attr("nama_karyawan"),
          posisi = $("#id_karyawan option:selected").attr("posisi");
      
          
      $("#nama_karyawan").val(nama_karyawan);
    
    
    });
  });

</script>
 