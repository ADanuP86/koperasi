<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Include file CSS Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Angsuran
      <small>Data Angsuran</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li><a href="#"><i class="fa fa-wrench"></i>Transaksi</a></li>
      <li><a href="<?php echo base_url('C_Angsuran/angsuran') ?>">Angsuran</a></li>
      <li class="active">Edit Data Angsuran</li>
    </ol>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-6">
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Data Angsuran</h3>
      </div>

    <?php foreach($angsur as $a) {
    $besar_pinjaman[] = $a->besar_pinjaman; $total_besarpinjaman = $a->besar_pinjaman+$a->besar_pinjaman/100*$a->jasa  
    ?>

    <form role="form" action="<?php echo base_url(). 'C_Angsuran/update/' . $a->id_pinjaman ?>" method="post">
    <div class="box-body">

    <div class="form-group">
        <label>Tanggal Angsur</label>
        <input type="hidden" name="id_angsuran" class="form-control" id="id_angsuran" value="<?php echo $a->id_angsuran ?>">
        <input type="date" name="tgl_angsur" class="form-control" id="tgl_angsur" value="<?php echo $a->tgl_angsur ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label for="nama">Tanggal Pinjam - Total Pinjaman</label>
        <input type="hidden" name="id_pinjaman" class="form-control" id="id_pinjaman" value="<?php echo $a->id_pinjaman ?>">
        <input type="text" name="tgl_pinjam" class="form-control" id="tgl_pinjam" value="<?php echo dateindo($a->tgl_pinjam) ?> - <?php echo rupiah($total_besarpinjaman) ?> " readonly>
      </div>
      <!--<div class="form-group">
        <label>Tanggal Pinjaman - Total Pinjaman</label>
        <select name="id_pinjaman" id="id_pinjaman" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
          <option value="" selected disabled>--Pilih--</option>
            <?php foreach ($pinjaman as $p) : ?>
          <option <?= $a->id_pinjaman == $p['id_pinjaman'] ? 'selected' : ''; ?> <?= set_select('id_pinjaman', $p['id_pinjaman']) ?> value="<?= $p['id_pinjaman'] ?>"><?= dateindo($p['tgl_pinjam']) ?> - <?= rupiah($p['besar_pinjaman']) ?></option>
            <?php endforeach; ?>
        </select>
      </div>-->

      <div class="form-group">
        <label>Angsuran Ke-</label>
        <input type="number" name="angsuran_ke" class="form-control" id="angsuran_ke" value="<?php echo $a->angsuran_ke ?>" readonly required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label>Besar Angsuran</label>
        <input type="number" name="besar_angsuran" class="form-control" id="besar_angsuran" value="<?php echo $a->besar_angsuran ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label>Nama</label>
        <input type="hidden" name="idAnggota" class="form-control" id="idAnggota" value="<?php echo $a->idanggota ?>">
        <input type="text" name="nama_anggota" class="form-control" id="nama_anggota" value="<?php echo $a->nama_anggota ?>" readonly>
      </div>
      <!--<div class="form-group">
        <label>Nama Anggota</label>
        <select name="idAnggota" id="idAnggota" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
          <option value="" selected disabled>--Pilih--</option>
            <?php foreach ($anggota as $ang) : ?>
          <option <?= $a->idAnggota == $ang['id_anggota'] ? 'selected' : ''; ?> <?= set_select('id_anggota', $ang['id_anggota']) ?> value="<?= $ang['id_anggota'] ?>"><?= $ang['nama_anggota'] ?></option>
            <?php endforeach; ?>
        </select>
      </div>-->

      <div class="form-group">
        <label>Nama Admin</label>
        <input type="hidden" name="idAdmin" class="form-control" id="idAdmin" value="<?php echo $admin['id_admin'] ?>">
        <input type="text" name="nama_admin" class="form-control" id="nama_admin" value="<?php echo $admin['nama_admin'] ?>" readonly>
      </div>
      <!--<div class="form-group">
        <label>Nama Admin</label>
        <select name="idAdmin" id="idAdmin" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
          <option value="" selected disabled>--Pilih--</option>
            <?php foreach ($adm as $adm) : ?>
          <option <?= $a->idAdmin == $adm['id_admin'] ? 'selected' : ''; ?> <?= set_select('id_admin', $adm['id_admin']) ?> value="<?= $adm['id_admin'] ?>"><?= $adm['nama_admin'] ?></option>
            <?php endforeach; ?>
        </select>
      </div>-->
  
    </div>

    <div class="box-footer">
      <a href="<?= base_url('C_Angsuran/cek_angsur/' . $a->id_pinjaman) ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>

    <?php } ?>

        </div>
      </div>
    </div>
  </section>
</div>
</html>
