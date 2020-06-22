<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Data Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Detail Data Siswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <?php foreach ($detail as $dtl) : ?>

            <div class="card-body">
              <div class="form-group">
                
                 <table id="general-table" class="table table-striped table-bordered table-vcenter table-hover">
                                    <tbody>                                        
                                        <tr>
                                            <td width="159px"><strong>NIS</strong></td>
                                            <td><?php echo $dtl->nis; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Siswa</strong></td>
                                            <td><?php echo $dtl->nama_siswa; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tempat Lahir</strong></td>
                                            <td><?php echo $dtl->tempat_lahir; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Lahir</strong></td>
                                            <td><?php echo $dtl->tgl_lahir;?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Jenis Kelamin</strong></td>
                                            <td><?php echo $dtl->jenis_kelamin; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Agama</strong></td>
                                            <td><?php echo $dtl->agama; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>No Telp</strong></td>
                                            <td><?php echo $dtl->telp; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Alamat</strong></td>
                                            <td><?php echo $dtl->alamat; ?></td>
                                        </tr>                                           

                                        <tr>
                                            <td><strong>Foto</strong>
                                             <td><img class="mb-3" src="<?php echo base_url('assets/img/').$dtl->foto; ?>" witdh="90" height="110">
                                            </td>
                                        </tr>                   
                                    </tbody>
                                </table>
                                    <!-- END Tabs Content -->
                                </div>
                            </div>
                        </div>

                </div>
             <?php endforeach; ?>     
            </div>
            <?php echo anchor('administrator/admin/datasiswa','<div class=" btn btn-primary mb-2">Kembali</div>') ?>
          </div>
        
        </div>
        </div>
    <!-- /.content -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>