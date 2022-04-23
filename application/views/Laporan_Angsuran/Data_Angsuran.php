<div class="content-wrapper">
  <section class="content-header">
    <h1>Angsuran
      <small>Data Angsuran</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li><a href="#"><i class="fa fa-wrench"></i>Transaksi</a></li>
      <li class="active">Angsuran</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Data Angsuran</h3>
      <a class="btn btn-success" href="<?php echo base_url('C_Laporan/data_angsuran') ?>"> <i class="fa fa-file"></i>&nbsp;Semua</a>
    <div class="pull-right">
      <a class="btn btn-default" href="<?php echo base_url('C_Laporan/cetak_angsuran') ?>"> <i class="fa fa-file-pdf-o"></i>&nbsp;Cetak PDF</a>
    </div>
    </div>

    <div class="box-body table-responsive">

    <?php if ($this->session->flashdata('tambah')) : ?>
      <div class="alert alert-success">
    <?php echo $this->session->flashdata('tambah'); ?>
      </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('ubah')) : ?>
      <div class="alert alert-success">
    <?php echo $this->session->flashdata('ubah'); ?>
      </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('hapus')) : ?>
      <div class="alert alert-warning">
    <?php echo $this->session->flashdata('hapus'); ?>
      </div>
    <?php endif; ?>

      <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Tanggal Angsur</th>
          <th class="text-center">Tanggal Pinjaman</th>
          <th class="text-center">Besar Pinjaman</th>
          <th class="text-center">Angsuran-ke</th>
          <th class="text-center">Besar Angsuran</th>
          <th class="text-center">Nama Anggota</th>
          <th class="text-center">Nama Admin</th>
        </tr>
        </thead>

        <tbody>

        <?php 
        $no = 1;
        foreach ($koperasi as $kpr) : ?>

        <tr>
          <td class="text-center"><?php echo $no++ ?></td>
          <td class="text-center"><?php echo dateindo($kpr->tgl_angsur) ?></td>
          <td class="text-center"><?php echo dateindo($kpr->tgl_pinjam) ?></td>
          <td class="text-center"><?php echo rupiah($kpr->besar_pinjaman) ?></td>
          <td class="text-center"><?php echo $kpr->angsuran_ke ?></td>
          <td class="text-center"><?php echo rupiah($kpr->besar_angsuran) ?></td>
          <td class="text-center"><?php echo $kpr->nama_anggota ?></td>
          <td class="text-center"><?php echo $kpr->nama_admin ?></td>
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
