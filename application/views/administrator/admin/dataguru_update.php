<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Data Guru</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Update Data Guru</li>
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
            <?php foreach($tb_guru as $dtg) : ?>
             <?php echo form_open_multipart('administrator/admin/dataguru/update_aksi'); ?>
              <div class="form-group">
                  <label>NIP</label>
                  <div class="input-group">
                    <input type="hidden" name="id_guru" class="form-control" value="<?php echo $dtg->id_guru?>" data-inputmask='"mask": "9999"'data-mask>
                    <input type="text" class="form-control" name="nip" value="<?php echo $dtg->nip?>" data-inputmask='"mask": "9999 9999 999 99 9"' data-mask>
                  </div>
                  <?php echo form_error('nip','<div class="text-danger small" ml-3>') ?>
                </div>
              <div class="form-group">
                <label for="inputName">Nama</label>
                <input type="text" name="nama_guru" class="form-control" value="<?php echo $dtg->nama_guru?>">
                <?php echo form_error('nama_guru','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputName">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $dtg->tempat_lahir?>">
              </div>


                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" name="tgl_lahir" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" value="<?php echo $dtg->tgl_lahir?>" data-mask>
                  </div>
                </div>

               <div class="form-group">
                <label for="inputStatus">Agama</label>
                <select class="form-control custom-select" name="agama" value="<?php echo $dtg->agama?>">
                  <option><?php echo $dtg->agama?></option>
                  <option>Islam</option>
                  <option>Kristen</option>
                  <option>Katolik</option>
                  <option>Buddha</option>
                  <option>Hindu</option>
                  <option>Konghucu</option>
                </select>
                <?php echo form_error('agama','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Jenis Kelamin</label>
                <select class="form-control custom-select" name="jenis_kelamin" value="<?php echo $dtg->jenis_kelamin?>">
                  <option><?php echo $dtg->jenis_kelamin?></option>
                  <option>Laki-Laki</option>
                  <option>Perempuan</option>
                </select>
                <?php echo form_error('jenis_kelamin','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputDescription">Alamat</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="alamat" value="<?php echo $dtg->alamat?>"><?php echo $dtg->alamat?></textarea>
              </div>

                <div class="form-group">
                  <label>Telepon</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" name="telp" class="form-control" data-inputmask='"mask": "(+62)89-9999-9999"' value="<?php echo $dtg->telp?>" data-mask>
                  </div>
                  <?php echo form_error('telp','<div class="text-danger small" ml-3>') ?>
                </div>

               <div class="form-group">
                    <label for="exampleInputFile">Foto</label><br>
                    <?php foreach($detail as $dt) : ?>
                      <img src="<?php echo base_url(). 'assets/img/'. $dtg->foto ?>" witdh="90" height="110">
                    <?php endforeach; ?><br><br>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="userfile" class="custom-file-input" value="<?php echo $dtg->foto?>" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Masukkan Gambar</label>
                      </div>
                    </div>
                  </div>
                  </div>

                </div>
              <button type="submit" class="btn btn-primary mb-5">Simpan</button>
              <?php echo anchor('administrator/admin/dataguru','<div class="btn mb-5 btn-primary">Kembali</div>') ?> 
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