<div class="content-wrapper">
  <section class="content-header">
    <h1>Anggota
      <small>Data Anggota</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li><a href="<?php echo base_url('C_Anggota/anggota') ?>"><i class="fa fa-user"></i>Anggota</a></li>
      <li class="active">Edit Data Anggota</li>
    </ol>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-6">
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Data Anggota</h3>
      </div>

    <?php foreach($koperasi as $kpr) { ?>

    <form role="form" action="<?php echo base_url(). 'C_Anggota/update'; ?>" method="post">
    <div class="box-body">

    <div class="form-group">
      <label for="nama">Nama</label>
      <input type="hidden" name="id_anggota" class="form-control" value="<?php echo $kpr->id_anggota ?>">
      <input type="text" name="nama_anggota" class="form-control" id="nama" value="<?php echo $kpr->nama_anggota ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

    <div class="form-group">
      <label for="nik">NIK</label>
      <input type="number" name="nik" class="form-control" id="nik" value="<?php echo $kpr->nik ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
      <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>

    <div class="form-group">
      <label for="tgl_lahir">Tanggal Lahir</label>
      <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" value="<?php echo $kpr->tgl_lahir ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

    <div class="form-group">
      <label for="tempat_lahir">Tempat Lahir</label>
      <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="<?php echo $kpr->tempat_lahir ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

    <div class="form-group">
      <label>Alamat</label>
      <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $kpr->alamat ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

    <div class="form-group">
      <label for="pekerjaan">Pekerjaan</label>
      <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="<?php echo $kpr->pekerjaan ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

    <div class="form-group">
      <label>Jenis Kelamin</label>
      <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
        <?php foreach ($koperasi as $jk) : ?>
      <option value="" selected disabled>--Pilih--</option>
      <option <?= $kpr->jenis_kelamin == $jk->jenis_kelamin ? 'selected' : ''; ?> <?= set_select('jenis_kelamin', $jk->jenis_kelamin) ?> value="<?= $jk->jenis_kelamin ?>"><?= $jk->jenis_kelamin ?></option>
      <option value="Laki-laki">Laki-laki</option>
      <option value="Perempuan">Perempuan</option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="form-group">
      <label for="no_telpon">No.Telpon</label>
      <input type="number" name="no_telpon" class="form-control" id="no_telpon" value="<?php echo $kpr->no_telpon ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
      <?= form_error('no_telpon', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>

    <div class="form-group">
      <label for="tgl_masuk">Tanggal Masuk</label>
      <input type="date" name="tgl_masuk" class="form-control" id="tgl_masuk" value="<?php echo $kpr->tgl_masuk ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

    <div class="form-group">
      <label>Status</label>
      <select name="status" id="status" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
        <?php foreach ($koperasi as $st) : ?>
      <option value="" selected disabled>--Pilih--</option>
      <option <?= $kpr->status == $st->status ? 'selected' : ''; ?> <?= set_select('status', $st->status) ?> value="<?= $st->status ?>"><?= $st->status ?></option>
      <option value="Aktif">Aktif</option>
      <option value="Non-aktif">Non-aktif</option>
        <?php endforeach; ?>
      </select>
    </div>
  
    </div>

    <div class="box-footer">
      <a href="<?= base_url('C_Anggota/anggota') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>

    <?php } ?>

        </div>
      </div>
    </div>
  </section>
</div>
