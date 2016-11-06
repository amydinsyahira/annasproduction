<div class="clear"></div>
		<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-ui-1.7.2.custom.min.js"></script>
		<script type="text/javascript">
			$(function(){
	
                               // bufferdie love m...
                                $('#tgl').datepicker({dateFormat: 'd MM yy'});
				
			});
		</script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/redmond/jquery-ui.css" type="text/css" rel="stylesheet"/>	
<div id="content-outer">
<!-- start content -->
<div id="content">
	<div id="page-heading">
	<?php if($lvl=="spradmn"){ $p = "Super Admin"; } else{ $p = "User Biasa"; } ?>
		<h1><?php echo $judul; ?></h1><br>
		<table width="98%" cellpadding="10">
		<tr><td valign="top">
		<?php
		$usr = "";
			foreach($det->result_array() as $d)
			{
			$usr=$d['username_admn'];
		?>
		<fieldset style="border:1px solid #ccc; border-radius:4px; width:90%; padding:10px;">
<legend align="left"><strong>Edit Profil Admin :</strong></legend>
<form method="post" action="<?php echo base_url(); ?>aksesroot/update_profil"><input type="hidden" name="kd_usr" value="<?php echo $kd; ?>">
<table width="100%">
	<tr><td width="120">Username</td><td width="10">:</td><td><input type="text" name="username" class="login-inp" size="40" value="<?php echo $usr; ?>"> </td></tr>
	<tr><td width="120">Nama Lengkap</td><td>:</td><td><input type="text" name="nama" class="login-inp" size="40" value="<?php echo $d['nama_admn']; ?>"> </td></tr>
	<tr><td width="120">Email</td><td>:</td><td><input type="text" name="email" class="login-inp" size="40" value="<?php echo $d['email']; ?>"> </td></tr>
	<tr><td width="120" valign="top">Alamat</td><td>:</td><td><textarea name="alamat" class="login-inp" rows="5" cols="50"><?php echo $d['alamat']; ?></textarea></td></tr>
	<tr><td width="120">Tanggal Lahir</td><td valign="top">:</td><td><input type="text" id="tgl" name="tgl" class="login-inp" size="40" value="<?php echo $d['tgl_lahir']; ?>"> </td></tr>
	<tr><td width="120" valign="top"></td><td valign="top"></td><td><input type="submit" value="Update Data" class="input-tombol" /></td></tr>
</table>
</form>
	</fieldset>
<?php
}
?>
		</td>
		<td valign="top">
		<fieldset style="border:1px solid #EDD487; border-radius:4px; background:#FFF8E3; width:90%; padding:10px;">
<legend align="left"><strong>Edit Password Admin :</strong></legend>
<form method="post" action="<?php echo base_url(); ?>aksesroot/update_pass">
<table width="100%">
	<tr><td width="150">Username</td><td width="10">:</td><td><input type="text" name="username" class="login-inp" size="40" readonly="readonly" value="<?php echo $usr; ?>"> </td></tr>
	<tr><td width="150">Password Lama</td><td>:</td><td><input type="text" name="passlama" class="login-inp" size="40"> </td></tr>
	<tr><td width="150">Password Baru</td><td>:</td><td><input type="text" name="passbaru" class="login-inp" size="40"> </td></tr>
	<tr><td width="150">Ulangi Password Baru</td><td valign="top">:</td><td><input type="text" name="ulangi" class="login-inp" size="40"> </td></tr>
	<tr><td width="150" valign="top"></td><td valign="top"></td><td><input type="submit" value="Update data" class="input-tombol" /></td></tr>
</table>
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

