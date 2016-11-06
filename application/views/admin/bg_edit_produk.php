<?php
echo $scriptmce;
?>
<div class="clear"></div>
<div id="content-outer">
<!-- start content -->
<div id="content">
	<div id="page-heading">
	<?php if($lvl=="spradmn"){ $p = "Super Admin"; } else{ $p = "User Biasa"; } ?>
		<h1><?php echo $judul; ?></h1><br>		<table width="98%" cellpadding="10">
		<tr><td valign="top">
		<fieldset style="border:1px solid #ccc; border-radius:4px; width:98%; padding:10px;">
<legend align="left"><strong>Form Edit Produk :</strong></legend>
<form method="post" action="<?php echo base_url(); ?>aksesroot/update_produk" enctype="multipart/form-data">
<?php
foreach($ls->result_array() as $e)
{
?>
<input type="hidden" name="id" value="<?php echo $e['kode_produk']; ?>" />
<input type="hidden" name="gbr" value="<?php echo $e['gbr_kecil']; ?>" />
<table width="100%">
	<tr><td width="120">Kode Produk</td><td width="10">:</td><td><input type="text" name="kd" readonly="readonly" class="login-inp" size="40" value="<?php echo $e['kode_produk']; ?>"> </td></tr>
	<tr><td width="150">Nama Produk</td><td>:</td><td><input type="text" name="nama" class="login-inp" size="60" value="<?php echo $e['nama_produk']; ?>"> </td></tr>
	<tr><td width="150">Kategori Produk</td><td>:</td><td>
	<select name="kategori" class="login-inp">
	<?php
		foreach($kat->result_array() as $k)
		{
			if($e['id_kategori']==$k['id_kategori'])
			{
				echo '<option value="'.$k['id_kategori'].'" selected>'.$k['nama_kategori'].'</option>';
			}
			else
			{
				echo '<option value="'.$k['id_kategori'].'">'.$k['nama_kategori'].'</option>';
			}
		}
	?>
	</select>
	</td></tr>
	<tr><td width="120">Harga</td><td>:</td><td><input type="text" name="harga" class="login-inp" size="60" value="<?php echo $e['harga']; ?>"> </td></tr>
	<tr><td width="120">Stok Barang</td><td>:</td><td><input type="text" name="stok" class="login-inp" size="60" value="<?php echo $e['stok']; ?>"> </td></tr>
	<tr><td width="120">Dibeli</td><td>:</td><td><input type="text" name="dibeli" class="login-inp" size="20" value="<?php echo $e['dibeli']; ?>"> </td></tr>
	<tr><td width="120">Berat @item</td><td>:</td><td><input type="text" name="beratitem" class="login-inp" size="20" value="<?php echo $e['berat']; ?>"> gram</td></tr>
	<tr><td width="120" valign="top">Deskripsi Produk</td><td valign="top">:</td><td><textarea name="deskripsi" class="login-inp" cols="70" rows="8"><?php echo $e['deskripsi']; ?></textarea></td></tr>
	<tr><td width="120" valign="top">Gambar</td><td valign="top">:</td><td><img src="<?php echo base_url(); ?>asset/produk/<?php echo $e['gbr_kecil']; ?>"</td></tr>
	<tr><td width="120">Ganti Gambar</td><td>:</td><td><input type="file" size="40" name="imagefile" class="login-inp"> * Gambar maksimal ukuran 400px</td></tr>
	<tr><td width="120"></td><td></td><td><input type="submit" class="input-tombol" value="Simpan Data"> </td></tr>
</table>
</form>
	</fieldset>
		</td></tr>
		</table>
<?php
}
?>
	</div>
	<div class="clear">&nbsp;</div>
</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>

