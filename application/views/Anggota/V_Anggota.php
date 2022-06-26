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
    <h1>Anggota
      <small>Data Anggota</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li class="active">Anggota</li>
    </ol>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-12">
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Data Anggota</h3>
      <div class="pull-right">
      <a href="<?php echo base_url('C_Anggota/tambah') ?>"class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah</a>
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
          <th class="text-center">Nama</th>
          <th class="text-center">NIK</th>
          <th class="text-center">TTL</th>
          <th class="text-center">Alamat</th>
          <th class="text-center">Pekerjaan</th>
          <th class="text-center">Jenis Kelamin</th>
          <th class="text-center">No.Telpon</th>
          <th class="text-center">Tanggal Masuk</th>
          <th class="text-center">Status</th>
          <th class="text-center">Aksi</th>
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
          <td class="text-center"><?php echo $kpr->alamat ?> </td>
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
          <td class="text-center">
          <a href="<?= base_url('C_Anggota/edit/' . $kpr->id_anggota) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp;Ubah</a><br><br>
          <a href="<?= base_url('C_Anggota/delete/' . $kpr->id_anggota) ?>" onclick="return confirm('Yakin Ingin Hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Hapus</a><br><br>
          <?php
          if($kpr->status == 'Aktif') { ?>
            <a href="<?= base_url('C_Anggota/update_nonaktif/' . $kpr->id_anggota) ?>" onclick="return confirm('Yakin Ingin diNon-aktifkan?')" class="btn btn-warning btn-sm"><i class="fa fa-times"></i>&nbsp;Non-aktifkan</a>
          <?php } else { ?>
            <a href="<?= base_url('C_Anggota/update_aktif/' . $kpr->id_anggota) ?>" onclick="return confirm('Yakin Ingin diAktifkan?')" class="btn btn-info btn-sm"><i class="fa fa-check"></i>&nbsp;Aktifkan</a>
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
</html>
