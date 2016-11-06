<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
<meta name="author" content="Gede Lumbung" /> 
<meta name="keywords" content="An-nas Via Production"> 
<meta name="description" content="An-nas Via Production"> 
<title><?php echo $judul; ?></title>
<link href="<?php echo base_url(); ?>asset/images/icon.png" rel="shortcut icon" />
<link href="<?php echo base_url(); ?>asset/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/css/icon.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/css/ddsmoothmenu.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/css/jquery.simpledialog.0.1.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/jquery.fancybox-1.3.4.css" media="screen" />
<link href="<?php echo base_url(); ?>asset/css/jquery-ui.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-1.4.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.jcarousel.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/vtip.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/skrip.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/flexdropdown.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.treeview.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/demo.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.simpledialog.0.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/loaddata.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript">
	$(function(){
		// bufferdie love m...
        $('.datepickernow').datepicker({
        	dateFormat: 'yy-mm-dd',
            showOptions: {direction: "up"},
            changeMonth: true,
            changeYear: true,
            yearRange: '1930:2003'
        });
	});
</script>

<script type="text/javascript">
		$(document).ready(function() {
			$("a[rel=example_group]").fancybox({
			
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});
		});		
		function formula_jne(datanilai) {
			var datanilaiAR = datanilai.split('.');
			var nilaijne = 0;
			if(parseInt(datanilaiAR[1]) < 30) {
				if(parseInt(datanilaiAR[0]) > 0) nilaijne = datanilaiAR[0];
				else nilaijne = 1;
			} else {
				nilaijne = parseInt(datanilaiAR[0]) + 1;
			}
			return nilaijne;
		}
		function number_format(a, b, c, d) { // Function Number Format
		 a = Math.round(a * Math.pow(10, b)) / Math.pow(10, b);
		 e = a + '';
		 f = e.split('.');
		 if (!f[0]) {f[0] = '0';}
		 if (!f[1]) {f[1] = '';}
		 if (f[1].length < b) {
			 g = f[1];
			 for (i=f[1].length + 1; i <= b; i++) {g += '0';}
			 f[1] = g;
		 }
		 if(d != '' && f[0].length > 3) {
			 h = f[0];
			 f[0] = '';
			 for(j = 3; j < h.length; j+=3) {
				 i = h.slice(h.length - j, h.length - j + 3);
				 f[0] = d + i + f[0] + '';
			 }
			 j = h.substr(0, (h.length % 3 == 0) ? 3 : (h.length % 3));
			 f[0] = j + f[0];
		 }
		 c = (b <= 0) ? '' : c;
		 return f[0] + c + f[1];
		}
		function htmldatavia() {
			$('#tujuankirim').val($('select#kotapaket option:selected').html());
			var hargaKirim = $('select#kotapaket option:selected').val().split("|");
			$('#hargaberatperpiece').val(hargaKirim[1]);
			if($('select#paket option:selected').html() == 'AMBIL DITEMPAT') $('font#ketKirim').html('AMBIL DITEMPAT');
			else $('font#ketKirim').html('KEBUMEN - '+$('select#kotapaket option:selected').html()+' (via '+$('select#paket option:selected').html()+') @'+number_format(hargaKirim[1], 0, ',', '.'));
			$('font#subttltxt').html(number_format(hargaKirim[1] * formula_jne($('#totalberat').val()), 0, ',', '.'));
			$('#subtotalkirim').val(hargaKirim[1] * formula_jne($('#totalberat').val()));
			$('font#suballtxt').html(number_format(parseInt($('#totalallminvia').val()) + parseInt(hargaKirim[1] * formula_jne($('#totalberat').val())), 0, ',', '.'));
		}
		function loadkotakirim(idpengiriman) {
			$.ajax ({
				type: "POST",
				url: "<?php echo base_url();?>checkout/ambildatakota",
				cache: false,
				data: "_idpengiriman="+idpengiriman,
				success: function(msg) {
					msg = msg.split("~");
					$('select#kotapaket').html(msg[1]);
					if(msg[0]==0) $('tr#triggerktkirim').fadeOut();
					else $('tr#triggerktkirim').fadeIn();
					htmldatavia();
				}
			});
		}
