<div id="content-center">
<div style="border-bottom:1px solid #ccc;margin:0 -10px; padding:0 15px;">
<h1>Kami Hadir Untuk Anda | An-nas Via Production</h1>
Assalamualaikum wr. Wb<br />
<p align="justify">Selamat datang di Harmonis An-nas Via Production.  Menyediakan berbagai macam peci :)  </p>
</div>
<div class="cleaner_h20"></div>
<?php
foreach($slide_produk_home->result_array() as $sph)
{
$tss = "";
$mati = "";
if($sph['stok'] >= 5)
{
	$tss = '<span style="margin:0px auto; padding:0px; font-size:12px;"><b>Ada</b></span>';
	$mati = "";
}
else
{
	$tss = '<span style="margin:0px auto; padding:0px; font-size:12px; color:red;"><b>Habis</b></span>';
	$mati = "disabled";
}
	$link_mentah = str_replace(' ','-',$sph['nama_produk']);
	$link = strtolower($link_mentah);
	echo '
<form method="post" action="'.base_url().'keranjang/tambah_barang">
<input type="hidden" name="kode_produk" value="'.$sph['kode_produk'].'">
<input type="hidden" name="banyak" value="5">
<input type="hidden" name="harga" value="'.$sph['harga'].'">
<input type="hidden" name="berat_produk" value="'.$sph['berat'].'">
<input type="hidden" name="nama_produk" value="'.$sph['nama_produk'].'">
<div class="thumb-produk">
<p style="text-align:center; height:40px; margin:0px auto;"><strong>'.$sph['nama_produk'].'</strong></p><p style="text-align:center; margin:0px auto;"><img src="'.base_url().'asset/produk/'.$sph['gbr_kecil'].'" width="100" /><br /><span style="color:#0820BD">Rp. '.number_format($sph['harga'],2,',','.').'</span> | Stok : '.$tss.'<br /><br /><div style="margin:0px auto; padding:0px;"><input type="submit" class="tombol-beli" value="Beli" '.$mati.'><a href="'.base_url().'produk/detail/'.$sph['kode_produk'].'-'.$link.'" class="vtip tombol right" style="color:#fff" title="'.$sph['nama_produk'].' - Harga Rp.'.number_format($sph['harga'],2,',','.').'"><i class="fa fa-search"></i> Detail Produk</a></div></p></div></form>';
}
?>
<p style="text-align:center;"><a href="<?php echo base_url(); ?>produk" class="tombol" style="color:#fff; margin-top:20px; border-radius:4px;">Lihat Produk Kami Lainnya</a></p>
</div>
