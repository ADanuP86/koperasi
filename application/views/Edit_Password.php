<div class="content-wrapper">
  <section class="content-header">
    <h1>User Admin
      <small>Password User Admin</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
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

    <form role="form" action="<?php echo base_url(). 'C_Admin/update_password'; ?>" method="post">
    <div class="box-body">

    <div class="form-group">
      <label for="password">Password Baru</label>
        <input type="hidden" value="<?php echo $kpr->id_admin ?>" id="id_admin" name="id_admin">
        <input type="password" class="form-control" id="password" name="password" placeholder="Silakan Isi Password Baru">
    </div>
  
    </div>

    <div class="box-footer">
      <a href="<?= base_url('C_Admin/admin') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>

    <?php } ?>

        </div>
      </div>
    </div>
  </section>
</div>
