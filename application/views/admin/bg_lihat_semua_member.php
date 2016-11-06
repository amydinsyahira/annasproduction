<div class="clear"></div>
<div id="content-outer">
<!-- start content -->
<div id="content">
	<div id="page-heading">
	<?php if($lvl=="spradmn"){ $p = "Super Admin"; } else{ $p = "User Biasa"; } ?>
		<h1><?php echo $judul; ?></h1><br>
		<table width="98%" cellpadding="10">
		<tr><td valign="top">
		<fieldset style="border:1px dashed #666666; width:98%; padding:10px;">
<legend align="left"><strong>Tampilkan Semua Member :</strong></legend>
<table width="100%" border="1" cellspacing="0">
	<tr style="border:1px solid #333333; background-color:#333333; color:#FFFFFF;"><td width="120" style="padding:5px;">Kode Member</td><td style="padding:5px;">Nama Member</td><td style="padding:5px;">Username</td><td style="padding:5px;">Email</td><td style="padding:5px;">Telpon</td><td style="padding:5px;">Status</td><td style="padding:5px;">Edit</td><td style="padding:5px;">Hapus</td></tr>
	<?php
	foreach($ls->result_array() as $tp)
	{
	$st="Tidak Aktif";
	if($tp['stts']==1)$st="Aktif";
	echo '<tr><td width="120" style="padding:5px;">MHGS-'.$tp['kode_user'].'</td><td style="padding:5px;">'.$tp['nama'].'</td><td style="padding:5px;">'.$tp['username_user'].'</td><td style="padding:5px;">'.$tp['email'].'</td><td style="padding:5px;">'.$tp['telpon'].'</td><td style="padding:5px;">'.$st.'</td><td style="padding:5px;"><a href="'.base_url().'aksesroot/edit_member/'.$tp['kode_user'].'"><img src="'.base_url().'asset/images/edit-icon.gif" border=0> Edit</a></td><td style="padding:5px;"><a href="'.base_url().'aksesroot/hapus_member/'.$tp['kode_user'].'" onClick=\'return confirm("Anda yakin ingin menghapus konten ini???")\'><img src="'.base_url().'asset/images/hapus.png" border=0> Hapus</a></td></tr>';
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

