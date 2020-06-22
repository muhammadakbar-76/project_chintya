<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Nilai Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/guru/dashboardguru">Home</a></li>
              <li class="breadcrumb-item active">Tambah Nilai Siswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
           <form method="post" action="<?php echo base_url('administrator/guru/nilaisiswa/input_aksi') ?>">
            <div class="card-body">
                <div class="form-group">
                <label>NIS</label>
                <select name="nis" class="form-control select2bs4" data-placeholder="-Pilih-" style="width: 100%;" id="nis">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_jrs as $jr) : ?>
                    <option value="<?php echo $jr->nis ?>" nama_siswa="<?php echo $jr->nama_siswa?>" kelas="<?php echo $jr->kelas ?>" semester="<?php echo $jr->semester?>" thn_ajaran="<?php echo $jr->thn_ajaran?>"><?php echo $jr->nis; ?></option>
                <?php endforeach; ?>
                </select>
                <?php echo form_error('nis','<div class="text-danger small" ml-3>') ?>
              </div>

               
              <div class="form-group">
                <label for="inputStatus">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" id="nama" value="" readonly>

<!--                 <?php
                if($tb_siswa->nis = 7173){ ?>
                  <input type="text" name="nama_siswa" class="form-control" id="nama" readonly value="<?= $tb_siswa->nama ?>">
                
                 <?php } ?> -->
                <!-- <select name="nama_siswa" class="form-control custom-select" id="nama" data-placeholder="-Pilih-" style="width: 100%;">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_siswa as $sw) : ?>
                    <option value="<?php echo $sw->nama_siswa ?>"><?php echo $sw->nama_siswa; ?></option>
                <?php endforeach; ?>
                </select> -->
                <?php echo form_error('nama_siswa','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputName">Mata Pelajaran</label>
                <select name="matpel" class="form-control custom-select" data-placeholder="-Pilih-" style="width: 100%;">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_matpel as $mp) : ?>
                    <option value="<?php echo $mp->matpel?>"><?php echo $mp->matpel; ?></option>
                  <?php endforeach; ?>
                  </select>
                <?php echo form_error('matpel','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputName">Kelas</label>
                <input type="text" name="kelas" class="form-control" id="kelas" value="" readonly>
                <?php echo form_error('kelas','<div class="text-danger small" ml-3>') ?>
              </div>

               <div class="form-group">
                <label for="inputName">Semester</label>
                <input type="text" name="semester" class="form-control" id="semester" value="" readonly>
                <?php echo form_error('semester','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
              <label for="inputName">Tahun Ajaran</label>
              <input type="text" name="thn_ajaran" class="form-control" id="thn_ajaran" value="" readonly>
                <?php echo form_error('thn_ajaran','<div class="text-danger small" ml-3>') ?>
              </div>
              <div class="row">
                  <div class="col-6">
                    <label for="inputName">Absen*</label>
                    <input type="text" name="absen" class="form-control" value="" id="absen">
                    <!-- <?php echo form_error('absen','<div class="text-danger small" ml-3>') ?> -->
                  </div>
                  <div class="col-6">
                    <label for="inputName">Tugas*</label>
                    <input type="text" name="tugas" class="form-control" value="" id="tugas">
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <label for="inputName">UTS*</label>
                    <input type="text" name="uts" class="form-control" value="" id="uts">
                  </div>
                  <div class="col-6">
                    <label for="inputName">UAS*</label>
                    <input type="text" name="uas" class="form-control" value="" id="uas"> 

                  </div>
                </div>

              <div class="form-group">
              <label for="inputName">Rata - Rata</label>
                <input type="number" name="rata" class="form-control" id="rata" value="0" placeholder="Rata - Rata*" readonly>
              </div>

              <div class="form-group">
              <label for="inputName">Predikat</label>
                <input type="text" name="predikat" class="form-control" id="predikat" placeholder="Predikat*" readonly>
              </div>

            </div>
          
      </div>
      <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    <?php echo anchor('administrator/guru/nilaisiswa','<div class="btn mb-5 btn-primary">Kembali</div>') ?>
       
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  
  <!-- /.control-sidebar -->
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#nis").on("change", function(){
      var nama_siswa = $("#nis option:selected").attr("nama_siswa"),
          kelas = $("#nis option:selected").attr("kelas"),
          semester = $("#nis option:selected").attr("semester"),
          thn_ajaran = $("#nis option:selected").attr("thn_ajaran");
      $("#nama").val(nama_siswa);
      $("#kelas").val(kelas);
      $("#semester").val(semester);
      $("#thn_ajaran").val(thn_ajaran);
    });
  });
</script>
</script>

<script>
$(document).ready(function(){
   $("#absen, #tugas, #uts, #uas,#rata, #predikat").keyup(function() {
            var absen  = $("#absen").val();
            var tugas = $("#tugas").val();
            var uts = $("#uts").val();
            var uas = $("#uas").val();
            var rata = $("#rata").val();
            var predikat = $("#predikat").val();

            var rata = ((parseInt(absen) + parseInt(tugas))/2 + parseInt(uts) + parseInt(uas))/3;
            $("#rata").val(rata);

            if((rata > 80) && (rata <= 100))
            {
              $('#predikat').val("A");
            } else if ((rata > 70) && (rata <= 80)){
              $('#predikat').val("B");
            } else if ((rata > 60) && (rata <= 70)){
              $('#predikat').val("C");
            } else if ((rata > 40) && (rata <= 60)){
              $('#predikat').val("D");
            } else if ((rata > 1) && (rata <= 40)){
              $('#predikat').val("E");
            }
            // } else if {
            //   $('#predikat').val(rata)="B";
            // }


            // if(rata > 90){
            //   
            // }else{

            // }
            // if(rata >= 80){
            //   $('#predikat').value="C";
            // } 
            // if(rata >= 65){
            //   $('#predikat').value="B";
            // }

        });
    });
</script>





