<div class="content-wrapper">
  <section class="content-header">
    <h1>Pinjaman
      <small>Data Pinjaman</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li><a href="#"><i class="fa fa-wrench"></i>Transaksi</a></li>
      <li class="active">Pinjaman</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Data Pinjaman</h3>
    <div class="pull-right">
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
    </div>
    </div>

    <div class="box-body table-responsive">

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

      <table class="table table-bordered table-striped" id="tabel-data">
        <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Tanggal Pinjaman</th>
          <th class="text-center">Besar Pinjaman</th>
          <th class="text-center">jasa %</th>
          <th class="text-center">Jumlah Angsur (x)</th>
          <th class="text-center">Lama Angsur (bulan)</th>
          <th class="text-center">Tanggal Tempo</th>
          <th class="text-center">Nama Anggota</th>
          <th class="text-center">Nama Admin</th>
          <th class="text-center">Status</th>
          <th class="text-center">Aksi</th>
        </tr>
        </thead>

        <tbody>

        <?php 
        $no = 1;
        foreach ($koperasi as $kpr) : ?>

        <tr>
          <td class="text-center"><?php echo $no++ ?></td>
          <td class="text-center"><?php echo dateindo($kpr->tgl_pinjam) ?></td>
          <td class="text-center"><?php echo rupiah($kpr->besar_pinjaman) ?></td>
          <td class="text-center"><?php echo $kpr->jasa ?></td>
          <td class="text-center"><?php echo $kpr->jumlah_angsur ?></td>
          <td class="text-center"><?php echo $kpr->lama_angsur ?></td>
          <td class="text-center"><?php echo dateindo($kpr->tgl_tempo) ?></td>
          <td class="text-center"><?php echo $kpr->nama_anggota ?></td>
          <td class="text-center"><?php echo $kpr->nama_admin ?></td>
          <td class="text-center">
          <?php
          if($kpr->status_pinjaman == 'Lunas') { ?>
            <span class="badge alert-info"><?php echo $kpr->status_pinjaman ?></span>
          <?php } else { ?>
            <span class="badge alert-warning"><?php echo $kpr->status_pinjaman ?></span>
          <?php } ?>
          </td>
          <td class="text-center">
          <a href="<?= base_url('C_Pinjaman/edit/' . $kpr->id_pinjaman) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp;Ubah</a> <br> <br>
          <a href="<?= base_url('C_Pinjaman/delete/' . $kpr->id_pinjaman) ?>" onclick="return confirm('Yakin Ingin Hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Hapus</a> <br> <br>
          <a href="<?= base_url('C_Pinjaman/cetak_buktipinjaman/' . $kpr->idanggota) ?>" class="btn btn-default btn-sm"><i class="fa fa-file-pdf-o"></i>&nbsp;Cetak Bukti</a>
          </td>
        </tr>

      <?php endforeach ?>

          </tbody>
        </table>
      </div>
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
        <h4 class="modal-title" id="exampleModalLabel">Form Input Data Pinjaman</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url(). 'C_Pinjaman/tambah_pinjaman' ?>">

        <div class="form-group">
          <label>Tanggal Pinjaman</label>
          <input type="date" name="tgl_pinjam" class="form-control">
        </div>

        <!--<div class="form-group">
          <label>Nama Pinjaman</label>
          <select name="id_jepin" id="id_jepin" class="form-control">
            <option value="" selected disabled>--Pilih--</option>
              <?php foreach ($jenis as $j) : ?>
            <option <?= set_select('id_jepin', $j['id_jepin']) ?> value="<?= $j['id_jepin'] ?>"><?= $j['nama_pinjaman'] ?></option>
              <?php endforeach; ?>
          </select>
        </div>-->

        <div class="form-group">
          <label>Besar Pinjaman</label> *tidak boleh lebih dari jumlah simpanan
          <input type="number" name="besar_pinjaman" class="form-control">
        </div>

        <div class="form-group">
          <label>Jasa %</label>
          <input type="number" name="jasa" class="form-control">
        </div>

        <div class="form-group">
          <label>Jumlah Angsur (x)</label>
          <input type="number" name="jumlah_angsur" class="form-control">
        </div>

        <div class="form-group">
          <label>Lama Angsur (bulan)</label>
          <input type="number" name="lama_angsur" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
        </div>

        <div class="form-group">
          <label>Tanggal Tempo</label>
          <input type="date" name="tgl_tempo" class="form-control">
        </div>

        <div class="form-group">
          <label>Nama Anggota</label>
          <select name="idanggota" id="idanggota" class="form-control">
            <option value="" selected disabled>--Pilih--</option>
              <?php foreach ($anggota as $a) : ?>
            <option <?= set_select('idanggota', $a['id_anggota']) ?> value="<?= $a['id_anggota'] ?>"><?= $a['nama_anggota'] ?></option>
              <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label>Nama Admin</label>
          <select name="idadmin" id="idadmin" class="form-control">
            <option value="" selected disabled>--Pilih--</option>
              <?php foreach ($admin as $a) : ?>
            <option <?= set_select('idadmin', $a['id_admin']) ?> value="<?= $a['id_admin'] ?>"><?= $a['nama_admin'] ?></option>
              <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="status_pinjaman">Status</label>
          <select name="status_pinjaman" id="status_pinjaman" class="form-control">
          <option  value="" selected disabled>--Pilih--</option>
          <option  value="lunas">Lunas</option>
          <option  value="belum lunas">Belum Lunas</option>
          </select>
        </div>

        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>
