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
    <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Data Simpanan</h3>
    <div class="pull-right">
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah</button>
    </div>
    </div>

    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="tabel-data">
        <thead>
        <tr>
          <th>No</th>
          <th>Tanggal Simpanan</th>
          <th>Nama Simpanan</th>
          <th>Besar Simpanan</th>
          <th>Nama Anggota</th>
          <th>Nama Admin</th>
          <th class="text-center">Aksi</th>
        </tr>
        </thead>

        <tbody>

        <?php 
        $no = 1;
        foreach ($koperasi as $kpr) : ?>

        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $kpr->tgl_simpan ?></td>
          <td><?php echo $kpr->nama_simpanan ?></td>
          <td><?php echo $kpr->besar_simpanan ?></td>
          <td><?php echo $kpr->nama_anggota ?></td>
          <td><?php echo $kpr->nama_admin ?></td>
          <td class="text-center"><?php echo anchor('C_Simpanan/edit/'.$kpr->id_simpanan, '<div class="btn btn-success btn-sm"><i class="fa fa-edit"></i>Edit</div>') ?> <?php echo anchor('C_Simpanan/delete/'.$kpr->id_simpanan, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</div>') ?></td>
        </tr>

      <?php endforeach ?>

          </tbody>
        </table>
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
          <input type="date" name="tgl_simpan" class="form-control">
        </div>

        <div class="form-group">
          <label>Nama Simpanan</label>
          <select name="id_jesim" id="id_jesim" class="form-control">
            <option value="" selected disabled>--Pilih--</option>
              <?php foreach ($jenis as $j) : ?>
            <option <?= set_select('id_jesim', $j['id_jesim']) ?> value="<?= $j['id_jesim'] ?>"><?= $j['nama_simpanan'] ?></option>
              <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label>Besar Simpanan</label>
          <input type="text" name="besar_simpanan" class="form-control" readonly="">
        </div>

        <div class="form-group">
          <label>Nama Anggota</label>
          <select name="id_anggota" id="id_anggota" class="form-control">
            <option value="" selected disabled>--Pilih--</option>
              <?php foreach ($anggota as $a) : ?>
            <option <?= set_select('id_anggota', $a['id_anggota']) ?> value="<?= $a['id_anggota'] ?>"><?= $a['nama_anggota'] ?></option>
              <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label>Nama Admin</label>
          <select name="id_admin" id="id_admin" class="form-control">
            <option value="" selected disabled>--Pilih--</option>
              <?php foreach ($admin as $a) : ?>
            <option <?= set_select('id_admin', $a['id_admin']) ?> value="<?= $a['id_admin'] ?>"><?= $a['nama_admin'] ?></option>
              <?php endforeach; ?>
          </select>
        </div>

        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

</div>
