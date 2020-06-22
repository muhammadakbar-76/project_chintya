  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Absen Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/guru/dashboardguru">Home</a></li>
              <li class="breadcrumb-item active">Absen Siswa</li>
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
              <h3 class="card-title">Daftar Absen Siswa</h3>
            </div>
            <?php echo $this->session->flashdata('pesan') ?>
              <div class="card-body">
                <?php echo anchor('administrator/guru/absensiswa/input','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-mr"></i> Tambah Absen </button>') ?>
                <?php echo anchor('#','<button class="btn btn-sm btn-success mb-3"><i class="fas fa-print"></i> Print </button>') ?>
              <table id="example1" class="table table-bordered table-striped table-hover">
              <div class="row">
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
                </div>           
                <thead>
                <tr>
                  <th width="1px">NO</th>
                  <th width="150px">Hari dan Tanggal</th> 
                  <th>[NIS] | [Nama]</th>
                  <th>[Jurusan] | [Kelas]</th>             
                  <th width="1px">[Ket]*</th>
                  <th>Alasan</th>
                  <th width="50px">AKSI</th>
                </tr>
                </thead>
                <tbody>               
                <?php
                $no = 1;
                foreach ($tb_absensiswa as $as) : ?>
                 <tr>
                      <td width="20px"><?php echo $no++ ?></td>
                      <td><?php echo $as->hari.','.$as->tgl_absen?></td>
                      <td><?php echo $as->nis.' | '.$as->nama_siswa?></td>
                      <td><?php echo $as->jurusan.' | '.$as->kelas?></td>
                      <td><?php echo $as->ket?></td>
                      <td><?php echo $as->alasan?></td>
                      <td class="project-actions text-left">                                      
                          <a width="20px"><?php echo anchor('administrator/guru/absensiswa/update/'.$as->id_as,'<div class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i></div>') ?>
                        </a>
                          <a width="20px"><?php echo anchor('administrator/guru/absensiswa/delete/'.$as->id_as,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?>
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