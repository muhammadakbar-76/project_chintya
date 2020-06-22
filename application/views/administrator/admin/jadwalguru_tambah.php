<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Jadwal Guru</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Tambah Jadwal Guru</li>
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
           <form method="post" action="<?php echo base_url('administrator/admin/jadwalguru/input_aksi') ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="inputStatus">Hari</label>
                <select class="form-control custom-select" name="hari">
                  <option selected disabled>-Pilih-</option>
                  <option>Senin</option>
                  <option>Selasa</option>
                  <option>Rabu</option>
                  <option>Kamis</option>
                  <option>Jum'at</option>
                </select>
                <?php echo form_error('hari','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                  <label>Tanggal Absen</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" name="tgl_absen" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  </div>
                  <?php echo form_error('tgl_absen','<div class="text-danger small" ml-3>') ?>
                </div>

                <div class="form-group">
                <label for="inputStatus">Jurusan</label>
                <select name="jurusan" class="form-control custom-select" data-placeholder="-Pilih-" style="width: 100%;">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_tambahjurusan as $jrs) : ?>
                    <option value="<?php echo $jrs->jurusan ?>"><?php echo $jrs->jurusan; ?></option>
                <?php endforeach; ?>
                </select>
                <?php echo form_error('jurusan','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Kelas</label>
                <select name="kelas" class="form-control custom-select" data-placeholder="-Pilih-" style="width: 100%;">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_kelas as $kl) : ?>
                    <option value="<?php echo $kl->kelas ?>"><?php echo $kl->kelas; ?></option>
                <?php endforeach; ?>
                </select>
                <?php echo form_error('kelas','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">NIP</label>
                <select name="nip" class="form-control select2bs4" data-placeholder="-Pilih-" style="width: 100%;" id="nip">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_guru as $gr) : ?>
                    <option value="<?php echo $gr->nip?>" nama_guru="<?php echo $gr->nama_guru?>"><?php echo $gr->nip; ?></option>
                <?php endforeach; ?>
                </select>
                <?php echo form_error('nip','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Guru</label>
                <input type="text" name="nama_guru" class="form-control" id="nama" value="" readonly>
                <!-- <select name="nama_guru" class="form-control custom-select" data-placeholder="-Pilih-" style="width: 100%;" id="nama">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_guru as $gr) : ?>
                    <option value="<?php echo $gr->nama_guru?>"><?php echo $gr->nama_guru; ?></option>
                <?php endforeach; ?>
                </select> -->
                <?php echo form_error('nama_guru','<div class="text-danger small" ml-3>') ?>
              </div> 

              <div class="form-group">
                <label for="inputName">Kode Mata Pelajaran</label>
                <select name="kode_matpel" class="form-control select2bs4" data-placeholder="-Pilih-" style="width: 100%;" id="kode">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_matpel as $mp) : ?>
                    <option value="<?php echo $mp->kode_matpel?>" nama_matpel="<?php echo $mp->matpel?>"><?php echo $mp->kode_matpel; ?></option>
                  <?php endforeach; ?>
                  </select>
                <!-- <input type="text" name="kode_matpel" class="form-control" data-inputmask='"mask": "4-(MP)0.9.9"' data-mask> -->
                <?php echo form_error('kode_matpel','<div class="text-danger small" ml-3>') ?>
              </div>       

               <div class="form-group">
              <label for="inputName">Mata Pelajaran</label>
              <input type="text" name="matpel" class="form-control" id="matapelajaran" value="" readonly>
                <!-- <select name="matpel" class="form-control custom-select" data-placeholder="-Pilih-" style="width: 100%;">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_matpel as $mp) : ?>
                    <option value="<?php echo $mp->matpel ?>"><?php echo $mp->matpel; ?></option>
                <?php endforeach; ?>
                </select> -->
                <?php echo form_error('matpel','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Jam Masuk</label>
                <input type="time" name="jam_masuk" class="form-control">
                <?php echo form_error('jam_masuk','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Jam Selesai</label>
                <input type="time" name="jam_selesai" class="form-control">
                <?php echo form_error('jam_selesai','<div class="text-danger small" ml-3>') ?>
              </div>

              
                          

            </div>
          
      </div>
       <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    <?php echo anchor('administrator/admin/jadwalguru','<div class="btn mb-5 btn-primary">Kembali</div>') ?>
     </div>
     
       
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
    $("#nip").on("change", function(){
      var nama_guru = $("#nip option:selected").attr("nama_guru");
      $("#nama").val(nama_guru);
    });

    $("#kode").on("change", function(){
      var nama_matpel = $("#kode option:selected").attr("nama_matpel");
      $("#matapelajaran").val(nama_matpel);
    });

  });

</script>

<!-- <script type="text/javascript">
 $(document).ready(function(){
    $( "#nip" ).change(function() {
      // let item_id = $(this).data('id_siswa')
      var nip = $(this).find(":selected").val();;
      //$('#nama').val(nip);
      $.ajax({
        type:"POST",
        url:"<?php echo base_url('index.php/dataguru/get_nama');?>"
        datatype:'json',
        data:{nip:nip},
        cache:false,
        success:function(data){
          $.each(data,function(nip, nama_guru){
            $('#nama').val(data.nama_guru);
          });
        }
      })
        return false;
    });
});
</script> -->


<!-- <script type="text/javascript">
 $(document).ready(function(){
    $( "#kode" ).change(function() {
      // let item_id = $(this).data('id_siswa')
      var selectedOption = $(this).find(":selected").val();
      $('#matapelajaran').val(selectedOption);

    });
});
</script> -->