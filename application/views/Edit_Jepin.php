<div class="content-wrapper">
  <section class="content-header">
    <h1>Pengaturan Pinjaman
      <small>Data Jenis Pinjaman</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li><a href="<?php echo base_url('C_Jepin/jepin') ?>">Pengaturan Pinjaman</a></li>
      <li class="active">Edit Data Jenis Pinjaman</li>
    </ol>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-6">
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Data Jenis Pinjaman</h3>
      </div>

    <?php foreach($koperasi as $kpr) { ?>

    <form role="form" action="<?php echo base_url(). 'C_Jepin/update'; ?>" method="post">
    <div class="box-body">

    <div class="form-group">
      <label for="nama_pinjaman">Nama Pinjaman</label>
      <input type="hidden" name="id_jepin" class="form-control" value="<?php echo $kpr->id_jepin ?>">
      <input type="text" name="nama_pinjaman" class="form-control" id="nama_pinjaman" value="<?php echo $kpr->nama_pinjaman ?>">
    </div>

    <div class="form-group">
      <label for="tgl_input">Tanggal Input</label>
      <input type="date" name="tgl_input" class="form-control" id="tgl_input" value="<?php echo $kpr->tgl_input ?>">
    </div>

    <div class="form-group">
      <label for="besar_pinjaman">Besar Pinjaman</label>
      <input type="text" name="besar_pinjaman" class="form-control" id="besar_pinjaman" value="<?php echo $kpr->besar_pinjaman ?>">
    </div>

    <div class="form-group">
      <label for="jasa">Besar Jasa</label>
      <input type="text" name="jasa" class="form-control" id="jasa" value="<?php echo $kpr->jasa ?>">
    </div>
  
    </div>

    <div class="box-footer">
      <a href="<?= base_url('C_Jepin/jepin') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>

    <?php } ?>

        </div>
      </div>
    </div>
  </section>
</div>
