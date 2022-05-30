<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laporan Pinjaman</title>

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

	<p align="center" style="font-weight: bold;">LAPORAN DATA PINJAMAN dan ANGSURAN KOPERASI MULYA ABADI SENTOSA</p><br>

  <p align="left">Dicetak pada: <?php echo date("d-m-Y") ?></p><br>

  <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Tanggal Pinjaman</th>
          <th class="text-center">Tanggal Angsuran</th>
          <!--<th class="text-center">Jasa (%)</th>-->
          <th class="text-center">Jumlah Angsur (x)</th>
          <th class="text-center">Angsuran Ke-</th>
          <th class="text-center">Lama Angsur (bulan)</th>
          <th class="text-center">Tanggal Tempo</th>
          <th class="text-center">Nama Anggota</th>
          <th class="text-center">Nama Admin</th>
          <!--<th class="text-center">Status</th>-->
          <th class="text-center">Besar Angsuran</th>
          <!--<th class="text-center">Besar Pinjaman</th>-->
        </tr>
        </thead>

        <tbody>

        <?php
        $total_besarpinjaman = 0;
        $total_besarangsuran = 0;
        $no = 1;
        if(empty($koperasi)) { // Jika data tidak ada
          echo "<tr><td colspan='10'>Data tidak ada</td></tr>";
        }
        else {
        foreach ($koperasi as $kpr) { 
        
          $besar_pinjaman[] = $kpr->besar_pinjaman; $total_besarpinjaman = $kpr->besar_pinjaman+$kpr->besar_pinjaman/100*$kpr->jasa;
          $besar_angsuran[] = $kpr->besar_angsuran; $total_besarangsuran = array_sum($besar_angsuran)
        //$besar_pinjaman[] = $kpr->besar_pinjaman; $total_besarpinjaman = array_sum($besar_pinjaman);
        
        ?>

        <tr>
          <td class="text-center"><?php echo $no++ ?></td>
          <td class="text-center"><?php echo dateindo($kpr->tgl_pinjam) ?></td>
          <td class="text-center"><?php echo dateindo($kpr->tgl_angsur) ?></td>
          <!--<td class="text-center"><?php echo $kpr->jasa ?></td>-->
          <td class="text-center"><?php echo $kpr->jumlah_angsur ?></td>
          <td class="text-center"><?php echo $kpr->angsuran_ke ?></td>
          <td class="text-center"><?php echo $kpr->lama_angsur ?></td>
          <td class="text-center"><?php echo dateindo($kpr->tgl_tempo) ?></td>
          <td class="text-center"><?php echo $kpr->nama_anggota ?></td>
          <td class="text-center"><?php echo $kpr->nama_admin ?></td>
          <!--<td class="text-center">
          <?php
          if($kpr->status_pinjaman == 'Lunas') { ?>
            <span class="badge alert-info"><?php echo $kpr->status_pinjaman ?></span>
          <?php } else { ?>
            <span class="badge alert-warning"><?php echo $kpr->status_pinjaman ?></span>
          <?php } ?>
          </td>-->
          <td class="text-center"><?php echo rupiah($kpr->besar_angsuran) ?></td>
          <!--<td class="text-center"><?php echo rupiah($kpr->besar_pinjaman) ?></td>-->
        </tr>

      <?php } } ?>
      <tr>
      <th class="text-center" colspan="9">Total Angsuran</th>
      <th class="text-center"><?php echo rupiah($total_besarangsuran) ?></th>
     </tr>
      <tr>
      <th class="text-center" colspan="9">Total Pinjaman</th>
      <th class="text-center"><?php echo rupiah($total_besarpinjaman) ?></th>
     </tr>
        </tbody>
      </table>

    <p style="float:right; text-align:center"> <br>
      Wates, <?php echo date("d-m-Y") ?> <br>
      Kepala Kampung <br> <br> <br> <br> <br>
      ( &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; )
    </p>

</body>
</html>
