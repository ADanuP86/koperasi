<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>assets/img/Logo Koperasi.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('ses_username'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li <?=$this->uri->segment(2) == 'index' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?> class="nav-item">
          <a href="<?php echo base_url('C_Beranda/index') ?>" class="nav-link">
            <i class="fa fa-dashboard"></i> <span>Beranda</span>
          </a>
        </li>
        <li <?=$this->uri->segment(2) == 'anggota' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?> class="nav-item">
          <a href="<?php echo base_url('C_Anggota/anggota') ?>" class="nav-link">
            <i class="fa fa-user"></i> <span>Anggota</span>
          </a>
        </li>
         <li class="treeview" <?=$this->uri->segment(2) == '' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?> class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-money"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('C_Simpanan/simpanan') ?>"><i class="fa fa-circle-o"></i> Simpanan</a></li>
            <li><a href="<?php echo base_url('C_Pinjaman/pinjaman') ?>"><i class="fa fa-circle-o"></i> Pinjaman</a></li>
            <li><a href="<?php echo base_url('C_Angsuran/angsuran') ?>"><i class="fa fa-circle-o"></i> Angsuran</a></li>
          </ul>
        </li>
        <li class="treeview" <?=$this->uri->segment(2) == '' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?> class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-wrench"></i> <span>Pengaturan Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
            <a href="<?php echo base_url('C_Jesim/jesim') ?>">
            <i class="fa fa-circle-o"></i>Pengaturan Simpanan</a></li>
            <li>
            <a href="<?php echo base_url('C_Jepin/jepin') ?>">
            <i class="fa fa-circle-o"></i>Pengaturan Pinjaman</a></li>
          </ul>
        </li>
        <li class="treeview" <?=$this->uri->segment(2) == '' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?> class="nav-item">
          <a href="" class="nav-link">
            <i class="fa fa-file-text"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
            <a href="<?php echo base_url('C_Laporan/data_anggota') ?>">
            <i class="fa fa-circle-o"></i>Data Anggota</a></li>
            <li>
            <a href="<?php echo base_url('C_Laporan/data_simpanan') ?>">
            <i class="fa fa-circle-o"></i>Data Simpanan</a></li>
            <li>
            <a href="<?php echo base_url('C_Laporan/data_pinjaman') ?>">
            <i class="fa fa-circle-o"></i>Data Pinjaman</a></li>
            <li>
            <a href="<?php echo base_url('C_Laporan/data_angsuran') ?>">
            <i class="fa fa-circle-o"></i>Data Angsuran</a></li>
          </ul>
        </li>
        <li <?=$this->uri->segment(2) == 'admin' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?> class="nav-item">
          <a href="<?php echo base_url('C_Admin/admin') ?>" class="nav-link">
            <i class="fa fa-user-circle"></i> <span>User Admin</span>
          </a>
        </li>
         <li <?=$this->uri->segment(2) == 'logout' || $this->uri->segment(2) == '' ? 'class="active"' : '' ?> class="nav-item">
          <a onclick="javascript: return confirm('Yakin Ingin Keluar?')" href="<?php echo base_url('C_Login/logout') ?>" class="nav-link">
          <i class="fa fa-sign-out"></i> <span>Logout</span>
        </a>
      </li>
    </ul>
  </section>
<!-- /.sidebar -->
</aside>
