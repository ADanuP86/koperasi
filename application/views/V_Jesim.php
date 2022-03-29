<div class="content-wrapper">
  <section class="content-header">
    <h1>Pengaturan Simpanan
      <small>Data Jenis Simpanan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
      <li><a href="#"><i class="fa fa-wrench"></i>Pengaturan Transaksi</a></li>
      <li class="active">Pengaturan Simpanan</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Data Jenis Simpanan</h3>
    <div class="pull-right">
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah</button>
    </div>
    </div>

    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="tabel-data">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama Simpanan</th>
          <th>Tanggal Input</th>
          <th>Besar Simpanan</th>
          <th class="text-center">Aksi</th>
        </tr>
        </thead>

        <tbody>

        <?php 
        $no = 1;
        foreach ($koperasi as $kpr) : ?>

        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $kpr->nama_simpanan ?></td>
          <td><?php echo $kpr->tgl_input ?></td>
          <td><?php echo $kpr->besar_simpanan ?></td>
          <td class="text-center"><?php echo anchor('C_Jesim/edit/'.$kpr->id_jesim, '<div class="btn btn-success btn-sm"><i class="fa fa-edit"></i>Edit</div>') ?> <?php echo anchor('C_Jesim/delete/'.$kpr->id_jesim, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</div>') ?></td>
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
        <h4 class="modal-title" id="exampleModalLabel">Form Input Data Jenis Simpanan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url(). 'C_Jesim/tambah_jesim' ?>">

        <div class="form-group">
          <label>Nama Simpanan</label>
          <input type="text" name="nama_simpanan" class="form-control">
        </div>

        <div class="form-group">
          <label>Tanggal Input</label>
          <input type="date" name="tgl_input" class="form-control">
        </div>

        <div class="form-group">
          <label>Besar Simpanan</label>
          <input type="text" name="besar_simpanan" class="form-control">
        </div>

        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>
