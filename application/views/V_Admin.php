<div class="content-wrapper">
  <section class="content-header">
    <h1>User Admin
      <small>Data User Admin</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li class="active">User Admin</li>
    </ol>
  </section>

  <section class="content">
    <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Data User Admin</h3>
    </div>

    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="tabel-data">
        <thead>
        <tr>
          <th>No</th>
          <th>Username</th>
          <th>Nama</th>
          <th>Role</th>
          <th class="text-center">Aksi</th>
        </tr>
        </thead>

        <tbody>

        <?php 
        $no = 1;
        foreach ($koperasi as $kpr) : ?>

        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $kpr->username ?></td>
          <td><?php echo $kpr->nama_admin ?></td>
          <td><?php echo $kpr->role ?></td>
          <td class="text-center"><?php echo anchor('C_Admin/edit/'.$kpr->id_admin, '<div class="btn btn-success btn-sm"><i class="fa fa-edit"></i>Edit</div>') ?> <?php echo anchor('C_Admin/edit_password/'.$kpr->id_admin, '<div class="btn btn-warning btn-sm"><i class="fa fa-key"></i>Change Password</div>') ?></td>
        </tr>

      <?php endforeach ?>

          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
