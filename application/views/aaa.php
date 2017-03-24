
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

  <head>
    <meta charset="utf-8">
   
	<title>.:: Selamat datang di Perpustakaan : <?=$q_instansi->nama?> ::.</title>
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
        padding-top: 10px;
        padding-bottom: 40px;
		font-family: 'Sintony', sans-serif;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="<?=base_URL()?>aset/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?=base_URL()?>/favicon.ico">
  </head>
  
  <body style="background: #7BA9DE">  
	<div class="container well" style="width: 960px">
	
	<img src="<?=base_URL()?>aset/<?=$q_instansi->logo?>" style="width: 70px; height: 70px; display: inline; margin: -5px 0 50px 0">
	<h3 style="margin: -120px 0 20px 90px; font-family: Georgia; font-size: 25px">Perpustakaan <?=$q_instansi->nama?></h3> <br>
	<small style="font-family: Times New Roman; font-size: 17px; margin: -40px 0 0 90px; display: inline; position: absolute">Alamat : <?=$q_instansi->alamat?></small>
	
	
	<div class="navbar">
	  <div class="navbar-inner">
		<ul class="nav">
			<li><a href="<?=base_URL()?>depan" class="depan">Beranda</a></li>
			<li><a href="<?=base_URL()?>depan/profil" class="depan">Profil Perpustakaan</a></li>
			<li><a href="<?=base_URL()?>depan/cari_buku" class="depan">Cari Buku</a></li>				 
			<!--<li><a href="<?=base_URL()?>depan/buku_terbaru" class="depan">Buku Terbaru</a></li>	-->			 
		</ul>
		<!--<form class="navbar-form pull-right" method="post" action="<?=base_URL()?>index.php/tampil/cari">
		  <input type="text" class="span2" name="q" value="">
		  <button type="submit" class="btn">Cari Buku</button>
		</form>-->
	  </div>
	  
	  
	</div>
	
	<?php 
		$q_terakhir = $this->db->query("SELECT COUNT(id) AS terakhir FROM t_pengunjung WHERE LEFT(tgl, 10) = DATE(NOW())")->row();
		$q_hari_ini = $this->db->query("SELECT COUNT(id) AS terakhir FROM t_pengunjung WHERE LEFT(tgl, 10) = DATE(NOW())")->row();
		$q_bulan_ini = $this->db->query("SELECT COUNT(id) AS terakhir FROM t_pengunjung WHERE MID(tgl, 6, 2) = MONTH(NOW())")->row();
	?>
	<div class="row-fluid">
        <div class="span3">
          <div class="wellwhite sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header" style="">Statistik Hari Ini</li>
				<center style="margin-top: 20px">Anda pengunjung ke :</center>
				<center style="font-size: 35px; margin-top: 20px; font-weight: bold"><?=($q_terakhir->terakhir + 1)?></center>
				<center style="margin-top: 20px">Total Hari Ini : <?=$q_hari_ini->terakhir?></center>
				<center style="margin-top: 0px; margin-bottom: 10px">Total Bulan Ini : <?=$q_bulan_ini->terakhir?></center>
			</ul>
          </div>
		  
		  <div class="wellwhite sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header" style="">Kalender</li>
				<?=$this->calendar->generate();?>
			</ul>
          </div>
		  
		   <div class="wellwhite sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header" style="">Login Admin</li>
				<center style="margin-top: 20px; margin-bottom: 20px"><a href="<?=base_URL()?>apps" target="_blank">Klik Disini</a></center>
			</ul>
          </div>
		  
		  <!--/.well -->
		  
        </div>

		<?=$this->load->view($page)?>
		
      </div><!--/row-->
		<hr>	

     <footer>
		<div><center>&reg; SIMPUS. Loaded in : 0.1462. Copyright: <?=$q_instansi->nama?> - 2013.</div>
	</footer>



    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
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
    <script src="<?=base_URL()?>aset/js/bootstrap-typeahead.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-typeahead.js"></script>
	<script type="text/javascript" src="<?=base_URL()?>aset/fancybox/jquery.fancybox.js"></script>
	<script type="text/javascript" src="<?=base_URL()?>aset/fancybox/jquery.mousewheel.js"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_URL()?>aset/fancybox/jquery.fancybox.css" media="screen" />


	<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
	
	$('.carousel').carousel({
		interval: 3000
	});
	
	$(function () {
		$('#myTab a:first').tab('show');
	});
	</script>
  </body>
</html>