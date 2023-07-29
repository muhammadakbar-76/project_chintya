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
                    <h1>Data Mutasi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
                        <li class="breadcrumb-item active">Data Mutasi</li>
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
                                    <label for="">Pegawai</label>
                                    <select name="id_pegawai" id="" class="form-control select2-container" style="width: 100%">
                                        <option value="">Select Pegawai</option>
                                        <?php
                                        foreach ($pegawai as $pg) {
                                            if (!empty($id_pegawai) && $pg->id_pegawai == $id_pegawai)
                                                echo '<option value="' . $pg->id_pegawai . '" selected>' . $pg->nama_pegawai . '</option>';
                                            else
                                                echo '<option value="' . $pg->id_pegawai . '">' . $pg->nama_pegawai . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label for="">Jabatan Lama</label>
                                    <select name="id_jabatan_lama" id="" class="form-control select2-container" style="width: 100%">
                                        <option value="">Select Jabatan</option>
                                        <?php
                                        foreach ($jabatan as $jbt) {
                                            if (!empty($id_jabatan_lama) && $jbt->id_jabatan == $id_jabatan_lama)
                                                echo '<option value="' . $jbt->id_jabatan . '" selected>' . $jbt->nama_jabatan . '</option>';
                                            else
                                                echo '<option value="' . $jbt->id_jabatan . '">' . $jbt->nama_jabatan . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label for="">Jabatan Baru</label>
                                    <select name="id_jabatan_baru" id="" class="form-control select2-container" style="width: 100%">
                                        <option value="">Select Jabatan</option>
                                        <?php
                                        foreach ($jabatan as $jbt) {
                                            if (!empty($id_jabatan_baru) && $jbt->id_jabatan == $id_jabatan_baru)
                                                echo '<option value="' . $jbt->id_jabatan . '" selected>' . $jbt->nama_jabatan . '</option>';
                                            else
                                                echo '<option value="' . $jbt->id_jabatan . '">' . $jbt->nama_jabatan . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label for="">Divisi Lama</label>
                                    <select name="id_divisi_lama" id="" class="form-control select2-container" style="width: 100%">
                                        <option value="">Select Divisi</option>
                                        <?php
                                        foreach ($divisi as $div) {
                                            if (!empty($id_divisi_lama) && $div->id_divisi == $id_divisi_lama)
                                                echo '<option value="' . $div->id_divisi . '" selected>' . $div->nama_divisi . '</option>';
                                            else
                                                echo '<option value="' . $div->id_divisi . '">' . $div->nama_divisi . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label for="">Divisi Baru</label>
                                    <select name="id_divisi_baru" id="" class="form-control select2-container" style="width: 100%">
                                        <option value="">Select Divisi</option>
                                        <?php
                                        foreach ($divisi as $div) {
                                            if (!empty($id_divisi_baru) && $div->id_divisi == $id_divisi_baru)
                                                echo '<option value="' . $div->id_divisi . '" selected>' . $div->nama_divisi . '</option>';
                                            else
                                                echo '<option value="' . $div->id_divisi . '">' . $div->nama_divisi . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label for="">Tanggal Efektif Mutasi</label>
                                    <input type="date" name="tgl_efektif_mutasi" id="" class="form-control">
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
                        <h3 class="card-title">Daftar Data Mutasi</h3>
                    </div>
                    <?php echo $this->session->flashdata('pesan') ?>
                    <div class="card-body">

                        <?php echo anchor('administrator/admin/mutasi/add', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-mr"></i> Tambah </button>') ?>

                        <button type="button" onclick="cetak()" class="btn btn-sm btn-success mb-3"><i class="fas fa-print fa-mr"></i> Cetak </button>

                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jabatan Lama</th>
                                    <th>Jabatan Baru</th>
                                    <th>Divisi Lama</th>
                                    <th>Divisi Baru</th>
                                    <th>Tgl Efektif</th>
                                    <th width="60px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($mutasi as $mut) : ?>
                                    <tr>
                                        <td width="20px"><?php echo $no++ ?></td>
                                        <td><?= $mut->nik_pegawai ?></td>
                                        <td><?= $mut->nama_pegawai ?></td>
                                        <td><?= $mut->jabatan_lama ?></td>
                                        <td><?= $mut->jabatan_baru ?></td>
                                        <td><?= $mut->divisi_lama ?></td>
                                        <td><?= $mut->divisi_baru ?></td>
                                        <td><?= date('d-m-Y', strtotime($mut->tgl_efektif_mutasi)) ?></td>
                                        <td class="project-actions text-left">
                                            <div style="display: flex; flex-direction: row">
                                                <a width="20px"><?php echo anchor('administrator/admin/mutasi/view/' . $mut->id_mutasi, '<div class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i></div>') ?>
                                                </a>
                                                <a width="20px" class="ml-1"><?php echo anchor('administrator/admin/mutasi/delete/' . $mut->id_mutasi, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>', 'onclick="return confirm(\'Are you sure?\')"') ?>
                                                </a>
                                                <a width="20px" class="ml-1"><?php echo anchor('administrator/admin/mutasi/detail/' . $mut->id_mutasi, '<div class="btn btn-sm btn-primary"><i class="fa fa-user"></i></div>') ?>
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
        let id_jabatan_lama = $('[name=id_jabatan_lama]').val();
        let id_jabatan_baru = $('[name=id_jabatan_baru]').val();
        let id_divisi_lama = $('[name=id_divisi_lama]').val();
        let id_divisi_baru = $('[name=id_divisi_baru]').val();
        let id_pegawai = $('[name=id_pegawai]').val();
        let tgl_efektif_mutasi = $('[name=tgl_efektif_mutasi]').val();

        window.location.href = '<?= base_url('administrator/admin/mutasi/cetak?id_jabatan_lama=') ?>' + id_jabatan_lama +
            '&id_divisi_lama=' + id_divisi_lama +
            '&id_jabatan_baru=' + id_jabatan_baru +
            '&id_divisi_baru=' + id_divisi_baru +
            '&id_pegawai=' + id_pegawai +
            '&tgl_efektif_mutasi=' + tgl_efektif_mutasi;
    }
</script>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- page script -->