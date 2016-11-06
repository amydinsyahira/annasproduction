<div class="clear"></div>
		<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-ui-1.7.2.custom.min.js"></script>
		<script type="text/javascript">
			$(function(){
	
                               // bufferdie love m...
                                $('#tgl').datepicker({
                                	dateFormat: 'yy-mm-dd',
                                	showOptions: {direction: "up"},
                                	changeMonth: true,
                                	changeYear: true
                                });
				
			});
		</script>
<!-- <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/redmond/jquery-ui.css" type="text/css" rel="stylesheet"/> -->
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
<legend align="left"><strong>Form Tambah Admin :</strong></legend>
<form class="validateJS" method="post" action="<?php echo base_url(); ?>aksesroot/insert_admin">
<table width="100%">
	<tr><td width="120">Username</td><td width="10">:</td><td><input type="text" name="username" id="username" class="login-inp validate[required]" size="40"> </td></tr>
	<tr><td width="150">Password</td><td>:</td><td><input type="text" name="password" id="password" class="login-inp validate[required]" size="40"> </td></tr>
	<tr><td width="120">Nama Lengkap</td><td>:</td><td><input type="text" name="nama" id="nama" class="login-inp validate[required]" size="40"> </td></tr>
	<tr><td width="120">Email</td><td>:</td><td><input type="text" name="email" id="email" class="login-inp validate[required]" size="40"> </td></tr>
	<tr><td width="120" valign="top">Alamat</td><td>:</td><td><textarea name="alamat" id="alamat" class="login-inp validate[required]" rows="5" cols="50"></textarea></td></tr>
	<tr><td width="120">Tanggal Lahir</td><td valign="top">:</td><td><input type="text" id="tgl" name="tgl" id="tgl" class="login-inp validate[required]" size="40"> </td></tr>
	<tr><td width="120">Level Privilage</td><td valign="top">:</td><td><select name="lvl" class="login-inp"><option value="spradmn">Super Admin</option><option value="biasa">Admin Biasa</option></select></td></tr>
	<tr><td width="120">Status</td><td valign="top">:</td><td><select name="stts" class="login-inp"><option value="1">Aktif</option><option value="0">Tidak Aktif</option></select></td></tr>
	<tr><td width="120" valign="top"></td><td valign="top"></td><td><input type="submit" value="Tambah Data" class="input-tombol" /></td></tr>
</table>
</form>
	</fieldset>
		</td>
		<td valign="top">
		<fieldset style="border:1px dashed #666666; width:90%; padding:10px;">
<legend align="left"><strong>Daftar Admin :</strong></legend>
<form method="post" action="<?php echo base_url(); ?>aksesroot/update_pass">
<table width="100%">
<tr height="30"><td width="30"><strong>No.</strong></td><td width=80><strong>Username</strong></td><td width=150><strong>Nama</strong></td><td><strong>Status</strong></td><td><strong>Level</strong></td><td><strong>Aksi</strong></td></tr>
<?php
	$no = 1;
	foreach($ls->result_array() as $l)
	{
		$st = "Tidak Aktif";
		$lvl = "Admin Biasa";
		if($l['stts']==1)$st="Aktif";
		if($l['lvl']=="spradmn")$lvl="Super Admin";
		echo '
		<tr height="30">
			<td width="30">'.$no.'</td>
			<td>'.$l['username_admn'].'</td>
			<td>'.$l['nama_admn'].'</td>
			<td>'.$st.'</td>
			<td>'.$lvl.'</td>
			<td>
				<a href="'.base_url().'aksesroot/edit_admin/'.$l['kode_spr_admn'].'" title="Edit"><img src="'.base_url().'asset/images/edit-icon.gif" border=0></a>
				<a href="'.base_url().'aksesroot/hapus_admin/'.$l['kode_spr_admn'].'" title="Hapus" onClick=\'return confirm("Anda yakin ingin menghapus konten ini???")\'><img src="'.base_url().'asset/images/hapus.png" border=0></a>
			</td>
		</tr>';
		$no++;
	}
?>
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

