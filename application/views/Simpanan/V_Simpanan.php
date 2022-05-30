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
    <h1>Simpanan
      <small>Data Simpanan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li><a href="#"><i class="fa fa-wrench"></i>Transaksi</a></li>
      <li class="active">Simpanan</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Data Simpanan</h3>
    <div class="pull-right">
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
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
          <th class="text-center">Tanggal Simpanan</th>
          <th class="text-center">Nama Simpanan</th>
          <th class="text-center">Besar Simpanan</th>
          <th class="text-center">Nama Anggota</th>
          <th class="text-center">Nama Admin</th>
          <th class="text-center">Aksi</th>
        </tr>
        </thead>

        <tbody>

        <?php 
        $no = 1;
        foreach ($koperasi as $kpr) : ?>

        <tr>
          <td class="text-center"><?php echo $no++ ?></td>
          <td class="text-center"><?php echo dateindo($kpr->tgl_simpan) ?></td>
          <td class="text-center"><?php echo $kpr->nama_simpanan ?></td>
          <td class="text-center"><?php echo rupiah($kpr->besar_simpanan) ?></td>
          <td class="text-center"><?php echo $kpr->nama_anggota ?></td>
          <td class="text-center"><?php echo $kpr->nama_admin ?></td>
          <td class="text-center">
          <a href="<?= base_url('C_Simpanan/edit/' . $kpr->id_simpanan) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp;Ubah</a>
          <a href="<?= base_url('C_Simpanan/delete/' . $kpr->id_simpanan) ?>" onclick="return confirm('Yakin Ingin Hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Hapus</a><br><br>
          <a href="<?= base_url('C_Simpanan/cetak_buktisimpanan/' . $kpr->id_simpanan) ?>" class="btn btn-default btn-sm"><i class="fa fa-file-pdf-o"></i>&nbsp;Cetak Bukti</a>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Form Input Data Simpanan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url(). 'C_Simpanan/tambah_simpanan' ?>">

        <div class="form-group">
          <label>Tanggal Simpanan</label>
          <input type="date" name="tgl_simpan" class="form-control" value="<?php echo date("Y-m-d") ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
        </div>

        <div class="form-group">
          <label>Nama Anggota - Pekerjaan</label>
          <select name="id_anggota" id="id_anggota" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
            <option value="" selected disabled>--Pilih--</option>
              <?php foreach ($anggota as $a) : ?>
            <option <?= set_select('id_anggota', $a['id_anggota']) ?> value="<?= $a['id_anggota'] ?>"><?= $a['nama_anggota'] ?> - <?= $a['pekerjaan'] ?></option>
              <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label>Nama Simpanan</label><font color="red"> *harus sesuai pekerjaan </font>
          <select name="id_jesim" id="id_jesim" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
            <option value="" selected disabled>--Pilih--</option>
              <?php foreach ($jenis as $j) : ?>
            <option <?= set_select('id_jesim', $j['id_jesim']) ?> value="<?= $j['id_jesim'] ?>"><?= $j['nama_simpanan'] ?></option>
              <?php endforeach; ?>
          </select>
        </div>

        <!-- <div class="form-group">
          <label>Besar Simpanan</label>
          <input type="text" name="besar_simpanan" class="form-control" readonly="">
        </div> -->

        <div class="form-group">
          <label>Nama Admin</label>
          <input type="hidden" name="id_admin" class="form-control" id="id_admin" value="<?php echo $admin['id_admin'] ?>">
          <input type="text" name="nama_admin" class="form-control" id="nama_admin" value="<?php echo $admin['nama_admin'] ?>" readonly>
        </div>
        <!--<div class="form-group">
          <label>Nama Admin</label>
          <select name="id_admin" id="id_admin" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
            <option value="" selected disabled>--Pilih--</option>
              <?php foreach ($adm as $a) : ?>
            <option <?= set_select('id_admin', $a['id_admin']) ?> value="<?= $a['id_admin'] ?>"><?= $a['nama_admin'] ?></option>
              <?php endforeach; ?>
          </select>
        </div>-->

        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>
</html>
