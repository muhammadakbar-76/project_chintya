  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Alumni</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Alumni</li>
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
              <h3 class="card-title">Daftar Alumni</h3>
            </div>
              <?php echo $this->session->flashdata('pesan') ?>
              <div class="card-body">
                <?php echo anchor('administrator/admin/alumni/input','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-mr"></i> Tambah Alumni </button>') ?>
                <?php echo anchor('#','<button class="btn btn-sm btn-success mb-3"><i class="fas fa-print"></i> Print </button>') ?>
              <table id="example1" class="table table-bordered table-striped table-hover">
              <!-- <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                  <select class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected" disabled="">-Pilih-</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div> -->            
                <thead>
                <tr>
                  <th width="20px">NO</th>
                  <th width="150px">NIS</th>
                  <th>Nama Siswa</th>
                  <th>Jenis Kelamin</th>
                  <th>Angkatan</th>
                  <th>Foto</th>
                  <th width="90px">AKSI</th>
                </tr>
                </thead>
                <tbody>               
                <?php
                $no = 1;
                foreach ($tb_alumni as $al) : ?>
                 <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $al->nis?></td>
                      <td><?php echo $al->nama_siswa?></td>
                      <td><?php echo $al->jenis_kelamin?></td>
                      <td width="1px"><?php echo $al->angkatan?></td>
                      <td width="20px"> <img src="<?php echo base_url('assets/img/').$al->foto ?>" witdh="60" height="77"></td>

                      <td class="project-actions text-left">
                          <a width="20px"><?php echo anchor('administrator/admin/alumni/detail/'.$al->id,'<div class="btn btn-info btn-sm"><i class="fa fa-eye"></i></div>') ?>
                          </a>                    
                          <a width="20px"><?php echo anchor('administrator/admin/alumni/update/'.$al->id,'<div class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i></div>') ?>
                        </a>
                          <a width="20px"><?php echo anchor('administrator/admin/alumni/delete/'.$al->id,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?>
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