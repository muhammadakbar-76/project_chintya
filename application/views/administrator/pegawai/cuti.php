<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Cuti</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardpegawai">Home</a></li>
              <li class="breadcrumb-item active">Data Cuti</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  


  <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Data Cuti</h3>
            </div>
            <?php echo $this->session->flashdata('pesan') ?>
              <div class="card-body">
               
              <?php echo anchor('administrator/pegawai/cuti/input','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-mr"></i> Tambah </button>') ?>
                
                
              <table id="example1" class="table table-bordered table-striped table-hover">     
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Tanggal Pengajuan</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>posisi</th>
                  <th>Jenis Cuti</th>
                  <th>Tanggal Cuti</th>     
                  <th>Tanggal Masuk</th>  
                  <th>Verfikasi</th>  
                  <th>keterangan verifikasi</th>                              
                  <th width="60px">AKSI</th>
                </tr>
                </thead>
                <tbody>               
                <?php
                $no = 1;
                foreach ($tb_cuti as $pg) : ?>
                 <tr>
                      <td width="20px"><?php echo $no++ ?></td>
                      <td><?php echo $pg->tanggal_pengajuan?></td>
                      <td><?php echo $pg->id_karyawan?></td>
                      <td><?php echo $pg->nama_karyawan?></td>
                      <td><?php echo $pg->posisi?></td>
                      <td><?php echo $pg->jenis_cuti?></td>
                      <td><?php echo $pg->tgl_cuti?></td>
                      <td><?php echo $pg->tgl_masuk?></td>
                      <td><?php echo $pg->verifikasi?></td>
                      <td><?php echo $pg->ket?></td>
                      <td class="project-actions text-center">                        
                                              
                                              <a width="20px"><?php echo anchor('administrator/report/reportcuti/print1/'.$pg->id,'<button class="btn btn-sm btn-success mb-3"><i class="fas fa-print"></i></button>') ?>
                                           </a>
                                           </td> 
                  </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- page script -->
