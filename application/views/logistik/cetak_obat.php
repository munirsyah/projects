<!DOCTYPE html>
<html>
<head>
	<title>Cetak Obat</title>
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
					<div class="panel-body">  <p style="font-size: 22px;" align="center"> LAPORAN DATA BARANG JENIS OBAT  </p> </div>
					<tr>
						<th>ID. Obat</th>
						<th>Nama Obat</th>
						<th>Jenis Obat</th>
						<th>Tanggal Kadaluarsa</th>
						<th>Harga Jual (Rp)</th>
						<th>Satuan</th>
						<th>Stok</th>
					</tr>
				</thead>
				<tbody>
					
					<?php foreach($obat as $value){ ?>
						<tr>
						<td><?= $value->id_obat ?></td>
						<td><?= $value->nama_obat ?></td>
						<td><?= $value->jenis_obat ?></td>
						<td><?= date('d F Y', strtotime($value->tglkadaluarsa_obat)) ?></td>
						<td><?= $value->satuan ?></td>
						<td><?= $value->hargajual_obat ?></td>
						<td><?= $value->stok_obat ?></td>
						</tr>
					<?php } ?>
					
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>