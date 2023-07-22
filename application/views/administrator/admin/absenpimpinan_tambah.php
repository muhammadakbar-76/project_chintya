<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Absen pimpinan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Tambah Absen pimpinan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      
      <div class="row">  

        <div class="col-md-12">

           <?php echo form_open_multipart('administrator/admin/absenpimpinan/input_aksi'); ?>
          <div class="card card-primary">

            <div class="card-body">
            
            <div class="form-group">
              <label for="inputName">ID Absen</label>
              <input type="text" name="id_absen" class="form-control" id="id_absen">
                
              </div>

            <div class="form-group">
                <label for="inputStatus">id pimpinan</label>
                <select name="id_pimpinan" class="form-control custom-select" id="id_pimpinan" data-placeholder="-Pilih-" style="width: 100%;">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_pimpinan as $pg) : ?>
                    <option value="<?php echo $pg->id_pimpinan ?>" nama_pimpinan="<?php echo $pg->nama_pimpinan ?>" posisi="<?php echo $pg->posisi ?>" ><?php echo $pg->id_pimpinan; ?></option>
                <?php endforeach; ?>
                </select>
                <?php echo form_error('id_pimpinan','<div class="text-danger small" ml-3>') ?>
              </div>   

              <div class="form-group">
              <label for="inputName">Nama</label>
              <input type="text" name="nama_pimpinan" class="form-control" id="nama_pimpinan" readonly>
                
              </div>

              <div class="form-group">
                <label for="inputStatus">posisi</label>
                <input type="text" name="posisi" class="form-control" id="posisi" readonly>
               
              </div>

              <div class="form-group">
                <label for="inputStatus">Tanggal</label>
                <input type="date" name="tgl" class="form-control" id="tgl">
               
              </div>

              <div class="form-group">
                <label for="inputStatus">jam</label>
                <input type="text" name="jam" class="form-control" id="jam" >
                
              </div>
              <div class="form-group">
                <label for="inputStatus">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" id="keterangan">
               
              </div>  

              
            
                  </div>

                </div>
         <button type="submit" class="btn btn-primary mb-5">Simpan</button>
              <?php echo anchor('administrator/admin/absenpimpinan','<div class="btn mb-5 btn-primary">Kembali</div>') ?> 
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
    $("#id_pimpinan").on("change", function(){
      var nama_pimpinan = $("#id_pimpinan option:selected").attr("nama_pimpinan"),
          posisi = $("#id_pimpinan option:selected").attr("posisi");
      
          
      $("#nama_pimpinan").val(nama_pimpinan);
      $("#posisi").val(posisi);
    
    });
  });

</script>
 