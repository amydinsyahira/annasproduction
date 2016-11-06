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
		<fieldset style="border:1px dashed #666666; width:98%; padding:10px;">
<legend align="left"><strong>Form Balas Hubungi Kami :</strong></legend>
<form method="post" action="<?php echo base_url(); ?>aksesroot/balas_hubungi_kami_aksi">
<?php
foreach($ls->result_array() as $e)
{

?>
<input type="hidden" name="id" value="<?php echo $e['id_hubungi_kami']; ?>" />
<table width="100%">
	<tr><td width="150">Email</td><td>:</td><td><input type="text" name="email" class="login-inp" size="60" value="<?php echo $e['email']; ?>"> </td></tr>
	<tr><td width="150">Isi Pesan</td><td>:</td><td bgcolor="#FAE99D" style="padding:4px 10px;"><?php echo $e['pesan']; ?></td></tr>
	<tr><td width="150">Pesan Balasan</td><td>:</td><td>
		<textarea name="balas_pesan" cols="30"></textarea>
	</td></tr>
	<tr><td width="120"></td><td></td><td><input type="submit" class="input-tombol" value="Kirim"> </td></tr>
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

