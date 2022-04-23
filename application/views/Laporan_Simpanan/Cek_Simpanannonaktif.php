<div class="content-wrapper">
  <section class="content-header">
      <h1>Data Simpanan
        <small>Laporan Data Simpanan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('C_Beranda/index') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="#"><i class="fa fa-file"></i>Laporan</a></li>
        <li class="active">Data Simpanan</li>
      </ol>
  </section>

  <section class="content">
    <div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Laporan Data Simpanan</h3>
      <a href="<?= base_url('C_Laporan/simpanan_anggotanonaktif') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
    </div>
    
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Tanggal Simpanan</th>
          <th class="text-center">Nama Simpanan</th>
          <th class="text-center">Nama Anggota</th>
          <th class="text-center">Nama Admin</th>
          <th class="text-center">Besar Simpanan</th>
        </tr>
        </thead>

        <tbody>

        <?php
        $total_besarsimpanan = 0;
        $no = 1;
        foreach ($koperasi as $kpr) : 
        
        $besar_simpanan[] = $kpr->besar_simpanan; $total_besarsimpanan = array_sum($besar_simpanan);

        ?>

        <tr>
          <td class="text-center"><?php echo $no++ ?></td>
          <td class="text-center"><?php echo dateindo($kpr->tgl_simpan) ?></td>
          <td class="text-center"><?php echo $kpr->nama_simpanan ?></td>
          <td class="text-center"><?php echo $kpr->nama_anggota ?></td>
          <td class="text-center"><?php echo $kpr->nama_admin ?></td>
          <td class="text-center"><?php echo rupiah($kpr->besar_simpanan) ?></td>
        </tr>

      <?php endforeach ?>
      
      <tr>
      <th class="text-center" colspan="5">Total Simpanan</th>
      <th class="text-center"><?php echo rupiah($total_besarsimpanan) ?></th>
     </tr>

        </tbody>
      </table>
    </div>
  </div>
  </div>
  </div>
</section>
</div>
