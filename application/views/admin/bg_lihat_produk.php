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
<legend align="left"><strong>Tampilkan Semua Produk :</strong></legend>
<table width="100%" border="1" cellspacing="0">
	<tr style="border:1px solid #333333; background-color:#333333; color:#FFFFFF;"><td width="120" style="padding:5px;">Kode Produk</td><td style="padding:5px;">Nama Produk</td><td style="padding:5px;">Kategori</td><td style="padding:5px;">Berat</td><td style="padding:5px;">Stok</td><td style="padding:5px;">Harga</td><td style="padding:5px;">Edit</td><td style="padding:5px;">Hapus</td></tr>
	<?php
	foreach($tampil->result_array() as $tp)
	{
	echo '<tr>
		<td width="120" style="padding:5px;">'.$tp['kode_produk'].'</td>
		<td style="padding:5px;">'.$tp['nama_produk'].'</td>
		<td style="padding:5px;">'.$tp['nama_kategori'].'</td>
		<td style="padding:5px;">'.$tp['berat'].' gram</td>
		<td style="padding:5px;">'.$tp['stok'].'</td>
		<td style="padding:5px;">'.$tp['harga'].'</td>
		<td style="padding:5px;"><a href="'.base_url().'aksesroot/edit_produk/'.$tp['kode_produk'].'"><i class="fa fa-pencil"></i> Edit</a></td><td style="padding:5px;"><a href="'.base_url().'aksesroot/hapus_produk/'.$tp['kode_produk'].'/'.$tp['gbr_kecil'].'" onClick=\'return confirm("Anda yakin ingin menghapus konten ini???")\'><i class="fa fa-trash-o"></i> Hapus</a></td></tr>';
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

