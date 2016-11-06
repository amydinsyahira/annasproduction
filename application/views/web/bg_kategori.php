<div id="content-center">
<div style="padding:5px; border:1px solid #ccc; margin-bottom:10px;"><a href="<?php echo base_url(); ?>">Beranda</a> > <?php echo 'Kategori '.$nama_kategori; ?></div>
<h1>Kategori <?php echo $nama_kategori; ?> - An-nas Via Production</h1>
<div class="cleaner_h10"></div>
<?php
if(count($kategori->result_array())>0){
foreach($kategori->result_array() as $kt)
{
$tss = "";
$mati = "";
if($kt['stok'] >= 5)
{
	$tss = '<span style="margin:0px auto; padding:0px; font-size:12px;"><b>Ada</b></span>';
	$mati = "";
}
else
{
	$tss = '<span style="margin:0px auto; padding:0px; font-size:12px; color:red;"><b>Habis</b></span>';
	$mati = "disabled";
}
			$c = array (' ');
    		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
			$s = strtolower(str_replace($d,"",$kt['nama_produk']));
			$link = strtolower(str_replace($c, '-', $s));
	echo '
<form method="post" action="'.base_url().'keranjang/tambah_barang">
<input type="hidden" name="kode_produk" value="'.$kt['kode_produk'].'">
<input type="hidden" name="banyak" value="5">
<input type="hidden" name="harga" value="'.$kt['harga'].'">
<input type="hidden" name="berat_produk" value="'.$kt['berat'].'">
<input type="hidden" name="nama_produk" value="'.$kt['nama_produk'].'">
<div style="border:1px solid #CCCCCC; border-radius:4px; border-bottom-width:2px; margin-bottom:10px; padding:5px; width:152px; float:left; margin-right:6px; -moz-border-radius: 5px; -webkit-border-radius: 5px; z-index: 6666669 ;">
<p style="text-align:center; height:40px; margin:0px auto;"><strong>'.$kt['nama_produk'].'</strong></p><p style="text-align:center; margin:0px auto;"><img src="'.base_url().'asset/produk/'.$kt['gbr_kecil'].'" width="100" /><br /><br />Rp. '.number_format($kt['harga'],2,',','.').' | Stok : '.$tss.'<br /><br /><div style="width:152px; margin:0px auto; padding:0px;"><input type="submit" class="tombol-beli" value="Beli" '.$mati.'><a href="'.base_url().'produk/detail/'.$kt['kode_produk'].'-'.$link.'" class="vtip tombol right" title="'.$kt['nama_produk'].' - Harga Rp.'.number_format($kt['harga'],2,',','.').'" style="color:#fff">Detail Produk</a></div></p></div></form>';
}
}
else{
echo "Maaf, belum ada produk pada kategori ini. <br>Silahkan melihat-lihat koleksi produk kami pada kategori yang lainnya.";
}
?>
<div class="cleaner_h20"></div>
<table align="center"><tr><td><?php echo $paginator; ?></td></tr></table>
</div>
