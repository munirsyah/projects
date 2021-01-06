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
					<div class="panel-body">  <p style="font-size: 22px;" align="center"> LAPORAN DATA PASIEN KLINIK RESTU MEDIKA </p> </div>
					<tr>
                      <th>ID. Pasien</th>
                      <th>Nama Pasien</th>
                      <th>Jenis Kelamin</th>
                      <th>Tempat & Tanggal Lahir</th>
                      <th>Alamat</th>
                      <th>Golongan Darah</th>
                      <th>No. Telp</th>
                      <th>Aksi</th>
                    </tr>
				</thead>
				<tbody>
					
				<?php foreach($pasien as $value){ ?>
					  <tr>
					  <td><?= $value->id_pasien; ?></td>
                      <td><?= $value->nama_pasien; ?></td>
                      <td><?= $value->jeniskelamin_pasien; ?></td>
                      <td><?= date('d F Y',strtotime($value->tgllahir_pasien)); ?></td>
                      <td><?= $value->alamat_pasien; ?></td>
                      <td><?= $value->goldar_pasien; ?></td>
                      <td><?= $value->notelp_pasien; ?></td>
					  </tr>
				<?php } ?>
					
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>