<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Mutasi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card">
            <div class="card-header with-border">
                <div class="float-right">Tambah Mutasi</div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('administrator/admin/mutasi/save') ?>" method="POST">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Pegawai</label>
                                    <select name="id_pegawai" id="" class="form-control select2" style="width: 100%" required>
                                        <option value="">Select Pegawai</option>
                                        <?php
                                        foreach ($pegawai as $pg) {
                                            echo '<option value="' . $pg->id_pegawai . '">' . $pg->nama_pegawai . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Jabatan Baru</label>
                                    <select name="id_jabatan_baru" id="" class="form-control select2-container" style="width: 100%" required>
                                        <option value="">Select Jabatan Baru</option>
                                        <?php
                                        foreach ($jabatan as $jbt) {
                                            echo '<option value="' . $jbt->id_jabatan . '">' . $jbt->nama_jabatan . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Divisi Baru</label>
                                    <select name="id_divisi_baru" id="" class="form-control select2-container" style="width: 100%" required>
                                        <option value="">Select Divisi Baru</option>
                                        <?php
                                        foreach ($divisi as $div) {
                                            echo '<option value="' . $div->id_divisi . '">' . $div->nama_divisi . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Efektif Mutasi</label>
                                    <input type="date" name="tgl_efektif_mutasi" id="" class="form-control">
                                </div>
                            </div>

                        </div>
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