<div class="content-wrapper">
  <section class="content-header">
    <h1>Pengaturan Pinjaman
      <small>Data Jenis Pinjaman</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li><a href="#"><i class="fa fa-wrench"></i>Pengaturan Transaksi</a></li>
      <li><a href="<?php echo base_url('C_Jepin/jepin') ?>">Pengaturan Pinjaman</a></li>
      <li class="active">Tambah Data Jenis Pinjaman</li>
    </ol>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-6">
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah Data Jenis Pinjaman</h3>
      </div>

    <form role="form" action="<?php echo base_url(). 'C_Jepin/tambah_jepin'; ?>" method="post">
    <div class="box-body">

    <div class="form-group">
      <label>Nama Pinjaman</label>
      <input type="hidden" name="id_jepin" class="form-control" id="id_jepin">
      <input type="text" name="nama_pinjaman" class="form-control" id="nama_pinjaman" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
      <?= form_error('nama_pinjaman', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>

    <div class="form-group">
      <label>Tanggal Input</label>
      <input type="date" name="tgl_input" class="form-control" id="tgl_input" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

    <div class="form-group">
      <label>Besar Pinjaman</label>
      <input type="number" name="besar_pinjaman" class="form-control" id="besar_pinjaman" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
      <?= form_error('besar_pinjaman', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>

    <div class="form-group">
      <label>Jasa %</label>
      <input type="number" name="jasa" class="form-control" id="jasa" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

</div>

    <div class="box-footer">
      <a href="<?= base_url('C_Jepin/jepin') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>

    </form>

        </div>
      </div>
    </div>
  </section>
</div>
