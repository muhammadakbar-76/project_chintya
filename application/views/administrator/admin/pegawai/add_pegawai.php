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
                <form action="<?= base_url('administrator/admin/pegawai/save') ?>" method="POST" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Jabatan</label>
                                    <select name="id_jabatan" id="" class="form-control select2-container" style="width: 100%" required>
                                        <option value="">Select Jabatan</option>
                                        <?php
                                        foreach ($jabatan as $jbt) {
                                            echo '<option value="' . $jbt->id_jabatan . '">' . $jbt->nama_jabatan . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">NIK Pegawai</label>
                                    <input type="text" name="nik_pegawai" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir_pegawai" id="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir_pegawai" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Status Kawin</label>
                                    <select name="status_kawin_pegawai" id="" class="form-control">
                                        <option value="kawin">Kawin</option>
                                        <option value="belum kawin">Belum Kawin</option>
                                        <option value="janda">Janda</option>
                                        <option value="duda">Duda</option>
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
                                            echo '<option value="' . $div->id_divisi . '">' . $div->nama_divisi . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Nama Pegawai</label>
                                    <input type="text" name="nama_pegawai" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat_pegawai" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Jumlah Tanggungan</label>
                                    <input type="number" name="jml_tanggungan_pegawai" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Upload Photo</label>
                                    <input type="file" name="photo_pegawai" class="form-control">
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