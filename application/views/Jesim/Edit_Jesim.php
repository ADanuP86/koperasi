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
    <h1>Pengaturan Simpanan
      <small>Data Jenis Simpanan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li><a href="#"><i class="fa fa-wrench"></i>Pengaturan Transaksi</a></li>
      <li><a href="<?php echo base_url('C_Jesim/jesim') ?>">Pengaturan Simpanan</a></li>
      <li class="active">Ubah Data Jenis Simpanan</li>
    </ol>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-6">
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Ubah Data Jenis Simpanan</h3>
      </div>

    <?php foreach($koperasi as $kpr) { ?>

    <form role="form" action="<?php echo base_url(). 'C_Jesim/update'; ?>" method="post">
    <div class="box-body">

    <div class="form-group">
      <label for="nama">Nama Simpanan</label>
      <input type="hidden" name="id_jesim" class="form-control" value="<?php echo $kpr->id_jesim ?>">
      <input type="text" name="nama_simpanan" class="form-control" id="nama_simpanan" value="<?php echo $kpr->nama_simpanan ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

    <div class="form-group">
      <label for="tgl_input">Tanggal Input</label>
      <input type="date" name="tgl_input" class="form-control" id="tgl_input" value="<?php echo $kpr->tgl_input ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

    <div class="form-group">
      <label for="besar_simpanan">Besar Simpanan</label>
      <input type="text" name="besar_simpanan" class="form-control" id="besar_simpanan" value="<?php echo $kpr->besar_simpanan ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>
  
    </div>

    <div class="box-footer">
      <a href="<?= base_url('C_Jesim/jesim') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
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
