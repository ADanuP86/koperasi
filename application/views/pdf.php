<!DOCTYPE html>
<html><head>
	<title></title>
</head><body>

	<h1 style="text-align:center;">Laporan Data Mahsiswa</h1>

	<table align="center"border="1" style="text-align:center;">
		<tr>
			<td>NO</td>
			<td>Nama</td>
			<td>NPM</td>
			<td>Prodi</td>
			<td>Alamat</td>
		</tr>

		<?php 
		$no = 1;
		foreach ($mahasiswa as $mhs) : ?>
		
		<tr>
    		<td><?php echo $no++ ?></td>
    		<td><?php echo $mhs->nama ?></td>
    		<td><?php echo $mhs->npm ?></td>
    		<td><?php echo $mhs->prodi ?></td>
    		<td><?php echo $mhs->alamat ?></td>
    	</tr>

    <?php endforeach; ?>
    
	</table>

</body></html>
