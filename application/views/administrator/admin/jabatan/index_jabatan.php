<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Jabatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
                        <li class="breadcrumb-item active">Data Jabatan</li>
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
                        <h3 class="card-title">Daftar Data Jabatan</h3>
                    </div>
                    <?php echo $this->session->flashdata('pesan') ?>
                    <div class="card-body">

                        <?php echo anchor('administrator/admin/jabatan/add', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-mr"></i> Tambah </button>') ?>

                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Jabatan</th>
                                    <th>Gaji Jabatan</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($jabatan as $pg) : ?>
                                    <tr>
                                        <td width="20px"><?php echo $no++ ?></td>
                                        <td><?= $pg->nama_jabatan ?></td>
                                        <td>Rp. <?= number_format($pg->gaji_jabatan, 0, ',', '.') ?></td>
                                        <td>
                                            <a width="20px"><?php echo anchor('administrator/admin/jabatan/view/' . $pg->id_jabatan, '<div class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i></div>') ?>
                                            </a>
                                            <a width="20px"><?php echo anchor('administrator/admin/jabatan/delete/' . $pg->id_jabatan, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>', 'onclick="return confirm(\'Are you sure?\')"') ?>
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