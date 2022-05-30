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
    <h1>Simpanan
      <small>Data Simpanan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li><a href="#"><i class="fa fa-wrench"></i>Transaksi</a></li>
      <li><a href="<?php echo base_url('C_Simpanan/simpanan') ?>">Simpanan</a></li>
      <li class="active">Ubah Data Simpanan</li>
    </ol>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-6">
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Ubah Data Simpanan</h3>
      </div>

    <?php foreach($koperasi as $kpr) { ?>

    <form role="form" action="<?php echo base_url(). 'C_Simpanan/update'; ?>" method="post">
    <div class="box-body">

    <div class="form-group">
      <label>Tanggal Simpanan</label>
      <input type="hidden" name="id_simpanan" class="form-control" value="<?php echo $kpr->id_simpanan ?>">
      <input type="date" name="tgl_simpan" class="form-control" id="tgl_simpan" value="<?php echo $kpr->tgl_simpan ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

    <div class="form-group">
        <label>Nama Anggota - Pekerjaan</label>
        <select name="id_anggota" id="id_anggota" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
          <option value="" selected disabled>--Pilih--</option>
            <?php foreach ($anggota as $a) : ?>
          <option <?= $kpr->id_anggota == $a['id_anggota'] ? 'selected' : ''; ?> <?= set_select('id_anggota', $a['id_anggota']) ?> value="<?= $a['id_anggota'] ?>"><?= $a['nama_anggota'] ?> - <?= $a['pekerjaan'] ?></option>
            <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label>Nama Simpanan</label>
        <select name="id_jesim" id="id_jesim" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
          <option value="" selected disabled>--Pilih--</option>
            <?php foreach ($jenis as $j) : ?>
          <option <?= $kpr->id_jesim == $j['id_jesim'] ? 'selected' : ''; ?> <?= set_select('id_jesim', $j['id_jesim']) ?> value="<?= $j['id_jesim'] ?>"><?= $j['nama_simpanan'] ?></option>
            <?php endforeach; ?>
        </select>
      </div>

   <!-- <div class="form-group">
      <label for="besar_simpanan">Besar Simpanan</label>
      <input type="text" name="besar_simpanan" class="form-control" id="besar_simpanan" readonly=""> value="<?php echo $kpr->besar_simpanan ?>">
    </div> -->

    <div class="form-group">
        <label>Nama Admin</label>
        <input type="hidden" name="id_admin" class="form-control" id="id_admin" value="<?php echo $admin['id_admin'] ?>">
        <input type="text" name="nama_admin" class="form-control" id="nama_admin" value="<?php echo $admin['nama_admin'] ?>" readonly>
    </div>
    <!--<div class="form-group">
        <label>Nama Admin</label>
        <select name="id_admin" id="id_admin" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
          <option value="" selected disabled>--Pilih--</option>
            <?php foreach ($adm as $a) : ?>
          <option <?= $kpr->id_admin == $a['id_admin'] ? 'selected' : ''; ?> <?= set_select('id_admin', $a['id_admin']) ?> value="<?= $a['id_admin'] ?>"><?= $a['nama_admin'] ?></option>
            <?php endforeach; ?>
        </select>
      </div>-->
  
    </div>

    <div class="box-footer">
      <a href="<?= base_url('C_Simpanan/simpanan') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
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
