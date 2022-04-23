<div class="content-wrapper">
  <section class="content-header">
    <h1>Pengaturan Simpanan
      <small>Data Jenis Simpanan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li><a href="#"><i class="fa fa-wrench"></i>Pengaturan Transaksi</a></li>
      <li><a href="<?php echo base_url('C_Jesim/jesim') ?>">Pengaturan Simpanan</a></li>
      <li class="active">Tambah Data Jenis Simpanan</li>
    </ol>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-6">
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah Data Jenis Simpanan</h3>
      </div>

    <form role="form" action="<?php echo base_url(). 'C_Jesim/tambah_jesim'; ?>" method="post">
    <div class="box-body">

    <div class="form-group">
      <label>Nama Simpanan</label>
      <input type="hidden" name="id_jesim" class="form-control" id="id_jesim">
      <input type="text" name="nama_simpanan" class="form-control" id="nama_simpanan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
      <?= form_error('nama_simpanan', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>

    <div class="form-group">
      <label>Tanggal Input</label>
      <input type="date" name="tgl_input" class="form-control" id="tgl_input" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

    <div class="form-group">
      <label>Besar Simpanan</label>
      <input type="number" name="besar_simpanan" class="form-control" id="besar_simpanan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
    </div>

</div>

    <div class="box-footer">
      <a href="<?= base_url('C_Jesim/jesim') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>

    </form>

        </div>
      </div>
    </div>
  </section>
</div>
