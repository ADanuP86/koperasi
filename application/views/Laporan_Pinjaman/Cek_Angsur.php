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
      <li><a href="<?php echo base_url('C_Anggota/anggota') ?>"><i class="fa fa-wrench"></i>Transaksi</a></li>
      <li class="active">Angsuran</li>
    </ol>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-12">
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Data Pinjaman</h3>
        <a href="<?= base_url('C_Laporan/data_pinjaman') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
      </div>

      <div class="box-body table-responsive">
      
      <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Tanggal Pinjaman</th>
          <th class="text-center">Tanggal Angsuran</th>
          <!--<th class="text-center">Jasa (%)</th>-->
          <th class="text-center">Jumlah Angsur (x)</th>
          <th class="text-center">Angsuran Ke-</th>
          <th class="text-center">Lama Angsur (bulan)</th>
          <th class="text-center">Tanggal Tempo</th>
          <th class="text-center">Nama Anggota</th>
          <th class="text-center">Nama Admin</th>
          <!--<th class="text-center">Status</th>-->
          <th class="text-center">Besar Angsuran</th>
          <!--<th class="text-center">Besar Pinjaman</th>-->
        </tr>
        </thead>

        <tbody>

        <?php
        $total_besarpinjaman = 0;
        $total_besarangsuran = 0;
        $no = 1;
        if(empty($koperasi)) { // Jika data tidak ada
          echo "<tr><td colspan='10'>Data tidak ada</td></tr>";
        }
        else {
        foreach ($koperasi as $kpr) { 
        
          $besar_pinjaman[] = $kpr->besar_pinjaman; $total_besarpinjaman = $kpr->besar_pinjaman+$kpr->besar_pinjaman/100*$kpr->jasa;
          $besar_angsuran[] = $kpr->besar_angsuran; $total_besarangsuran = array_sum($besar_angsuran)
        //$besar_pinjaman[] = $kpr->besar_pinjaman; $total_besarpinjaman = array_sum($besar_pinjaman);
        
        ?>

        <tr>
          <td class="text-center"><?php echo $no++ ?></td>
          <td class="text-center"><?php echo dateindo($kpr->tgl_pinjam) ?></td>
          <td class="text-center"><?php echo dateindo($kpr->tgl_angsur) ?></td>
          <!--<td class="text-center"><?php echo $kpr->jasa ?></td>-->
          <td class="text-center"><?php echo $kpr->jumlah_angsur ?></td>
          <td class="text-center"><?php echo $kpr->angsuran_ke ?></td>
          <td class="text-center"><?php echo $kpr->lama_angsur ?></td>
          <td class="text-center"><?php echo dateindo($kpr->tgl_tempo) ?></td>
          <td class="text-center"><?php echo $kpr->nama_anggota ?></td>
          <td class="text-center"><?php echo $kpr->nama_admin ?></td>
          <!--<td class="text-center">
          <?php
          if($kpr->status_pinjaman == 'Lunas') { ?>
            <span class="badge alert-info"><?php echo $kpr->status_pinjaman ?></span>
          <?php } else { ?>
            <span class="badge alert-warning"><?php echo $kpr->status_pinjaman ?></span>
          <?php } ?>
          </td>-->
          <td class="text-center"><?php echo rupiah($kpr->besar_angsuran) ?></td>
          <!--<td class="text-center"><?php echo rupiah($kpr->besar_pinjaman) ?></td>-->
        </tr>

      <?php } } ?>
      <tr>
      <th class="text-center" colspan="9">Total Angsuran</th>
      <th class="text-center"><?php echo rupiah($total_besarangsuran) ?></th>
     </tr>
      <tr>
      <th class="text-center" colspan="9">Total Pinjaman</th>
      <th class="text-center"><?php echo rupiah($total_besarpinjaman) ?></th>
     </tr>
        </tbody>
      </table>

    </div>
                                    
  </div>
</div>
    
  </div>
</section>

</div>
</html>
