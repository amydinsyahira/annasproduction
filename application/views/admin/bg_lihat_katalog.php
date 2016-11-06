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
		<fieldset style="border:1px dashed #666666; width:98%; padding:10px;">
<legend align="left"><strong>Tampilkan Semua Katalog Produk :</strong></legend>
<table width="100%" border="1" cellspacing="0">
	<tr style="border:1px solid #333333; background-color:#333333; color:#FFFFFF;"><td width="120" style="padding:5px;">Kode Katalog</td><td style="padding:5px;">Judul Katalog</td><td style="padding:5px;">Tanggal Posting</td><td style="padding:5px;">Edit</td><td style="padding:5px;">Hapus</td></tr>
	<?php
	foreach($katalog->result_array() as $tp)
	{
	echo '<tr><td width="120" style="padding:5px;">KTHGS-'.$tp['id_katalog'].'</td><td style="padding:5px;">'.$tp['judul_file'].'</td><td style="padding:5px;">'.$tp['tgl_posting'].'</td><td style="padding:5px;"><a href="'.base_url().'aksesroot/edit_katalog/'.$tp['id_katalog'].'"><img src="'.base_url().'asset/images/edit-icon.gif" border=0> Edit</a></td><td style="padding:5px;"><a href="'.base_url().'aksesroot/hapus_katalog/'.$tp['id_katalog'].'/'.$tp['nama_file'].'" onClick=\'return confirm("Anda yakin ingin menghapus konten ini???")\'><img src="'.base_url().'asset/images/hapus.png" border=0> Hapus</a></td></tr>';
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

