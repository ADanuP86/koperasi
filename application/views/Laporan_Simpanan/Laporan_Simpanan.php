<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laporan Simpanan</title>

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

	<p align="center" style="font-weight: bold;">LAPORAN DATA SIMPANAN KOPERASI MULYA ABADI SENTOSA</p><br>

	<p align="left">Dicetak pada: <?php echo date("d-m-Y") ?></p><br>

	 <table class="table table-bordered table-striped">
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Tanggal Simpanan</th>
          <th class="text-center">Nama Simpanan</th>
          <th class="text-center">Nama Anggota</th>
		  <th class="text-center">Status</th>
          <th class="text-center">Nama Admin</th>
		  <th class="text-center">Besar Simpanan</th>
        </tr>

        <?php
		$total_besarsimpanan = 0;
        $no = 1;
		if(empty($sim)) { // Jika data tidak ada
			echo "<tr><td colspan='7'>Data tidak ada</td></tr>";
		}
		else { 
        foreach ($sim as $s) { 
		$besar_simpanan[] = $s->besar_simpanan; $total_besarsimpanan = array_sum($besar_simpanan);
		?>

        <tr>
          <td class="text-center"><?php echo $no++ ?></td>
          <td class="text-center"><?php echo dateindo($s->tgl_simpan) ?></td>
          <td class="text-center"><?php echo $s->nama_simpanan ?></td>
          <td class="text-center"><?php echo $s->nama_anggota ?></td>
		  <td class="text-center">
          <?php
          if($s->status == 'Aktif') { ?>
          <span class="badge alert-info"><?php echo $s->status ?></span>
          <?php } else { ?>
          <span class="badge alert-warning"><?php echo $s->status ?></span>
           <?php } ?>
          </td>
          <td class="text-center"><?php echo $s->nama_admin ?></td>
		  <td class="text-center"><?php echo rupiah($s->besar_simpanan) ?></td>
        </tr>

      <?php } } ?>
	  <tr>
      <th class="text-center" colspan="6">Total Simpanan</th>
      <th class="text-center"><?php echo rupiah($total_besarsimpanan) ?></th>
     </tr>
      </table>

	<p style="float:right; text-align:center"> <br>
      Wates, <?php echo date("d-m-Y") ?> <br>
      Kepala Kampung <br> <br> <br> <br> <br>
      ( &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; )
    </p>

</body>
</html>
