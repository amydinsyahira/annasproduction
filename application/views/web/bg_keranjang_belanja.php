<div id="content-center">
<div style="padding:5px; border:1px solid #ccc; margin-bottom:10px;"><a href="<?php echo base_url(); ?>">Beranda</a> > Keranjang Belanja</div>
<h1>Keranjang Belanja Anda - An-nas Via Production</h1>
<?php if(!$this->cart->contents()):
	echo 'Maaf, Keranjang Belanja Anda Masih Kosong.';
else:
?>

<?php echo form_open('keranjang/update_keranjang'); ?>
<input type="hidden" name="urlproduk" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
<table width="100%" cellpadding="0" cellspacing="0" class="table-keranjang">
	<thead>
		<tr align="center">
			<td class="td-keranjang">Jumlah</td>
			<td class="td-keranjang">Nama Barang</td>
			<td class="td-keranjang">Harga</td>
			<td class="td-keranjang">Sub Total</td>
			<td class="td-keranjang">Hapus</td>
		</tr>
	</thead>
	<tbody>
		<?php $i = 1; ?>
		<?php foreach($this->cart->contents() as $items): ?>
		
		<?php echo form_hidden('rowid[]', $items['rowid']); ?>
		<?php echo form_hidden('kodeproduk[]', $items['id']); ?>
		<tr <?php if($i&1){ echo 'class="alt"'; }?>>
	  		<td class="td-keranjang">
			<select name="qty[]" class="input-teks">
	  			<?php 
				for($i=5;$i<=200;$i+=5)
				{
				if($i==$items['qty'])
				{
					echo "<option selected>".$items['qty']."</option>";
					//echo form_input(array('name' => 'qty[]', 'value' => $items['qty'], 'maxlength' => '2', 'size' => '1', 'class' => 'input-teks')); 
				}
				else
				{
					echo "<option>".$i."</option>";
				}
				}	
				?>
			</select>
	  		</td>
	  		
	  		<td class="td-keranjang"><?php echo $items['name']; ?></td>
	  		
	  		<td class="td-keranjang">Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
	  		<td class="td-keranjang">Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
 		 	<td class="td-keranjang" align="center"><a href="<?php echo base_url(); ?>keranjang/hapus_keranjang/<?php echo $items['rowid']; ?>"><img src="<?php echo base_url(); ?>asset/images/hapus.png" border="0"></a></td>
	  	</tr>
	  	
	  	<?php $i++; ?>
		<?php endforeach; ?>
		
		<tr>
			<td class="td-keranjang" colspan=3><b>Total Belanja</b></td>
 		 	<td class="td-keranjang" colspan=2>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
		</tr>
	</tbody>
</table>
<br />
<?php echo "<input type='submit' class='input-tombol' value='Update Keranjang Belanja'>";?>
<a href="<?php echo base_url(); ?>produk"><div class="tombol-keranjang">Lanjut Belanja</div></a>
<a href="<?php echo base_url(); ?>checkout"><div class="tombol-keranjang">Selesai Belanja</div></a>
<ul>
<li>Apabila Anda mengubah jumlah (Qty), jangan lupa tekan tombol Update Keranjang Belanja</li>
<li>Untuk menghapus barang pada keranjang belanja, silahkan klik tombol Hapus.</li>
<li>Total harga di atas belum termasuk ongkos kirim yang akan dihitung saat Selesai Belanja</li>
</ul>
<?php 
echo form_close(); 
endif;
?>

<div class="cleaner_h20"></div>
<h1 class="relasi">Rekomendasi Produk Dari kami</h1>
<?php
foreach($slide_rekomendasi->result_array() as $sr)
{
$tss = "";
$mati = "";
if($sr['stok'] >= 5)
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
			$s = strtolower(str_replace($d,"",$sr['nama_produk']));
			$link = strtolower(str_replace($c, '-', $s));
	echo '
<form method="post" action="'.base_url().'keranjang/tambah_barang">
<input type="hidden" name="kode_produk" value="'.$sr['kode_produk'].'">
<input type="hidden" name="banyak" value="5">
<input type="hidden" name="harga" value="'.$sr['harga'].'">
<input type="hidden" name="berat_produk" value="'.$sr['berat'].'">
<input type="hidden" name="nama_produk" value="'.$sr['nama_produk'].'">
<div style="border:1px solid #CCCCCC;  background:#fafbfc; margin-bottom:10px; padding:5px; width:152px; float:left; margin-right:6px; border-radius: 4px; border-bottom-width:2px; z-index: 6666669 ;">
<p style="text-align:center; height:40px; margin:0px auto;"><strong>'.$sr['nama_produk'].'</strong></p>
<p style="text-align:center; margin:0px auto;"><img src="'.base_url().'asset/produk/'.$sr['gbr_kecil'].'" width="100" /><br />
	<br />'.number_format($sr['harga'],2,',','.').' | Stok : '.$tss.'<br /><br />
	<div style="width:152px; margin:0px auto; padding:0px;">
	<input type="submit" class="tombol-beli" value="Beli" '.$mati.'>
	<a href="'.base_url().'produk/detail/'.strtolower($sr['kode_produk']).'-'.$link.'" class="vtip tombol right" title="'.$sr['nama_produk'].' - Harga Rp.'.number_format($sr['harga'],2,',','.').'" style="color:#fff">Detail Produk</a></div></p></div></form>';
}
?>


</div>
