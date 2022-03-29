<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laporan Anggota</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style>
	.line-title {
		border: 0;
		border-style: inset;
		border-top: 1px solid #000;
	}
</style>

</head>
<body>

	<img src="assets/img/Logo LampTeng.png" style="position: absolute; width: 60px; height: auto;">

	<table style="width: 100%;">
		<tr>
			<td align="center">
				<span style="line-height: 1.5; font-weight: bold;">
					PEMERINTAH KABUPATEN LAMPUNG TENGAH
					<br>KECAMATAN BUMI RATU NUBAN
					<br>KAMPUNG WATES
				</span>
				<span style="line-height: 1.5;">
					<br>Jl. Pemuda No. 01 Kampung Wates Kecamatan Bumi Ratu Nuban Kode Pos 34161
				</span>
			</td>
		</tr>
    
	</table>

	<hr class="line-title">

	<p align="center" style="font-weight: bold;">LAPORAN DATA ANGGOTA KOPERASI MULYA ABADI SENTOSA</p><br>

	 <table class="table table-bordered table-striped">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>NIK</th>
          <th>Tanggal Lahir</th>
          <th>Tempat Lahir</th>
          <th>Pekerjaan</th>
          <th>Jenis Kelamin</th>
          <th>No.Telpon</th>
          <th>Tanggal Masuk</th>
          <th>Status</th>
        </tr>

        <?php 
        $no = 1;
        foreach ($anggota as $ang) : ?>

        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $ang->nama_anggota ?></td>
          <td><?php echo $ang->nik ?></td>
          <td><?php echo $ang->tgl_lahir ?></td>
          <td><?php echo $ang->tempat_lahir ?></td>
          <td><?php echo $ang->pekerjaan ?></td>
          <td><?php echo $ang->jenis_kelamin ?></td>
          <td><?php echo $ang->no_telpon ?></td>
          <td><?php echo $ang->tgl_masuk ?></td>
          <td><?php echo $ang->status ?></td>
        </tr>

      <?php endforeach ?>

      </table>

</body>
</html>
