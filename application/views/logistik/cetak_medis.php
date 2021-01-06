<!DOCTYPE html>
<html>
<head>
	<title>Cetak Item Medis Non Obat</title>
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
					<div class="panel-body">  <p style="font-size: 22px;" align="center"> LAPORAN DATA BARANG JENIS MEDIS NON OBAT  </p> </div>
					<tr>
						<th>ID. Item Medis</th>
						<th>Nama Item Medis</th>
						<th>Kuantitas Item Medis</th>
						<th>Tanggal Kadaluarsa</th>
						<th>Harga Jual (Rp)</th>
					</tr>
				</thead>
				<tbody>
					
					<?php foreach($medis as $value){ ?>
						<tr>
							<td><?= $value->id_item_medis ?></td>
							<td><?= $value->nama_item_medis ?></td>
							<td><?= $value->kuantitas_item_medis ?></td>
							<td><?= date('d F Y', strtotime($value->tanggal_kadaluarsa_item_medis)) ?></td>
							<td><?= $value->harga_jual_item_medis ?></td>
						</tr>
					<?php } ?>
					
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>