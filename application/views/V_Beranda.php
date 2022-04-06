<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Beranda
      <small>Beranda</small>
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Beranda</a></li>
        <li class="active">Beranda</li>
      </ol>
  </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-md-12">
      <div class="box box-primary">
      
      <div class="box-body">
      <h2>Selamat Datang Administrator</h2>
      <h4>Sistem Informasi Koperasi Mulya Abadi Sentosa</h4>
      <p>Jl. Pemuda No. 01 Kampung Wates Kecamatan Bumi Ratu Nuban Kabupaten Lampung Tengah Kode Pos 34161</p><br>
        </div>
      </div>
    </div>
    </div>
  
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Anggota</span>
              <span class="info-box-number"><?php echo ($count['anggota']); ?><small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-cash"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Simpanan</span>
              <span class="info-box-number"><?php echo rupiah($total_simpanan) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-social-usd"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pinjaman</span>
              <span class="info-box-number"><?php echo rupiah($total_pinjaman) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-card"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Angsuran</span>
              <span class="info-box-number">Rp.0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
