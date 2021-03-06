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
      <li><a href="<?php echo base_url('C_Anggota/anggota') ?>"><i class="fa fa-user"></i>Anggota</a></li>
      <li class="active">Tambah Data Anggota</li>
    </ol>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-6">
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah Data Anggota</h3>
      </div>

    <form role="form" action="<?php echo base_url(). 'C_Anggota/tambah_anggota'; ?>" method="post">
    <div class="box-body">

    <div class="form-group">
      <label for="nama">Nama</label>
      <input type="hidden" name="id_anggota" class="form-control" id="id_anggota">
      <input type="text" name="nama_anggota" class="form-control" id="nama" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

    <div class="form-group">
      <label for="nik">NIK</label>
      <input type="number" name="nik" class="form-control" id="nik" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
      <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>

    <div class="form-group">
      <label for="tgl_lahir">Tanggal Lahir</label>
      <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

    <div class="form-group">
      <label for="tempat_lahir">Tempat Lahir</label>
      <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

    <div class="form-group">
      <label>Alamat</label>
      <textarea class="form-control" name="alamat" id="alamat" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')"></textarea>
    </div>

    <div class="form-group">
      <label for="pekerjaan">Pekerjaan</label>
      <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

    <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
          <option value="" selected disabled>--Pilih--</option>
          <option value="laki-laki">Laki-laki</option>
          <option value="perempuan">Perempuan</option>
        </select>
    </div>

    <div class="form-group">
      <label for="no_telpon">No.Telpon</label>
      <input type="number" name="no_telpon" class="form-control" id="no_telpon" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
      <?= form_error('no_telpon', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>

    <div class="form-group">
      <label for="tgl_masuk">Tanggal Masuk</label>
      <input type="date" name="tgl_masuk" class="form-control" id="tgl_masuk" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

    <div class="form-group">
        <label for="status">Status</label>
          <select name="status" id="status" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
          <option  value="" selected disabled>--Pilih--</option>
          <option  value="aktif">Aktif</option>
          <option  value="non-aktif">Non-Aktif</option>
        </select>
    </div>  
</div>

    <div class="box-footer">
      <a href="<?= base_url('C_Anggota/anggota') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>

    </form>

        </div>
      </div>
    </div>
  </section>
</div>
</html>
