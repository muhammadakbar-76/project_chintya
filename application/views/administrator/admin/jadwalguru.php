  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jadwal Guru</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Jadwal Guru</li>
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
              <h3 class="card-title">Daftar Jadwal Guru</h3>
            </div>
            <?php echo $this->session->flashdata('pesan') ?>
              <div class="card-body">
                <?php echo anchor('administrator/admin/jadwalguru/input','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-mr"></i> Tambah Jadwal </button>') ?>
                <?php echo anchor('#','<button class="btn btn-sm btn-success mb-3"><i class="fas fa-print"></i> Print </button>') ?>
              <table id="example1" class="table table-bordered table-striped table-hover">
                         
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Hari Dan Tanggal</th>                  
                  <th>[Jurusan]/[Kelas]</th>
                  <th>[NIP]/[Nama Guru]</th>            
                  <th>[Kode]/[Mata Pelajaran]</th>
                  <th>Jam</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>               
                <?php
                $no = 1;
                foreach ($tb_jadwal as $jd) : ?>
                 <tr>
                      <td width="20px"><?php echo $no++ ?></td>
                      <td><?php echo $jd->hari.' | '.$jd->tgl_absen?></td>
                      <td><?php echo $jd->jurusan.' | '.$jd->kelas?></td>
                      <td><?php echo $jd->nip.' | '.$jd->nama_guru?></td>                  
                      <td><?php echo $jd->kode_matpel.' | '.$jd->matpel?></td>
                      <td><?php echo $jd->jam_masuk.' - '.$jd->jam_selesai?></td>
                      <td class="project-actions text-left">                                      
                          <a width="20px"><?php echo anchor('administrator/admin/jadwalguru/update/'.$jd->id_jadwal,'<div class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i></div>') ?>
                        </a>
                          <a width="20px"><?php echo anchor('administrator/admin/jadwalguru/delete/'.$jd->id_jadwal,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?>
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
