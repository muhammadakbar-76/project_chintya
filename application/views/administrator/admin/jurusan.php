<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">  -->
 <!-- Load file css jquery-ui -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jurusan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Jurusan</li>
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
              <h3 class="card-title">Daftar Jurusan</h3>
            </div>
              <?php echo $this->session->flashdata('pesan') ?>
              <div class="card-body">
                <?php echo anchor('administrator/admin/jurusan/input','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-mr"></i> Tambah Jurusan </button>') ?>
                <!-- <?php echo anchor('administrator/admin/jurusan/print','<button class="btn btn-sm btn-success mb-3"><i class="fas fa-print"></i> Print </button>') ?> -->
        
        <form method="get" action="">
                <div class="row">
                  <div class="col-2 ">
                    <label>Filter Berdasarkan</label><br>
                    <select name="filter" id="filter" class="form-control custom-select">
                    <option value="">Pilih</option>
                    <option value="1">Per Jurusan</option>
                    <option value="2">Per Kelas</option>
                    </select>
                  </div>

                  <div id="form-jurusan" class="col-3">
                  <label>Jurusan</label>
                  <select name="jurusan" class="form-control custom-select" data-placeholder="-Pilih-" style="width: 100%;">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_jrs as $jr) : ?>
                    <option value="<?php echo $jr->jurusan ?>"><?php echo $jr->jurusan; ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>

                  <div id="form-kelas" class="col-3">
            <label>Kelas</label>
            <select name="kelas" class="form-control custom-select" data-placeholder="-Pilih-" style="width: 100%;">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_kelas as $kl) : ?>
                    <option value="<?php echo $kl->kelas ?>"><?php echo $kl->kelas; ?></option>
                <?php endforeach; ?>
            </select>
           </div>

                </div><br>
                <button type="submit" class="btn btn-sm btn-success mb-4">Tampilkan</button>
                                   
    </form>

          <table id="example1" class="table table-bordered table-striped table-hover">    
                <thead>
                <tr>
                  <th width="20px">NO</th>
                  <th width="49px">NIS</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
                  <th width="1px">Kelas</th>
                  <th width="1px">Semester</th>
                  <th width="100px">Tahun Ajaran</th>
                  <th width="50px">AKSI</th>
                </tr>
                </thead>
                <tbody>               
                <?php
                $no = 1;
                foreach ($tb_jrs as $jr) : ?>
                
                 <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $jr->nis?></td>
                        <td><?php echo $jr->nama_siswa?></td>
                        <td><?php echo $jr->jurusan?></td>
                        <td><?php echo $jr->kelas?></td>
                        <td><?php echo $jr->semester?></td>   
                        <td><?php echo $jr->thn_ajaran?></td>
                        <td class="project-actions text-left">                    
                          <a width="20px"><?php echo anchor('administrator/admin/jurusan/update/'.$jr->id_jrs,'<div class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i></div>') ?>
                        </a>
                          <a width="20px"><?php echo anchor('administrator/admin/jurusan/delete/'.$jr->id_jrs,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?>
                          </a>
                      </td>
                  </tr>
                <?php endforeach ?>
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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
 -->
<script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script>
 <script>
    $(document).ready(function(){
       $('#form-jurusan, #form-kelas').hide();
        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-jurusan, #form-kelas').show(); // Sembunyikan form bulan dan tahun
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-jurusan').hide(); // Sembunyikan form tanggal
                $('#form-kelas').show(); // Tampilkan form bulan dan tahun
            }

            $('#form-jurusan select, #form-kelas select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        });
    });
    </script>


<!-- <script type="text/javascript"> 
    $(document).ready(function() {
    $('#dtablesjurusan').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            },
        ]
    } );
} );
</script> -->