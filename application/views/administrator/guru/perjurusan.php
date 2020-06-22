  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perjurusan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/guru/dashboardguru">Home</a></li>
              <li class="breadcrumb-item active">Perjurusan</li>
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
              <h3 class="card-title">Daftar Perjurusan</h3>
            </div>
              <?php echo $this->session->flashdata('pesan') ?>
              <div class="card-body">
                <?php echo anchor('administrator/admin/jurusan/print','<button class="btn btn-sm btn-success mb-3"><i class="fas fa-print"></i> Print </button>') ?>
          <table id="example1" class="table table-bordered table-striped table-hover" id="filter">        
                <thead>
                <tr>
                  <th width="20px">NO</th>
                  <th width="49px">NIS</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
                  <th width="1px">Kelas</th>
                  <th width="1px">Semester</th>
                  <th width="100px">Tahun Ajaran</th>
                </tr>
                </thead>
                <tbody>               
                <?php
                $no = 1;
                foreach ($tb_jrs as $jr) : ?>
                
                 <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $jr->nis?></td>
                        <td><?php echo $jr->nama_siswa?></td>
                        <td><?php echo $jr->jurusan?></td>
                        <td><?php echo $jr->kelas?></td>
                        <td><?php echo $jr->semester?></td>   
                        <td><?php echo $jr->thn_ajaran?></td>
                  </tr>
                <?php endforeach ?>
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