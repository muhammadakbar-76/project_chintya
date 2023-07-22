<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Gajih</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Data Gajih</li>
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
              <h3 class="card-title">Daftar Data Gajih</h3>
            </div>
            <?php echo $this->session->flashdata('pesan') ?>
              <div class="card-body">
               
              <?php echo anchor('administrator/admin/gajihan/input','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-mr"></i> Tambah </button>') ?>
                
              <table id="example1" class="table table-bordered table-striped table-hover">     
                <thead>
                <tr>
                  <th>NO</th>
                  <th>ID gaji</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Posisi</th>
                  <th>Tanggal</th>
                  <th>gaji</th>     
                  <th>keterangan Tunjangan</th>
                  <th>tunjangan</th>
                  <th>gaji lembur</th>
                  <th>utang</th>
                  <th>total</th>
                                              
                  <th width="60px">AKSI</th>
                </tr>
                </thead>
                <tbody>               
                <?php
                $no = 1;
                foreach ($tb_gajihan as $pg) : ?>
                 <tr>
                      <td width="20px"><?php echo $no++ ?></td>
                      <td><?php echo $pg->id_gaji?></td>
                      <td><?php echo $pg->id_karyawan?></td>
                      <td><?php echo $pg->nama_karyawan?></td>
                      <td><?php echo $pg->posisi?></td>
                      <td><?php echo $pg->tgl?></td>
                      <td>Rp.<?php echo number_format($pg->gaji,2,',','.')?>,-</td> 
                      <td><?php echo $pg->ket?></td>
                      <td><?php echo $pg->tunjangan?></td>
                      <td><?php echo $pg->gajil?></td>
                      <td><?php echo $pg->utang?></td>
                      <td><?php echo $pg->total?></td>
           
                      
                      <td class="project-actions text-left">                
                          <a width="20px"><?php echo anchor('administrator/admin/gajihan/update/'.$pg->id,'<div class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i></div>') ?>
                        </a>
                          <a width="20px"><?php echo anchor('administrator/admin/gajihan/delete/'.$pg->id,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?>
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
