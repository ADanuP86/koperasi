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
    <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Data Pinjaman</h3>
    <div class="pull-right">
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah</button>
    </div>
    </div>

    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="tabel-data">
        <thead>
        <tr>
          <th>No</th>
          <th>Tanggal Pinjaman</th>
          <th>Jenis Pinjaman</th>
          <th>Besar Pinjaman</th>
          <th>Tanggal Tempo</th>
          <th>Status</th>
          <th>Nama Anggota</th>
          <th>Nama Admin</th>
          <th class="text-center">Aksi</th>
        </tr>
        </thead>

        <tbody>

        <?php 
        $no = 1;
        foreach ($koperasi as $kpr) : ?>

        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $kpr->tgl_pinjam ?></td>
          <td><?php echo $kpr->nama_pinjaman ?></td>
          <td><?php echo $kpr->besar_pinjaman ?></td>
          <td><?php echo $kpr->tgl_tempo ?></td>
          <td><?php echo $kpr->status ?></td>
          <td><?php echo $kpr->nama_anggota ?></td>
          <td><?php echo $kpr->nama_admin ?></td>
          <td class="text-center"><?php echo anchor('C_Pinjaman/edit/'.$kpr->id_pinjaman, '<div class="btn btn-success btn-sm"><i class="fa fa-edit"></i>Edit</div>') ?> <br> <br> <?php echo anchor('C_Pinjaman/delete/'.$kpr->id_pinjaman, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</div>') ?></td>
        </tr>

      <?php endforeach ?>

          </tbody>
        </table>
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
          <label> Tanggal Pinjaman</label>
          <input type="date" name="tgl_pinjam" class="form-control">
        </div>

        <label for="">Nama Pinjaman</label>
        <div class="form-group">
          <select name="id_jepin" id="id_jepin" class="custom-select">
            <option value="" selected disabled>--Pilih--</option>
              <?php foreach ($nama as $j) : ?>
            <option <?= set_select('id_jepin', $j['id_jepin']) ?> value="<?= $j['id_jepin'] ?>"><?= $j['nama_pinjaman'] ?></option>
              <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label>Nama Anggota</label>
          <input type="text" name="nama_anggota" class="form-control">
        </div>

        <div class="form-group">
          <label>Nama Admin</label>
          <input type="text" name="nama_admin" class="form-control">
        </div>

        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

</div>
