<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Penilaian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Update Penilaian</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      
      <div class="row">  

        <div class="col-md-12">
        <?php foreach($tb_penilaian as $pn) : ?>
           <?php echo form_open_multipart('administrator/admin/penilaian/update_aksi'); ?>
          <div class="card card-primary">

            <div class="card-body">
            <div class="form-group">
                <label for="inputStatus">nama karyawan</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $pn->id ?>">
              <input type="text" name="nama_karyawan" class="form-control" value="<?php echo $pn->nama_karyawan ?>" id="nama_karyawan" readonly>
                
              </div>

              <div class="row">
                  <div class="col-6">
                    <label for="inputName">orientasi</label>
                    <input type="text" name="orientasi" class="form-control" value="<?php echo $pn->orientasi ?>" id="orientasi">
                  </div>

                <div class="row">
                  <div class="col-6">
                    <label for="inputName">Integritas</label>
                    <input type="text" name="disiplin" class="form-control" value="<?php echo $pn->disiplin ?>" id="disiplin">
                    <!-- <?php echo form_error('disiplin','<div class="text-danger small" ml-3>') ?> -->
                  </div>
                  <div class="col-6">
                    <label for="inputName">Kerja Sama</label>
                    <input type="text" name="kerjasama" class="form-control"  value="<?php echo $pn->kerjasama ?>" id="kerjasama">
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <label for="inputName">Komitmen</label>
                    <input type="text" name="komitmen" class="form-control" value="<?php echo $pn->komitmen ?>" id="komitmen">
                  </div>
                  <div class="col-6">
                    <label for="inputName">Nilai</label>
                    <input type="number" name="nilai" class="form-control" value="<?php echo $pn->nilai ?>" id="nilai" readonly> 

                  </div>
                </div>

              <div class="form-group">
                  <label>Keterangan</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="keterangan" value="<?php echo $pn->keterangan ?>" id="keterangan" readonly>
                  </div>
                  <?php echo form_error('keterangan','<div class="text-danger small" ml-3>') ?>
                </div>

                <div class="form-group">
                  <label>nama penilai</label>
                  <div class="input-group">
                    <input readonly type="text" class="form-control" name="nama_pimpinan" value="<?php echo $pn->nama_pimpinan ?>" id="nama_pimpinan" readonly>
                  </div>
                  <?php echo form_error('nama_pimpinan','<div class="text-danger small" ml-3>') ?>
                </div>
                       
              

             </div>

                </div>
         <button type="submit" class="btn btn-primary mb-5">Simpan</button>
              <?php echo anchor('administrator/admin/penilaian','<div class="btn mb-5 btn-primary">Kembali</div>') ?> 
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
 <script type="text/javascript">
  $(document).ready(function(){
    $("#nama_karyawan").on("change", function(){
      var nama = $("#nama_karyawan option:selected").attr("nama"),
          jabatan = $("#nama_karyawan option:selected").attr("jabatan");

      $("#nama").val(nama);
      $("#jabatan").val(jabatan);

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
 