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
    <h1>
      Informasi Anggota
      <small>Informasi Anggota</small>
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Informasi Anggota</a></li>
        <li class="active">Informasi Anggota</li>
      </ol>
  </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-md-6">
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Informasi Anggota</h3>
      </div>
      
      <div class="box-body">
      <div class="form-group">
                    <label><b>Nama: </b></label>
                    <input readonly type="text" class="form-control" value="<?= $anggota['nama_anggota']; ?>">
                </div>
                <div class="form-group">
                    <label><b>Pekerjaan: </b></label>
                    <input readonly type="text" class="form-control" value="<?= $anggota['pekerjaan']; ?>">
                </div>
                <div class="form-group">
                    <label><b>Status: </b></label>
                    <input readonly type="text" class="form-control" value="<?= $anggota['status']; ?>">
                </div>
        </div>
      </div>
    </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    <!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>

</html>
