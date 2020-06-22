  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Data Siswa</li>
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
              <h3 class="card-title">Daftar Data Siswa</h3>
            </div>
            <?php echo $this->session->flashdata('pesan') ?>
              <div class="card-body">
                <?php echo anchor('administrator/admin/datasiswa/input','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-mr"></i> Tambah Siswa </button>') ?>
                <?php echo anchor('administrator/admin/datasiswa/print','<button class="btn btn-sm btn-success mb-3"><i class="fas fa-print"></i> Print </button>') ?>
              <table id="example1" class="table table-bordered table-striped table-hover">           
                <thead>
                <tr>
                  <th>NO</th>
                  <th>NIS</th>
                  <th>Nama Siswa</th>                  
                  <th>Jenis Kelamin</th>
                  <th>No Telp</th>
                  <th>Foto</th>
                  <th width="88px">AKSI</th>
                </tr>
                </thead>
                <tbody>               
                <?php
                $no = 1;
                foreach ($tb_siswa as $dts) : ?>
                 <tr>
                      <td width="20px"><?php echo $no++ ?></td>
                      <td><?php echo $dts->nis?></td>
                      <td><?php echo $dts->nama_siswa?></td>
                      <td><?php echo $dts->jenis_kelamin?></td>
                      <td><?php echo $dts->telp?></td>
                       <td width="20px"> <img src="<?php echo base_url('assets/img/').$dts->foto ?>" witdh="60" height="77"></td>
                      <td class="project-actions text-left">
                          <a width="20px"><?php echo anchor('administrator/admin/datasiswa/detail/'.$dts->id_siswa,'<div class="btn btn-info btn-sm"><i class="fa fa-eye"></i></div>') ?>
                          </a>                    
                          <a width="20px"><?php echo anchor('administrator/admin/datasiswa/update/'.$dts->id_siswa,'<div class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i></div>') ?>
                        </a>
                          <a width="20px"><?php echo anchor('administrator/admin/datasiswa/delete/'.$dts->id_siswa,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?>
                          </a>
                      </td>
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
