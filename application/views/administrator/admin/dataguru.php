  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Guru</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Data Guru</li>
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
              <h3 class="card-title">Daftar Data Guru</h3>
            </div>
            <?php echo $this->session->flashdata('pesan') ?>
              <div class="card-body">
                <?php echo anchor('administrator/admin/dataguru/input','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-mr"></i> Tambah Guru </button>') ?>
                <?php echo anchor('administrator/admin/dataguru/print','<button class="btn btn-sm btn-success mb-3"><i class="fas fa-print"></i> Print </button>') ?>
              <table id="example2" class="table table-bordered table-striped table-hover">           
                <thead>
                <tr>
                  <th>NO</th>
                  <th>NIP</th>
                  <th>Nama Guru</th>
                  <th>Jenis Kelamin</th>
                  <th>No Telp</th>
                  <th>Foto</th>
                  <th width="90px">AKSI</th>
                </tr>
                </thead>
                <tbody>               
                <?php
                $no = 1;
                foreach ($tb_guru as $dtg) : ?>
                 <tr>
                      <td width="20px"><?php echo $no++ ?></td>
                      <td><?php echo $dtg->nip?></td>
                      <td><?php echo $dtg->nama_guru?></td>
                      <td><?php echo $dtg->jenis_kelamin?></td>
                      <td><?php echo $dtg->telp?></td>
                       <td width="20px"> <img src="<?php echo base_url('assets/img/').$dtg->foto ?>" witdh="60" height="77"></td>
                      <td class="project-actions text-left">
                          <a width="20px"><?php echo anchor('administrator/admin/dataguru/detail/'.$dtg->id_guru,'<div class="btn btn-info btn-sm"><i class="fa fa-eye"></i></div>') ?>
                          </a>                    
                          <a width="20px"><?php echo anchor('administrator/admin/dataguru/update/'.$dtg->id_guru,'<div class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i></div>') ?>
                        </a>
                          <a width="20px"><?php echo anchor('administrator/admin/dataguru/delete/'.$dtg->id_guru,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?>
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
