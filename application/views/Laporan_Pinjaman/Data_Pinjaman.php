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
    <div class="col-md-12">
    <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Laporan Data Pinjaman</h3>
      <a class="btn btn-success" href="<?php echo base_url('C_Laporan/data_pinjaman') ?>"> <i class="fa fa-file"></i>&nbsp;Semua</a>
      <a class="btn btn-info" href="<?php echo base_url('C_Laporan/pinjaman_lunas') ?>"> <i class="fa fa-file"></i>&nbsp;Lunas</a>
      <a class="btn btn-warning" href="<?php echo base_url('C_Laporan/pinjaman_belumlunas') ?>"> <i class="fa fa-file"></i>&nbsp;Belum Lunas</a>
    <div class="pull-right">
      <a class="btn btn-default" href="<?php echo base_url('C_Laporan/cetak_pinjaman') ?>"> <i class="fa fa-file-pdf-o"></i>&nbsp;Cetak PDF</a>
    </div>
    </div>
    
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Tanggal Pinjaman</th>
          <th class="text-center">Jasa %</th>
          <th class="text-center">Jumlah Angsur (x)</th>
          <th class="text-center">Lama Angsur (bulan)</th>
          <th class="text-center">Tanggal Tempo</th>
          <th class="text-center">Nama Anggota</th>
          <th class="text-center">Nama Admin</th>
          <th class="text-center">Besar Pinjaman</th>
          <th class="text-center">Status</th>
        </tr>
        </thead>

        <tbody>

        <?php 
        $no = 1;
        foreach ($koperasi as $kpr) : ?>

        <tr>
          <td class="text-center"><?php echo $no++ ?></td>
          <td class="text-center"><?php echo dateindo($kpr->tgl_pinjam) ?></td>
          <td class="text-center"><?php echo $kpr->jasa ?></td>
          <td class="text-center"><?php echo $kpr->jumlah_angsur ?></td>
          <td class="text-center"><?php echo $kpr->lama_angsur ?></td>
          <td class="text-center"><?php echo dateindo($kpr->tgl_tempo) ?></td>
          <td class="text-center"><?php echo $kpr->nama_anggota ?></td>
          <td class="text-center"><?php echo $kpr->nama_admin ?></td>
          <td class="text-center"><?php echo rupiah($kpr->besar_pinjaman) ?></td>
          <td class="text-center">
          <?php
          if($kpr->status_pinjaman == 'Lunas') { ?>
            <span class="badge alert-info"><?php echo $kpr->status_pinjaman ?></span>
          <?php } else { ?>
            <span class="badge alert-warning"><?php echo $kpr->status_pinjaman ?></span>
          <?php } ?>
          </td>
        </tr>

      <?php endforeach ?>
      <tr>
      <th class="text-center" colspan="8">Total Pinjaman</th>
      <th class="text-center"><?php echo rupiah($total_pinjaman) ?></th>
     </tr>
        </tbody>
      </table>
    </div>
  </div>
  </div>
  </div>
</section>
</div>