</script>
<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "smoothmenu1", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})
</script>
<script type="text/javascript"> 
$(document).ready( function()
	{	
		$('#lofslidecontent45').lofJSidernews( { interval:4000,
												 easing:'easeInOutQuad',
												duration:1000,
												auto:true } );						
	});
/*
	function slidePordukBaru()
	{
	    akhir = $('ul#produkbaru li:last').hide().remove();
	    $('ul#produkbaru').prepend(akhir);
        $('ul#produkbaru li:first').slideDown("slow");
	}
	function slidePordukLaris()
	{
	    akhir = $('ul#produklaris li:last').hide().remove();
	    $('ul#produklaris').prepend(akhir);
        $('ul#produklaris li:first').slideDown("slow");
	}
	setInterval(slidePordukBaru, 5000);
	setInterval(slidePordukLaris, 7000);
*/	
	
</script>

</head>

<body onLoad="goforit()">
<div class="cleaner_h5"></div>
<div id="menu">
<div class="logo">&nbsp;</div>
<div id="menu-kiri">
<ul>
<a href="<?php echo $this->config->item('site_url');?>web"><li class="home"><i class="fa fa-home" style="font-size:20px"></i> Beranda</li></a>

<a href="<?php echo $this->config->item('site_url');?>profil"><li><i class="fa fa-info-circle" style="font-size:20px"></i> Tentang Kami</li></a>

<a href="<?php echo $this->config->item('site_url');?>produk/cari"><li><i class="fa fa-archive" style="font-size:20px"></i> Produk</li></a>

<a href="<?php echo $this->config->item('site_url');?>cara_belanja"><li><i class="fa fa-book" style="font-size:20px"></i> Cara Belanja</li></a>

<a href="<?php echo $this->config->item('site_url');?>hubungi_kami"><li><i class="fa fa-phone" style="font-size:20px"></i> Hubungi Kami</li></a>

<a href="<?php echo $this->config->item('site_url');?>site_map"><li><i class="fa fa-sitemap" style="font-size:20px"></i> Site Map Produk</li></a>

<a href="<?php echo $this->config->item('site_url');?>keranjang"><li><i class="fa fa-shopping-cart" style="font-size:20px"></i> Keranjang Belanja</li></a>
</ul>
</div>
</div>
<div id="banner">
<div id="welcome" style="padding-left:130px;">
<?php if(empty($_SESSION['username_grosir_songkok'])){ ?>
<?php
}
else{
?>
<span style="margin-left:5px;">&nbsp;</span>Selamat Datang, <b><?php echo $nama; ?></b> - <a href="<?php echo base_url(); ?>member/logout">Log Out</a> | 
<?php } ?>
<a href="<?php echo base_url(); ?>katalog"><i class="fa fa-download"></i> Download Katalog</a> | <a href="<?php echo base_url(); ?>member"><i class="fa fa-user"></i> Member Area</a> | <script src="<?php echo base_url(); ?>asset/js/clock.js" type="text/javascript"></script><span id="clock"></span><p style="padding-top:5px; padding-left:5px; margin:0px auto;"></p>
</div>
<?php
$query = 'http://localhost'.$_SERVER['PHP_SELF'];
if($query==$this->config->item('site_url').'index.php/web' || $query==$this->config->item('site_url').'index.php'){
	echo '<div class="ban">&nbsp;</div>';
}else {
	echo '';
}
?>

<div class="pencarian">
<form method="post" action="<?php echo base_url(); ?>cari/lihat">
  <input type="text" class="input-teks-cari" size="25" value="Cari Produk..." onblur="if(this.value=='') this.value='Cari Produk...';" onfocus="if(this.value=='Cari Produk...') this.value='';" name="cari"  /> <input type="submit" value="Cari" class="input-tombol" />
