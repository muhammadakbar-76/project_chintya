<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/hrd/dashboardhrd">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Gaji</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card">
            <div class="card-header with-border">
                <div class="float-right">Tambah Gaji</div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('administrator/hrd/gaji/save') ?>" method="POST">
                    <div class="form-group col-12">
                        <label for="">Pegawai</label>
                        <select name="id_pegawai" id="" class="form-control select2" style="width: 100%" required>
                            <option value="">Select Pegawai</option>
                            <?php
                            foreach ($pegawai as $pg) {
                                echo '<option value="' . $pg->id_pegawai . '">' . $pg->nik_pegawai . ' - ' . $pg->nama_pegawai . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <label for="">Tanggal Dibayar</label>
                        <input type="date" name="tgl_dibayar" id="" class="form-control" required>
                    </div>
            </div>
            <div class="card-footer float-right">
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                <button type="button" class="btn btn-sm btn-secondary" onclick="history.back()">Kembali</button>
                </form>
            </div>
        </div>
    </section>

</div>