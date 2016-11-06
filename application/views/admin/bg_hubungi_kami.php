<div class="clear"></div>
<div id="content-outer">
<!-- start content -->
<div id="content">
	<div id="page-heading">
	<?php if($lvl=="spradmn"){ $p = "Super Admin"; } else{ $p = "User Biasa"; } ?>
		<h1><?php echo $judul; ?></h1><br>
		<table width="98%" cellpadding="10">
		<tr><td valign="top">
		<fieldset style="border:1px solid #ccc; border-radius:4px; width:98%; padding:10px;">
<legend align="left"><strong>Daftar Hubungi Kami :</strong></legend>
<table width="100%" border="1" cellspacing="0">
	<tr style="border:1px solid #333333; background-color:#333333; color:#FFFFFF;"><td width="120" style="padding:5px;">Kode</td><td style="padding:5px;">Nama</td><td style="padding:5px;">Email</td><td style="padding:5px;">No Telp</td><td style="padding:5px;">Alamat</td><td style="padding:5px;">Kota</td><td style="padding:5px;">Negara</td><td style="padding:5px;">Pesan</td><td style="padding:5px;">Aksi</td></tr>
	<?php
	foreach($tampil->result_array() as $tp)
	{
	echo '<tr>
		<td width="120" style="padding:5px;">'.$tp['id_hubungi_kami'].'</td>
		<td style="padding:5px;">'.$tp['nama'].'</td>
		<td style="padding:5px;">'.$tp['email'].'</td>
		<td style="padding:5px;">'.$tp['no_telp'].'</td>
		<td style="padding:5px;">'.$tp['alamat'].'</td>
		<td style="padding:5px;">'.$tp['kota'].'</td>
		<td style="padding:5px;">'.$tp['negara'].'</td>
		<td style="padding:5px;">'.$tp['pesan'].'</td>
		<td style="padding:5px;"><a href="'.base_url().'aksesroot/balas_hubungi_kami/'.$tp['id_hubungi_kami'].'"><i class="fa fa-pencil"></i> Balas</a></td></tr>';
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

