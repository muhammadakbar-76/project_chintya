   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengguna </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pengguna</li>
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
              <h3 class="card-title">Daftar Pengguna</h3>
            </div>
              <?php echo $this->session->flashdata('pesan') ?>
              <div class="card-body">
                <?php echo anchor('administrator/pengguna/input','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-mr"></i> Tambah Pengguna </button>') ?>
              <table id="example1" class="table table-bordered table-striped table-hover">            
                <thead>
                <tr>
                  <th width="20px">NO</th>
                  <th width="150px">Username</th>
                  <th>Nama Pengguna</th>
                  <th>Password</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th width="50px">AKSI</th>
                </tr>
                </thead>
                <tbody>               
                <?php
                $no = 1;
                foreach ($user as $ad) : ?>
                 <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $ad->username?></td>
                      <td><?php echo $ad->nama?></td>
                      <td>********</td>
                      <td><?php echo $ad->email?></td>
                      <td><?php echo $ad->level?></td>                     
                      <td class="project-actions text-left">                    
                          <a width="20px"><?php echo anchor('administrator/pengguna/update/'.$ad->id,'<div class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i></div>') ?>
                        </a>
                          <a width="20px"><?php echo anchor('administrator/pengguna/delete/'.$ad->id,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?>
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
  <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  <!-- /.control-sidebar -->
</div>