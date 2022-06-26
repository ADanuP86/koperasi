<div class="content-wrapper">
  <section class="content-header">
      <h1>Pengaturan Pinjaman
        <small>Data Jenis Pinjaman</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
        <li><a href="#"><i class="fa fa-wrench"></i>Pengaturan Transaksi</a></li>
        <li class="active">Pengaturan Pinjaman</li>
      </ol>
  </section>

    <section class="content">
      <div class="row">
      <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Jenis Pinjaman</h3>
          <div class="pull-right">
          <a href="<?php echo base_url('C_Jepin/tambah') ?>"class="btn btn-primary"><i class="fa fa-plus"></i>Tambah</a>
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

      <table class="table table-bordered table-striped" id="tabel-data">
        <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Nama Pinjaman</th>
          <th class="text-center">Tanggal Input</th>
          <th class="text-center">Besar Pinjaman</th>
          <th class="text-center">Jasa %</th>
          <th class="text-center">Aksi</th>
        </tr>
        </thead>

        <tbody>

        <?php 
        $no = 1;
        foreach ($koperasi as $kpr) : ?>

        <tr>
          <td class="text-center"><?php echo $no++ ?></td>
          <td class="text-center"><?php echo $kpr->nama_pinjaman ?></td>
          <td class="text-center"><?php echo dateindo($kpr->tgl_input) ?></td>
          <td class="text-center"><?php echo rupiah($kpr->besar_pinjaman) ?></td>
          <td class="text-center"><?php echo $kpr->jasa ?></td>
          <td class="text-center">
          <a href="<?= base_url('C_Jepin/edit/' . $kpr->id_jepin) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;Ubah</a>
          <a href="<?= base_url('C_Jepin/delete/' . $kpr->id_jepin) ?>" onclick="return confirm('Yakin Ingin Hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</a>
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
