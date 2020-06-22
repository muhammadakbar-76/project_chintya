<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>Cetak Data Filter</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
 <div class="container">
  
  <div class="row">
   <div class="col-md-3">
    <form action="" id="FormLaporan">
     <select name="" id="jurusan" class="form-control">
      <option value="">Show All</option>
      <?php foreach ($tb_tambahjurusan as $row): ?>
       <option value="<?php echo $row->jurusan ?>"><?php echo $row->jurusan ?></option>
      <?php endforeach; ?>
     </select>
     <br>
     <button type="submit" class="btn btn-primary">Show Data</button>
    </form>
   </div>
   <div class="col-md-9">
    <div id="result"></div>
   </div>
  </div>
 </div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script>
  $(document).ready(function() {
   $("#FormLaporan").submit(function(e) {
    e.preventDefault();
    var id = $("#jurusan").val();
    // console.log(id);
    var url = "<?php echo site_url('Laporanjurusan/filter/') ?>" + id;
    $('#result').load(url);
   })
  });
 </script>
</body>
</html>