
<div class="clear"></div>
<div id="content-outer">
<!-- start content -->
<div id="content">
	<div id="page-heading">
	<?php if($lvl=="spradmn"){ $p = "Super Admin"; } else{ $p = "User Biasa"; } ?>
		<h1><?php echo $judul; ?></h1><br>		<table width="98%" cellpadding="10">
		<tr><td valign="top">
		<fieldset style="border:1px dashed #666666; width:98%; padding:10px;">
<legend align="left"><strong>Form Tambah Katalog Produk :</strong></legend>
<form method="post" class="validateJS" action="<?php echo base_url(); ?>aksesroot/insert_katalog" enctype="multipart/form-data">
<table width="100%">
	<tr><td width="150">Judul Katalog</td><td>:</td><td><input type="text" name="nama" id="nama" class="login-inp validate[required]" size="60"> </td></tr>
	<tr><td width="150">Upload File</td><td>:</td><td><input type="file" name="userfile" size="30" /></td></tr>
	<tr><td width="120"></td><td></td><td><input type="submit" class="input-tombol" value="Simpan Data"> </td></tr>
</table>
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

