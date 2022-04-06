<div class="content-wrapper">
  <section class="content-header">
    <h1>Pinjaman
      <small>Data Pinjaman</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li><a href="<?php echo base_url('C_Pinjaman/pinjaman') ?>">Pinjaman</a></li>
      <li class="active">Edit Data Pinjaman</li>
    </ol>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-6">
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Data Pinjaman</h3>
      </div>

    <?php foreach($koperasi as $kpr) { ?>

    <form role="form" action="<?php echo base_url(). 'C_Pinjaman/update'; ?>" method="post">
    <div class="box-body">

    <div class="form-group">
      <label>Tanggal Pinjaman</label>
      <input type="hidden" name="id_pinjaman" class="form-control" value="<?php echo $kpr->id_pinjaman ?>">
      <input type="date" name="tgl_pinjam" class="form-control" id="tgl_pinjam" value="<?php echo $kpr->tgl_pinjam ?>">
    </div>

      <div class="form-group">
        <label>Nama Pinjaman</label>
        <select name="id_jepin" id="id_jepin" class="form-control">
          <option value="" selected disabled>--Pilih--</option>
            <?php foreach ($jenis as $j) : ?>
          <option <?= $kpr->id_jepin == $j['id_jepin'] ? 'selected' : ''; ?> <?= set_select('id_jepin', $j['id_jepin']) ?> value="<?= $j['id_jepin'] ?>"><?= $j['nama_pinjaman'] ?></option>
            <?php endforeach; ?>
        </select>
      </div>

   <!-- <div class="form-group">
      <label for="besar_pinjaman">Besar Pinjaman</label>
      <input type="text" name="besar_pinjaman" class="form-control" id="besar_pinjaman" readonly=""> value="<?php echo $kpr->besar_pinjaman ?>">
    </div> -->

    <div class="form-group">
      <label>Tanggal Tempo</label>
      <input type="date" name="tgl_tempo" class="form-control" id="tgl_tempo" value="<?php echo $kpr->tgl_tempo ?>">
    </div>

    <div class="form-group">
      <label>Status</label>
      <select name="status_pinjaman" id="status_pinjaman" class="form-control">
        <?php foreach ($koperasi as $stp) : ?>
      <option value="" selected disabled>--Pilih--</option>
      <option <?= $kpr->status_pinjaman == $stp->status_pinjaman ? 'selected' : ''; ?> <?= set_select('status_pinjaman', $stp->status_pinjaman) ?> value="<?= $stp->status_pinjaman ?>"><?= $stp->status_pinjaman ?></option>
      <option value="Lunas">Lunas</option>
      <option value="Belum Lunas">Belum Lunas</option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="form-group">
        <label>Nama Anggota</label>
        <select name="idanggota" id="idanggota" class="form-control">
          <option value="" selected disabled>--Pilih--</option>
            <?php foreach ($anggota as $a) : ?>
          <option <?= $kpr->idanggota == $a['id_anggota'] ? 'selected' : ''; ?> <?= set_select('id_anggota', $a['id_anggota']) ?> value="<?= $a['id_anggota'] ?>"><?= $a['nama_anggota'] ?></option>
            <?php endforeach; ?>
        </select>
      </div>

    <div class="form-group">
        <label>Nama Admin</label>
        <select name="idadmin" id="idadmin" class="form-control">
          <option value="" selected disabled>--Pilih--</option>
            <?php foreach ($admin as $a) : ?>
          <option <?= $kpr->idadmin == $a['id_admin'] ? 'selected' : ''; ?> <?= set_select('id_admin', $a['id_admin']) ?> value="<?= $a['id_admin'] ?>"><?= $a['nama_admin'] ?></option>
            <?php endforeach; ?>
        </select>
      </div>
  
    </div>

    <div class="box-footer">
      <a href="<?= base_url('C_Pinjaman/pinjaman') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>

    <?php } ?>

        </div>
      </div>
    </div>
  </section>
</div>
