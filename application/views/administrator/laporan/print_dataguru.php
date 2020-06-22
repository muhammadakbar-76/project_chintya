<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="<?php echo base_url() ?>assets/img/download.jpg">
	<title>Laporan Jurusan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>	
           <img src="assets/img/download.jpg" style="position: absolute; width: 115px; height: auto;"> 
           <table style="width: 105%;">
			<tr>
				<td align="center">
					<small>PEMERINTAH KOTA BANJARMASIN DINAS PENDIDIKAN</small><br>
					<p><h1>SMK UNGGULAN HUSADA BANJARMASIN</h1>
					Alamat : <small>Jl. Pangeran Hidayatullah, RT.14, Sungai Jingah, Kec. Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70122</small></p>
				</td>
			</tr>
			
		</table><br>
		<hr class="line-title">
		<p align="center">
			<strong>LAPORAN JURUSAN</strong>
		</p>
		<small>
        <table id="customers" class="table table-bordered">
			 <tr>
                  <th>NO</th>
                  <th>NIP</th>
                  <th>Nama Guru</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Agama</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>No Telp</th>
                  <th>Foto</th>
                </tr>
                <?php
                $no = 1;
                foreach ($tb_guru as $dtg) : ?>
 				<tr>
                      <td width="20px"><?php echo $no++ ?></td>
                      <td><?php echo $dtg->nip?></td>
                      <td><?php echo $dtg->nama_guru?></td>
                      <td><?php echo $dtg->tempat_lahir?></td>
                      <td><?php echo $dtg->tgl_lahir?></td>
                      <td><?php echo $dtg->agama?></td>
                      <td><?php echo $dtg->jenis_kelamin?></td>
                      <td><?php echo $dtg->alamat?></td>
                      <td><?php echo $dtg->telp?></td>
                      <td><img src="../assets/img/.$dtg->foto'"></td>
			</tr>                     
		<?php endforeach ?>
		</tfoot>
       </table></small><br>
	<!-- <table width="50%" align="right" border="0">
		<tr>
			<td width="50%"></td>
			<td align="center"><small>Banjarmasin,<?php echo date('d/m/Y'); ?></small><br><small>Kepala Sekolah</small><br><br><br><br>.....................<br>________________<br><strong><small>NIP...............</small></strong></td>
		</tr>
	</table> -->


<!-- page script -->
</body>
</html>