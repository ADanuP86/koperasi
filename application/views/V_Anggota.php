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
      <table class="table table-bordered table-striped" id="tabel-data">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>NIK</th>
          <th>Tanggal Lahir</th>
          <th>Tempat Lahir</th>
          <th>Pekerjaan</th>
          <th>Jenis Kelamin</th>
          <th>No.Telpon</th>
          <th>Tanggal Masuk</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
        </thead>

        <tbody>

        <?php 
        $no = 1;
        foreach ($koperasi as $kpr) : ?>

        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $kpr->nama_anggota ?></td>
          <td><?php echo $kpr->nik ?></td>
          <td><?php echo $kpr->tgl_lahir ?></td>
          <td><?php echo $kpr->tempat_lahir ?></td>
          <td><?php echo $kpr->pekerjaan ?></td>
          <td><?php echo $kpr->jenis_kelamin ?></td>
          <td><?php echo $kpr->no_telpon ?></td>
          <td><?php echo $kpr->tgl_masuk ?></td>
          <td><?php echo $kpr->status ?></td>
          <td class="text-center"><?php echo anchor('C_Anggota/edit/'.$kpr->id_anggota, '<div class="btn btn-success btn-sm"><i class="fa fa-edit"></i>Edit</div>') ?> <br> <br> <?php echo anchor('C_Anggota/delete/'.$kpr->id_anggota, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</div>') ?></td>
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

        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>
