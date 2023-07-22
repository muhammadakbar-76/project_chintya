<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="<?php echo base_url() ?>assets/img/-.jpg">
	<title>Laporan Data Promosi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  	<style type="text/css">
  		table tr td,
  		table tr th{
  			font-size: 10pt;
  		}
  	</style>

	<style>
		.line-title{
			border: 0;
			border-style: inset;
			border-top: 1px solid #000;
		}
	</style>

	<style>
	#customers {
  		font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  		border-collapse: collapse;
  		width: 100%;
	}

	#customers td, #customers th {
  	border: 1px solid #ddd;
  	padding: 8px;
	}

	#customers tr:nth-child(even){background-color: #f2f2f2;}

	#customers tr:hover {background-color: #ddd;}

	#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>	
<img src="assets/img/2.png" style="position: absolute; width: 60px; height: auto;"> 
           <table style="width: 105%;">
			<tr>
			<td align="center">
			<h1>PT BASIRIH</h1>
			
				
			</tr>
		</table><br>
		<hr class="line-title">
		<p align="center">
			<strong>LAPORAN DATA Promosi</strong>
		</p>
		
        <table id="customers" class="table table-bordered">
			 <thead>
			 <tr align="center">			
             <th>NO</th>
		
                  <th>ID promosi</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Posisi Terakhir</th>
                  <th>Posisi Baru</th>
                 
                      
                </tr>
              </thead>
              <tbody>
			  <?php
                $no = 1;
                foreach ($tb_promosi as $pg) : ?>
                 <tr align="center">
                 <td width="20px"><?php echo $no++ ?></td>
				 <td><?php echo $pg->id_promosi?></td>
                      <td><?php echo $pg->id_karyawan?></td>
                      <td><?php echo $pg->nama_karyawan?></td>
                      <td><?php echo $pg->posisi?></td>
                      <td><?php echo $pg->posisi1?></td>
                   
                     
                  </tr>
                  
                <?php endforeach; ?>
	</tbody>
       </table><br>
	   <table width="30%" align="left" border="0">
		<tr>
			<td width="50%"></td>
			<td align="center"><h3><br>Yang Bersangkutan,<br><br><br><br><br>...............................<br>________________<br><strong>NIP.........................</strong></h3></td>
		</tr>
	   <table width="30%" align="right" border="0">
		<tr>
			<td width="10%"></td>
			<td align="center"><h3>Banjarmasin,<?php echo date('d/m/Y'); ?><br>Yang Menerima,<br><br><br><br><br>...............................<br>________________<br><strong>NIP.........................</strong></h3></td>
		</tr>
	</table>


<!-- page script -->
</body>
</html>