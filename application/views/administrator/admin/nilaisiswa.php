  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nilai Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Nilai Siswa</li>
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
              <h3 class="card-title">Daftar Nilai Siswa</h3>
            </div>
            <?php echo $this->session->flashdata('pesan') ?>
              <div class="card-body">
                <?php echo anchor('administrator/admin/nilaisiswa/input','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-mr"></i> Tambah </button>') ?>
                <?php echo anchor('#','<button class="btn btn-sm btn-success mb-3"><i class="fas fa-print"></i> Print </button>') ?>
              <table id="example1" class="table table-bordered table-striped table-hover">     
                <thead>
                <tr>
                  <th width="1px">NO</th>
                  <th>[NIS] | [Nama]</th>
                  <th>[Matpel] | [Kelas]</th>
                  <th>[Semester] | [Tahun Ajaran]</th>             
                  <th>[Absen]|[Tugas]</th>
                  <th>[UTS]|[UAS]</th>
                  <th>Rata - Rata</th>
                  <th>Predikat</th>
                  <th width="50px">AKSI</th>
                </tr>
                </thead>
                <tbody>               
                <?php
                $no = 1;
                foreach ($tb_nilaisiswa as $ns) : ?>
                 <tr>
                      <td width="20px"><?php echo $no++ ?></td>
                      <td><?php echo $ns->nis.' | '.$ns->nama_siswa?></td>
                      <td><?php echo $ns->matpel.' | '.$ns->kelas?></td>
                      <td><?php echo $ns->semester.','.$ns->thn_ajaran?></td>
                      <td><?php echo $ns->absen.'|'.$ns->tugas?></td>
                      <td><?php echo $ns->uts.'|'.$ns->uas?></td>
                      <td><?php echo $ns->rata?></td>
                      <td><?php echo $ns->predikat?></td>
                      <td class="project-actions text-left">                                      
                          <a width="20px"><?php echo anchor('administrator/admin/nilaisiswa/update/'.$ns->id_nilai,'<div class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i></div>') ?>
                        </a>
                          <a width="20px"><?php echo anchor('administrator/admin/nilaisiswa/delete/'.$ns->id_nilai,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?>
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