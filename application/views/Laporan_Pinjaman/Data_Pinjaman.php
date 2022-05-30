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
      <h1>Data Pinjaman
        <small>Laporan Data Pinjaman</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="#"><i class="fa fa-file"></i>Laporan</a></li>
        <li class="active">Data Pinjaman</li>
      </ol>
  </section>

  <section class="content">
    <div class="row">
    <div class="col-md-6">
    <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Laporan Data Pinjaman Berdasarkan Filter</h3>
      <!-- <a class="btn btn-success" href="<?php echo base_url('C_Laporan/data_pinjaman') ?>"> <i class="fa fa-file"></i>&nbsp;Semua</a>
      <a class="btn btn-info" href="<?php echo base_url('C_Laporan/pinjaman_lunas') ?>"> <i class="fa fa-file"></i>&nbsp;Lunas</a>
      <a class="btn btn-warning" href="<?php echo base_url('C_Laporan/pinjaman_belumlunas') ?>"> <i class="fa fa-file"></i>&nbsp;Belum Lunas</a> -->
    </div>
    
  <form method="get" action="<?php echo base_url('C_Laporan/cetak_pinjaman') ?>">
    <div class="row">
    <div class="col-sm-12 col-md-8">
    <div class="box-body">
    <div class="form-group">
      <label>Filter Tanggal Pinjam</label>
    <div class="input-group">
      <input type="text" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control tgl_awal" placeholder="Tanggal Awal" autocomplete="off">
      <span class="input-group-addon">s/d</span>
      <input type="text" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control tgl_akhir" placeholder="Tanggal Akhir" autocomplete="off">
    </div><br>
    <label>Filter Status Pinjaman</label>
      <select name="status_pinjaman" id="status_pinjaman" class="form-control">
      <option value="" selected disabled>Pilih Status Pinjaman</option>
      <option value="Lunas">Lunas</option>
      <option value="Belum Lunas">Belum Lunas</option>
      </select>
    </div>
    
    <button type="submit" name="filter" value="true" class="btn btn-default"><i class="fa fa-file-pdf-o"></i>&nbsp;Cetak PDF</button>    

    <?php
            if(isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                echo '<a href="'.base_url('C_Laporan/data_pinjaman').'" class="btn btn-default">RESET</a>';
            ?>

    </div>
    </div>
    </div>
  </form>

  </div>
  </div>

  <div class="row">
  <div class="col-md-12">
  <div class="box-body">
  <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Laporan Semua Data Pinjaman Berdasarkan Anggota dan Angsuran</h3>
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
          <a href="<?= base_url('C_Laporan/cek_angsur/' . $kpr->id_pinjaman) ?>" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i>&nbsp;Detail</a>
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
    </div>

  </div>
</section>
<!-- Include File JS Bootstrap -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Include library Bootstrap Datepicker -->
    <script src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Include File JS Custom (untuk fungsi Datepicker) -->
    <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
    <script>
    $(document).ready(function(){
        setDateRangePicker(".tgl_awal", ".tgl_akhir")
    })
    </script>
</html>
