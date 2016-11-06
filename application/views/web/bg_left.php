<div id="content">
<div id="content-left">
<div id="sub-content-title">Produk Terlaris Bulan Ini</div>

<div id="sub-content-center-privat">
<ul id="produklaris">
<?php
foreach($slide_laris->result_array() as $sl)
{
$tss = "";
$mati = "";
if($sl['stok'] >= 5)
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
			$s = strtolower(str_replace($d,"",$sl['nama_produk']));
			$link = strtolower(str_replace($c, '-', $s));
	echo '<li><form method="post" action="'.base_url().'keranjang/tambah_barang"><div id="list-produk">
<input type="hidden" name="kode_produk" value="'.$sl['kode_produk'].'">
<input type="hidden" name="banyak" value="5">
<input type="hidden" name="harga" value="'.$sl['harga'].'">
<input type="hidden" name="berat_produk" value="'.$sl['berat'].'">
<input type="hidden" name="nama_produk" value="'.$sl['nama_produk'].'">
<p style="text-align:center; margin:0px auto; height:35px;"><strong>'.$sl['nama_produk'].'</strong></p><p style="text-align:center; margin:0px auto;"><img src="'.base_url().'asset/produk/'.$sl['gbr_kecil'].'" width="100" class="vtip" title="'.$sl['nama_produk'].' - Harga Rp.'.number_format($sl['harga'],2,',','.').'" /><br /><br /><span style="color:#0820BD">Rp. '.number_format($sl['harga'],2,',','.').'</span> | Stok : '.$tss.'<br /><br /><div style="width:152px; margin:0px auto; padding:0px;"><input type="submit" class="tombol-beli" value="Beli" '.$mati.'><a href="'.base_url().'produk/detail/'.strtolower($sl['kode_produk']).'-'.$link.'" class="vtip tombol right" title="'.$sl['nama_produk'].' - Harga Rp.'.number_format($sl['harga'],2,',','.').'"><i class="fa fa-search"></i> Detail Produk</a></div>
</p></div></form></li>';
}
?>
</ul>
</div>
<?php
/*$query = 'http://localhost'.$_SERVER['PHP_SELF'];
if($query==$this->config->item('site_url').'index.php/produk/cari'){*/
	/*echo '
	<div id="sub-content-title">Belanja Berdasarkan Harga</div>
<div id="sub-content-center">
<ul>
	<li><a href="'.base_url().'produk/belanja/-20000">Kurang dari <strong>&le; Rp. 25.000</strong></a></li>
	<li><a href="'.base_url().'produk/belanja/25001-30000"><strong>Rp. 25.001 - Rp. 30.000</strong></a></li>
	<li><a href="'.base_url().'produk/belanja/30001-45000"><strong>Rp. 30.001 - Rp. 45.000</strong></a></li>
	<li><a href="'.base_url().'produk/belanja/45001-50000"><strong>Rp. 45.001 - Rp. 50.000</strong></a></li>
	<li><a href="'.base_url().'produk/belanja/50001-55000"><strong>Rp. 50.001 - Rp. 55.000</strong></a></li>
	<li><a href="'.base_url().'produk/belanja/55001-">Lebih dari <strong>&ge; Rp. 60.001</strong></a></li>
</ul>
</div>
	';*/
	echo '
	<div id="sub-content-title">Kategori</div>
<div id="sub-content-center" style="height: 100px;overflow: auto;">
<ul>';
/*foreach($kategori_side->result_array() as $ktside)
{
	$kodekt = str_replace(" ", "-",  $ktside['nama_kategori']);
	$kodektfix = $ktside['id_kategori'].'-'.$kodekt;
echo '<li><a href="'.base_url().'kategori/produk/'.$kodektfix.'">'.$ktside['nama_kategori'].'</strong></a></li>';
}*/
$tot_sub = $this->songkok_model->menu_kategori(0,0)->num_rows();
	if ($tot_sub > 0) {
		foreach($menu->result_array() as $m1)
		{
			$kodekt1 = str_replace(" ", "-",  $m1['nama_kategori']);
			$kodektfix1 = $m1['id_kategori'].'-'.$kodekt1;
			echo '<li><a href="'.base_url().'kategori/produk/'.$kodektfix1.'">'.$m1['nama_kategori'].'</a><ul>';
			$tot_sub1 = $this->songkok_model->menu_kategori(1,$m1['id_kategori'])->num_rows();
			if ($tot_sub1 > 0) {
				$sub1 = $this->songkok_model->menu_kategori(1,$m1['id_kategori']);
				foreach($sub1->result_array() as $sm1)
				{
					$kodekt2 = str_replace(" ", "-",  $sm1['nama_kategori']);
					$kodektfix2 = $sm1['id_kategori'].'-'.$kodekt2;
					echo '<li><a href="'.base_url().'kategori/produk/'.$kodektfix2.'">'.$sm1['nama_kategori'].'</a><ul>';
					
					$tot_sub2 = $this->songkok_model->hitung_isi_1tabel('tbl_kategori','where kode_level=2 and kode_parent='.$sm1['id_kategori'])->num_rows();
					if ($tot_sub2 > 0) {
						$sub2 = $this->songkok_model->menu_kategori(2,$sm1['id_kategori']);
						foreach($sub2->result_array() as $sm2)
						{
							$kodekt3 = str_replace(" ", "-",  $sm2['nama_kategori']);
							$kodektfix3 = $sm2['id_kategori'].'-'.$kodekt3;
							echo '<li><a href="'.base_url().'kategori/produk/'.$kodektfix3.'">'.$sm2['nama_kategori'].'</a></li>';
						}
					}
					echo '</ul>';
					echo '</li>';
					
				}
			}
			echo '</ul>';
			echo '</li>';
		}
	} else {
		echo '<li>- Data kategori tidak ada -</li>';
	}
echo '
</ul>
</div>';
/*}else {
	echo '';
}*/
?>

</div>
