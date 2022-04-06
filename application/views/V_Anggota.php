<div class="content-wrapper">
  <section class="content-header">
    <h1>Anggota
      <small>Data Anggota</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li class="active">Anggota</li>
    </ol>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-12">
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Data Anggota</h3>
      <div class="pull-right">
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah</button>
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
          <th class="text-center">Nama</th>
          <th class="text-center">NIK</th>
          <th class="text-center">Tanggal Lahir</th>
          <th class="text-center">Tempat Lahir</th>
          <th class="text-center">Pekerjaan</th>
          <th class="text-center">Jenis Kelamin</th>
          <th class="text-center">No.Telpon</th>
          <th class="text-center">Tanggal Masuk</th>
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
          <td class="text-center"><?php echo $kpr->nama_anggota ?></td>
          <td class="text-center"><?php echo $kpr->nik ?></td>
          <td class="text-center"><?php echo dateindo($kpr->tgl_lahir) ?></td>
          <td class="text-center"><?php echo $kpr->tempat_lahir ?></td>
          <td class="text-center"><?php echo $kpr->pekerjaan ?></td>
          <td class="text-center"><?php echo $kpr->jenis_kelamin ?></td>
          <td class="text-center"><?php echo $kpr->no_telpon ?></td>
          <td class="text-center"><?php echo dateindo($kpr->tgl_masuk) ?></td>
          <td class="text-center">
          <?php
          if($kpr->status == 'Aktif') { ?>
          <span class="badge alert-info"><?php echo $kpr->status ?></span>
          <?php } else { ?>
          <span class="badge alert-warning"><?php echo $kpr->status ?></span>
           <?php } ?>
          </td>
          <td class="text-center">
          <a href="<?= base_url('C_Anggota/edit/' . $kpr->id_anggota) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;Ubah</a><br><br>
          <a href="<?= base_url('C_Anggota/delete/' . $kpr->id_anggota) ?>" onclick="return confirm('Yakin Ingin Hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</a>
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
        <h4 class="modal-title" id="exampleModalLabel">Form Input Data Anggota</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url(). 'C_Anggota/tambah_anggota' ?>">

        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama_anggota" class="form-control">
        </div>

        <div class="form-group">
          <label>NIK</label>
          <input type="number" name="nik" class="form-control">
        </div>

        <div class="form-group">
          <label>Tanggal Lahir</label>
          <input type="date" name="tgl_lahir" class="form-control">
        </div>

        <div class="form-group">
          <label>Tempat Lahir</label>
          <input type="text" name="tempat_lahir" class="form-control">
        </div>

        <div class="form-group">
          <label>Pekerjaan</label>
          <input type="text" name="pekerjaan" class="form-control">
        </div>

        <div class="form-group">
          <label for="jenis_kelamin">Jenis Kelamin</label>
          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
          <option value="" selected disabled>--Pilih--</option>
          <option value="laki-laki">Laki-laki</option>
          <option value="perempuan">Perempuan</option>
          </select>
        </div>

        <div class="form-group">
          <label>No.Telpon</label>
          <input type="number" name="no_telpon" class="form-control">
        </div>

        <div class="form-group">
          <label>Tanggal Masuk</label>
          <input type="date" name="tgl_masuk" class="form-control">
        </div>

        <div class="form-group">
          <label for="status">Status</label>
          <select name="status" id="status" class="form-control">
          <option  value="" selected disabled>--Pilih--</option>
          <option  value="aktif">Aktif</option>
          <option  value="non-aktif">Non-Aktif</option>
          </select>
        </div>

        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>
