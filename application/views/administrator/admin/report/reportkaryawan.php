<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Laporan Data Karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Laporan Data Karyawan</li>
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
              <h3 class="card-title">Daftar Data gaji </h3>
            </div>
            <?php echo $this->session->flashdata('pesan') ?>
              <div class="card-body">
              <form method="post" action="<?php echo base_url('administrator/report/reportkaryawan/print') ?>">
                 <div class="row mb-3">
                 <div class="col-sm-12"><h3><small>Filter Berdasarkan</small></h3></div>
                 <div class="col-sm-3">
                 <div class="form-group">
                  <select name="filter" id="filter" class="form-control custom-select">
                    <option value="0">Pilih</option>                    
                    <option value="1">Golongan</option>
                   
                   
                    </select>
              </div>
          </div>

       

       

          <div id="form-golongan" class="col-sm-1">
          <div class="form-group">
              
                <select class="form-control custom-select" name="golongan">
                
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_karyawan as $tp) : ?>
                    <option value="<?php echo $tp->golongan ?>"><?php echo $tp->golongan; ?></option>
                  <?php endforeach; ?>
                </select>
                <?php echo form_error('golongan','<div class="text-danger small" ml-3>') ?>
              </div>
              </div>
        

          <div class="col-sm-2" >
              <button type="submit" class="btn btn-success"><i class="fas fa-print"></i> Print</button>
          </div>
      </div>

    </form>
         
              <table id="example1" class="table table-bordered table-striped table-hover">           
                <thead>
                <tr align="center">
                <th>NO</th>
                <th>ID Karyawan</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Posisi</th>
                  <th>Alamat</th>   
                  <th>Masa kerja</th>    
                  <th>golongan</th> 
                  <th>status</th>                     
                </tr>
                </thead>
                <tbody>               
                <?php
                $no = 1;
                foreach ($tb_karyawan as $pg) : ?>
                 <tr align="center">
                 <td width="20px"><?php echo $no++ ?></td>
                 <td><?php echo $pg->id_karyawan?></td>
                      <td><?php echo $pg->nama_karyawan?></td>
                      <td><?php echo $pg->jk?></td>
                      <td><?php echo $pg->posisi?></td>
                      <td><?php echo $pg->alamat?></td>
                      <td><?php echo $pg->masa_kerja?></td>
                      <td><?php echo $pg->golongan?></td>
                      <td><?php echo $pg->status?></td>            
                      
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
      $('#form-golongan').hide();
    $('#filter').change(function() {
      if ($(this).val() == '0') { // Jika filter nya 1 (per tanggal)
        $(' #form-golongan  ').hide(); // Sembunyikan form tanggal
      } else if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
        $('#form-golongan').show(); // Tampilkan form golongan dan harga
     
      } else if ($(this).val() == '2') { // Jika filter nya 2 (per golongan)
        $('#form-golongan').show(); // Tampilkan form golongan dan harga
      }

      $('#form-golongan select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        });
    });
    </script>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- page script -->
