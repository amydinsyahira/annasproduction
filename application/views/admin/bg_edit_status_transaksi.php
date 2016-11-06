<div class="clear"></div>
		<script type="text/javascript">
			function triggernoresi(stts) {
				if(stts == 1) { // Dipesan
					$('#noresi').val('');
					$('#hiddenRow').fadeOut('slow');
				} else if(stts == 2) { // Proses
					$('#noresi').val('');
					$('#hiddenRow').fadeOut('slow');
				} else if(stts == 3) { // Sudah Dikirim
					$('#hiddenRow').fadeIn('slow');
				}
			}

			function validasiForm() {
				if($('#noresi').val() == "" && $('#statustrans').val() == 3) {
					alert('Error: Kolom No.Resi harus diisi.');
					$('#noresi').focus();
					return false;
				}
				var x = confirm('Apakah Anda yakin mengganti status ?');
				if (x==false) return false;
			}
		</script>
<div id="content-outer">
<!-- start content -->
<div id="content">
	<div id="page-heading">
		<h1><?php echo $judul; ?></h1><br>
		<table width="98%" cellpadding="10">
		<tr><td valign="top">
		<fieldset style="border:1px dashed #666666; width:35%; padding:10px;">
<legend align="left"><strong>Edit Status Transaksi Histori :</strong></legend>
<?php 
foreach($kat->result_array() as $k)
	if($k['status'] == 1) {
		$selected = 'selected="selected"';
		$selected2 = '';
		$selected3 = '';
		$hidden = 'style="display: none;"';
	} else if($k['status'] == 2) {
		$selected = '';
		$selected2 = 'selected="selected"';
		$selected3 = '';
		$hidden = 'style="display: none;"';
	} else if($k['status'] == 3) {
		$selected = '';
		$selected2 = '';
		$selected3 = 'selected="selected"';
		$hidden = '';
	}
//}
?>
<form method="post" action="<?php echo base_url(); ?>aksesroot/update_status_transaksi" onsubmit="return validasiForm();">
<input type="hidden" name="kodetransaksi" id="kodetransaksi" value="<?php echo $k['kode_transaksi']; ?>">
<table width="100%" border="0" cellspacing="0">
	<tr>
		<td width="100">Status Transaksi</td><td width="10">:</td>
		<td>
			<select name="statustrans" id="statustrans" class="login-inp" onchange="triggernoresi(this.value);">
				<option value="1" <?php echo $selected; ?>>Dipesan</option>
				<option value="2" <?php echo $selected2; ?>>Proses</option>
				<option value="3" <?php echo $selected3; ?>>Sudah Dikirim</option>
			</select>
		</td>
	</tr>
	<tr id="hiddenRow" <?php echo $hidden; ?>>
		<td width="100">No. Resi</td><td width="10">:</td>
		<td>
			<input type="text" name="noresi" id="noresi" class="login-inp" size="40" maxlength="50" value="<?php echo $k['noresi']; ?>">
		</td>
	</tr>
	<tr><td width="120" valign="top"></td><td valign="top"></td><td><input type="submit" value="Ganti Status" class="input-tombol" /></td></tr>
</table>
</table>
</form>

	</fieldset>