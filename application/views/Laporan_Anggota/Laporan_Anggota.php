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

	<p align="left">Dicetak pada: <?php echo date("d-m-Y") ?></p><br>

	 <table class="table table-bordered table-striped">
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Nama</th>
          <th class="text-center">NIK</th>
          <th class="text-center">Tanggal Lahir</th>
          <th class="text-center">Tempat Lahir</th>
          <th class="text-center">Pekerjaan</th>
          <th class="text-center">Jenis Kelamin</th>
          <th class="text-center">No.Telpon</th>
          <th class="text-center">Tanggal Masuk</th>
          <th class="text-center">Status</th>
        </tr>

        <?php 
        $no = 1;
        foreach ($anggota as $ang) : ?>

        <tr>
          <td class="text-center"><?php echo $no++ ?></td>
          <td class="text-center"><?php echo $ang->nama_anggota ?></td>
          <td class="text-center"><?php echo $ang->nik ?></td>
          <td class="text-center"><?php echo $ang->tgl_lahir ?></td>
          <td class="text-center"><?php echo $ang->tempat_lahir ?></td>
          <td class="text-center"><?php echo $ang->pekerjaan ?></td>
          <td class="text-center"><?php echo $ang->jenis_kelamin ?></td>
          <td class="text-center"><?php echo $ang->no_telpon ?></td>
          <td class="text-center"><?php echo $ang->tgl_masuk ?></td>
          <td class="text-center">
          <?php
          if($ang->status == 'Aktif') { ?>
          <span class="badge alert-info"><?php echo $ang->status ?></span>
          <?php } else { ?>
          <span class="badge alert-warning"><?php echo $ang->status ?></span>
           <?php } ?>
          </td>
        </tr>

      <?php endforeach ?>

      </table>

</body>
</html>
