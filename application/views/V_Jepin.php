<div class="content-wrapper">
  <section class="content-header">
      <h1>Pengaturan Pinjaman
        <small>Data Jenis Pinjaman</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
        <li><a href="#"><i class="fa fa-wrench"></i>Pengaturan Transaksi</a></li>
        <li class="active">Pengaturan Pinjaman</li>
      </ol>
  </section>

    <section class="content">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Data Jenis Pinjaman</h3>
          <div class="pull-right">
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah</button>
    </div>
  </div>

    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="tabel-data">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama Pinjaman</th>
          <th>Tanggal Input</th>
          <th>Besar Pinjaman</th>
          <th>Jasa</th>
          <th class="text-center">Aksi</th>
        </tr>
        </thead>

        <tbody>

        <?php 
        $no = 1;
        foreach ($koperasi as $kpr) : ?>

        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $kpr->nama_pinjaman ?></td>
          <td><?php echo $kpr->tgl_input ?></td>
          <td><?php echo $kpr->besar_pinjaman ?></td>
          <td><?php echo $kpr->jasa ?></td>
          <td class="text-center"><?php echo anchor('C_Jepin/edit/'.$kpr->id_jepin, '<div class="btn btn-success btn-sm"><i class="fa fa-edit"></i>Edit</div>') ?> <?php echo anchor('C_Jepin/delete/'.$kpr->id_jepin, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</div>') ?></td>
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
        <h4 class="modal-title" id="exampleModalLabel">Form Input Data Jenis Pinjaman</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url(). 'C_Jepin/tambah_jepin' ?>">

        <div class="form-group">
          <label>Nama Pinjaman</label>
          <input type="text" name="nama_pinjaman" class="form-control">
        </div>

        <div class="form-group">
          <label>Tgl Input</label>
          <input type="date" name="tgl_input" class="form-control">
        </div>

        <div class="form-group">
          <label>Besar Pinjaman</label>
          <input type="text" name="besar_pinjaman" class="form-control">
        </div>

        <div class="form-group">
          <label>jasa</label>
          <input type="text" name="jasa" class="form-control">
        </div>

        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

</div>
