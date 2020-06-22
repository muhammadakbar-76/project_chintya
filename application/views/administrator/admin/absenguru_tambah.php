<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Absen guru</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Tambah Absen Guru</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
           <form method="post" action="<?php echo base_url('administrator/admin/absenguru/input_aksi') ?>">
            <div class="card-body">
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
                  <label>Tanggal</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" name="tgl_absen" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  </div>
                  <?php echo form_error('tgl_absen','<div class="text-danger small" ml-3>') ?>
                </div>

                
                
                
              

              <!-- <div class="row">
                    <div class="col-sm-6">

                       <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox">
                          <label class="form-check-label">Hadir</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox">
                          <label class="form-check-label">Sakit</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox">
                          <label class="form-check-label">Izib</label>
                        </div>                       
                      </div>
                    </div>
                  </div> -->

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2"> 
                                <label for="unit_name">Ket*</label>
                                <select class="form-control custom-select" name="ket">
                                   <option selected disabled>-Pilih-</option>
                                      <option>Hadir</option>
                                      <option>Sakit</option>
                                      <option>Izin</option>                
                                  </select>
                                  <?php echo form_error('ket','<div class="text-danger small" ml-3>') ?>
                            </div>
                            
                        </div> 
                      </div>
                      <div class="form-group">
                        <div class="row">
                      <div class="col-md-10"> 
                                <label for="inputName">Alasan</label>
                                <input type="text" name="alasan" class="form-control" placeholder="Jika Memilih Hadir dan Sakit Maka Ketikan'-', Jika Memilih Izin Tuliskan Keterangannya*">
    
                            </div>
                          </div>
                        </div>

                    </div>
                  </div>
       <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    <?php echo anchor('administrator/admin/absenguru','<div class="btn mb-5 btn-primary">Kembali</div>') ?>
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

  });

</script>