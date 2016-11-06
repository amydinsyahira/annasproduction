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
<legend align="left"><strong>Tampilkan Semua Produk :</strong></legend>

	<ul>
	<?php
	$tot_sub = $this->songkok_admin_model->menu_kategori(0,0)->num_rows();
	if ($tot_sub > 0) {
		foreach($kat_level->result_array() as $m1)
		{
			$nm_link1 = $m1['id_kategori'].'-'.$m1['nama_kategori'];
			$ld1 = strtolower(str_replace(" ","-",$nm_link1));
			echo '<li>'.$m1['nama_kategori'].' - <a href="'.base_url().'aksesroot/edit_kategori/'.$m1['id_kategori'].'"><img src="'.base_url().'asset/images/edit-icon.gif" border=0> Edit</a> | <a href="'.base_url().'aksesroot/hapus_kategori/'.$m1['id_kategori'].'" onClick=\'return confirm("Anda yakin ingin menghapus konten ini???")\'><img src="'.base_url().'asset/images/hapus.png" border=0> Hapus</a><ul>';

			$tot_sub1 = $this->songkok_admin_model->menu_kategori(1,$m1['id_kategori'])->num_rows();
			if ($tot_sub1 > 0) {
				$sub1 = $this->songkok_admin_model->menu_kategori(1,$m1['id_kategori']);
				foreach($sub1->result_array() as $sm1)
				{
					$nm_link2 = $sm1['id_kategori'].'-'.$sm1['nama_kategori'];
					$ld2 = strtolower(str_replace(" ","-",$nm_link2));
					echo '<li>'.$sm1['nama_kategori'].' - <a href="'.base_url().'aksesroot/edit_kategori/'.$sm1['id_kategori'].'"><img src="'.base_url().'asset/images/edit-icon.gif" border=0> Edit</a> | <a href="'.base_url().'aksesroot/hapus_kategori/'.$sm1['id_kategori'].'" onClick=\'return confirm("Anda yakin ingin menghapus konten ini???")\'><img src="'.base_url().'asset/images/hapus.png" border=0> Hapus</a><ul>';
					
					$tot_sub2 = $this->songkok_model->hitung_isi_1tabel('tbl_kategori','where kode_level=2 and kode_parent='.$sm1['id_kategori'])->num_rows();
					if ($tot_sub2 > 0) {
						$sub2 = $this->songkok_admin_model->menu_kategori(2,$sm1['id_kategori']);
						foreach($sub2->result_array() as $sm2)
						{
							$nm_link3 = $sm2['id_kategori'].'-'.$sm2['nama_kategori'];
							$ld3 = strtolower(str_replace(" ","-",$nm_link3));
							echo '<li>'.$sm2['nama_kategori'].' - <a href="'.base_url().'aksesroot/edit_kategori/'.$sm2['id_kategori'].'"><img src="'.base_url().'asset/images/edit-icon.gif" border=0> Edit</a> | <a href="'.base_url().'aksesroot/hapus_kategori/'.$sm2['id_kategori'].'" onClick=\'return confirm("Anda yakin ingin menghapus konten ini???")\'><img src="'.base_url().'asset/images/hapus.png" border=0> Hapus</a></li>';
						}
					}
					echo '</ul>';
					echo '</li>';
					
				}
			}
			echo '</ul>';
			echo '</li>';
		}
	} else {
		echo '<li>- Data kategori tidak ada -</li>';
	}
	?>
	</ul>


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

