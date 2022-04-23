<div class="content-wrapper">
  <section class="content-header">
    <h1>User Admin
      <small>Data User Admin</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li><a href="<?php echo base_url('C_Admin/admin') ?>"><i class="fa fa-user-circle"></i>User Admin</a></li>
      <li class="active">Edit Data User Admin</li>
    </ol>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-6">
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Data User Admin</h3>
      </div>

    <?php foreach($koperasi as $kpr) { ?>

    <form role="form" action="<?php echo base_url(). 'C_Admin/update'; ?>" method="post">
    <div class="box-body">

    <div class="form-group">
      <label for="username">Username</label>
      <input type="hidden" name="id_admin" class="form-control" value="<?php echo $kpr->id_admin ?>">
      <input type="text" name="username" class="form-control" id="username" value="<?php echo $kpr->username ?>">
    </div>

    <div class="form-group">
      <label for="nama_admin">Nama Admin</label>
      <input type="text" name="nama_admin" class="form-control" id="nama_admin" value="<?php echo $kpr->nama_admin ?>">
    </div>

    <label for="role">Role</label>
      <div class="form-group">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="role" id="role" value="admin" checked="">
    <label class="form-check-label" for="role">Admin</label>
      </div>
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
