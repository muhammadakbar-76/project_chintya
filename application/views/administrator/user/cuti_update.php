<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Cuti</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboarduser">Home</a></li>
              <li class="breadcrumb-item active">Update Cuti</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      
      <div class="row">  

        <div class="col-md-12">

          <div class="card card-primary">

            <div class="card-body">
            <?php foreach($tb_cuti as $pg) : ?>
             <?php echo form_open_multipart('administrator/user/cuti/update_aksi'); ?>
             

              <div class="form-group">
              <label for="inputName">Tanggal Pengajuan</label>
              <input type="hidden" name="id" class="form-control" value="<?php echo $pg->id?>">
              <input type="date" name="tanggal_pengajuan" class="form-control" value="<?php echo $pg->tanggal_pengajuan?>" id="" >
                <?php echo form_error('tanggal_pengajuan','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
              <label for="inputName">Id Karyawan</label>
              <input readonly type="text" name="id_karyawan" value="<?php echo $pg->id_karyawan?>" class="form-control" id="">
                <?php echo form_error('id_karyawan','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
              <label for="inputName">Nama</label>
              <input readonly type="text" name="nama_karyawan" value="<?php echo $pg->nama_karyawan?>" class="form-control" id="">
                <?php echo form_error('nama_karyawan','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Posisi</label>
                <input readonly type="text" name="posisi" value="<?php echo $pg->posisi?>" class="form-control" id="">
                <?php echo form_error('posisi','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Jenis Cuti</label>
                <input type="text" name="jenis_cuti" value="<?php echo $pg->jenis_cuti?>" class="form-control" id="">
                <?php echo form_error('jenis_cuti','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">tanggal cuti</label>
                <input type="date" name="tgl_cuti" value="<?php echo $pg->tgl_cuti?>" class="form-control" id="">
                <?php echo form_error('tgl_cuti','<div class="text-danger small" ml-3>') ?>
              </div>


              <div class="form-group">
                <label for="inputStatus">tanggal masuk</label>
                <input type="date" name="tgl_masuk" value="<?php echo $pg->tgl_masuk?>" class="form-control" id="">
                <?php echo form_error('tgl_masuk','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">verifikasi</label>
                <select class="form-control custom-select" name="verifikasi">
                  <option value="<?php echo $pg->verifikasi?>" ><?php echo $pg->verifikasi?></option>
                  <option>tidak</option>
                  <option>iya</option>
               
                  
                </select>
                <?php echo form_error('verifikasi','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Keterangan Verifikasi</label>
                <input type="text" name="ket" value="<?php echo $pg->ket?>" class="form-control" id="">
                <?php echo form_error('ket','<div class="text-danger small" ml-3>') ?>
              </div>
                  </div>

                </div>
              <button type="submit" class="btn btn-primary mb-5">Simpan</button>
              <?php echo anchor('administrator/user/cuti','<div class="btn mb-5 btn-primary">Kembali</div>') ?> 
              <?php echo form_close(); ?>
            <?php endforeach;?>
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

 