

<div id="content-center">
<div style="padding:5px; border:1px solid #ccc; margin-bottom:10px;"><a href="<?php echo base_url(); ?>">Beranda</a> > <a href="<?php echo base_url(); ?>member">Halaman Member</a> > History Transaksi</div>
<h1>History Transaksi - An-nas Via Production</h1>
<div class="cleaner_h10"></div>
<table width="100%" style="border:1px solid #CCCCCC;" cellspacing="0">
<tr>
	<td class="td-keranjang">Tanggal Transaksi</td><td class="td-keranjang">Jumlah Produk Yang Dibeli</td
	></tr>
<?php
if(count($history->result_array())>0){
foreach($history->result_array() as $in)
{
	$newDate = date("d M Y", strtotime($in['tgltransaksi']));
	echo "<tr><td class='td-keranjang' width='50%'><a href='".base_url()."member/dethistory/".substr($in['kode_transaksi'],0,8)."'>".$newDate."</a></td><td class='td-keranjang'>".$in['jm']." Produk</td></tr>";
}
}
else{
echo "<tr><td>Maaf, belum ada transaksi selama anda berbelanja di website kami.</td></tr>";
}
?>
</table>
<div class="cleaner_h5"></div>
<table align="center"><tr><td><?php echo $paginator; ?></td></tr></table>
</div>
