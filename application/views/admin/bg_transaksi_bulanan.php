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
<legend align="left"><strong>Tampilkan Transaksi Bulanan :</strong></legend>
<form method="post" action="<?php echo base_url(); ?>aksesroot/transaksi_bulanan">
<select name="bln" class="login-inp">
<?php
  for ($j=1; $j<=12; $j++)
  {
		$lebar=strlen($j);
		switch($lebar){
		  case 1:
		  {
			echo '<option value="0'.$j.'">0'.$j.'</option>';
			break;     
		  }
		  case 2:
		  {
			echo '<option value="'.$j.'">'.$j.'</option>';
			break;     
		  }      
		} 
	}
?>
</select>
<select name="thn" class="login-inp">
<?php
	for($k=2010;$k<=date('Y');$k++)
	{
		echo '<option value="'.$k.'">'.$k.'</option>';
	}
?>
</select>
<input type="submit" value="Lihat Transaksi" class="input-tombol" />
</form>
<table width="100%" border="1" cellspacing="0">
	<tr style="border:1px solid #333333; background-color:#333333; color:#FFFFFF;" align="center"><td width="120" style="padding:5px;">Kode Transaksi</td><td style="padding:5px;">Pemesan</td><td style="padding:5px;">Penerima</td><td style="padding:5px;">Kode Produk</td><td style="padding:5px;">Nama Produk</td><td style="padding:5px;">Harga</td><td style="padding:5px;">Jumlah</td><td style="padding:5px;">Total Harga</td></tr>
	<?php
	foreach($tampil->result_array() as $tp)
	{
	$tot = $tp['jumlah']*$tp['harga'];
	echo '<tr><td width="120" style="padding:5px;">'.$tp['kode_transaksi'].'</td><td style="padding:5px;">'.$tp['nama'].'</td>
	<td style="padding:5px;">'.$tp['nama_penerima'].'</td><td style="padding:5px;">'.$tp['kode_produk'].'</td>
	<td style="padding:5px;">'.$tp['nama_produk'].'</td><td style="padding:5px;">'.$tp['harga'].'</td>
	<td style="padding:5px;">'.$tp['jumlah'].'</td><td style="padding:5px;">'.$tot.'</td>
	</tr>';
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

