<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Jadwal Guru</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Update Jadwal Guru</li>
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
            <?php foreach($tb_jadwal as $jd) : ?>
           <form method="post" action="<?php echo base_url('administrator/admin/jadwalguru/update_aksi') ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="inputStatus">Hari</label>
                <input type="hidden" name="id_jadwal" class="form-control" value="<?php echo $jd->id_jadwal?>">
                <select class="form-control custom-select" name="hari" value="<?php echo $jd->hari ?>">
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
                    <input type="date" name="tgl_absen" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" value="<?php echo $jd->tgl_absen ?>" data-mask>
                  </div>
                  <?php echo form_error('tgl_absen','<div class="text-danger small" ml-3>') ?>
                </div>

              <div class="form-group">
                <label for="inputStatus">Jurusan</label>
                <select name="jurusan" class="form-control custom-select" data-placeholder="-Pilih-" value="<?php echo $jd->jurusan ?>" style="width: 100%;">
                  <option selected="selected" disable=""><?php echo $jd->jurusan ?></option>
                  <?php foreach ($tb_jrs as $jrs) : ?>
                    <option value="<?php echo $jrs->jurusan ?>"><?php echo $jrs->jurusan; ?></option>
                <?php endforeach; ?>
                </select>
                <?php echo form_error('jurusan','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Kelas</label>
                <select name="kelas" class="form-control custom-select" data-placeholder="-Pilih-" value="<?php echo $jd->kelas ?>" style="width: 100%;">
                  <option selected="selected" disable=""><?php echo $jd->kelas ?></option>
                  <?php foreach ($tb_kelas as $kl) : ?>
                    <option value="<?php echo $kl->kelas ?>"><?php echo $kl->kelas; ?></option>
                <?php endforeach; ?>
                </select>
                <?php echo form_error('kelas','<div class="text-danger small" ml-3>') ?>
              </div>
              
                <div class="form-group">
                <label for="inputStatus">NIP</label>
                <input type="text" name="nip" class="form-control" value="<?php echo $jd->nip ?>" placeholder="<?php foreach ($tb_guru as $gr) : ?>
                    <?php echo $gr->nip; ?> | <?php echo $gr->nama_guru; ?>
                <?php endforeach; ?>" readonly>
                <?php echo form_error('nip','<div class="text-danger small" ml-3>') ?>
              </div>

                <div class="form-group">
                <label for="inputStatus">Guru</label>
                <input type="text" name="nama_guru" class="form-control" value="<?php echo $jd->nama_guru ?>" placeholder="<?php foreach ($tb_guru as $gr) : ?>
                    <?php echo $gr->nama_guru; ?>
                <?php endforeach; ?>" readonly>
                <?php echo form_error('nama_guru','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputName">Kode Mata Pelajaran</label>
               <input type="text" name="kode_matpel" class="form-control" value="<?php echo $jd->kode_matpel ?>" placeholder="<?php foreach ($tb_matpel as $mp) : ?>
                    <?php echo $mp->kode_matpel; ?>
                <?php endforeach; ?>" readonly>
                <?php echo form_error('kode_matpel','<div class="text-danger small" ml-3>') ?>
              </div> 

               <div class="form-group">
              <label for="inputName">Mata Pelajaran</label>
                <input type="text" name="matpel" class="form-control" value="<?php echo $jd->matpel ?>" placeholder="<?php foreach ($tb_matpel as $mp) : ?>
                    <?php echo $mp->matpel; ?>
                <?php endforeach; ?>" readonly>
                <?php echo form_error('matpel','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Jam Masuk</label>
                <input type="time" name="jam_masuk" value="<?php echo $jd->jam_masuk ?>" class="form-control">
                <?php echo form_error('jam_masuk','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Jam Selesai</label>
                <input type="time" name="jam_selesai" class="form-control" value="<?php echo $jd->jam_selesai ?>">
                <?php echo form_error('jam_selesai','<div class="text-danger small" ml-3>') ?>
              </div>

              
              <?php endforeach; ?>            

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