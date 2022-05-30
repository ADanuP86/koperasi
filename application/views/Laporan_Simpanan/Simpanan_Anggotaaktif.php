<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Include file CSS Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Include library Bootstrap Datepicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Include File jQuery -->
    <script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<div class="content-wrapper">
  <section class="content-header">
      <h1>Data Simpanan
        <small>Laporan Data Simpanan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="#"><i class="fa fa-file"></i>Laporan</a></li>
        <li class="active">Data Simpanan</li>
      </ol>
  </section>

  <section class="content">
    <div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Laporan Data Simpanan</h3>
      <a class="btn btn-success" href="<?php echo base_url('C_Laporan/data_simpanan') ?>"> <i class="fa fa-file"></i>&nbsp;Semua</a>
      <a class="btn btn-info" href="<?php echo base_url('C_Laporan/simpanan_anggotaaktif') ?>"> <i class="fa fa-file"></i>&nbsp;Aktif</a>
      <a class="btn btn-warning" href="<?php echo base_url('C_Laporan/simpanan_anggotanonaktif') ?>"> <i class="fa fa-file"></i>&nbsp;Non-aktif</a>
    </div>
    
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="tabel-data">
        <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Nama</th>
          <th class="text-center">Pekerjaan</th>
          <th class="text-center">Jenis Kelamin</th>
          <th class="text-center">Tanggal Masuk</th>
          <th class="text-center">Status</th>
          <th class="text-center">Aksi</th>
        </tr>
        </thead>

        <tbody>

        <?php 
        $no = 1;
        foreach ($koperasi as $kpr) : ?>

        <tr>
          <td class="text-center"><?php echo $no++ ?></td>
          <td class="text-center"><?php echo $kpr->nama_anggota ?></td>
          <td class="text-center"><?php echo $kpr->pekerjaan ?></td>
          <td class="text-center"><?php echo $kpr->jenis_kelamin ?></td>
          <td class="text-center"><?php echo dateindo($kpr->tgl_masuk) ?></td>
          <td class="text-center">
          <?php
          if($kpr->status == 'Aktif') { ?>
          <span class="badge alert-info"><?php echo $kpr->status ?></span>
          <?php } else { ?>
          <span class="badge alert-warning"><?php echo $kpr->status ?></span>
           <?php } ?>
          </td>
          <td class="text-center">
          <a href="<?= base_url('C_Laporan/cek_simpananaktif/' . $kpr->id_anggota) ?>" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i>&nbsp;Detail</a>
          <a class="btn btn-default btn-sm" href="<?php echo base_url('C_Laporan/cetak_ceksimpanan/' . $kpr->id_anggota) ?>"> <i class="fa fa-file-pdf-o"></i>&nbsp;Cetak PDF</a>
          </td>
        </tr>

      <?php endforeach ?>

        </tbody>
      </table>
    </div>
  </div>
  </div>
  </div>
</section>
</div>
</html>
