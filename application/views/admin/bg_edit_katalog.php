
<div class="clear"></div>
<div id="content-outer">
<!-- start content -->
<div id="content">
	<div id="page-heading">
	<?php if($lvl=="spradmn"){ $p = "Super Admin"; } else{ $p = "User Biasa"; } ?>
		<h1><?php echo $judul; ?></h1><br>		<table width="98%" cellpadding="10">
		<tr><td valign="top">
		<fieldset style="border:1px dashed #666666; width:98%; padding:10px;">
<legend align="left"><strong>Form Edit Katalog Produk :</strong></legend>
<form method="post" action="<?php echo base_url(); ?>aksesroot/update_katalog" enctype="multipart/form-data">
<?php
foreach($kat->result_array() as $k)
{
?>
<input type="hidden" name="id" value="<?php echo $k['id_katalog']; ?>" />
<input type="hidden" name="nm_fl" value="<?php echo $k['nama_file']; ?>" />
<table width="100%">
	<tr><td width="150">Judul Katalog</td><td>:</td><td><input type="text" name="nama" class="login-inp" size="60" value="<?php echo $k['judul_file']; ?>"> </td></tr>
	<tr><td width="150">Nama File</td><td>:</td><td><?php echo $k['nama_file']; ?></td></tr>
	<tr><td width="150">Ubah File</td><td>:</td><td><input type="file" name="userfile" size="30" /></td></tr>
	<tr><td width="120"></td><td></td><td><input type="submit" class="input-tombol" value="Simpan Data"> </td></tr>
</table>
<?php
}
?>
</form>
	</fieldset>
		</td></tr>
		</table>
	</div>
	<div class="clear">&nbsp;</div>
</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>

