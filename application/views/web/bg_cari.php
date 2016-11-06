<div id="content-center">
<div style="padding:5px; border:1px solid #ccc; margin-bottom:10px;"><a href="<?php echo base_url(); ?>">Beranda</a> > Hasil Pencarian Produk</div>
<h1>Hasil Pencarian Produk - An-nas Via Production</h1>
<div class="cleaner_h10"></div>
<form method="post" action="<?php echo base_url(); ?>cari/lihat">
<input type="text" class="input-teks" size="70" value="Cari Produk..." onblur="if(this.value=='') this.value='Cari Produk...';" onfocus="if(this.value=='Cari Produk...') this.value='';" name="cari"  /> <input type="submit" value="Cari" class="input-tombol" /></form>
<div class="cleaner_h10"></div>
<?php
if(count($cariproduk)>0){
foreach($cariproduk as $kt)
{
			$c = array (' ');
    		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
			$s = strtolower(str_replace($d,"",$kt['nama_produk']));
			$link = strtolower(str_replace($c, '-', $s));
	echo '
<form method="post" action="'.base_url().'keranjang/tambah_barang">
<input type="hidden" name="kode_produk" value="'.$kt['kode_produk'].'">
<input type="hidden" name="banyak" value="5">
<input type="hidden" name="berat_produk" value="'.$kt['berat'].'">
<input type="hidden" name="harga" value="'.$kt['harga'].'">
<input type="hidden" name="nama_produk" value="'.$kt['nama_produk'].'">
<div style="border:1px solid #CCCCCC;  margin-bottom:10px; padding:5px; width:152px; float:left; margin-right:6px; border-radius: 4px; border-bottom-width:2px; z-index: 6666669 ;">
<p style="text-align:center; height:40px; margin:0px auto;"><strong>'.$kt['nama_produk'].'</strong></p><p style="text-align:center; margin:0px auto;"><img src="'.base_url().'asset/produk/'.$kt['gbr_kecil'].'" width="100" /><br /><br />Rp. '.number_format($kt['harga'],2,',','.').' | Stok : '.$kt['stok'].'<br /><br /><div style="width:152px; margin:0px auto; padding:0px;"><input type="submit" class="tombol-beli" value="Beli"><a href="'.base_url().'produk/detail/'.$kt['kode_produk'].'-'.$link.'" class="vtip tombol right" title="'.$kt['nama_produk'].' - Harga Rp.'.number_format($kt['harga'],2,',','.').'" style="color:#fff">Detail Produk</a></div></p></div></form>';
}
}
else{
echo "Maaf, tidak ditemukan produk dengan keyword <b>".$kata."</b> di website ini. <br>Silahkan melihat-lihat koleksi produk kami pada kategori yang lainnya.";
}
?>
<div class="cleaner_h20"></div>
<table align="center"><tr><td><?php echo $paginator; ?></td></tr></table>
</div>
