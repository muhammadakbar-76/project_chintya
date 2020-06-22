  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mata Pelajaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Mata Pelajaran</li>
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
              <h3 class="card-title">Daftar Mata Pelajaran</h3>
            </div>
            <?php echo $this->session->flashdata('pesan') ?>
              <div class="card-body">
                <?php echo anchor('administrator/admin/matpel/input','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-mr"></i> Tambah Mata Pelajaran </button>') ?>
                <?php echo anchor('#','<button class="btn btn-sm btn-success mb-3"><i class="fas fa-print"></i> Print </button>') ?>
              <table id="example1" class="table table-bordered table-striped table-hover">            
                <thead>
                <tr>
                  <th width="20px">NO</th>
                  <th width="150px">Kode Mata Pelajaran</th>
                  <th>Mata Pelajaran</th>
                  <th>Jurusan</th>
                  <th width="1px">Kelas</th>
                  <th width="50px">AKSI</th>
                </tr>
                </thead>
                <tbody>               
                <?php
                $no = 1;
                foreach ($tb_matpel as $mp) : ?>
                 <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $mp->kode_matpel?></td>
                      <td><?php echo $mp->matpel?></td>
                      <td><?php echo $mp->jurusan?></td>                      
                      <td><?php echo $mp->kelas?></td>                 
                      <td class="project-actions text-left">                    
                          <a width="20px"><?php echo anchor('administrator/admin/matpel/update/'.$mp->id_matpel,'<div class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i></div>') ?>
                        </a>
                          <a width="20px"><?php echo anchor('administrator/admin/matpel/delete/'.$mp->id_matpel,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?>
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
