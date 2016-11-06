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
<legend align="left"><strong>Daftar Pengembalian Barang :</strong></legend>
<table width="100%" border="1" cellspacing="0">
	<tr style="border:1px solid #333333; background-color:#333333; color:#FFFFFF;"><td width="120" style="padding:5px;">Kode Pengembalian Barang</td><td style="padding:5px;">Tgl Pengembalian Barang</td><td style="padding:5px;">Pesan</td><td style="padding:5px;">Nama</td><td style="padding:5px;">Email</td><td style="padding:5px;">No Telp</td><td style="padding:5px;">No Resi</td><td style="padding:5px;">Status</td><td style="padding:5px;">Aksi</td></tr>
	<?php
	foreach($tampil->result_array() as $tp)
	{
		if($tp['status']==0){
			$tp["st"] = 'Pending';
			$c = '#BF1111';
			$ak = '<a href="'.base_url().'aksesroot/proses_pengembalian_barang/'.$tp['kode_pengembalian_barang'].'">Proses</a>';
		}else {
			$tp["st"] = 'Proses';
			$c = '#0B9903';
			$ak = 'Sudah DiProses';
		}
	echo '<tr>
		<td width="120" style="padding:5px;">'.$tp['kode_pengembalian_barang'].'</td>
		<td style="padding:5px;">'.$tp['tgl_pengembalian_barang'].'</td>
		<td style="padding:5px;">'.$tp['pesan'].'</td>
		<td style="padding:5px;">'.$tp['nama'].'</td>
		<td style="padding:5px;">'.$tp['email'].'</td>
		<td style="padding:5px;">'.$tp['telpon'].'</td>
		<td style="padding:5px;">'.$tp['no_resi'].'</td>
		<td style="padding:5px; color:'.$c.'">'.$tp["st"].'</td>
		<td style="padding:5px;">'.$ak.'</td></tr>';
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

