<!DOCTYPE html>
<html>
<head>
	<title>Cetak Data Pasien</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url('assets2/health-512.ico'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css'); ?>">
</head>
<body onload="window.print()">
	<div class="panel">
		<div class="panel-body">
			<table class="table table-responsive table-hover table-striped">
				<thead>
					<div class="panel-body">  <p style="font-size: 22px;" align="center"> LAPORAN DATA PASIEN BEROBAT KLINIK RESTU MEDIKA </p> </div>
					<tr>
                      <th>No</th>
                      <th>Nama Pasien</th>
                      <th>Nama Dokter</th>
                      <th>Poli</th>
                      <th>Tanggal Berobat</th>
                      <th>Alamat</th>
                      
                    </tr>
				</thead>
				<tbody>
					
				<?php 
				$no=1;
				foreach($pasien as $row){ 
					
					

					?>
					  <tr>
					 	<th><?php echo $no ?></th>
					 	 <td><?php echo $row->nama_pasien; ?></td>
					 	 <td><?php echo $row->nama_dokter; ?></td>
					 	  <td><?php echo $row->spesialis_dokter; ?></td>
					 	 <td><?php echo $row->tgl_berobat; ?></td>
					 	 <td><?php echo $row->alamat_pasien; ?></td>
					  </tr>
				<?php $no++;} ?>
					
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>