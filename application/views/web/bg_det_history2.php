

<div id="content-center">
<div style="padding:5px; border:1px solid #ccc; margin-bottom:10px;"><a href="<?php echo base_url(); ?>">Beranda</a> > <a href="<?php echo base_url(); ?>member">Halaman Member</a> > History Transaksi</div>
<h1>History Transaksi -  An-Nas Via Production</h1>
<h4>Transaksi: <?php echo date("d M Y", strtotime($get_kode)); ?></h4>
<table width="100%" style="border:1px solid #CCCCCC;" cellspacing="0">
<tr align="center" style="background-color: orange;font-weight:bold;">
	<td width='5%' class="td-keranjang">No.Resi</td>
	<td width='5%' class="td-keranjang">Kode Transaksi</td>
	<td width='5%' class="td-keranjang">Nama Produk</td>
	<td width='5%' class="td-keranjang">Jumlah Beli (IDR)</td>
	<td width='5%' class="td-keranjang">@ Harga (IDR)</td>
	<td width='5%' class="td-keranjang">Sub Total (IDR)</td>
	<td width='5%' class="td-keranjang">Status</td>
</tr>
<?php
if(count($history->result_array())>0){
$totalsemua = 0;
foreach($history->result_array() as $in)
{
	$tot = $in['harga']*$in['jumlah'];
	if(empty($in['noresi'])) $in['noresi'] = '-';
	if($in['status'] == 1) $status = 'Dipesan'; // Dipesan
	else if($in['status'] == 2) $status = 'Proses'; // Proses
	else if($in['status'] == 3) $status = 'Sudah Dikirim'; // Sudah Dikirim
		echo "
		<tr align='center'>
			<td class='td-keranjang'>".$in['noresi']."</td>
			<td class='td-keranjang'>".$in['kode_transaksi']."</td>
			<td class='td-keranjang'>".$in['nama_produk']."</td>
			<td class='td-keranjang'>".$in['jumlah']."</td>
			<td align='right' class='td-keranjang'>".number_format($in['harga'],2,',','.')."</td>
			<td align='right' class='td-keranjang'>".number_format($tot,2,',','.')."</td>
			<td class='td-keranjang'>".$status."</td>
		</tr>
		";
		$totalsemua = $totalsemua + $tot;
}
		echo "
		<tr>
			<td class='td-keranjang' colspan='4'>&nbsp;</td>
			<td class='td-keranjang' align='right'><b>TOTAL</b></td>
			<td align='right' class='td-keranjang'><b>".number_format($totalsemua,2,',','.')."</b></td>
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
