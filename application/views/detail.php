<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Detail Data Mahasiswa
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url('mahasiswa/cetak') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Detail Data Mahasiswa</li>
      </ol>
    </section>

    <section class="content">
     

      <a class="btn btn-warning" href="<?php echo base_url('mahasiswa/cetak') ?>"> <i class="fa fa-file"></i>Export PDF</a>

      <table class="table">
        <tr>
          <th>NO</th>
          <th>Nama</th>
          <th>NPM</th>
          <th>Prodi</th>
          <th>Alamat</th>
        </tr>

        <?php 
        $no = 1;
        foreach ($mahasiswa as $mhs) : ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $mhs->nama ?></td>
          <td><?php echo $mhs->npm ?></td>
          <td><?php echo $mhs->prodi ?></td>
          <td><?php echo $mhs->alamat ?></td>
        </tr>

      <?php endforeach ?>

      </table>
    </section>
</div>
