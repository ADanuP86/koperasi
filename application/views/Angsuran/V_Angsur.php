<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Include file CSS Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

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

      <?php foreach ($koperasi as $kpr) { 
      $besar_pinjaman[] = $kpr->besar_pinjaman; $total_besarpinjaman = $kpr->besar_pinjaman+$kpr->besar_pinjaman/100*$kpr->jasa
      ?>

<div class="box-body">
    <label>Tanggal Pinjaman :</label> <?php echo dateindo($kpr->tgl_pinjam) ?> <br/>
    <label>Total Pinjaman   :</label> <?php echo rupiah($total_besarpinjaman) ?> <br/>
    <label>Nama Anggota     :</label> <?php echo $kpr->nama_anggota ?> <br/>
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
      <?php if (date("Y-m-d") > $kpr->tgl_tempo ) : ?>
        <font color="red" style="font-weight: bold"> Jatuh Tempo </font>
        <button class="btn btn-primary disabled"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
      <?php else: ?>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
      <?php endif ?>
      </div>
      </div>

<div class="box-body">
  <?php if(empty($angsur)) { ?>
    <div class="alert alert-danger">
      Belum Melakukan Angsuran Satu Pun.
    </div>

<?php } 
else { ?>

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
      <th class="text-center">Nama Admin</th>
      <th class="text-center">Aksi</th>
    </thead>

    <tbody>
      <?php
      $total_besarangsuran = 0;
      $no = 1;
      foreach($angsur as $a) {
        
      $besar_angsuran[] = $a->besar_angsuran; $total_besarangsuran = array_sum($besar_angsuran)

      ?>
      
      <tr>
        <td class="text-center"><?php echo $no++ ?></td>
        <td class="text-center"><?php echo dateindo($a->tgl_angsur) ?></td>
        <td class="text-center"><?php echo $a->angsuran_ke ?></td>
        <td class="text-center"><?php echo rupiah($a->besar_angsuran) ?></td>
        <td class="text-center"><?php echo $a->nama_admin ?></td>
        <td class="text-center">
          <a href="<?= base_url('C_Angsuran/edit/' . $a->id_angsuran) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp;Ubah</a> <br> <br>
            <?php if($kpr->status_pinjaman == 'Lunas' ) : ?>
          <a class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i>&nbsp;Hapus</a> <br> <br>
            <?php else: ?>
          <a href="<?= base_url('C_Angsuran/delete/' . $a->id_angsuran) ?>" onclick="return confirm('Yakin Ingin Hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Hapus</a> <br> <br>
            <?php endif ?>
          <a href="<?= base_url('C_Angsuran/cetak_buktiangsuran/' . $a->id_angsuran) ?>" class="btn btn-default btn-sm"><i class="fa fa-file-pdf-o"></i>&nbsp;Cetak Bukti</a>
        </td>
      </tr>

      <?php } ?>

      <?php $sisaangsuran = $total_besarpinjaman-$total_besarangsuran
      ?>

      <tr>
      <th class="text-center" colspan="3">Total Angsuran</th>
      <th class="text-center"><?php echo rupiah($total_besarangsuran) ?></th>
      <?php
      if($sisaangsuran == 0) { ?>
      <th class="text-center" colspan="6" rowspan="2">Angsruan Lunas <br> <br>
        <a href="<?= base_url('C_Angsuran/cetak_buktilunas/' . $a->id_angsuran) ?>" class="btn btn-default btn-sm"><i class="fa fa-file-pdf-o"></i>&nbsp;Cetak Bukti</a></th>
      <?php } ?>
      </tr>
      <tr>
      <th class="text-center" colspan="3">Sisa Angsuran</th>
      <th class="text-center"><?php echo rupiah($sisaangsuran) ?></th>
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
        <input type="date" name="tgl_angsur" class="form-control" id="tgl_angsur" value="<?php echo date("Y-m-d") ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label for="nama">Tanggal Pinjam - Total Pinjaman</label>
        <input type="hidden" name="id_pinjaman" class="form-control" id="id_pinjaman" value="<?php echo $kpr->id_pinjaman ?>">
        <input type="text" name="tgl_pinjam" class="form-control" id="tgl_pinjam" value="<?php echo dateindo($kpr->tgl_pinjam) ?> - <?php echo rupiah($total_besarpinjaman) ?> " readonly>
      </div>

      <div class="form-group">
        <label>Angsuran Ke-</label>
        <input type="number" name="angsuran_ke" class="form-control" id="angsuran_ke" value="<?php echo $total_angsur+1 ?>" readonly required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label>Besar Angsuran</label>
        <input type="number" name="besar_angsuran" class="form-control" id="besar_angsuran" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
      </div>

      <div class="form-group">
        <label>Nama</label>
        <input type="hidden" name="idAnggota" class="form-control" id="idAnggota" value="<?php echo $kpr->idanggota ?>">
        <input type="text" name="nama_anggota" class="form-control" id="nama_anggota" value="<?php echo $kpr->nama_anggota ?>" readonly>
      </div>

      <div class="form-group">
        <label>Nama Admin</label>
        <input type="hidden" name="idAdmin" class="form-control" id="idAdmin" value="<?php echo $admin['id_admin'] ?>">
        <input type="text" name="nama_admin" class="form-control" id="nama_admin" value="<?php echo $admin['nama_admin'] ?>" readonly>
      </div>

      <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
      <button type="submit" class="btn btn-primary">Simpan</button>
      
        </form>
      </div>
    </div>
  </div>
</div>
</html>
