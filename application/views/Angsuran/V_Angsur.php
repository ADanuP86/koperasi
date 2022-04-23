<div class="content-wrapper">
  <section class="content-header">
    <h1>Angsuran
      <small>Data Angsuran</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li><a href="<?php echo base_url('C_Anggota/anggota') ?>"><i class="fa fa-wrench"></i>Transaksi</a></li>
      <li class="active">Angsuran</li>
    </ol>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-6">
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Data Pinjaman</h3>
        <a href="<?= base_url('C_Angsuran/angsuran') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
      </div>

      <?php foreach ($koperasi as $kpr) { ?>

<div class="box-body">
    <label>Tanggal Pinjaman :</label> <?php echo dateindo($kpr->tgl_pinjam) ?> <br/>
    <label>Besar Pinjaman   :</label> <?php echo rupiah($kpr->besar_pinjaman) ?> <br/>
    <label>Nama Anggota     :</label> <?php echo $kpr->nama_anggota ?> <br/>
    <label>Nama Admin       :</label> <?php echo $kpr->nama_admin ?>
</div>

<div class="box-body">
  <label>Angsuran Sekarang:</label> <font color="red"> <?php echo $total_angsur ?> </font>/ <?php echo $kpr->jumlah_angsur ?> <br/>
</div>

    <?php } ?>    
                                    
  </div>
</div>
    
      <div class="col-md-6">
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Data Angsuran</h3>
      <div class="pull-right">
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
      </div>
      </div>

<div class="box-body">
  <?php if(empty($angsur)) { ?>
    <div class="alert alert-danger">
      Anda Belum Melakukan Angsuran Satu Pun.
    </div>

<?php } else { ?>

<div class="table-responsive">

    <?php if ($this->session->flashdata('tambah')) : ?>
      <div class="alert alert-success">
    <?php echo $this->session->flashdata('tambah'); ?>
      </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('ubah')) : ?>
      <div class="alert alert-success">
    <?php echo $this->session->flashdata('ubah'); ?>
      </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('hapus')) : ?>
      <div class="alert alert-warning">
    <?php echo $this->session->flashdata('hapus'); ?>
      </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('gagal')) : ?>
      <div class="alert alert-danger">
    <?php echo $this->session->flashdata('gagal'); ?>
      </div>
    <?php endif; ?>

  <table class="table table-bordered">

    <thead>
      <th class="text-center">No</th>
      <th class="text-center">Tanggal Angsur</th>
      <th class="text-center">Angsuran Ke-</th>
      <th class="text-center">Besar Angsuran</th>
      <th class="text-center">Aksi</th>
    </thead>

    <tbody>
      <?php
      $total_besarangsuran = 0;
      $no = 1;
      foreach($angsur as $a) {
        
      $besar_angsuran[] = $a->besar_angsuran; $total_besarangsuran = array_sum($besar_angsuran);

      ?>

      <tr>
        <td class="text-center"><?php echo $no++ ?></td>
        <td class="text-center"><?php echo dateindo($a->tgl_angsur) ?></td>
        <td class="text-center"><?php echo $a->angsuran_ke ?></td>
        <td class="text-center"><?php echo rupiah($a->besar_angsuran) ?></td>
        <td class="text-center">
          <a href="<?= base_url('C_Angsuran/edit/' . $a->id_angsuran) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp;Ubah</a> <br> <br>
          <a href="<?= base_url('C_Angsuran/delete/' . $a->id_angsuran) ?>" onclick="return confirm('Yakin Ingin Hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
        </td>
      </tr>

      <?php } ?>

      <tr>
      <th class="text-center" colspan="3">Total Angsuran</th>
      <th class="text-center"><?php echo rupiah($total_besarangsuran) ?></th>
      </tr>

    </tbody>
  </table>
</div>
      </div>
    <?php } ?>                       
  </div>
</div>
  </div>
</section>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Form Input Data Angsuran</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url(). 'C_Angsuran/tambah_angsuran/' . $kpr->id_pinjaman ?>">

      <div class="form-group">
        <label>Tanggal Angsur</label>
        <input type="hidden" name="id_angsuran" class="form-control" id="id_angsuran">
        <input type="date" name="tgl_angsur" class="form-control" id="tgl_angsur" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label>Tanggal Pinjaman, Besar Pinjaman</label>
        <select name="id_pinjaman" id="id_pinjaman" class="form-control">
          <option value="" selected disabled>--Pilih--</option>
          <?php foreach ($pinjaman as $p) : ?>
          <option <?= set_select('id_pinjaman', $p['id_pinjaman']) ?> value="<?= $p['id_pinjaman'] ?>"><?= dateindo($p['tgl_pinjam']) ?>, <?= rupiah($p['besar_pinjaman']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label>Angsuran Ke-</label>
        <input type="number" name="angsuran_ke" class="form-control" id="angsuran_ke" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label>Besar Angsuran</label>
        <input type="number" name="besar_angsuran" class="form-control" id="besar_angsuran" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label>Nama Anggota</label>
        <select name="idAnggota" id="idAnggota" class="form-control">
          <option value="" selected disabled>--Pilih--</option>
          <?php foreach ($anggota as $a) : ?>
          <option <?= set_select('idAnggota', $a['id_anggota']) ?> value="<?= $a['id_anggota'] ?>"><?= $a['nama_anggota'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label>Nama Admin</label>
        <select name="idAdmin" id="idAdmin" class="form-control">
          <option value="" selected disabled>--Pilih--</option>
          <?php foreach ($admin as $a) : ?>
          <option <?= set_select('idAdmin', $a['id_admin']) ?> value="<?= $a['id_admin'] ?>"><?= $a['nama_admin'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
      <button type="submit" class="btn btn-primary">Simpan</button>
      
        </form>
      </div>
    </div>
  </div>
</div>
