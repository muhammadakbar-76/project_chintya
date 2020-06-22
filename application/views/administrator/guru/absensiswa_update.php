<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Absen guru</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/guru/dashboardguru">Home</a></li>
              <li class="breadcrumb-item active">Update Absen Guru</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
          <?php foreach($tb_absensiswa as $as) : ?>
           <form method="post" action="<?php echo base_url('administrator/guru/absensiswa/update_aksi') ?>">
            <div class="card-body">
              

              <div class="form-group">
                <label for="inputStatus">Hari</label>
                <input type="hidden" name="id_as" class="form-control" value="<?php echo $as->id_as?>">
                <select class="form-control custom-select" name="hari" value="<?php echo $as->hari ?>" >
                  <option selected><?php echo $as->hari ?></option>
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
                    <input type="date" name="tgl_absen" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="<?php echo $as->tgl_absen ?>">
                  </div>
                  <?php echo form_error('tgl_absen','<div class="text-danger small" ml-3>') ?>
                </div>

                <div class="form-group">
                <label for="inputStatus">NIS</label>
                
                <input type="text" name="nis" class="form-control" value="<?php echo $as->nis ?>" placeholder="<?php foreach ($tb_siswa as $sw) : ?>
                    <?php echo $sw->nis; ?>
                <?php endforeach; ?>" readonly>
                <?php echo form_error('nis','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Nama</label>
                <input type="text" name="nama_siswa" class="form-control" value="<?php echo $as->nama_siswa ?>" placeholder="<?php foreach ($tb_siswa as $sw) : ?>
                    <?php echo $sw->nama_siswa; ?>
                <?php endforeach; ?>" readonly>
                <?php echo form_error('nama_siswa','<div class="text-danger small" ml-3>') ?>
              </div> 

              <div class="form-group">
                <label for="inputStatus">Jurusan</label>
                
                <input type="text" name="jurusan" class="form-control" value="<?php echo $as->jurusan ?>" placeholder="<?php foreach ($tb_tambahjurusan as $tj) : ?>
                    <?php echo $tj->jurusan; ?>
                <?php endforeach; ?>" readonly>
                <?php echo form_error('jurusan','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Kelas</label>
                <input type="text" name="kelas" class="form-control" value="<?php echo $as->kelas ?>" placeholder="<?php foreach ($tb_kelas as $kl) : ?>
                    <?php echo $kl->kelas; ?>
                <?php endforeach; ?>" readonly>
                <?php echo form_error('kelas','<div class="text-danger small" ml-3>') ?>
              </div> 

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2"> 
                                <label for="unit_name">Ket*</label>
                                <select class="form-control custom-select" name="ket" value="<?php echo $as->ket ?>" >
                                   <option selected><?php echo $as->ket ?></option>
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
                                <input type="text" name="alasan" class="form-control" placeholder="Jika Memilih Hadir dan Sakit Maka Ketikan'-', Jika Memilih Izin Tuliskan Keterangannya*" value="<?php echo $as->alasan ?>">
    
                            </div>
                          </div>
                        </div>

                    </div>
                  </div>
       <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    <?php echo anchor('administrator/guru/absensiswa','<div class="btn mb-5 btn-primary">Kembali</div>') ?>
  <?php endforeach; ?>
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