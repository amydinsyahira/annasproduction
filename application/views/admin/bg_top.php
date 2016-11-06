<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Administrator An-Nas Via Production</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/screen.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/icon.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/validationEngine.jquery.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-1.4.js" ></script>
<script src="<?php echo base_url(); ?>asset/js/jquery.validationEngine-id.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>asset/js/jquery.validationEngine.js" type="text/javascript"></script>
<script>	
		$(document).ready(function() {			
			$(".validateJS").validationEngine();
		});
	</script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-ui-1.7.2.custom.min.js"></script>
		<script type="text/javascript">
			$(function(){
	
                               // bufferdie love m...
                                $('.datepickernow').datepicker({
                                	dateFormat: 'yy-mm-dd',
                                	showOptions: {direction: "up"},
                                	changeMonth: true,
                                	changeYear: true
                                });
				
			});
		</script>
<!-- <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/redmond/jquery-ui.css" type="text/css" rel="stylesheet"/> -->
<link href="<?php echo base_url(); ?>asset/css/jquery-ui.css" type="text/css" rel="stylesheet"/>	
</head>
<body onload="goforit();"> 
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer">
		<!--  start nav -->
		<div class="nav">
		<div class="table">
		
		<ul class="select"><li><a href="<?php echo base_url(); ?>aksesroot"><b><i class="fa fa-dashboard"></i> Dashboard</b></a>
		<div class="select_sub">
			<ul class="sub">
				<li><a href="<?php echo base_url(); ?>aksesroot/set_akun">Pengaturan Akun Admin</a></li>
				<?php 
				if($lvl=="spradmn"){
				?>
				<li><a href="<?php echo base_url(); ?>aksesroot/tambah_admin">Tambah Akun Admin</a></li>
				<?php
				}
				?>
				<li><a href="<?php echo base_url(); ?>aksesroot/logout">Log Out</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="select"><li><a href="#nogo"><b><i class="fa fa-archive"></i> Produk</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="<?php echo base_url(); ?>aksesroot/lihat_produk">Lihat Semua Produk</a></li>
				<li><a href="<?php echo base_url(); ?>aksesroot/tambah_produk">Tambah Produk</a></li>
				<li><a href="<?php echo base_url(); ?>aksesroot/lihat_kategori_produk">Lihat Semua Kategori Produk</a></li>
				<li><a href="<?php echo base_url(); ?>aksesroot/tambah_kategori_produk">Tambah Kategori Produk</a></li>
				<li><a href="<?php echo base_url(); ?>aksesroot/lihat_katalog">Lihat Katalog Produk</a></li>
				<li><a href="<?php echo base_url(); ?>aksesroot/tambah_katalog">Tambah Katalog Produk</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="#nogo"><b><i class="fa fa-comments-o"></i> Member & Testimonial</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="<?php echo base_url(); ?>aksesroot/lihat_semua_member">Lihat Semua Member</a></li>
				<li><a href="<?php echo base_url(); ?>aksesroot/lihat_semua_testimonial">Lihat Semua Testimonial</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="<?php echo base_url(); ?>aksesroot/transaksi_histori"><b><i class="fa fa-book"></i> Histori Transaksi</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<!-- <div class="select_sub">
			<ul class="sub">
				<li><a href="<?php echo base_url(); ?>aksesroot/transaksi_harian">Lihat Transaksi Harian</a></li>
				<li><a href="<?php echo base_url(); ?>aksesroot/transaksi_bulanan">Lihat Transaksi Bulanan</a></li>
				<li><a href="<?php echo base_url(); ?>aksesroot/transaksi_tahunan">Lihat Transaksi Tahunan</a></li>
			 
			</ul>
		</div> -->
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		<ul class="select"><li><a href="<?php echo base_url(); ?>aksesroot/hubungi_kami"><b><i class="fa fa-comments"></i> Hubungi Kami</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<!-- <div class="select_sub">
			<ul class="sub">
				<li><a href="<?php echo base_url(); ?>aksesroot/transaksi_harian">Lihat Transaksi Harian</a></li>
				<li><a href="<?php echo base_url(); ?>aksesroot/transaksi_bulanan">Lihat Transaksi Bulanan</a></li>
				<li><a href="<?php echo base_url(); ?>aksesroot/transaksi_tahunan">Lihat Transaksi Tahunan</a></li>
			 
			</ul>
		</div> -->
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		
		</li>
		</ul>
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="<?php echo base_url(); ?>aksesroot/pengembalian_barang"><b><i class="fa fa-mail-reply-all"></i> Pengembalian Barang Rusak</b><!--[if IE 7]><!--></a><!--<![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<div class="welcome">
<?php
		echo "Selamat Datang, <b>".$nama."</b>. | ";
	?><script src="<?php echo base_url(); ?>asset/js/clock.js" type="text/javascript"></script><span id="clock"></span>
<!--  start nav-outer-repeat................................................... END -->
</div>