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
                        <li class="breadcrumb-item active">Edit Jabatan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card">
            <div class="card-header with-border">
                <div class="float-right">Edit Jabatan</div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('administrator/admin/jabatan/update') ?>" method="POST">
                    <input type="hidden" name="id_jabatan" value="<?= $jabatan->id_jabatan ?>">
                    <input type="hidden" name="old_gaji_jabatan" value="<?= $old_gaji_jabatan ?>">
                    <div class="form-group">
                        <label for="">Nama Jabatan</label>
                        <input type="text" name="nama_jabatan" class="form-control" value="<?= $jabatan->nama_jabatan ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Gaji Jabatan</label>
                        <input type="number" name="gaji_jabatan" class="form-control" value="<?= $jabatan->gaji_jabatan ?>" data-type="currency">
                    </div>
                    <div class="form-group">
                        <label for="">User Type</label>
                        <select name="id_usertype" id="" class="form-control select2-container" style="width: 100%" required>
                            <option value="">Select User Type</option>
                            <?php
                            foreach ($usertype as $ut) {
                                if ($jabatan->id_usertype == $ut->id_usertype)
                                    echo '<option value="' . $ut->id_usertype . '" selected>' . ucfirst($ut->usertype_name) . '</option>';
                                else
                                    echo '<option value="' . $ut->id_usertype . '">' . ucfirst($ut->usertype_name) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Remarks</label>
                        <input type="text" name="remarks" class="form-control" required>
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