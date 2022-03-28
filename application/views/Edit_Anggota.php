<div class="content-wrapper">
  <section class="content-header">
    <h1>Anggota
      <small>Data Anggota</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li><a href="<?php echo base_url('C_Anggota/anggota') ?>">Anggota</a></li>
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
      <input type="text" name="nama_anggota" class="form-control" id="nama" value="<?php echo $kpr->nama_anggota ?>">
    </div>

    <div class="form-group">
      <label for="nik">NIK</label>
      <input type="number" name="nik" class="form-control" id="nik" value="<?php echo $kpr->nik ?>">
    </div>

    <div class="form-group">
      <label for="tgl_lahir">Tanggal Lahir</label>
      <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" value="<?php echo $kpr->tgl_lahir ?>">
    </div>

    <div class="form-group">
      <label for="tempat_lahir">Tempat Lahir</label>
      <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="<?php echo $kpr->tempat_lahir ?>">
    </div>

    <div class="form-group">
      <label for="pekerjaan">Pekerjaan</label>
      <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="<?php echo $kpr->pekerjaan ?>">
    </div>

    <div class="form-group">
      <label for="jenis_kelamin">Jenis Kelamin</label>
      <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
        <option value="">--Pilih--</option>
        <option value="laki-laki">Laki-laki</option>
        <option value="perempuan">Perempuan</option>
      </select>
    </div>

    <div class="form-group">
      <label for="no_telpon">No.Telpon</label>
      <input type="number" name="no_telpon" class="form-control" id="no_telpon" value="<?php echo $kpr->no_telpon ?>">
    </div>

    <div class="form-group">
      <label for="tgl_masuk">Tanggal Masuk</label>
      <input type="date" name="tgl_masuk" class="form-control" id="tgl_masuk" value="<?php echo $kpr->tgl_masuk ?>">
    </div>

    <div class="form-group">
      <label for="status">Status</label>
      <select name="status" id="status" class="form-control">
        <option value="">--Pilih--</option>
        <option value="aktif">Aktif</option>
        <option value="non-aktif">Non-Aktif</option>
      </select>
    </div>
  
    </div>

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>

    <?php } ?>

        </div>
      </div>
    </div>
  </section>
</div>
