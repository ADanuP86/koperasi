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
    <div class="pull-right">
      <a class="btn btn-info" href="<?php echo base_url('C_Laporan/cetak_simpanan') ?>"> <i class="fa fa-file"></i>Cetak PDF</a>
    </div>
    </div>
    
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Tanggal Simpanan</th>
          <th>Nama Simpanan</th>
          <th>Besar Simpanan</th>
          <th>Nama Anggota</th>
          <th>Nama Admin</th>
        </tr>
        </thead>

        <tbody>

        <?php 
        $no = 1;
        foreach ($koperasi as $kpr) : ?>

        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $kpr->tgl_simpan ?></td>
          <td><?php echo $kpr->nama_simpanan ?></td>
          <td><?php echo $kpr->besar_simpanan ?></td>
          <td><?php echo $kpr->nama_anggota ?></td>
          <td><?php echo $kpr->nama_admin ?></td>
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
