<style>
    table.table-bordered.dataTable tbody th,
    table.table-bordered.dataTable tbody td {
        text-align: center;
        vertical-align: middle;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pegawai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
                        <li class="breadcrumb-item active">Data Pegawai</li>
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
                        <div class="card-title">Search Filter</div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="form-group col-3">
                                    <label for="">NIK</label>
                                    <input type="text" class="form-control" name="nik_pegawai" value="<?= !empty($nik_pegawai) ? $nik_pegawai : '' ?>">
                                </div>
                                <div class="form-group col-3">
                                    <label for="">Nama Pegawai</label>
                                    <input type="text" class="form-control" name="nama_pegawai" value="<?= !empty($nama_pegawai) ? $nama_pegawai : '' ?>">
                                </div>
                                <div class="form-group col-3">
                                    <label for="">Jabatan</label>
                                    <select name="id_jabatan" id="" class="form-control select2-container" style="width: 100%">
                                        <option value="">Select Jabatan</option>
                                        <?php
                                        foreach ($jabatan as $jbt) {
                                            if (!empty($id_jabatan) && $jbt->id_jabatan == $id_jabatan)
                                                echo '<option value="' . $jbt->id_jabatan . '" selected>' . $jbt->nama_jabatan . '</option>';
                                            else
                                                echo '<option value="' . $jbt->id_jabatan . '">' . $jbt->nama_jabatan . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label for="">Divisi</label>
                                    <select name="id_divisi" id="" class="form-control select2-container" style="width: 100%">
                                        <option value="">Select Divisi</option>
                                        <?php
                                        foreach ($divisi as $div) {
                                            if (!empty($id_divisi) && $div->id_divisi == $id_divisi)
                                                echo '<option value="' . $div->id_divisi . '" selected>' . $div->nama_divisi . '</option>';
                                            else
                                                echo '<option value="' . $div->id_divisi . '">' . $div->nama_divisi . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label for="">Status Kawin</label>
                                    <select name="status_kawin_pegawai" id="" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="kawin" <?= !empty($status_kawin_pegawai) && $status_kawin_pegawai == 'kawin' ? 'selected' : '' ?>>Kawin</option>
                                        <option value="belum kawin" <?= !empty($status_kawin_pegawai) && $status_kawin_pegawai == 'belum kawin' ? 'selected' : '' ?>>Belum Kawin</option>
                                        <option value="janda" <?= !empty($status_kawin_pegawai) && $status_kawin_pegawai == 'janda' ? 'selected' : '' ?>>Janda</option>
                                        <option value="duda" <?= !empty($status_kawin_pegawai) && $status_kawin_pegawai == 'duda' ? 'selected' : '' ?>>Duda</option>
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label for="">Status Aktif</label>
                                    <select name="status_aktif_pegawai" id="" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="true" <?= !empty($status_aktif_pegawai) && $status_aktif_pegawai == 1 ? 'selected' : '' ?>>Aktif</option>
                                        <option value="false" <?= !empty($status_aktif_pegawai) && $status_aktif_pegawai == 0 ? 'selected' : '' ?>>Non Aktif</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary float-right">
                            Search
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Data Pegawai</h3>
                    </div>
                    <?php echo $this->session->flashdata('pesan') ?>
                    <div class="card-body">

                        <?php echo anchor('administrator/admin/pegawai/add', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-mr"></i> Tambah </button>') ?>

                        <button type="button" onclick="cetak()" class="btn btn-sm btn-success mb-3"><i class="fas fa-print fa-mr"></i> Cetak </button>

                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Status Aktif</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>TTL</th>
                                    <th>Alamat</th>
                                    <th>Tanggungan</th>
                                    <th>Status Kawin</th>
                                    <th width="60px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pegawai as $pg) : ?>
                                    <tr>
                                        <td width="20px"><?php echo $no++ ?></td>
                                        <td>
                                            <?php
                                            if ($pg->status_aktif_pegawai == 1) {
                                                echo '<span class="badge badge-success">Aktif</span>';
                                            } else {
                                                echo '<span class="badge badge-danger">Non Aktif</span>';
                                            }
                                            ?>
                                        </td>
                                        <td><?= $pg->nik_pegawai ?></td>
                                        <td><?= $pg->nama_pegawai ?></td>
                                        <td><?= $pg->tempat_lahir_pegawai ?>, <?= date('d-m-Y', strtotime($pg->tgl_lahir_pegawai)) ?></td>
                                        <td><?= $pg->alamat_pegawai ?></td>
                                        <td><?= $pg->jml_tanggungan_pegawai ?></td>
                                        <td><?= $pg->status_kawin_pegawai ?></td>
                                        <td class="project-actions text-left">
                                            <div style="display: flex; flex-direction: row">
                                                <a width="20px"><?php echo anchor('administrator/admin/pegawai/view/' . $pg->id_pegawai, '<div class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i></div>') ?>
                                                </a>
                                                <a width="20px" class="ml-1"><?php echo anchor('administrator/admin/pegawai/delete/' . $pg->id_pegawai, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>', 'onclick="return confirm(\'Are you sure?\')"') ?>
                                                </a>
                                                <a width="20px" class="ml-1"><?php echo anchor('administrator/admin/pegawai/detail/' . $pg->id_pegawai, '<div class="btn btn-sm btn-primary"><i class="fa fa-user"></i></div>') ?>
                                                </a>
                                            </div>
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

<script type="text/javascript">
    function cetak() {
        let id_jabatan = $('[name=id_jabatan]').val();
        let id_divisi = $('[name=id_divisi]').val();
        let nik_pegawai = $('[name=nik_pegawai]').val();
        let nama_pegawai = $('[name=nama_pegawai]').val();
        let status_kawin_pegawai = $('[name=status_kawin_pegawai]').val();
        let status_aktif_pegawai = $('[name=status_aktif_pegawai]').val();

        window.location.href = '<?= base_url('administrator/admin/pegawai/cetak?id_jabatan=') ?>' + id_jabatan +
            '&id_divisi=' + id_divisi +
            '&nik_pegawai=' + nik_pegawai +
            '&nama_pegawai=' + nama_pegawai +
            '&status_kawin_pegawai=' + status_kawin_pegawai +
            '&status_aktif_pegawai=' + status_aktif_pegawai;
    }
</script>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- page script -->