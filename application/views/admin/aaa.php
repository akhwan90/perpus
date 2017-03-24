<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Administrator Area Aplikasi Perpus => <?=$this->session->userdata('user')?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="<?=base_URL()?>aset/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
		@font-face {
		  font-family: 'Sintony';
		  font-style: normal;
		  font-weight: 400;
		  src: local('Sintony'), url(<?=base_URL()?>aset/sintoni.woff) format('woff');
		}

      body {
        padding-top: 60px;
        padding-bottom: 40px;
		font-family: 'Sintony', sans-serif;
		font-size: 12px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="<?=base_URL()?>aset/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    
    <script src="<?=base_URL()?>aset/js/jquery.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-transition.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-alert.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-modal.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-dropdown.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-scrollspy.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-tab.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-tooltip.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-popover.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-button.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-collapse.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-carousel.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-typeahead.js"></script>

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="<?=base_URL()?>aset/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_URL()?>aset/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_URL()?>aset/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_URL()?>aset/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=base_URL()?>aset/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>
	<?php 
	$q_instansi	= $this->db->query("SELECT * FROM r_config LIMIT 1")->row();
	?>
    <div class="navbar navbar-inverse navbar-fixed-top" style="background: #CBD9BC">
      	<div style="margin-left: 20px">
			<img style="width: 70px; height: 70px; display: inline; float: left; margin-right: 20px" src="<?=base_URL()?>aset/<?=$q_instansi->logo?>">
			<h3>Perpustakaan <?=$q_instansi->nama?></h3>
			<h6 style="font-family: Georgia; margin-top: -10px">Alamat : <?=$q_instansi->alamat?></h6>
		</div>

		
		<div class="navbar-inner" style="margin-top: 20px">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
      
          <div class="nav-collapse collapse">

            <ul class="nav">
              <?php 
			$m_view	= array("Home", "Transaksi", "Data Anggota", "Data Buku", "Tools");
			$m_val	= array("", "trans", "anggota", "buku", "tool");
			
			for ($a = 0; $a < sizeof($m_view); $a++) {
				if ($m_val[$a] == $this->uri->segment(2)) {
					echo "<li class='active'><a href='".base_URL()."apps/".$m_val[$a]."'>".$m_view[$a]."</a></li>";
				} else {
					echo "<li><a href='".base_URL()."apps/".$m_val[$a]."'>".$m_view[$a]."</a></li>";
				}
			}
			?>
			<li class="dropdown"><a data-toggle="dropdown" href="#" class="dropdown-toggle">Laporan &nbsp;&nbsp;<b class="caret"></b></a>		
				<ul class="dropdown-menu">
					<li><a href="<?=base_URL()?>apps/l_pengunjung">Pengunjung</a></li>
					<li><a href="<?=base_URL()?>apps/l_peminjam">Peminjaman</a></li>
					<li><a href="<?=base_URL()?>apps/l_buku">Buku</a></li>
					<li><a href="<?=base_URL()?>apps/l_anggota">Anggota</a></li>
					<li><a href="<?=base_URL()?>apps/stat">Statistik Terbanyak</a></li>
				</ul>
			</li>
			<li class="dropdown"><a data-toggle="dropdown" href="#" class="dropdown-toggle">Referensi &nbsp;&nbsp;<b class="caret"></b></a>		
				<ul class="dropdown-menu">
					<li><a href="<?=base_URL()?>apps/r_jenis">Jenis Pustaka</a></li>
					<li><a href="<?=base_URL()?>apps/r_kelas">Kelas Pustaka</a></li>
					<li><a href="<?=base_URL()?>apps/r_lokasi">Lokasi Pustaka</a></li>
				</ul>
			</li>
			<li class="dropdown"><a data-toggle="dropdown" href="#" class="dropdown-toggle">Konfigurasi &nbsp;&nbsp;<b class="caret"></b></a>		
				<ul class="dropdown-menu">
					<li><a href="<?=base_URL()?>apps/nama_perpus">Nama Perpustakaan</a></li>
					<li><a href="<?=base_URL()?>apps/c_pinjam">Peminjaman</a></li>
					<li><a href="<?=base_URL()?>apps/libur">Hari Libur</a></li>
				</ul>
			</li>
			
            </ul>
			
			<div class="btn-group navbar-form pull-right" style="margin-right: 20px">
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
				<b>admin</b>
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<!--<li><a href="<?=base_URL()?>apps/passwod">Account Info</a></li>-->
					<li><a href="<?=base_URL()?>apps/logout">Logout</a></li>
				</ul>
			</div>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid" style="margin-top: 90px">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Administrator Menu</li>
			<?php 
			$m_view	= array("Home", "Transaksi", "Data Anggota", "Data Buku", "Tools");
			$m_val	= array("", "trans", "anggota", "buku", "tool");
			
			for ($a = 0; $a < sizeof($m_view); $a++) {
				if ($m_val[$a] == $this->uri->segment(2)) {
					echo "<li class='active'><a href='".base_URL()."apps/".$m_val[$a]."'>".$m_view[$a]."</a></li>";
				} else {
					echo "<li><a href='".base_URL()."apps/".$m_val[$a]."'>".$m_view[$a]."</a></li>";
				}
			}
			?>
			
			<li><a href="<?=base_URL()?>apps/logout" onclick="return confirm('Are you sure ..?')"><b>Logout</b></a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
		<div class="span9">
			<?=$this->load->view("admin/".$page);?>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Sistem Informasi Perpustakaan <?=$q_instansi->nama?> @ <?=date('Y')?>. This site loaded in {elapsed_time} seconds</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  </body>
</html>
