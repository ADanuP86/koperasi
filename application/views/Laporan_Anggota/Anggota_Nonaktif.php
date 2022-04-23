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
    <div class="col-md-12">
    <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Laporan Data Anggota</h3>
      <a class="btn btn-success" href="<?php echo base_url('C_Laporan/data_anggota') ?>"> <i class="fa fa-file"></i>&nbsp;Semua</a>
      <a class="btn btn-info" href="<?php echo base_url('C_Laporan/anggota_aktif') ?>"> <i class="fa fa-file"></i>&nbsp;Aktif</a>
      <a class="btn btn-warning" href="<?php echo base_url('C_Laporan/anggota_nonaktif') ?>"> <i class="fa fa-file"></i>&nbsp;Non-aktif</a>
    <div class="pull-right">
      <a class="btn btn-default" href="<?php echo base_url('C_Laporan/cetak_nonaktif') ?>"> <i class="fa fa-file-pdf-o"></i>&nbsp;Cetak PDF</a>
    </div>
    </div>
    
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Nama</th>
          <th class="text-center">NIK</th>
          <th class="text-center">TTL</th>
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
        foreach ($koperasi as $kpr) : ?>

        <tr>
          <td class="text-center"><?php echo $no++ ?></td>
          <td class="text-center"><?php echo $kpr->nama_anggota ?></td>
          <td class="text-center"><?php echo $kpr->nik ?></td>
          <td class="text-center"><?php echo $kpr->tempat_lahir ?>, <?php echo dateindo($kpr->tgl_lahir) ?></td>
          <td class="text-center"><?php echo $kpr->pekerjaan ?></td>
          <td class="text-center"><?php echo $kpr->jenis_kelamin ?></td>
          <td class="text-center"><?php echo $kpr->no_telpon ?></td>
          <td class="text-center"><?php echo dateindo($kpr->tgl_masuk) ?></td>
          <td class="text-center">
          <?php
          if($kpr->status == 'Aktif') { ?>
          <span class="badge alert-info"><?php echo $kpr->status ?></span>
          <?php } else { ?>
          <span class="badge alert-warning"><?php echo $kpr->status ?></span>
           <?php } ?>
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
