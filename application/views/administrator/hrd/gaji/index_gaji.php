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
                    <h1>Data Gaji</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/hrd/dashboardhrd">Home</a></li>
                        <li class="breadcrumb-item active">Data Gaji</li>
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
                                        foreach ($pegawai as $peg) {
                                            if (!empty($id_pegawai) && $peg->id_pegawai == $id_pegawai)
                                                echo '<option value="' . $peg->id_pegawai . '" selected>' . $peg->nik_pegawai . ' - ' . $peg->nama_pegawai . '</option>';
                                            else
                                                echo '<option value="' . $peg->id_pegawai . '">' . $peg->nik_pegawai . ' - ' . $peg->nama_pegawai . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label for="">Bulan Gajihan</label>
                                    <input type="month" name="bulan_tahun_dibayar" class="form-control" id="" value="<?= empty($bulan_tahun_dibayar) ? null : $bulan_tahun_dibayar ?>">
                                    <!-- <select name="bulan_dibayar" id="bulan_dibayar" class="form-control">
                                        <option value="">Select Bulan</option>
                                        <option value="01" <?= $bulan_dibayar == '01' ? 'selected' : '' ?>>Januari</option>
                                        <option value="02" <?= $bulan_dibayar == '02' ? 'selected' : '' ?>>Februari</option>
                                        <option value="03" <?= $bulan_dibayar == '03' ? 'selected' : '' ?>>Maret</option>
                                        <option value="04" <?= $bulan_dibayar == '04' ? 'selected' : '' ?>>April</option>
                                        <option value="05" <?= $bulan_dibayar == '05' ? 'selected' : '' ?>>Mei</option>
                                        <option value="06" <?= $bulan_dibayar == '06' ? 'selected' : '' ?>>Juni</option>
                                        <option value="07" <?= $bulan_dibayar == '07' ? 'selected' : '' ?>>Juli</option>
                                        <option value="08" <?= $bulan_dibayar == '08' ? 'selected' : '' ?>>Agustus</option>
                                        <option value="09" <?= $bulan_dibayar == '09' ? 'selected' : '' ?>>September</option>
                                        <option value="10" <?= $bulan_dibayar == '10' ? 'selected' : '' ?>>Oktober</option>
                                        <option value="11" <?= $bulan_dibayar == '11' ? 'selected' : '' ?>>November</option>
                                        <option value="12" <?= $bulan_dibayar == '12' ? 'selected' : '' ?>>Desember</option>
                                    </select> -->
                                </div>

                                <!-- <div class="form-group col-3">
                                    <label for="">Tahun Gajihan</label>
                                    <select name="tahun_dibayar" id="tahun_dibayar" class="form-control">
                                        <option value="">Select Tahun</option>
                                        <option value="<?= date('Y', strtotime('-2 year')) ?>" <?= $tahun_dibayar == date('Y', strtotime('-2 year')) ? 'selected' : '' ?>><?= date('Y', strtotime('-2 year')) ?></option>
                                        <option value="<?= date('Y', strtotime('-1 year')) ?>" <?= $tahun_dibayar == date('Y', strtotime('-1 year')) ? 'selected' : '' ?>><?= date('Y', strtotime('-1 year')) ?></option>
                                        <option value="<?= date('Y') ?>" <?= $tahun_dibayar == date('Y') ? 'selected' : '' ?>><?= date('Y') ?></option>
                                        <option value="<?= date('Y', strtotime('+1 year')) ?>" <?= $tahun_dibayar == date('Y', strtotime('+1 year')) ? 'selected' : '' ?>><?= date('Y', strtotime('+1 year')) ?></option>
                                        <option value="<?= date('Y', strtotime('+2 year')) ?>" <?= $tahun_dibayar == date('Y', strtotime('+2 year')) ? 'selected' : '' ?>><?= date('Y', strtotime('+2 year')) ?></option>
                                    </select>
                                </div> -->
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
                        <h3 class="card-title">Daftar Data Gaji</h3>
                    </div>
                    <?php echo $this->session->flashdata('pesan') ?>
                    <div class="card-body">

                        <?php echo anchor('administrator/hrd/gaji/add', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-mr"></i> Tambah </button>') ?>

                        <button type="button" onclick="cetak()" class="btn btn-sm btn-success mb-3"><i class="fas fa-print fa-mr"></i> Laporan </button>

                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Gaji Dibayar</th>
                                    <th>Tanggal</th>
                                    <th width="60px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($gaji as $pg) : ?>
                                    <tr>
                                        <td width="20px"><?php echo $no++ ?></td>
                                        <td><?= $pg->nik_pegawai ?></td>
                                        <td><?= $pg->nama_pegawai ?></td>
                                        <td>Rp. <?= number_format($pg->gaji_dibayar, 0, ',', '.') ?></td>
                                        <td><?= date('d-m-Y', strtotime($pg->tgl_dibayar)) ?></td>
                                        <td class="project-actions text-left">
                                            <div style="display: flex; flex-direction: row">
                                                <a width="20px"><?php echo anchor('administrator/hrd/gaji/view/' . $pg->id_gaji, '<div class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i></div>') ?>
                                                </a>
                                                <a width="20px" class="ml-1"><?php echo anchor('administrator/hrd/gaji/delete/' . $pg->id_gaji, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>', 'onclick="return confirm(\'Are you sure?\')"') ?>
                                                </a>
                                                <a width="20px" class="ml-1"><?php echo anchor('administrator/hrd/gaji/slip/' . $pg->id_gaji, '<div class="btn btn-sm btn-primary"><i class="fa fa-print"></i></div>') ?>
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
        let id_pegawai = $('[name=id_pegawai]').val();
        let bulan_tahun_dibayar = $('[name=bulan_tahun_dibayar]').val();
        let tahun_dibayar = $('[name=tahun_dibayar]').val();

        window.location.href = '<?= base_url('administrator/hrd/gaji/cetak?id_pegawai=') ?>' + id_pegawai +
            '&bulan_tahun_dibayar=' + bulan_tahun_dibayar;
    }
</script>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- page script -->