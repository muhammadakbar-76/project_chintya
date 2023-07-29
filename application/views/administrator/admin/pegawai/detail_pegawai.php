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
                        <li class="breadcrumb-item active">Detail Pegawai</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title"><?= $pegawai->nama_pegawai ?></div>
                        </div>
                        <div class="card-body">
                            <div style="display: flex; border-bottom: 1px solid gray; padding-bottom: 20px">
                                <img src="<?= !empty($pegawai->photo_pegawai) ? base_url("assets/img/$pegawai->photo_pegawai") : base_url("assets/img/person-dummy.jpg") ?>" alt="" height="200px" width="200px" style="margin: auto">
                            </div>
                            <table style="margin-top: 10px;">
                                <tbody>
                                    <tr>
                                        <td>NIK</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td><?= $pegawai->nik_pegawai ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td><?= $pegawai->nama_pegawai ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td><?= $pegawai->nama_jabatan ?></td>
                                    </tr>
                                    <tr>
                                        <td>Divisi</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td><?= $pegawai->nama_divisi ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
    </section>
</div>