<script type="text/javascript">
function setPaymentInfo(isChecked)
{
	with (window.document.frmCheckout) {
		if (isChecked) {
			namapen.value = namapem.value;
			emailpen.value = emailpem.value;
			alamatpen.value = alamatpem.value;
			telponpen.value = telponpem.value;
			propinsipen.value = propinsipem.value;
			kotapen.value = kotapem.value;			
			kodepospen.value = kodepospem.value;
			
			namapem.readOnly  = true;
			emailpem.readOnly  = true;
			alamatpem.readOnly  = true;
			telponpem.readOnly  = true;
			propinsipem.readOnly  = true;
			kotapem.readOnly  = true;	
			kodepospem.readOnly  = true;	
		} else {
			namapen.value = "";
			emailpen.value = "";
			alamatpen.value = "";
			telponpen.value = "";
			propinsipen.value = "";
			kotapen.value = "";	
			kodepospen.value = "";	
		}
	}
}
</script>
<div id="content-center">
<div style="padding:5px; border:1px solid #ccc; margin-bottom:10px;"><a href="<?php echo base_url(); ?>">Beranda</a> > <a href="<?php echo base_url(); ?>keranjang">Keranjang Belanja</a> > Selesai Belanja</div>
<h1>Selesai Belanja - An-nas Via Production</h1>
<?php if(!$this->cart->contents()){
	echo 'Maaf, Keranjang Belanja Anda Masih Kosong.';
	}
