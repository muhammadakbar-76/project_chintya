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
                        <li class="breadcrumb-item active">Tambah Divisi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card">
            <div class="card-header with-border">
                <div class="float-right">Tambah Divisi</div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <form action="<?= base_url('administrator/admin/divisi/save') ?>" method="POST">
                        <label for="">Nama Divisi</label>
                        <input type="text" name="nama_divisi" class="form-control">
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