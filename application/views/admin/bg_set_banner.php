<?php
echo $scriptmce;
?>
<script>
var status = "";
function menuKanan()
{
	if(status!="")
	{
		$('#menukanan').slideUp();
		status = "";
	}
	else
	{
		$('#menukanan').slideDown();
		status = "isi";
	}
}

</script>

<div class="clear"></div>
<div id="content-outer">
<!-- start content -->
<div id="content">
	<div id="page-heading">
	<?php if($lvl=="spradmn"){ $p = "Super Admin"; } else{ $p = "User Biasa"; } ?>
		<h1><?php echo $judul; ?></h1><br>
		<table width="98%" cellpadding="10">
		<tr><td valign="top">
		<a onClick="menuKanan();" style="border:1px solid #333333; padding:5px; margin:10px; cursor:pointer;">Tambah Banner
	</a>	
<br />
<br />
		<fieldset style="border:1px dashed #666666; width:98%; padding:10px; display:none;" id="menukanan">
<legend align="left"><strong>Form Tambah Banner :</strong></legend>
<form method="post" action="<?php echo base_url(); ?>aksesroot/insert_banner" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0">
<tr><td width="120">Judul</td><td width="10">:</td><td><input type="text" class="login-inp" size="80" name="judul" /></td></tr>
<tr><td width="120" valign="top">Deskripsi</td><td width="10" valign="top">:</td><td valign="top"><textarea class="login-inp" rows="10" cols="80" name="deskripsi"></textarea></td></tr>
<tr><td width="120">Gambar</td><td width="10">:</td><td><input type="file" class="login-inp" size="60" name="userfile" /></td></tr>
<tr><td width="120">Status</td><td width="10">:</td><td><select name="stts" class="login-inp"><option value="1">Aktif</option><option value="0">Tidak Aktif</option></select></td></tr>
<tr><td width="120"></td><td width="10"></td><td><input type="submit" class="input-tombol" value="Simpan Data" /></td></tr>
</table>
</form>
	</fieldset>	
<br />
	<fieldset style="border:1px dashed #666666; width:98%; padding:10px;">
<legend align="left"><strong>Tampilkan Semua Banner :</strong></legend>
<table width="100%" border="1" cellspacing="0">
	<tr style="border:1px solid #333333; background-color:#333333; color:#FFFFFF;"><td width="120" style="padding:5px;">Kode Banner</td><td style="padding:5px;">Judul</td><td style="padding:5px;">Deskripsi</td><td style="padding:5px;" width="100">Status</td><td style="padding:5px;" width="60">Edit</td><td style="padding:5px;" width="60">Hapus</td></tr>
	<?php
	foreach($det->result_array() as $tp)
	{
	$status = "Tidak Aktif";
	if($tp['stts']==1){ $status="Aktif"; }
	echo '<tr><td width="120" style="padding:5px;">'.$tp['kode_banner'].'</td><td style="padding:5px;">'.strip_tags($tp['judul']).'</td><td style="padding:5px;">'.strip_tags(substr($tp['deskripsi'],0,100)).'...</td><td style="padding:5px;">'.$status.'</td><td style="padding:5px;"><a href="'.base_url().'aksesroot/edit_banner/'.$tp['kode_banner'].'"><img src="'.base_url().'asset/images/edit-icon.gif" border=0> Edit</a></td><td style="padding:5px;"><a href="'.base_url().'aksesroot/hapus_banner/'.$tp['kode_banner'].'/'.$tp['gambar'].'" onClick=\'return confirm("Anda yakin ingin menghapus konten ini???")\'><img src="'.base_url().'asset/images/hapus.png" border=0> Hapus</a></td></tr>';
	}
	?>
</table>
<table align="center"><tr><td colspan="8" align="center"><?php echo $paginator; ?></td></tr></table>
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

