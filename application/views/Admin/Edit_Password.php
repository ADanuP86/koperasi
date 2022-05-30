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
    <h1>User Admin
      <small>Password User Admin</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li><a href="<?php echo base_url('C_Admin/admin') ?>"><i class="fa fa-user-circle"></i>User Admin</a></li>
      <li class="active">Edit Password User Admin</li>
    </ol>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-6">
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Password User Admin</h3>
      </div>

    <?php foreach($koperasi as $kpr) { ?>

    <form role="form" action="<?php echo base_url(). 'C_Admin/update_password/' . $kpr->id_admin; ?>" method="post">
    <div class="box-body">

    <?php if ($this->session->flashdata('gagal_password')) : ?>
      <div class="alert alert-danger">
    <?php echo $this->session->flashdata('gagal_password'); ?>
      </div>
    <?php endif; ?>

    <div class="form-group">
      <label for="password_lama">Password Lama</label>
        <input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Silakan Isi Password Lama" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
        <?= form_error('password_lama', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>

    <div class="form-group">
      <label for="password">Password Baru</label>
        <input type="hidden" value="<?php echo $kpr->id_admin ?>" id="id_admin" name="id_admin">
        <input type="password" class="form-control" id="password" name="password" placeholder="Silakan Isi Password Baru" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
  
    </div>

    <div class="box-footer">
      <a href="<?= base_url('C_Admin/admin') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>

    <?php } ?>

        </div>
      </div>
    </div>
  </section>
</div>
</html>
