<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Mata Pelajaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Update Mata Pelajaran</li>
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
          <?php foreach($tb_matpel as $mpt) : ?>
           <form method="post" action="<?php echo base_url('administrator/admin/matpel/update_aksi') ?>">
              <div class="form-group">
                <label for="inputName">Kode Mata Pelajaran</label>
                <input type="hidden" name="id_matpel" value="<?php echo $mpt->id_matpel ?>">
                <input type="text" name="kode_matpel" value="<?php echo $mpt->kode_matpel ?>" class="form-control" data-inputmask='"mask": "4-(MP)0.9.9"' data-mask readonly>
              </div>

              <div class="form-group">
                <label for="inputName">Mata Pelajaran</label>
                <input type="text" name="matpel" value="<?php echo $mpt->matpel ?>" class="form-control">
              </div>

                <div class="form-group">
                <label for="inputStatus">Jurusan</label>
                <select class="form-control" name="jurusan">
                  <option value="<?php echo $mpt->jurusan?>" ><?php echo $mpt->jurusan; ?></option>
                  <?php foreach ($tb_tambahjurusan as $tj) :?>
                    <option value="<?php echo $tj->jurusan?>"><?php echo $tj->jurusan; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <label for="inputStatus">Kelas</label>
                <select class="form-control" name="kelas" value="<?php echo $mpt->kelas ?>">
                  <option>10</option>
                  <option>11</option>
                  <option>12</option>
                </select>
              </div>

                        
              <?php endforeach; ?>
            </div>
        
      </div>
      <button type="submit" class="btn btn-primary mb-5">Simpan</button>
      <?php echo anchor('administrator/admin/matpel','<div class="btn mb-5 btn-primary">Kembali</div>') ?>
      
      
       
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