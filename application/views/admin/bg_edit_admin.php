<div class="clear"></div>
		<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-ui-1.7.2.custom.min.js"></script>
		<script type="text/javascript">
			$(function(){
	
                               
                               var birthDate = new Date(1970, 01, 01);
                                $('#tgl').datepicker({
                                	dateFormat: 'yy-mm-dd',
                                	showOptions: {direction: "up"},
                                	changeMonth: true,
                                	changeYear: true,
                                	defaultDate: birthDate,
                                	yearRange: '1930:2003'
                                });
				
			});
		</script>
<link href="<?php echo base_url(); ?>asset/css/jquery-ui.css" type="text/css" rel="stylesheet"/>	
<div id="content-outer">
<!-- start content -->
<div id="content">
	<div id="page-heading">
	<?php if($lvl=="spradmn"){ $p = "Super Admin"; } else{ $p = "User Biasa"; } ?>
		<h1><?php echo $judul; ?></h1><br>
		<table width="98%" cellpadding="10">
		<tr><td valign="top">
		<fieldset style="border:1px dashed #666666; width:90%; padding:10px;">
<legend align="left"><strong>Form Edit Admin :</strong></legend>
<form method="post" action="<?php echo base_url(); ?>aksesroot/update_admin">
<?php
foreach($kat->result_array() as $k) {
	if($k['lvl'] == 'spradmn') {
		$selected = 'selected = "selected"';
		$selected2 = '';
	} else if($k['lvl'] == 'biasa') {
		$selected = '';
		$selected2 = 'selected = "selected"';
	}
	if($k['stts'] == 1) {
		$selected3 = 'selected = "selected"';
		$selected4 = '';
	} else if($k['stts'] == 0) {
		$selected3 = '';
		$selected4 = 'selected = "selected"';
	}
?>
<input type="hidden" name="idadmin" value="<?php echo $k['kode_spr_admn']; ?>" />
<table width="100%">
	<tr><td width="120">Username</td><td width="10">:</td><td><input type="text" name="username" class="login-inp" size="40" value="<?php echo $k['username_admn']; ?>"> </td></tr>
	<tr><td width="150">Password</td><td>:</td><td><input type="text" name="password" class="login-inp" size="40"><br /><i style="font-size: 10px;">Kosongkan Password apabila tidak diganti.</i></td></tr>
	<tr><td width="120">Nama Lengkap</td><td>:</td><td><input type="text" name="nama" class="login-inp" size="40" value="<?php echo $k['nama_admn']; ?>"> </td></tr>
	<tr><td width="120">Email</td><td>:</td><td><input type="text" name="email" class="login-inp" size="40" value="<?php echo $k['email']; ?>"> </td></tr>
	<tr><td width="120" valign="top">Alamat</td><td>:</td><td><textarea name="alamat" class="login-inp" rows="5" cols="50"><?php echo $k['alamat']; ?></textarea></td></tr>
	<tr><td width="120">Tanggal Lahir</td><td valign="top">:</td><td><input type="text" id="tgl" name="tgl" class="login-inp" size="40" value="<?php echo $k['tgl_lahir']; ?>"> </td></tr>
	<tr><td width="120">Level Privilage</td><td valign="top">:</td><td><select name="lvl" class="login-inp"><option value="spradmn" <?php echo $selected; ?>>Super Admin</option><option value="biasa" <?php echo $selected2; ?>>Admin Biasa</option></select></td></tr>
	<tr><td width="120">Status</td><td valign="top">:</td><td><select name="stts" class="login-inp"><option value="1" <?php echo $selected3; ?>>Aktif</option><option value="0" <?php echo $selected4; ?>>Tidak Aktif</option></select></td></tr>
	<tr><td width="120" valign="top"></td><td valign="top"></td><td><input type="submit" value="Ganti Data" class="input-tombol" /><input type="button" value="Kembali" class="input-tombol" onclick="location.href='<?php echo base_url(); ?>aksesroot/tambah_admin'" /></td></tr>
</table>
<?php } ?>
</form>
	</fieldset>
		</td>
		</tr>
		</table>
	</div>
	<div class="clear">&nbsp;</div>
</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>

