<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Laporan Data Cuti melahirkan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Laporan Data Cuti melahirkan</li>
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
              <h3 class="card-title">Daftar Data Cuti melahirkan</h3>
            </div>
            <?php echo $this->session->flashdata('pesan') ?>
              <div class="card-body">
              <?php echo anchor('administrator/report/reportcutimelahirkan/print','<button class="btn btn-sm btn-success mb-3"><i class="fas fa-print"></i> Print </button>') ?>
              <table id="example1" class="table table-bordered table-striped table-hover">           
                <thead>
                <tr align="center">
                <th>NO</th>
               
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Tanggal</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Akhir</th>     
                             
                </tr>
                </thead>
                <tbody>               
                <?php
                $no = 1;
                foreach ($tb_cutimelahirkan as $pg) : ?>
                 <tr align="center">
                 <td width="20px"><?php echo $no++ ?></td>
                    
                      <td><?php echo $pg->id_karyawan?></td>
                      <td><?php echo $pg->nama_karyawan?></td>
                      <td><?php echo $pg->tgl_surat?></td>
                      <td><?php echo $pg->tgl_mulai?></td>
                      <td><?php echo $pg->tgl_akhir?></td>
                            
                      
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
    <!-- /.content -->
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
