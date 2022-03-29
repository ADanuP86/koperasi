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
    <div class="pull-right">
      <a class="btn btn-info" href="<?php echo base_url('C_Laporan/cetak_anggota') ?>"> <i class="fa fa-file"></i>Cetak PDF</a>
    </div>
    </div>
    
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>NIK</th>
          <th>Tanggal Lahir</th>
          <th>Tempat Lahir</th>
          <th>Pekerjaan</th>
          <th>Jenis Kelamin</th>
          <th>No.Telpon</th>
          <th>Tanggal Masuk</th>
          <th>Status</th>
        </tr>
        </thead>

        <tbody>

        <?php 
        $no = 1;
        foreach ($koperasi as $kpr) : ?>

        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $kpr->nama_anggota ?></td>
          <td><?php echo $kpr->nik ?></td>
          <td><?php echo $kpr->tgl_lahir ?></td>
          <td><?php echo $kpr->tempat_lahir ?></td>
          <td><?php echo $kpr->pekerjaan ?></td>
          <td><?php echo $kpr->jenis_kelamin ?></td>
          <td><?php echo $kpr->no_telpon ?></td>
          <td><?php echo $kpr->tgl_masuk ?></td>
          <td><?php echo $kpr->status ?></td>
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
