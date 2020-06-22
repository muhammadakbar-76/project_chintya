<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Nilai Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Update Nilai Siswa</li>
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
          <?php foreach($tb_nilaisiswa as $ns) : ?>
           <form method="post" action="<?php echo base_url('administrator/admin/nilaisiswa/update_aksi') ?>">
            <div class="card-body">
                <div class="form-group">
                <label>NIS</label>
                <input type="hidden" name="id_nilai" class="form-control" value="<?php echo $ns->id_nilai?>">
                <input type="text" name="nis" class="form-control" value="<?php echo $ns->nis ?>" placeholder="<?php foreach ($tb_jrs as $jr) : ?>
                    <?php echo $jr->nis; ?>
                <?php endforeach; ?>" readonly>
                </select>
                <?php echo form_error('nis','<div class="text-danger small" ml-3>') ?>
              </div>               
              <div class="form-group">
                <label for="inputStatus">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" id="nama" value="<?php echo $ns->nama_siswa?>" readonly>

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
                <input type="text" name="matpel" class="form-control" value="<?php echo $ns->matpel ?>" placeholder="<?php foreach ($tb_matpel as $mp) : ?>
                    <?php echo $mp->matpel; ?>
                <?php endforeach; ?>" readonly>
                <?php echo form_error('matpel','<div class="text-danger small" ml-3>') ?>
              </div>



              <div class="form-group">
                <label for="inputName">Kelas</label>
                <input type="text" name="kelas" class="form-control" value="<?php echo $ns->kelas ?>" placeholder="<?php foreach ($tb_jrs as $jr) : ?>
                    <?php echo $jr->kelas; ?>
                <?php endforeach; ?>" readonly>
                <?php echo form_error('kelas','<div class="text-danger small" ml-3>') ?>
              </div>

               <div class="form-group">
                <label for="inputName">Semester</label>
                <input type="text" name="semester" class="form-control" value="<?php echo $ns->semester ?>" placeholder="<?php foreach ($tb_jrs as $jr) : ?>
                    <?php echo $jr->semester; ?>
                <?php endforeach; ?>" readonly>
                <?php echo form_error('semester','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
              <label for="inputName">Tahun Ajaran</label>
                <input type="text" name="thn_ajaran" class="form-control" value="<?php echo $ns->thn_ajaran ?>" placeholder="<?php foreach ($tb_jrs as $jr) : ?>
                    <?php echo $jr->thn_ajaran; ?>
                <?php endforeach; ?>" readonly>
                <?php echo form_error('thn_ajaran','<div class="text-danger small" ml-3>') ?>
              </div>
              <div class="row">
                  <div class="col-6">
                    <label for="inputName">Absen*</label>
                    <input type="text" name="absen" class="form-control" value="<?php echo $ns->absen ?>" id="absen">
                  </div>
                  <div class="col-6">
                    <label for="inputName">Tugas*</label>
                    <input type="text" name="tugas" class="form-control" value="<?php echo $ns->tugas ?>" id="tugas">
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <label for="inputName">UTS</label>
                    <input type="text" name="uts" class="form-control" value="<?php echo $ns->uts ?>" id="uts">
                  </div>
                  <div class="col-6">
                    <label for="inputName">UAS</label>
                    <input type="text" name="uas" class="form-control" value="<?php echo $ns->uas ?>" id="uas"> 

                  </div>
                </div>

              <div class="form-group">
              <label for="inputName">Rata - Rata</label>
                <input type="number" name="rata" class="form-control" id="rata" value="<?php echo $ns->rata ?>" placeholder="Rata - Rata*" readonly>
              </div>

              <div class="form-group">
              <label for="inputName">Predikat</label>
                <input type="text" name="predikat" class="form-control" value="<?php echo $ns->predikat ?>" id="predikat" placeholder="Predikat*" readonly>
              </div>
              <?php endforeach; ?>
            </div>
          
      </div>
      <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    <?php echo anchor('administrator/admin/nilaisiswa','<div class="btn mb-5 btn-primary">Kembali</div>') ?>
       
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

<script>
$(document).ready(function(){
   $("#absen, #tugas, #uts, #uas,#rata, #predikat").keyup(function() {
            var absen  = $("#absen").val();
            var tugas = $("#tugas").val();
            var uts = $("#uts").val();
            var uas = $("#uas").val();
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

            // if(rata > 90){
            //   $('#predikat').val(predikat)="A";
            // }
            // if(rata >= 80){
            //   $('#predikat').value="C";
            // } 
            // if(rata >= 65){
            //   $('#predikat').value="B";
            // }


//             if (value=='')
//             {
//             }
//             else if (value >= 50) {
//             $('p').text('High');
//             }
//             else  {
//             $('p').text('Low');
    
//             }
//              }).keyup();
            // 
        });
    });
</script>





