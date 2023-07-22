<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Laporan Penilaian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Laporan Penilaian</li>
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
              <h3 class="card-title">Daftar Data Penilaian </h3>
            </div>
            <?php echo $this->session->flashdata('pesan') ?>
              <div class="card-body">
              <form method="post" action="<?php echo base_url('administrator/report/reportpenilaian/print') ?>">
                 <div class="row mb-3">
                 <div class="col-sm-12"><h3><small>Filter Berdasarkan</small></h3></div>
                 <div class="col-sm-3">
                 <div class="form-group">
                  <select name="filter" id="filter" class="form-control custom-select">
                    <option value="0">Pilih</option>                    
                    <option value="1">keterangan</option>
                   
                   
                    </select>
              </div>
          </div>

       

       

          <div id="form-keterangan" class="col-sm-1">
          <div class="form-group">
              
                <select class="form-control custom-select" name="keterangan">
                
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_penilaian as $tp) : ?>
                    <option value="<?php echo $tp->keterangan ?>"><?php echo $tp->keterangan; ?></option>
                  <?php endforeach; ?>
                </select>
                <?php echo form_error('keterangan','<div class="text-danger small" ml-3>') ?>
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
            
                  <th>Nama </th>    
                  <th>Nama Penilai </th>              
                  <th>Orientasi Pelayanan</th>
                  <th>Integritas</th>
                  <th>Kerjasama</th>
                  <th>Komitmen</th>
                  <th>Nilai</th>
                  <th>Keterangan</th>   

                </tr>
                </thead>
                <tbody>               
                <?php
                $no = 1;
                foreach ($tb_penilaian as $pn) : ?>
                 <tr align="center">
                 <td width="20px"><?php echo $no++ ?></td>
                 <td><?php echo $pn->nama_karyawan?></td>
                 <td><?php echo $pn->nama_pimpinan?></td>
                      <td><?php echo $pn->orientasi?></td>
                      <td><?php echo $pn->disiplin?></td>
                      <td><?php echo $pn->kerjasama?></td>
                      <td><?php echo $pn->komitmen?></td>
                      <td><?php echo $pn->nilai?></td>                       
                      <td><?php echo $pn->keterangan?></td> 
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
      $('#form-keterangan').hide();
    $('#filter').change(function() {
      if ($(this).val() == '0') { // Jika filter nya 1 (per tanggal)
        $(' #form-keterangan  ').hide(); // Sembunyikan form tanggal
      } else if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
        $('#form-keterangan').show(); // Tampilkan form keterangan dan harga
     
      } else if ($(this).val() == '2') { // Jika filter nya 2 (per keterangan)
        $('#form-keterangan').show(); // Tampilkan form keterangan dan harga
      }

      $('#form-keterangan select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        });
    });
    </script>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- page script -->
