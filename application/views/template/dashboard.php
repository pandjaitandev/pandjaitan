<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= $menu ?></title>
  <!-- Ikon -->
  <link rel="shortcut icon" href="<?=base_url()?>/assets/dist/img/favicon.png">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/fontawesome-free/css/all.min.css">  
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme stye -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- pace-progress -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <!-- Aous -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/aos/aos.css">
  <?php $this->load->view("script/header_function")?>
  <?php 
    if (isset($header_script)) {
      $this->load->view("script/".$header_script);
    }
  ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed pace-warning">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-green navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block ">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url()?>" class="nav-link">Hari ini : <?= date('d / m / Y');?></a>
      </li>
      <li class="nav-item d-lg-none">
        <div class="image">
          <a href="<?=base_url()?>"><img src="<?=base_url()?>/assets/dist/img/logo-lembaga.png" style="width: 180px; height: 50px;" alt="User Image"></a>
        </div>
      </li>      
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">            
      <li class="nav-item">
        <a class="nav-link" href="<?=site_url('auth/logout')?>"><i class="fas fa-sign-out-alt"></i>Keluar</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-green elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url()?>" class="brand-link bg-info">
      <img src="<?=base_url()?>/assets/dist/img/logo-lembaga.png" alt="Logo Lembaga" class="brand-image" style="opacity: 2.8;" width="200px">
      <!-- <span class="brand-text font-weight-normal"><b><?= ucfirst($this->fungsi->pilihan_advanced("setting","kode","namaapk")->row("keterangan"))?></b></span> -->
    </a>
    <!-- Sidebar -->

    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>/assets/dist/img/foto-user/<?= ($this->fungsi->user_login()->foto != null) ? $this->fungsi->user_login()->foto : "foto-default.png"; ?>" class="img-circle elevation-2" style="width: 60px; height: 60px;" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= site_url('profil');?>" class="d-block"><?= ucfirst($this->fungsi->user_login()->nama)?></a>
          <small><?= ucfirst($this->fungsi->get_deskripsi("tb_tipe_user",$this->session->tipe_user))?></small>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?=base_url()?>" class="nav-link <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == "" ? "active" : ""?>">
            <i class="nav-icon fas fa-home"></i><p>Beranda</p></a>            
          </li>
          <li class="nav-item">
            <a href="<?=base_url("profil")?>" class="nav-link <?=$this->uri->segment(1) == 'profil' ? "active" : ""?>">
            <i class="nav-icon fas fa-user"></i><p>Profil</p></a>            
          </li>
          <?php if ($this->session->tipe_user < 2) {} else { ?>
          <li class="nav-header">FITUR</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?=$this->uri->segment(1) == 'anggota' || $this->uri->segment(1) == "pendaftaran" ? "active" : ""?>"><i class="nav-icon fas fa-users"></i><p>Database<i class="right fas fa-angle-down"></i></p></a>
            <ul class="nav nav-treeview">              
              <li class="nav-item">
                <a href="<?=site_url('anggota')?>" class="nav-link <?=$this->uri->segment(1) == 'anggota' ? "active" : ""?>"><i class="nav-icon fas fa-database"></i><p>Data Anggota</p></a>
              </li>
            </ul>
            <?php if ($this->session->tipe_user < 4) {} else { ?>
            <ul class="nav nav-treeview">              
              <li class="nav-item">            
                <a href="<?=site_url('pendaftaran/data/')?>" class="nav-link <?=$this->uri->segment(1) == 'pendaftaran' ? "active" : ""?>">
                <i class="nav-icon fas fa-book"></i><p>Data Pendaftaran</p></a>
              </li>
            </ul>
            <?php } ?>
          </li>
          <li class="nav-item">
            <a href="<?=base_url("statistik")?>" class="nav-link <?=$this->uri->segment(1) == 'statistik' ? "active" : ""?>">
            <i class="nav-icon fas fa-chart-bar"></i><p>Statistik</p></a>            
          </li>
          <li class="nav-item">
            <a href="<?=base_url("sk")?>" class="nav-link <?=$this->uri->segment(1) == 'sk' ? "active" : ""?>">
            <i class="nav-icon fas fa-list"></i><p>Pengajuan SK</p></a>            
          </li>
          <?php if ($this->session->tipe_user < 4) {} else { ?>
          <li class="nav-header">ADMIN</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?=$this->uri->segment(1) == 'komisariat' || $this->uri->segment(1) == "rayon" ? "active" : ""?>"><i class="nav-icon fas fa-users"></i><p>Master Data<i class="right fas fa-angle-down"></i></p></a>
            <ul class="nav nav-treeview">              
              <li class="nav-item">
                <a href="<?=site_url('komisariat')?>" class="nav-link <?=$this->uri->segment(1) == 'komisariat' ? "active" : ""?>"><i class="nav-icon fas fa-database"></i><p>Komisariat</p></a>
              </li>
            </ul>
            <ul class="nav nav-treeview">              
              <li class="nav-item">            
                <a href="<?=site_url('rayon')?>" class="nav-link <?=$this->uri->segment(1) == 'rayon' ? "active" : ""?>">
                <i class="nav-icon fas fa-book"></i><p>Rayon</p></a>
              </li>
            </ul>
          </li>
          <?php } ?>
          <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?=$menu?></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <hr>
      </div><!-- /.container-fluid -->
      <?php $this->view('message') ?>          
    </div>
    <!-- /.content-header -->
    <?= $contents ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <!-- Main Footer -->
  <footer class="main-footer d-none d-sm-inline-block">
    <strong>&copy; <?= date("Y")?> <a href="http://fitrahizulfalaq.blogspot.com"><?= ucfirst($this->fungsi->pilihan_advanced("setting","kode","pengembang")->row("keterangan"))?></a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> <?= ucfirst($this->fungsi->pilihan_advanced("setting","kode","versi")->row("keterangan"))?>
    </div>
  </footer>

  <footer class="main-footer text-center bg-success d-lg-none">
    <div class="row text-white">
      <div class="col"><a class="text-white" href="<?= base_url('profil')?>"><i class="fas fa-user"></i></a></div>
      <div class="col"><a class="text-white" href="<?= base_url('')?>"><i class="fas fa-home"></i></a></div>
      <!-- <div class="col"><a class="text-white" href="<?= base_url('profil')?>"><i class="fas fa-user-cog"></i></a></div> -->
      <div class="col"><a class="text-white" href="<?= base_url('page/tentang')?>"><i class="fas fa-info"></i></a></div>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?=base_url()?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?=base_url()?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url()?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>/assets/dist/js/adminlte.js"></script>
<!-- pace-progress -->
<script src="<?=base_url()?>/assets/plugins/pace-progress/pace.min.js"></script>
<!-- AdminLTE App -->

<!-- OPTIONAL SCRIPTS -->
<script src="<?=base_url()?>/assets/dist/js/demo.js"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?=base_url()?>/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?=base_url()?>/assets/plugins/raphael/raphael.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?=base_url()?>/assets/dist/js/pages/dashboard2.js"></script>

<!-- SELECT2 -->
<script src="<?=base_url()?>assets/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
  })
</script>

<?php $this->load->view("script/footer_function")?>
<?php 
    if (isset($footer_script)) {
      $this->load->view("script/".$footer_script);
    }
  ?>
</body>
</html>

