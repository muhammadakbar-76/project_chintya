<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Penilaian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Tambah Penilaian</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      
      <div class="row">  

        <div class="col-md-12">

           <?php echo form_open_multipart('administrator/admin/penilaian/input_aksi'); ?>
          <div class="card card-primary">

            <div class="card-body">

            <div class="form-group">
                <label for="inputStatus">NIP</label>
                <select name="id_karyawan" class="form-control custom-select" id="id_karyawan" data-placeholder="-Pilih-" style="width: 100%;">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_karyawan as $pg) : ?>
                    <option value="<?php echo $pg->id_karyawan ?>" nama_karyawan="<?php echo $pg->nama_karyawan ?>"><?php echo $pg->id_karyawan; ?></option>
                <?php endforeach; ?>
                </select>
                <?php echo form_error('id_karyawan','<div class="text-danger small" ml-3>') ?>
              </div>   

              <div class="form-group">
              <label for="inputName">nama_karyawan</label>
              <input type="text" name="nama_karyawan" class="form-control" id="nama_karyawan" readonly>
                
              </div>

            

             

              <div class="form-group">
              <div class="row">
                  <div class="col-6">
                    <label for="inputName">Orientasi</label>
                    <input type="number" name="orientasi" class="form-control" id="orientasi">
                    <!-- <?php echo form_error('orientasi','<div class="text-danger small" ml-3>') ?> -->
                  </div>

                <div class="row">
                  <div class="col-6">
                    <label for="inputName">Integritas</label>
                    <input type="number" name="disiplin" class="form-control" id="disiplin">
                    <!-- <?php echo form_error('disiplin','<div class="text-danger small" ml-3>') ?> -->
                  </div>
                  <div class="col-6">
                    <label for="inputName">Kerja Sama</label>
                    <input type="number" name="kerjasama" class="form-control" id="kerjasama">
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <label for="inputName">Komitmen</label>
                    <input type="number" name="komitmen" class="form-control" id="komitmen">
                  </div>
                  <div class="col-6">
                    <label for="inputName">Nilai</label>
                    <input type="number" name="nilai" class="form-control" id="nilai" readonly> 

                  </div>
                </div>
              
                

              <div class="form-group">
                  <label>Keterangan</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="keterangan" id="keterangan" readonly>
                  </div>
                  <?php echo form_error('keterangan','<div class="text-danger small" ml-3>') ?>
                </div>
              
                <div class="form-group">
                <label for="inputStatus">Nama Penilai</label>
                <select name="nama_pimpinan" class="form-control custom-select" id="nama_pimpinan" data-placeholder="-Pilih-" style="width: 100%;">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_pimpinan as $pg) : ?>
                    <option value="<?php echo $pg->nama_pimpinan ?>"><?php echo $pg->nama_pimpinan; ?></option>
                <?php endforeach; ?>
                </select>
                <?php echo form_error('nama_pimpinan','<div class="text-danger small" ml-3>') ?>
              </div>   

             

              
              </div>
              


                 

                </div>
         <button type="submit" class="btn btn-primary mb-5">Simpan</button>
              <?php echo anchor('administrator/admin/penilaian','<div class="btn mb-5 btn-primary">Kembali</div>') ?> 
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
    $("#id_karyawan").on("change", function(){
      var nama_karyawan = $("#id_karyawan option:selected").attr("nama_karyawan");
      

      $("#nama_karyawan").val(nama_karyawan);
  

    });
  });

</script>

<script>
$(document).ready(function(){
   $("#orientasi, #disiplin, #kerjasama, #komitmen, #nilai, #keterangan").keyup(function() {
            var orientasi  = $("#orientasi").val();
            var disiplin  = $("#disiplin").val();
            var kerjasama = $("#kerjasama").val();
            var komitmen = $("#komitmen").val();
            var nilai = $("#nilai").val();
            var keterangan = $("#keterangan").val();

            var nilai = ((parseInt(orientasi) + parseInt(disiplin) + parseInt(kerjasama) + parseInt(komitmen))/4);
            $("#nilai").val(nilai);

            var keterangan = (parseInt(nilai));
            $("#keterangan").val(keterangan);        

            if((keterangan > 80) && (keterangan <= 1000))
            {
              $('#keterangan').val("Sangat Baik");
            } else if ((nilai > 70) && (nilai <= 100)){
              $('#keterangan').val("Baik");
            } else if ((nilai > 60) && (nilai <= 70)){
              $('#keterangan').val("Cukup Baik");
            } else if ((nilai > 40) && (nilai <= 60)){
              $('#keterangan').val("Kurang Baik");
            } else if ((nilai > 0) && (nilai <= 40)){
              $('#keterangan').val("Sangat Kurang Baik");
            }
        });
    });
</script>


 