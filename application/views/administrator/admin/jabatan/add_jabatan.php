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
                        <li class="breadcrumb-item active">Tambah Jabatan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card">
            <div class="card-header with-border">
                <div class="float-right">Tambah Jabatan</div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('administrator/admin/jabatan/save') ?>" method="POST">
                    <div class="form-group">
                        <label for="">Nama Jabatan</label>
                        <input type="text" name="nama_jabatan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Gaji Jabatan</label>
                        <input type="number" name="gaji_jabatan" class="form-control" data-type="currency">
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