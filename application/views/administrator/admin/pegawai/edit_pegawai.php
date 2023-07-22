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
                        <li class="breadcrumb-item active">Tambah Pegawai</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card">
            <div class="card-header with-border">
                <div class="float-right">Tambah Pegawai</div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('administrator/admin/pegawai/update') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_pegawai" value="<?= $pegawai->id_pegawai ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Jabatan</label>
                                    <select name="id_jabatan" id="" class="form-control select2-container" style="width: 100%" required>
                                        <option value="">Select Jabatan</option>
                                        <?php
                                        foreach ($jabatan as $jbt) {
                                            if ($pegawai->id_jabatan == $jbt->id_jabatan)
                                                echo '<option value="' . $jbt->id_jabatan . '" selected>' . $jbt->nama_jabatan . '</option>';
                                            else
                                                echo '<option value="' . $jbt->id_jabatan . '">' . $jbt->nama_jabatan . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">NIK Pegawai</label>
                                    <input type="text" name="nik_pegawai" class="form-control" value="<?= $pegawai->nik_pegawai ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir_pegawai" id="" class="form-control" <?= date('d-m-Y', strtotime($pegawai->tgl_lahir_pegawai)) ?>>
                                </div>

                                <div class="form-group">
                                    <label for="">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir_pegawai" class="form-control" value="<?= $pegawai->tempat_lahir_pegawai ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Status Kawin</label>
                                    <select name="status_kawin_pegawai" id="" class="form-control">
                                        <option value="kawin" <?= $pegawai->status_kawin_pegawai == 'kawin' ? 'selected' : '' ?>>Kawin</option>
                                        <option value="belum kawin" <?= $pegawai->status_kawin_pegawai == 'belum kawin' ? 'selected' : '' ?>>Belum Kawin</option>
                                        <option value="janda" <?= $pegawai->status_kawin_pegawai == 'janda' ? 'selected' : '' ?>>Janda</option>
                                        <option value="duda" <?= $pegawai->status_kawin_pegawai == 'duda' ? 'selected' : '' ?>>Duda</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Divisi</label>
                                    <select name="id_divisi" id="" class="form-control select2-container" style="width: 100%" required>
                                        <option value="">Select Divisi</option>
                                        <?php
                                        foreach ($divisi as $div) {
                                            if ($pegawai->id_divisi == $div->id_divisi)
                                                echo '<option value="' . $div->id_divisi . '" selected>' . $div->nama_divisi . '</option>';
                                            else
                                                echo '<option value="' . $div->id_divisi . '">' . $div->nama_divisi . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Nama Pegawai</label>
                                    <input type="text" name="nama_pegawai" class="form-control" value="<?= $pegawai->nama_pegawai ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat_pegawai" class="form-control" value="<?= $pegawai->alamat_pegawai ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Jumlah Tanggungan</label>
                                    <input type="number" name="jml_tanggungan_pegawai" class="form-control" value="<?= $pegawai->jml_tanggungan_pegawai ?>">
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="">Status Aktif</label>
                                        <select name="status_aktif_pegawai" id="" class="form-control">
                                            <option value="1" <?= $pegawai->status_aktif_pegawai == 1 ? 'selected' : '' ?>>Aktif</option>
                                            <option value="0" <?= $pegawai->status_aktif_pegawai == 0 ? 'selected' : '' ?>>Tidak Aktif</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="">Upload Photo</label>
                                        <input type="file" name="photo_pegawai" class="form-control" value="<?= base_url("assets/img/$pegawai->photo_pegawai") ?>">
                                    </div>
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