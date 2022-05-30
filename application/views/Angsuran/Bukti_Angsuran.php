<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bukti Angsuran</title>

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

	<p align="center" style="font-weight: bold;">BUKTI ANGSURAN ANGGOTA KOPERASI MULYA ABADI SENTOSA</p><br><br><br>

    <p style="float:left;">Yang bertanda tangan dibawah ini:</p> <br> <br>

    <table border="0">

        <?php 
        foreach ($angsuran as $a) : 
		$besar_pinjaman[] = $a->besar_pinjaman; $total_besarpinjaman = $a->besar_pinjaman+$a->besar_pinjaman/100*$a->jasa
		?>

        <tr>
          <td>Nama				: <?php echo $a->nama_anggota ?></td>
        </tr>
        <tr>
          <td>Jabatan			: <?php echo $a->pekerjaan ?></td>
        </tr>
        <tr>
          <td>Alamat			: <?php echo $a->alamat ?></td>
        </tr>
		<tr>
          <td>Tanggal Pinjaman	: <?php echo dateindo($a->tgl_pinjam) ?></td>
        </tr>
		<tr>
          <td>Total Pinjaman	: <?php echo rupiah($total_besarpinjaman) ?></td>
        </tr>

		<p style="float:right; text-align:center">
      Wates, <?php echo dateindo($a->tgl_angsur) ?> <br>
      Petugas <br> <br> <br> <br> <br>
      ( &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; )
    </p> <br> <br> <br>

      <p style="float:left;">Melakukan Angsuran Pinjaman Uang Koperasi Mulya Abadi Sentosa Kampung Wates, sebesar <?php echo rupiah($a->besar_angsuran) ?> pada angsuran ke- <?php echo $a->angsuran_ke ?>.</p> <br>
      
      <?php endforeach ?>

      </table>

</body>
</html>
