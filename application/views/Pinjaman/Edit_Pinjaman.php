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
    <h1>Pinjaman
      <small>Data Pinjaman</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li><a href="#"><i class="fa fa-wrench"></i>Transaksi</a></li>
      <li><a href="<?php echo base_url('C_Pinjaman/pinjaman') ?>">Pinjaman</a></li>
      <li class="active">Edit Data Pinjaman</li>
    </ol>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-6">
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Data Pinjaman</h3>
      </div>

    <?php foreach($koperasi as $kpr) { ?>

    <form role="form" action="<?php echo base_url(). 'C_Pinjaman/update'; ?>" method="post">
    <div class="box-body">

    <div class="form-group">
      <label>Tanggal Pinjaman</label>
      <input type="hidden" name="id_pinjaman" class="form-control" value="<?php echo $kpr->id_pinjaman ?>">
      <input type="date" name="tgl_pinjam" class="form-control" id="tgl_pinjam" value="<?php echo $kpr->tgl_pinjam ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

      <!--<div class="form-group">
        <label>Nama Pinjaman</label>
        <select name="id_jepin" id="id_jepin" class="form-control">
          <option value="" selected disabled>--Pilih--</option>
            <?php foreach ($jenis as $j) : ?>
          <option <?= $kpr->id_jepin == $j['id_jepin'] ? 'selected' : ''; ?> <?= set_select('id_jepin', $j['id_jepin']) ?> value="<?= $j['id_jepin'] ?>"><?= $j['nama_pinjaman'] ?></option>
            <?php endforeach; ?>
        </select>
      </div>-->

    <div class="form-group">
      <label>Besar Pinjaman</label>
      <input type="number" name="besar_pinjaman" class="form-control" id="besar_pinjaman" value="<?php echo $kpr->besar_pinjaman ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

    <div class="form-group">
      <label>Jasa (%)</label>
      <input type="number" name="jasa" class="form-control" id="jasa" value="<?php echo $kpr->jasa ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

    <div class="form-group">
      <label>Jumlah Angsur (x)</label>
      <input type="number" name="jumlah_angsur" class="form-control" id="jumlah_angsur" value="<?php echo $kpr->jumlah_angsur ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

    <div class="form-group">
      <label>Lama Angsur (bulan)</label>
      <input type="number" name="lama_angsur" class="form-control" id="lama_angsur" value="<?php echo $kpr->lama_angsur ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

    <div class="form-group">
        <label>Nama Anggota</label>
        <select name="idanggota" id="idanggota" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
          <option value="" selected disabled>--Pilih--</option>
            <?php foreach ($anggota as $a) : ?>
          <option <?= $kpr->idanggota == $a['id_anggota'] ? 'selected' : ''; ?> <?= set_select('id_anggota', $a['id_anggota']) ?> value="<?= $a['id_anggota'] ?>"><?= $a['nama_anggota'] ?></option>
            <?php endforeach; ?>
        </select>
      </div>

    <div class="form-group">
      <label>Status</label>
      <select name="status_pinjaman" id="status_pinjaman" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
        <?php foreach ($koperasi as $stp) : ?>
      <option <?= $kpr->status_pinjaman == $stp->status_pinjaman ? 'selected' : ''; ?> <?= set_select('status_pinjaman', $stp->status_pinjaman) ?> value="<?= $stp->status_pinjaman ?>"><?= $stp->status_pinjaman ?> </option>
      <option value="Lunas">Lunas</option>
      <option value="Belum Lunas">Belum Lunas</option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="form-group">
      <label>Nama Admin</label>
      <input type="hidden" name="idadmin" class="form-control" id="idadmin" value="<?php echo $admin['id_admin'] ?>">
      <input type="text" name="nama_admin" class="form-control" id="nama_admin" value="<?php echo $admin['nama_admin'] ?>" readonly>
    </div>
  
    </div>

    <div class="box-footer">
      <a href="<?= base_url('C_Pinjaman/pinjaman') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
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
