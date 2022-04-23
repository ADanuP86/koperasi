<div class="content-wrapper">
  <section class="content-header">
    <h1>Simpanan
      <small>Data Simpanan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li><a href="#"><i class="fa fa-wrench"></i>Transaksi</a></li>
      <li><a href="<?php echo base_url('C_Simpanan/simpanan') ?>">Simpanan</a></li>
      <li class="active">Edit Data Simpanan</li>
    </ol>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-6">
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Data Simpanan</h3>
      </div>

    <?php foreach($koperasi as $kpr) { ?>

    <form role="form" action="<?php echo base_url(). 'C_Simpanan/update'; ?>" method="post">
    <div class="box-body">

    <div class="form-group">
      <label>Tanggal Simpanan</label>
      <input type="hidden" name="id_simpanan" class="form-control" value="<?php echo $kpr->id_simpanan ?>">
      <input type="date" name="tgl_simpan" class="form-control" id="tgl_simpan" value="<?php echo $kpr->tgl_simpan ?>">
    </div>

      <div class="form-group">
        <label>Nama Simpanan</label>
        <select name="id_jesim" id="id_jesim" class="form-control">
          <option value="" selected disabled>--Pilih--</option>
            <?php foreach ($jenis as $j) : ?>
          <option <?= $kpr->id_jesim == $j['id_jesim'] ? 'selected' : ''; ?> <?= set_select('id_jesim', $j['id_jesim']) ?> value="<?= $j['id_jesim'] ?>"><?= $j['nama_simpanan'] ?></option>
            <?php endforeach; ?>
        </select>
      </div>

   <!-- <div class="form-group">
      <label for="besar_simpanan">Besar Simpanan</label>
      <input type="text" name="besar_simpanan" class="form-control" id="besar_simpanan" readonly=""> value="<?php echo $kpr->besar_simpanan ?>">
    </div> -->

    <div class="form-group">
        <label>Nama Anggota</label>
        <select name="id_anggota" id="id_anggota" class="form-control">
          <option value="" selected disabled>--Pilih--</option>
            <?php foreach ($anggota as $a) : ?>
          <option <?= $kpr->id_anggota == $a['id_anggota'] ? 'selected' : ''; ?> <?= set_select('id_anggota', $a['id_anggota']) ?> value="<?= $a['id_anggota'] ?>"><?= $a['nama_anggota'] ?></option>
            <?php endforeach; ?>
        </select>
      </div>

    <div class="form-group">
        <label>Nama Admin</label>
        <select name="id_admin" id="id_admin" class="form-control">
          <option value="" selected disabled>--Pilih--</option>
            <?php foreach ($admin as $a) : ?>
          <option <?= $kpr->id_admin == $a['id_admin'] ? 'selected' : ''; ?> <?= set_select('id_admin', $a['id_admin']) ?> value="<?= $a['id_admin'] ?>"><?= $a['nama_admin'] ?></option>
            <?php endforeach; ?>
        </select>
      </div>
  
    </div>

    <div class="box-footer">
      <a href="<?= base_url('C_Simpanan/simpanan') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>

    <?php } ?>

        </div>
      </div>
    </div>
  </section>
</div>