</form>
</div>
<div id="menu-bawah">
<div id="smoothmenu1" class="ddsmoothmenu">
	<ul>
	<?php
		foreach($menu->result_array() as $m1)
		{
			$ambil = "";
			$ambil_kat = $this->songkok_model->ambil_id($m1['id_kategori']);
			foreach($ambil_kat->result() as $ak1)
			{
				$ambil .= "-".$ak1->id_kategori;
				$ambil_kat2 = $this->songkok_model->ambil_id($ak1->id_kategori);
				foreach($ambil_kat2->result() as $ak2)
				{
					$ambil .= "-".$ak2->id_kategori;
				}
			}
			$nm_link1 = $m1['id_kategori'].''.$ambil;
			$ld1 = strtolower(str_replace(" ","-",$nm_link1));
			$sub1 = $this->songkok_model->menu_kategori('1',$m1['id_kategori']);

			//if(count($sub1->result_array())>0){
				//echo '<li><a href="#">'.$m1['nama_kategori'].'</a><ul>';
			//}
			//else{
				echo '<li><a href="'.$this->config->item('site_url').'kategori/produk/'.$ld1.'">'.$m1['nama_kategori'].'</a><ul>';
			//}
			
			foreach($sub1->result() as $sm1)
			{
				$gbr = "";
				$ambil2 = "";
				$ambil2_kat = $this->songkok_model->ambil_id($sm1->id_kategori);
				foreach($ambil2_kat->result() as $ak1_2)
				{
					$ambil2 .= "-".$ak1_2->id_kategori;
					$ambil2_kat2 = $this->songkok_model->ambil_id($ak1_2->id_kategori);
					foreach($ambil2_kat2->result() as $ak2_2)
					{
						$ambil2 .= "-".$ak2_2->id_kategori;
					}
				}
				
				$nm_link2 = $sm1->id_kategori.''.$ambil2;

				$ld2 = strtolower(str_replace(" ","-",$nm_link2));
				$sub2 = $this->songkok_model->menu_kategori('2',$sm1->id_kategori);
				if(count($sub2->result())>0) 
				{
					$gbr='<img src="'.base_url().'asset/images/right.gif" border="0" align="right">';
					//echo '<li><a href="#">'.$sm1->nama_kategori.''.$gbr.'</a><ul>';
					echo '<li><a href="'.$this->config->item('site_url').'kategori/produk/'.$ld2.'">'.$sm1->nama_kategori.' '.$gbr.'</a><ul>';
				}
				else
				{
					echo '<li><a href="'.$this->config->item('site_url').'kategori/produk/'.$ld2.'">'.$sm1->nama_kategori.'</a><ul>';
				}
				
				foreach($sub2->result() as $sm2)
				{
					$nm_link3 = $sm2->id_kategori;
					$ld3 = strtolower(str_replace(" ","-",$nm_link3));
					echo '<li><a href="'.$this->config->item('site_url').'kategori/produk/'.$ld3.'">'.$sm2->nama_kategori.'</a></li>';
				}
				
				echo '</ul>';
				echo '</li>';
				
			}
			echo '</ul>';
			echo '</li>';
		}
	?>
	</ul>
</div>
</div>
</div>

<script type="text/javascript">
function mycarousel_initCallback(carousel)
{ 
carousel.buttonNext.bind('click', function() {
carousel.startAuto(0);
});
carousel.buttonPrev.bind('click', function() {
carousel.startAuto(0);
});
carousel.clip.hover(function() {
carousel.stopAuto();
}, function() {
carousel.startAuto();
});
};

jQuery(document).ready(function() {
jQuery('#hs').jcarousel({
visible: 7,
scroll: 1,
wrap: 'circular',
auto: 2,
animation: 1000,
initCallback: mycarousel_initCallback
 });
});
</script>


<div id="slider-banner">
	<div id="wrap"> 
		<ul id="hs" class="jcarousel-skin-tango-hs"> 
<?php
foreach($slide_atas->result_array() as $sa)
{

			$c = array (' ');
    		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
			$s = strtolower(str_replace($d,"",$sa['nama_produk']));
			$link = strtolower(str_replace($c, '-', $s));
	echo '<li><a href="'.base_url().'produk/detail/'.strtolower($sa['kode_produk']).'-'.$link.'" class="vtip" title="'.$sa['nama_produk'].' - Harga Rp.'.number_format($sa['harga'],2,',','.').'"><img src="'.base_url().'asset/produk/'.$sa['gbr_kecil'].'" alt="'.$sa['nama_produk'].'" /></a></li> ';
}
?>
		</ul> 
	</div> 
</div>
<div class="cleaner_h0"></div>
