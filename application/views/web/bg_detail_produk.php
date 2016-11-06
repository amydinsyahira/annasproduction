<div id="content-center">
<div style="padding:5px; border:1px solid #ccc; margin-bottom:10px;"><a href="<?php echo base_url(); ?>">Beranda</a> > <a href="<?php echo base_url(); ?>kategori/produk/<?php echo $link; ?>"><?php echo 'Kategori '.$nama_kategori; ?></a> > <?php echo $nama_produk; ?></div>
<div style="border-bottom:1px solid #ccc; margin:0 -10px; padding:0 10px;">
<?php
foreach($detail_produk->result_array() as $dp)
{
			$c = array (' ');
    		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
			$s = strtolower(str_replace($d,"",$dp['nama_produk']));
			$link = strtolower(str_replace($c, '-', $s));
?>

<?php
echo '<h1>'.$dp['nama_produk'].'</h1>';
?>
<div class="share">Bagikan Produk ini ke : 
	<script language="javascript">
document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'><i class='fa fa-twitter'></i> Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + "' target='_blank'><i class='fa fa-facebook'></i> Facebook</a>");
</script>
</div>
<div class="cleaner_h10"></div>
<?php
$ts = "";
$tmati = "";
if($dp['stok'] >= 5)
{
	$ts = '<span style="margin:0px auto; padding:0px; font-size:12px;"><b>Stok Barang Tersedia</b></span>';
	$tmati = "";
}
else
{
	$ts = '<span style="margin:0px auto; padding:0px; font-size:12px; color:red;"><b>Maaf, Stok Barang Habis</b></span>';
	$tmati = "disabled";
}
echo '<form method="post" action="'.base_url().'keranjang/tambah_barang">
<table width="100%">
<tr><td rowspan=5><a href="'.base_url().'asset/produk/imgoriginal/'.$dp['gbr_besar'].'" rel="example_group" title="'.$dp['nama_produk'].' - Harga Rp.'.number_format($dp['harga'],2,',','.').'"><img src='.base_url().'asset/produk/'.$dp['gbr_kecil'].' width=150></a></td>
<td>Harga </td><td>:</td><td><span style="margin:0px auto; padding:0px; font-size:15px;"><b>Rp.'.number_format($dp['harga'],2,',','.').'</b></span></td></tr>
<tr><td>Stok Barang </td><td>:</td><td>'.$ts.'</td></tr>
<tr><td>Jumlah Pesanan </td><td>:</td><td>
<select name="banyak" '.$tmati.'>';
for($j=5;$j<=200;$j+=5)
{
	echo '<option value="'.$j.'">'.$j.'</option>';
}
$harga_5pasang = $dp['harga']*5;
echo '</select>
<input type="hidden" name="urlproduk" value="'.$_SERVER['REQUEST_URI'].'">
<input type="hidden" name="kode_produk" value="'.$dp['kode_produk'].'">
<input type="hidden" name="harga" value="'.$dp['harga'].'">
<input type="hidden" name="berat_produk" value="'.$dp['berat'].'">
<input type="hidden" name="nama_produk" value="'.$dp['nama_produk'].'">
<tr>
<td><a href="'.base_url().'asset/produk/imgoriginal/'.$dp['gbr_besar'].'" rel="example_group" title="'.$dp['nama_produk'].' - Harga Rp.'.number_format($dp['harga'],2,',','.').'"><div class="tombol-perbesar"><i class="fa fa-search"></i> Perbesar</div></a></td>
<td colspan=2><input type="submit" value="Beli Produk Ini" class="tombol-beli-produk" '.$tmati.'></td>
</tr>
<tr></tr>
<tr bgcolor="#eee" align="center"><td colspan=4><b>Deskripsi Produk</b></td></tr>
<tr><td colspan=4>';
if($dp['deskripsi']==null)
{ 
	echo "Deskripsi produk masih kosong."; 
} 
else 
{ 
	echo $dp['deskripsi']; 
}
echo '</td></tr>
</table></form>';
}
?>
<div class="share">Bagikan Produk ini ke : 
	<script language="javascript">
document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'><i class='fa fa-twitter'></i> Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + "' target='_blank'><i class='fa fa-facebook'></i> Facebook</a>");
</script>
</div>
</div>
<h1 class="relasi">Produk Lainnya Dengan Kategori "<?php echo $nama_kategori; ?>"</h1>
<?php
foreach($slide_produk_sejenis->result_array() as $sps)
{
$tss = "";
$mati = "";
if($sps['stok'] >= 5)
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
			$s = strtolower(str_replace($d,"",$sps['nama_produk']));
			$link = strtolower(str_replace($c, '-', $s));
	echo '
<form method="post" action="'.base_url().'keranjang/tambah_barang">
<input type="hidden" name="kode_produk" value="'.$sps['kode_produk'].'">
<input type="hidden" name="banyak" value="1">
<input type="hidden" name="berat_produk" value="'.$sps['berat'].'">
<input type="hidden" name="harga" value="'.$sps['harga'].'">
<input type="hidden" name="nama_produk" value="'.$sps['nama_produk'].'">
<div style="border:1px solid #CCCCCC; background:#fafbfc; margin-bottom:10px; padding:5px; width:152px; float:left; margin-right:6px; border-radius: 4px; border-bottom-width:2px; z-index: 6666669 ;">
<p style="text-align:center; height:40px; margin:0px auto;"><strong><font size="2">'.$sps['nama_produk'].'</font></strong></p><p style="text-align:center; margin:0px auto;"><img src="'.base_url().'asset/produk/'.$sps['gbr_kecil'].'" width="100" /><br /><br />Rp.'.number_format($sps['harga'],2,',','.').' | Stok : '.$tss.'<br /><br /><div style="width:152px; margin:0px auto; padding:0px;"><input type="submit" class="tombol-beli" value="Beli" '.$mati.'><a href="'.base_url().'produk/detail/'.strtolower($sps['kode_produk']).'-'.$link.'" class="vtip  tombol right" title="'.$sps['nama_produk'].' - Harga Rp.'.number_format($sps['harga'],2,',','.').'" style="color:#fff;">Detail Produk</a></div></p></div></form>';
}
?>
</div>
