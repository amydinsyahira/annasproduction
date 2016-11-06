

<div id="content-center">
<div style="padding:5px; border:1px solid #ccc; margin-bottom:10px;"><a href="<?php echo base_url(); ?>">Beranda</a> > <a href="<?php echo base_url(); ?>member">Halaman Member</a> > History Transaksi</div>
<h1>History Transaksi -  An-Nas Via Production</h1>
<h4>Transaksi: <?php echo date("d M Y", strtotime($get_kode)); ?></h4>
<table width="100%" style="border:1px solid #CCCCCC;" cellspacing="0">
<tr align="center" style="background-color: orange;font-weight:bold;">
	<td width='5%' class="td-keranjang">No.Resi</td>
	<td width='5%' class="td-keranjang">Nama Produk</td>
	<td width='5%' class="td-keranjang">Jumlah Beli (IDR)</td>
	<td width='5%' class="td-keranjang">@ Harga (IDR)</td>
	<td width='5%' class="td-keranjang">Sub Berat (gr)</td>
	<td width='5%' class="td-keranjang">Sub Total (IDR)</td>
	<td width='5%' class="td-keranjang">Status</td>
</tr>
<?php
if(count($history->result_array())>0){
$totalsemua = 0; $totalpertrans = 0; $tampungtranssama = ""; $no = 0;
$kota = ""; $pengiriman = ""; $hargaperkilo = ""; $subberat = ""; $subtotal = ""; $kode_transaksi = "";
foreach($history->result_array() as $in)
{
	$no++;
	if(empty($tampungtranssama)) $tampungtranssama = $in['kode_transaksi'];
	$kota[$no] = $in['kota'];
	$pengiriman[$no] = $in['pengiriman'];
	$hargaperkilo[$no] = $in['hargaperkilo'];
	$subberat[$no] = $in['subberat'];
	$subtotal[$no] = $in['subtotal'];
	$kode_transaksi[$no] = $in['kode_transaksi'];
	if($tampungtranssama <> $in['kode_transaksi']) {
		if(empty($kota[$no-1]) || empty($pengiriman[$no-1]) || $hargaperkilo[$no-1] == 0 || $subberat[$no-1] == 0 || $subtotal[$no-1] == 0) $ketKirim = "AMBIL DITEMPAT";
		else $ketKirim = "KEBUMEN - ".$kota[$no-1]." (via ".$pengiriman[$no-1].") @".number_format($hargaperkilo[$no-1], 0, ',', '.');
		echo "
		<tr style='background-color: #eee;'>
			<td class='td-keranjang' colspan='4'>".$ketKirim."</td>
			<td class='td-keranjang' align='center'>".number_format($subberat[$no-1], 2, ',', '.')."</td>
			<td align='right' class='td-keranjang'>".number_format($subtotal[$no-1],0,',','.')."</td>
			<td class='td-keranjang'>&nbsp;</td>
		</tr>
		";
		$totalpertrans = $totalpertrans + $subtotal[$no-1];
		$totalsemua = $totalsemua + $subtotal[$no-1];
		echo "
		<tr style='background-color: #eee;'>
			<td class='td-keranjang' colspan='5'><b>Total Belanja</b> (Kode Transaksi: ".$kode_transaksi[$no-1].")</td>
			<td align='right' class='td-keranjang'><b>".number_format($totalpertrans,0,',','.')."</b></td>
			<td class='td-keranjang'>&nbsp;</td>
		</tr>
		";
		$totalpertrans = 0;
		$tampungtranssama = $in['kode_transaksi'];
	}
	$tot = $in['harga']*$in['jumlah'];
	if(empty($in['noresi'])) $in['noresi'] = '-';
	if($in['status'] == 1) $status = 'Dipesan'; // Dipesan
	else if($in['status'] == 2) $status = 'Proses'; // Proses
	else if($in['status'] == 3) $status = 'Sudah Dikirim'; // Sudah Dikirim
		echo "
		<tr align='center'>
			<td class='td-keranjang'>".$in['noresi']."</td>
			<td class='td-keranjang'>".$in['nama_produk']."</td>
			<td class='td-keranjang'>".$in['jumlah']."</td>
			<td align='right' class='td-keranjang'>".number_format($in['harga'],0,',','.')."</td>
			<td class='td-keranjang'>-</td>
			<td align='right' class='td-keranjang'>".number_format($tot,0,',','.')."</td>
			<td class='td-keranjang'>".$status."</td>
		</tr>
		";
		$totalpertrans = $totalpertrans + $tot;
		$totalsemua = $totalsemua + $tot;
	if(count($history->result_array()) == $no) {
		if(empty($kota[$no]) || empty($pengiriman[$no]) || $hargaperkilo[$no] == 0 || $subberat[$no] == 0 || $subtotal[$no] == 0) $ketKirim = "AMBIL DITEMPAT";
		else $ketKirim = "KEBUMEN - ".$kota[$no]." (via ".$pengiriman[$no].") @".number_format($hargaperkilo[$no], 0, ',', '.');
		echo "
		<tr style='background-color: #eee;'>
			<td class='td-keranjang' colspan='4'>".$ketKirim."</td>
			<td class='td-keranjang' align='center'>".number_format($subberat[$no], 2, ',', '.')."</td>
			<td align='right' class='td-keranjang'>".number_format($subtotal[$no],0,',','.')."</td>
			<td class='td-keranjang'>&nbsp;</td>
		</tr>
		";
		$totalpertrans = $totalpertrans + $subtotal[$no];
		$totalsemua = $totalsemua + $subtotal[$no];
		echo "
		<tr style='background-color: #eee;'>
			<td class='td-keranjang' colspan='5'><b>Total Belanja</b> (Kode Transaksi: ".$kode_transaksi[$no].")</td>
			<td align='right' class='td-keranjang'><b>".number_format($totalpertrans,0,',','.')."</b></td>
			<td class='td-keranjang'>&nbsp;</td>
		</tr>
		";
		$totalpertrans = 0;
		$tampungtranssama = $in['kode_transaksi'];
	}
}
		echo "
		<tr style='background-color: orange;'>
			<td class='td-keranjang' colspan='4'>&nbsp;</td>
			<td class='td-keranjang' align='right'><b>TOTAL</b></td>
			<td align='right' class='td-keranjang'><b>".number_format($totalsemua,0,',','.')."</b></td>
			<td class='td-keranjang'>&nbsp;</td>
		</tr>
		";
}else{
echo "<tr align='center'><td colspan='7'>Maaf, belum ada transaksi pada tanggal ini.</td></tr>";
}
?>
</table>
<div class="cleaner_h5"></div>
<table align="center"><tr><td><?php echo $paginator; ?></td></tr></table>
</div>
