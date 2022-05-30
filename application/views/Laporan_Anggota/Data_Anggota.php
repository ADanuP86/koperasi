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
      <h1>Data Anggota
        <small>Laporan Data Anggota</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="#"><i class="fa fa-file"></i>Laporan</a></li>
        <li class="active">Data Anggota</li>
      </ol>
  </section>

  <section class="content">
    <div class="row">
    <div class="col-md-6">
    <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Laporan Data Anggota Berdasarkan Filter</h3>
      <!-- <a class="btn btn-success" href="<?php echo base_url('C_Laporan/data_anggota') ?>"><i class="fa fa-file"></i>&nbsp;Semua</a>
      <a class="btn btn-info" href="<?php echo base_url('C_Laporan/anggota_aktif') ?>"> <i class="fa fa-file"></i>&nbsp;Aktif</a>
      <a class="btn btn-warning" href="<?php echo base_url('C_Laporan/anggota_nonaktif') ?>"> <i class="fa fa-file"></i>&nbsp;Non-aktif</a> -->
    </div>
  
  <form method="get" action="<?php echo base_url('C_Laporan/cetak_anggota') ?>">
    <div class="row">
    <div class="col-sm-12 col-md-8">
    <div class="box-body">
    <div class="form-group">
      <label>Filter Tanggal Masuk</label>
    <div class="input-group">
      <input type="text" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control tgl_awal" placeholder="Tanggal Awal" autocomplete="off">
      <span class="input-group-addon">s/d</span>
      <input type="text" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control tgl_akhir" placeholder="Tanggal Akhir" autocomplete="off">
    </div> <br>
    <label>Filter Pekerjaan</label>
      <select name="pekerjaan" id="pekerjaan" class="form-control">
      <option value="" selected disabled>Pilih Pekerjaan</option>
        <?php foreach ($get_pekerjaan as $gp) : ?>
      <option value="<?php echo $gp->pekerjaan; ?>"><?php echo $gp->pekerjaan; ?></option>
        <?php endforeach; ?>
      </select><br>
    <label>Filter Status</label>
      <select name="status" id="status" class="form-control">
      <option value="" selected disabled>Pilih Status</option>
      <option value="Aktif">Aktif</option>
      <option value="Non-aktif">Non-aktif</option>
      </select>
    </div>

    <button type="submit" name="filter" value="true" class="btn btn-default"><i class="fa fa-file-pdf-o"></i>&nbsp;Cetak PDF</button>

    <?php
      //if(isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
      //echo '<a href="'.base_url('C_Laporan/data_anggota').'" class="btn btn-default">RESET</a>';
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
    <h3 class="box-title">Laporan Semua Data Anggota</h3>
    <div class="pull-right">
      <a class="btn btn-default" href="<?php echo base_url('C_Laporan/cetak_semuaanggota') ?>"> <i class="fa fa-file-pdf-o"></i>&nbsp;Cetak PDF</a>
    </div>
  </div>

    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="tabel-data">
        <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Nama</th>
          <th class="text-center">NIK</th>
          <th class="text-center">TTL</th>
          <th class="text-center">Alamat</th>
          <th class="text-center">Pekerjaan</th>
          <th class="text-center">Jenis Kelamin</th>
          <th class="text-center">No.Telpon</th>
          <th class="text-center">Tanggal Masuk</th>
          <th class="text-center">Status</th>
        </tr>
        </thead>

        <tbody>

        <?php 
        $no = 1;
        if(empty($anggota)) { // Jika data tidak ada
          echo "<tr><td colspan='10'>Data tidak ada</td></tr>";
        }
        else {
        foreach ($anggota as $ang) { ?>

        <tr>
          <td class="text-center"><?php echo $no++ ?></td>
          <td class="text-center"><?php echo $ang->nama_anggota ?></td>
          <td class="text-center"><?php echo $ang->nik ?></td>
          <td class="text-center"><?php echo $ang->tempat_lahir ?>, <?php echo dateindo($ang->tgl_lahir) ?></td>
          <td class="text-center"><?php echo $ang->alamat ?></td>
          <td class="text-center"><?php echo $ang->pekerjaan ?></td>
          <td class="text-center"><?php echo $ang->jenis_kelamin ?></td>
          <td class="text-center"><?php echo $ang->no_telpon ?></td>
          <td class="text-center"><?php echo dateindo($ang->tgl_masuk) ?></td>
          <td class="text-center">
          <?php
          if($ang->status == 'Aktif') { ?>
          <span class="badge alert-info"><?php echo $ang->status ?></span>
          <?php } else { ?>
          <span class="badge alert-warning"><?php echo $ang->status ?></span>
           <?php } ?>
          </td>
        </tr>

      <?php } } ?>

        </tbody>
      </table>
    </div>
  </div>
  </div>
  </div>
    </div>

  <!--<form method="get" action="<?php echo base_url('C_Laporan/cetak_pekerjaan') ?>">
    <div class="col-sm-6 col-md-4">
    <div class="box-body">
    <div class="form-group">
      <label>Filter Pekerjaan</label>
      <select name="pekerjaan" id="pekerjaan" class="form-control">
      <option value="" selected disabled>Pilih Pekerjaan</option>
        <?php foreach ($get_pekerjaan as $gp) : ?>
      <option value="<?php echo $gp->pekerjaan; ?>"><?php echo $gp->pekerjaan; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <button type="submit" name="filter" value="true" class="btn btn-default"><i class="fa fa-file-pdf-o"></i>&nbsp;Cetak PDF</button>
    
    </div>
    </div>
  </form>-->

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
