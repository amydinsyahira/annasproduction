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
<legend align="left"><strong>Form Edit Member :</strong></legend>
<form method="post" action="<?php echo base_url(); ?>aksesroot/update_member" enctype="multipart/form-data">
<?php
foreach($kat->result_array() as $k)
{
?>
<input type="hidden" name="id" value="<?php echo $k['kode_user']; ?>" />
<table width="100%">
	<tr><td width="150">Nama Member</td><td>:</td><td><input type="text" name="nama" class="login-inp" size="60" value="<?php echo $k['nama']; ?>"> </td></tr>
	<tr><td width="150">Username</td><td>:</td><td><input type="text" name="username" class="login-inp" size="60" value="<?php echo $k['username_user']; ?>"> </td></tr>
	<tr><td width="150">Password</td><td>:</td><td><input type="text" name="pass" class="login-inp" size="60"> * Jika tidak diganti, dikosongkan saja.</td></tr>
	<tr><td width="150">Email</td><td>:</td><td><input type="text" name="email" class="login-inp" size="60" value="<?php echo $k['email']; ?>"> </td></tr>
	<tr><td width="150" valign="top">Alamat</td><td valign="top">:</td><td><textarea name="alamat" rows="10" cols="60"><?php echo $k['alamat']; ?></textarea></td></tr>
	<tr><td width="150">Telpon</td><td>:</td><td><input type="text" name="telpon" class="login-inp" size="60" value="<?php echo $k['telpon']; ?>"> </td></tr>
	<tr><td width="150">Propinsi</td><td>:</td><td><input type="text" name="propinsi" class="login-inp" size="60" value="<?php echo $k['propinsi']; ?>"> </td></tr>
	<tr><td width="150">Kota</td><td>:</td><td><input type="text" name="kota" class="login-inp" size="60" value="<?php echo $k['kota']; ?>"> </td></tr>
	<tr><td width="150">Kode Pos</td><td>:</td><td><input type="text" name="kodepos" class="login-inp" size="60" value="<?php echo $k['kode_pos']; ?>"> </td></tr>
	<tr><td width="150">Tanggal Lahir</td><td>:</td><td>
	<?php
$lahir = explode("-",$k['tgl_lahir']);
		echo "<select name='tgl' class='login-inp'>";
		  for($a=1;$a<=31;$a++)
		  {
		  	if($lahir[0]==$a)
			{
		  		echo "<option value=$a selected>$a</option>";
			}
			else
			{
		  		echo "<option value=$a>$a</option>";
			}
		  }
		  echo "</select> - ";
		  
		  echo "<select name='bln' class='login-inp'>";
		  for($b=1;$b<=12;$b++)
		  {
		  	if($lahir[1]==$b)
			{
		  		echo "<option value=$b selected>$b</option>";
			}
			else
			{
		  		echo "<option value=$b>$b</option>";
			}
		  }
		  echo "</select> - ";
		  echo "<select name='thn' class='login-inp'>";
		  for($c=1950;$c<=date('Y');$c++)
		  {
		  	if($lahir[2]==$c)
			{
		  		echo "<option value=$c selected>$c</option>";
			}
			else
			{
		  		echo "<option value=$c>$c</option>";
			}
		  }
		  echo "</select>";
?>
	</td></tr>
	<tr><td width="150">Status</td><td>:</td><td>
	<select name="stts" class="login-inp">
	<?php
	if($k['stts']==1)
	{
		echo '<option value=1 selected>Aktif</option>';
		echo '<option value=0>Tidak Aktif</option>';
	}
	else{
		echo '<option value=0 selected>Tidak Aktif</option>';
		echo '<option value=1>Aktif</option>';
	}
	?>
	</select>
	</td></tr>
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

