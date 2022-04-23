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

    <?php if ($this->session->flashdata('ubah')) : ?>
      <div class="alert alert-success">
    <?php echo $this->session->flashdata('ubah'); ?>
      </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('ubah_password')) : ?>
      <div class="alert alert-success">
    <?php echo $this->session->flashdata('ubah_password'); ?>
      </div>
    <?php endif; ?>

      <table class="table table-bordered table-striped" id="tabel-data">
        <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Username</th>
          <th class="text-center">Nama</th>
          <th class="text-center">Role</th>
          <th class="text-center">Aksi</th>
        </tr>
        </thead>

        <tbody>

        <?php 
        $no = 1;
        foreach ($koperasi as $kpr) : ?>

        <tr>
          <td class="text-center"><?php echo $no++ ?></td>
          <td class="text-center"><?php echo $kpr->username ?></td>
          <td class="text-center"><?php echo $kpr->nama_admin ?></td>
          <td class="text-center"><?php echo $kpr->role ?></td>
          <td class="text-center">
          <a href="<?= base_url('C_Admin/edit/' . $kpr->id_admin) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp;Ubah</a>
          <a href="<?= base_url('C_Admin/edit_password/' . $kpr->id_admin) ?>" class="btn btn-warning btn-sm"><i class="fa fa-key"></i>&nbsp;Ubah Password</a>
          </td>
        </tr>

      <?php endforeach ?>

          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
