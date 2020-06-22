<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Jurusan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/admin/dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Tambah Jurusan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
           <form method="post" action="<?php echo base_url('administrator/admin/jurusan/input_aksi') ?>">
            <div class="card-body">
                <div class="form-group">
                <label for="inputStatus">NIS</label>
                <select name="nis" class="form-control select2bs4" data-placeholder="-Pilih-" style="width: 100%;" id="nis">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_siswa as $sw) : ?>
                    <option value="<?php echo $sw->nis ?>" nama_siswa="<?php echo $sw->nama_siswa?>"><?php echo $sw->nis; ?></option>
                <?php endforeach; ?>
                </select>
                <?php echo form_error('nis','<div class="text-danger small" ml-3>') ?>
              </div>

               
              <div class="form-group">
                <label for="inputStatus">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" id="nama" value="" readonly>

<!--                 <?php
                if($tb_siswa->nis = 7173){ ?>
                  <input type="text" name="nama_siswa" class="form-control" id="nama" readonly value="<?= $tb_siswa->nama ?>">
                
                 <?php } ?> -->
                <!-- <select name="nama_siswa" class="form-control custom-select" id="nama" data-placeholder="-Pilih-" style="width: 100%;">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_siswa as $sw) : ?>
                    <option value="<?php echo $sw->nama_siswa ?>"><?php echo $sw->nama_siswa; ?></option>
                <?php endforeach; ?>
                </select> -->
                <?php echo form_error('nama_siswa','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Jurusan</label>
                <select name="jurusan" class="form-control custom-select" data-placeholder="-Pilih-" style="width: 100%;">
                  <option selected read-only>-Pilih-</option>
                  <?php foreach ($tb_tambahjurusan as $sw) : ?>
                    <option value="<?php echo $sw->jurusan ?>"><?php echo $sw->jurusan; ?></option>
                <?php endforeach; ?>
                </select>
                <?php echo form_error('jurusan','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
                <label for="inputStatus">Kelas</label>
                <select name="kelas" class="form-control custom-select" data-placeholder="-Pilih-" style="width: 100%;">
                  <option selected disabled>-Pilih-</option>
                  <?php foreach ($tb_kelas as $kl) : ?>
                    <option value="<?php echo $kl->kelas ?>"><?php echo $kl->kelas; ?></option>
                <?php endforeach; ?>
                </select>
                <?php echo form_error('kelas','<div class="text-danger small" ml-3>') ?>
              </div>

               <div class="form-group">
                <label for="inputName">Semester</label>
                <select class="form-control custom-select" name="semester">
                  <option selected disabled>-Pilih-</option>
                  <option>Ganjil</option>
                  <option>Genap</option>
                </select>
                <?php echo form_error('semester','<div class="text-danger small" ml-3>') ?>
              </div>

              <div class="form-group">
              <label for="inputName">Tahun Ajaran</label>
                <input type="text" name="thn_ajaran" class="form-control" data-inputmask='"mask": "2099/2099"' data-mask>
                <?php echo form_error('thn_ajaran','<div class="text-danger small" ml-3>') ?>
              </div>


            </div>
          
      </div>
      <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    <?php echo anchor('administrator/admin/jurusan','<div class="btn mb-5 btn-primary">Kembali</div>') ?>
       
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

<script type="text/javascript">
  $(document).ready(function(){
    $("#nis").on("change", function(){
      var nama_siswa = $("#nis option:selected").attr("nama_siswa");
      $("#nama").val(nama_siswa);
    });
  });

</script>

<!-- <script>
$(document).ready(function(){
    $(document).on('change','#select', function(){
        var nis = $(this).data('nis');
        var name = $(this).data('name');
        //memasukkan data pada field-field terkait
        $('#nis').val(nis);
        $('#name').val(name);
        // agar modal/pop-up barcode langsung tertutup setelah klik select
    })
})
</script> -->

<!-- <script type="text/javascript">
 $(document).ready(function(){
    $( "#nis" ).change(function() {
      // let item_id = $(this).data('id_siswa')
      var selectedOption = $(this).find(":selected").val();
      $('#nama_siswa').val(selectedOption).text;

    });
});
</script> -->

 <!-- <script type="text/javascript">
        $(document).ready(function(){
 
            $('#nis').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('jurusan/get_by_id');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<input type="text" name="nama_siswa" class="form-control" id="nama" value="+data[i].category_id+'>'+data[i].nama_siswa+" readonly>';
                        }
                        $('#nama').html(html);
 
                    }
                });
                return false;
            }); 
             
        });
    </script>
 -->