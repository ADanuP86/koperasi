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
      <h1>Pinjaman
        <small>Data Pinjaman</small>
      </h1>
      <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/anggota') ?>"><i class="fa fa-user"></i>Informasi Anggota</a></li>
        <li><a href="#"><i class="fa fa-wrench"></i>Transaksi</a></li>
        <li class="active">Pinjaman</li>
      </ol>
  </section>

  <section class="content">
  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Data Pinjaman</h3>
  </div>

  <div class="box-body table-responsive">
  <table class="table table-bordered table-striped" id="tabel-data">
        <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Tanggal Pinjaman</th>
          <th class="text-center">Total Pinjaman</th>
          <th class="text-center">Nama Anggota</th>
          <th class="text-center">Status</th>
          <th class="text-center">Aksi</th>
        </tr>
        </thead>

        <tbody>

        <?php 
        $no = 1;
        foreach ($koperasi as $kpr) : 
        $besar_pinjaman[] = $kpr->besar_pinjaman; $total_besarpinjaman = $kpr->besar_pinjaman+$kpr->besar_pinjaman/100*$kpr->jasa
        ?>

        <tr>
          <td class="text-center"><?php echo $no++ ?></td>
          <td class="text-center"><?php echo dateindo($kpr->tgl_pinjam) ?></td>
          <td class="text-center"><?php echo rupiah($total_besarpinjaman) ?></td>
          <td class="text-center"><?php echo $kpr->nama_anggota ?></td>
          <td class="text-center">
          <?php
          if($kpr->status_pinjaman == 'Lunas') { ?>
            <span class="badge alert-info"><?php echo $kpr->status_pinjaman ?></span>
          <?php } else { ?>
            <span class="badge alert-warning"><?php echo $kpr->status_pinjaman ?></span>
          <?php } ?>
          </td>
          <td class="text-center">
          <a href="<?= base_url('C_Pinjaman/cek_angsuranggota/' . $kpr->id_pinjaman) ?>" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i>&nbsp;Detail</a>
          <a class="btn btn-default btn-sm" href="<?php echo base_url('C_Laporan/cetak_pinjamangsur/' . $kpr->id_pinjaman) ?>"> <i class="fa fa-file-pdf-o"></i>&nbsp;Cetak PDF</a>
          </td>
        </tr>

      <?php endforeach ?>

          </tbody>
        </table>
  </div>
      </div>
  </div>
  </div>

  </div>
<!-- Include File JS Bootstrap -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Include library Bootstrap Datepicker -->
    <script src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Include File JS Custom (untuk fungsi Datepicker) -->
    <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
</html>