else{
?>
<?php
foreach($det_member->result_array() as $dm)
{

?>
<!-- <form method="post" action="<?php echo base_url(); ?>checkout/kirim_invoice"> -->
<?php echo form_open('checkout/update_keranjang'); ?>
<input type="hidden" name="urlproduk" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
<fieldset style="border:1px solid #ccc; border-radius:4px; width:505px; padding:5px;">
    <legend align="left"><strong>Detail Keranjang Belanja :</strong></legend>
<table width="100%" cellpadding="0" cellspacing="0" class="table-keranjang">
		<tr align="center">
			<td class="td-keranjang">Jumlah</td>
			<td class="td-keranjang">@ Berat</td>
			<td class="td-keranjang">Nama Barang</td>
			<td class="td-keranjang">@ Harga</td>
			<td class="td-keranjang">Sub Berat</td>
			<td class="td-keranjang">Sub Total</td>
			<td class="td-keranjang">Hapus</td>
		</tr>
		<?php $i = 1; $ttlweight = 0; $ttlprice = 0; ?>
		<?php foreach($this->cart->contents() as $items): ?>
		
		<?php echo form_hidden('rowid[]', $items['rowid']); ?>
		<?php echo form_hidden('kodeproduk[]', $items['id']); ?>
		<tr align="center" <?php if($i&1){ echo 'class="alt"'; }?>>
	  		<td class="td-keranjang">
	  			<?php /*echo form_input(array('name' => 'qty[]', 'value' => $items['qty'], 'maxlength' => '2', 'size' => '1', 'class' => 'input-teks'));*/ ?>
				<select name="qty[]" class="input-teks">
		  			<?php 
					for($i=5;$i<=200;$i+=5)
					{
					if($i==$items['qty'])
					{
						echo "<option selected>".$items['qty']."</option>";
					}
					else
					{
						echo "<option>".$i."</option>";
					}
					}	
					?>
				</select>
	  		</td>
	  		
	  		<td class="td-keranjang"><?php echo $items['weight']; ?> gr</td>
	  		<td class="td-keranjang"><?php echo $items['name']; ?></td>
	  		<td align="right" class="td-keranjang"><?php echo number_format($items['price'], 0, ',', '.'); ?> IDR</td>
	  		<td class="td-keranjang"><?php echo $items['subweight']; ?> gr</td>
	  		<td align="right" class="td-keranjang"><?php echo number_format($items['subtotal'], 0, ',', '.'); ?> IDR</td>
 		 	<td class="td-keranjang" align="center"><a href="<?php echo base_url(); ?>checkout/hapus_keranjang/<?php echo $items['rowid']; ?>"><img src="<?php echo base_url(); ?>asset/images/hapus.png" border="0"></a></td>
	  	</tr>
	  	<?php $ttlweight = $ttlweight + $items['subweight']; $ttlprice = $ttlprice + $items['subtotal'];?>
	  	<?php $i++; ?>
		<?php endforeach; ?>
		
		<tr>
			<td class="td-keranjang" colspan=4><font id="ketKirim">AMBIL DITEMPAT</font><!-- YOGYAKARTA - SURABAYA (via JNE) @20.000 -->
			</td>
			<td align="center" class="td-keranjang">
				<?php echo number_format($ttlweight / 1000, 2, ',', '.'); ?> kg
			</td>
 		 	<td align="right" class="td-keranjang">
 		 		<font id="subttltxt">0</font> IDR
 		 	</td>
 		 	<td class="td-keranjang">&nbsp;</td>
		</tr>
		<tr>
			<td class="td-keranjang" colspan=4><b>Total Belanja</b></td>
 		 	<td align="right" class="td-keranjang" colspan=2><font id="suballtxt"><?php echo number_format($ttlprice, 0, ',', '.'); ?></font> IDR
			</td>
 		 	<td class="td-keranjang">&nbsp;</td>
		</tr>
</table>
	</fieldset><br />
<?php echo "<input type='submit' class='input-tombol' value='Update Keranjang Belanja'>";?>
<?php 
echo form_close(); 
}
?>
<div class="cleaner_h20"></div>

<form method="post" action="<?php echo base_url(); ?>checkout/kirim_invoice" name="frmCheckout" id="frmCheckout">
<input type="hidden" name="tujuankirim" id="tujuankirim" value="AMBIL DITEMPAT" />
<input type="hidden" name="hargaberatperpiece" id="hargaberatperpiece" value="0" />
<input type="hidden" name="totalberat" id="totalberat" value="<?php echo number_format($ttlweight / 1000, 2, '.', '.');?>" />
<input type="hidden" name="subtotalkirim" id="subtotalkirim" value="0" />
<input type="hidden" name="totalallminvia" id="totalallminvia" value="<?php echo number_format($ttlprice, 0, '', '');?>" />
<!-- <form name="frmCheckout" id="frmCheckout"> -->
<fieldset style="border:1px solid #ccc; border-radius:4px; width:480px; padding:5px;">
<legend align="left"><strong>Detail Data Pembeli :</strong></legend>
<table width="100%" cellpadding="3" cellspacing="0">
	<tr>
		<td width="120">Nama Pembeli</td>
		<td width="5">:</td>
		<td><input type="text" size="50" class="input-teks" name="namapem" readonly="readonly" value="<?php echo $dm['nama']; ?>" /></td>
	</tr>
	<tr>
		<td width="120">Email Pembeli</td>
		<td width="5">:</td>
		<td><input type="text" size="50" class="input-teks" name="emailpem" readonly="readonly" value="<?php echo $dm['email']; ?>" />
		</td>
	</tr>
	<tr>
		<td width="120" valign="top">Alamat Pembeli</td>
		<td width="5" valign="top">:</td>
		<td><textarea name="alamatpem" cols="58" readonly="readonly" rows="6" class="input-teks"><?php echo $dm['alamat']; ?></textarea></td>
	</tr>
	<tr>
		<td width="120">No. Telpon</td>
		<td width="5">:</td>
		<td><input type="text" size="50" class="input-teks" name="telponpem" readonly="readonly" value="<?php echo $dm['telpon']; ?>" /></td>
	</tr>
	<tr>
		<td width="120">Propinsi</td>
		<td width="5">:</td>
		<td><input type="text" size="50" class="input-teks" name="propinsipem" readonly="readonly" value="<?php echo $dm['propinsi']; ?>" /></td>
	</tr>
	<tr>
		<td width="120">Kota</td>
		<td width="5">:</td>
		<td><input type="text" size="50" class="input-teks" name="kotapem" readonly="readonly" value="<?php echo $dm['kota']; ?>" /></td>
	</tr>
	<tr>
		<td width="120">Kode Pos</td>
		<td width="5">:</td>
		<td><input type="text" size="50" class="input-teks" name="kodepospem" readonly="readonly" value="<?php echo $dm['kode_pos']; ?>" /></td>
	</tr>
	</table>
	</fieldset>
	<div class="cleaner_h20"></div>
	<fieldset style="border:1px solid #ccc; border-radius:4px; width:480px; padding:5px;">
	<legend align="left"><strong>Detail Data Pengiriman / Penerima :</strong></legend>
	<table width="100%" cellpadding="3" cellspacing="0">
	<tr>
		<td colspan="3"><input type="checkbox" name="chkSame" id="chkSame" value="checkbox" onClick="setPaymentInfo(this.checked);"><label for="chkSame" style="cursor:pointer">Sama Dengan Data Pembeli</label></td>
	</tr>
	<tr>
		<td width="120">Nama Penerima</td>
		<td width="5">:</td>
		<td><input type="text" size="50" class="input-teks" name="namapen" /></td>
	</tr>
	<tr>
		<td width="120">Email Penerima</td>
		<td width="5">:</td>
		<td><input type="text" size="50" class="input-teks" name="emailpen" /></td>
	</tr>
	<tr>
		<td width="120" valign="top">Alamat Penerima</td>
		<td width="5" valign="top">:</td>
		<td><textarea name="alamatpen" cols="57" rows="6" class="input-teks"></textarea></td>
	</tr>
	<tr>
		<td width="120">No. Telpon</td>
		<td width="5">:</td>
		<td><input type="text" size="50" class="input-teks" name="telponpen" /></td>
	</tr>
	<tr>
		<td width="120">Propinsi</td>
		<td width="5">:</td>
		<td><input type="text" size="50" class="input-teks" name="propinsipen" /></td>
	</tr>
	<tr>
		<td width="120">Kota</td>
		<td width="5">:</td>
		<td><input type="text" size="50" class="input-teks" name="kotapen" /></td>
	</tr>
	<tr>
		<td width="120">Kode Pos</td>
		<td width="5">:</td>
		<td><input type="text" size="50" class="input-teks" name="kodepospen" /></td>
	</tr>
	</table>
	</fieldset>
	<div class="cleaner_h20"></div>
	<fieldset style="border:1px solid #ccc; border-radius:4px; width:495px; padding:5px;">
	<legend align="left"><strong>Metode Pembayaran dan Pengiriman Paket :</strong></legend>
	<table width="100%" cellpadding="3" cellspacing="0">
	<tr>
		<td width=120>Bank Tujuan</td>
		<td>:</td>
		<td>
		<select name="bank" class="input-teks">
		<option value="Bank Central Asia - No. Rek 1800658299">Bank Central Asia - No. Rek 1800658299</option>
		<option value="Bank Mandiri - No. Rek 143-00-1170047-1">Bank Mandiri - No. Rek 143-00-1170047-1</option>
		<option value="Bank BRI - No. Rek 6125-01-003271-53-9">Bank BRI - No. Rek 6125-01-003271-53-9</option>
		<option value="Bank Mandiri Syariah - No. Rek 2857027105">Bank Mandiri Syariah - No. Rek 2857027105</option>
		</select>
		</td>
	</tr>
	<tr>
		<td width=120>Metode Pembayaran</td>
		<td>:</td>
		<td>
		<select name="metode" class="input-teks"><option value="Setoran Tunai, Transfer Bank">Setoran Tunai, Transfer Bank</option>
		<option value="Setoran Tunai, Transfer Antar Bank">Setoran Tunai, Transfer Antar Bank</option>
		<option value="ATM">ATM</option>
		<option value="ATM - Antar Bank">ATM - Antar Bank</option>
		<option value="Internet Banking">Internet Banking</option>
		<option value="Internet Banking - Antar Bank">Internet Banking - Antar Bank</option>
		<option value="SMS Banking">SMS Banking</option>
		<option value="SMS Banking - Antar Bank">SMS Banking - Antar Bank</option>
		</select>
		</td>
	</tr>
	<tr>
		<td width=120>Paket Pengiriman</td>
		<td>:</td>
		<td>
		<select name="paket" id="paket" class="input-teks" onchange="loadkotakirim(this.value);">
		<option value="0" selected="selected">AMBIL DITEMPAT</option>
		<?php
		foreach($tampil_pengiriman->result_array() as $tpp) {
		echo '<option value="'.$tpp['id_pengiriman'].'">'.$tpp['pengiriman'].'</option>';
		}
		?>
		</select>
		<input type="button" value="Cek Biaya Kirim" class="input-tombol" onclick="location.href='#content-center'" />
		</td>
	</tr>
	<tr id="triggerktkirim" style="display: none;">
		<td width=120>Kota Tujuan Pengiriman</td>
		<td>:</td>
		<td>
		<select name="kotapaket" id="kotapaket" class="input-teks" onchange="htmldatavia();">
		<option value="0|0" selected="selected">AMBIL DITEMPAT</option>
		</select>
		</td>
	</tr>
	<tr>
		<td width="120" valign="top">Pesan (jika ada)</td>
		<td width="5" valign="top">:</td>
		<td><textarea name="pesan" cols="54" rows="6" class="input-teks"></textarea></td>
	</tr>
	<tr>
		<td width="120" valign="top"></td>
		<td width="5" valign="top"></td>
		<td><input type="submit" value="Kirim Data Pesanan" class="input-tombol" /></td>
	</tr>
	</table>
	</fieldset>
	</form>
	<!-- </form> -->
<?php
}
?>

<div class="cleaner_h20"></div>

</div>
