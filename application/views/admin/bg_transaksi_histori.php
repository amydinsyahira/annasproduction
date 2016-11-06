<?php
error_reporting(0);
?>
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
<legend align="left"><strong>List Transaksi Histori :</strong></legend>
<?php
	if(!empty($_POST['tgl']) && !empty($_POST['tgl2'])) {
		$startdate = $_POST['tgl'];
		$enddate = $_POST['tgl2'];
	} else {
		$startdate = $awaltanggaltemp;
		$enddate = $akhirtanggaltemp;
	}
?>
<form method="post" action="<?php echo base_url(); ?>aksesroot/transaksi_histori">
 <link href="<?php echo base_url('assets/css/cetak.css'); ?>" rel="stylesheet" type="text/css" title="Default">
      </head>
      <body onload="window.print()">
         <div id="common">
            <div id="page-khs">
               <div class="header-khs">
               <div style="float: left;">
               	Tanggal Awal: <input type="text" value="<?php echo $startdate;?>" name="tgl" class="login-inp datepickernow" size="15" style="padding: 8px;">&nbsp;
               	Tanggal Akhir: <input type="text" value="<?php echo $enddate;?>" name="tgl2" class="login-inp datepickernow" size="15" style="padding: 8px;"></div>
<input type="submit" value="Cari Transaksi" class="input-tombol" /><br />
<p style="float: left;"><b>Periode:</b> <?php echo date('d F Y',strtotime($startdate))." s/d ".date('d F Y',strtotime($enddate)); ?></p>
<p style="float: right;"><a href="<?php echo base_url(); ?>aksesroot/cetak_status_transaksi" target="_blank">Cetak</a></p>
</form>
<table width="100%" border="1" cellspacing="0">
	<tr style="border:1px solid #333333; background-color:#333333; color:#FFFFFF;" align="center">
		<td width="7%" style="padding:5px;">Kode Transaksi</td>
		<td width="7%" style="padding:5px;">Tgl Pemesan</td>
		<td style="padding:5px;">Pemesan</td>
		<td style="padding:5px;">Penerima</td>
		<td width="10%" style="padding:5px;">Kode Produk</td>
		<td width="10%" style="padding:5px;">Nama Produk</td>
		<td width="7%" style="padding:5px;">Harga (IDR)</td>
		<td style="padding:5px;">Jumlah</td>
		<td width="7%" style="padding:5px;">Sub Total (IDR)</td>
		<td style="padding:5px;">Total Harga (IDR)</td>
		<td width="8%" style="padding:5px;">Pengiriman</td>
		<td style="padding:5px;">Total Berat (kg)</td>
		<td style="padding:5px;">Total Harga Kirim (IDR)</td>
		<td style="padding:5px;">Total Semua (IDR)</td>
		<td style="padding:5px;">Status</td>
		<td style="padding:5px;">Aksi</td>
	</tr>
	<?php
	$num = $tampil->num_rows();
	if($num > 0) {
		foreach($tampil->result_array() as $tp)
		{
		if ($tp['status'] == 1) { // Dipesan
			$colorStatus = "red";
			$txtStatus = "Dipesan";
		} else if ($tp['status'] == 2) { // Proses
			$colorStatus = "blue";
			$txtStatus = "Proses";
		} else if ($tp['status'] == 3) { // Sudah Kirim
			$colorStatus = "green";
			$txtStatus = "Sudah Kirim";
		}
		$newDate = date("d M Y", strtotime($tp['tgltransaksi']));
		$tot = $tp['jumlah']*$tp['harga'];
		$SQL = mysql_query("
			SELECT 
				tbl_transaksi_detail.kode_produk,
				tbl_produk.nama_produk,
				tbl_transaksi_detail.harga,
				tbl_transaksi_detail.jumlah 
			FROM tbl_transaksi_detail 
			INNER JOIN tbl_produk ON tbl_produk.kode_produk = tbl_transaksi_detail.kode_produk 
			WHERE tbl_transaksi_detail.kode_transaksi = ".$tp['kode_transaksi']
		);
		if(empty($tp['noresi'])) $noresi = "";
		else $noresi = "<i>(No.Resi: ".$tp['noresi'].")</i>";
		echo '<tr align="center"><td width="120" style="padding:5px;">'.$tp['kode_transaksi'].' '.$noresi.'</td>
		<td style="padding:5px;">'.$newDate.' '.$tp['jamtransaksi'].'</td><td style="padding:5px;">'.$tp['nama'].'</td>
		<td style="padding:5px;">'.$tp['nama_penerima'].'</td>';
		$countProduk = mysql_num_rows($SQL);
		if($countProduk <= 1) {
			echo '
			<td style="padding:5px;">'.$tp['kode_produk'].'</td>
			<td style="padding:5px;">'.$tp['nama_produk'].'</td><td style="padding:5px;">'.number_format($tp['harga'], 0, ',', '.').'</td>
			<td style="padding:5px;">'.$tp['jumlah'].'</td><td style="padding:5px;">'.number_format($tot, 0, ',', '.').'</td>';
		} else {
			$no = 0; $totalall = 0; $kode_produk = ""; $nama_produk = ""; $harga = ""; $jumlah = ""; $subtotal = "";
			while ($xx = mysql_fetch_array($SQL)) {
				$kode_produk[$no] = $xx['kode_produk'];
				$nama_produk[$no] = $xx['nama_produk'];
				$harga[$no] = $xx['harga'];
				$jumlah[$no] = $xx['jumlah'];
				$subtotal[$no] = $harga[$no]*$jumlah[$no];
				$totalall = $totalall + $subtotal[$no];
				$no++;
			}
			echo '<td style="padding:5px;">';
			$nom=0;
			for ($i=0; $i < count($kode_produk); $i++) { 
				$nom++;
				echo $nom.'.) '.$kode_produk[$i].'<br />';
			}
			echo '</td>';
			echo '<td style="padding:5px;">';
			$nom=0;
			for ($i=0; $i < count($nama_produk); $i++) { 
				$nom++;
				echo $nom.'.) '.$nama_produk[$i].'<br />';
			}
			echo '</td>';
			echo '<td style="padding:5px;">';
			$nom=0;
			for ($i=0; $i < count($harga); $i++) { 
				$nom++;
				echo $nom.'.) '.number_format($harga[$i], 0, ',', '.').'<br />';
			}
			echo '</td>';
			echo '<td style="padding:5px;">';
			$nom=0;
			for ($i=0; $i < count($jumlah); $i++) { 
				$nom++;
				echo $nom.'.) '.$jumlah[$i].'<br />';
			}
			echo '</td>';
			echo '<td style="padding:5px;">';
			$nom=0;
			for ($i=0; $i < count($subtotal); $i++) { 
				$nom++;
				echo $nom.'.) '.number_format($subtotal[$i], 0, ',', '.').'<br />';
			}
			echo '</td>';
		}
		if(empty($tp['kota']) || empty($tp['pengiriman']) || $tp['hargaperkilo'] == 0 || $tp['subberat'] == 0 || $tp['subtotal'] == 0) $ketKirim = "AMBIL DITEMPAT";
		else $ketKirim = "KEBUMEN - ".$tp['kota']." (via ".$tp['pengiriman'].") @".number_format($tp['hargaperkilo'], 0, ',', '.');
		if($countProduk <= 1) echo '<td style="padding:5px;">'.number_format($tot, 0, ',', '.').'</td>';
		else echo '<td style="padding:5px;">'.number_format($totalall, 0, ',', '.').'</td>';
		echo '<td style="padding:5px;">'.$ketKirim.'</td>';
		echo '<td style="padding:5px;">'.number_format($tp['subberat'], 2, ',', '.').'</td>';
		echo '<td style="padding:5px;">'.number_format($tp['subtotal'], 0, ',', '.').'</td>';
		echo '<td style="padding:5px;">'.number_format($tp['subtotal'] + $totalall, 0, ',', '.').'</td>';
		echo '
		<td style="padding:5px;color:'.$colorStatus.';">'.$txtStatus.'</td>
		<td style="padding:5px;">
		<a href="'.base_url().'aksesroot/edit_status_transaksi/'.$tp['kode_transaksi'].'"><img src="'.base_url().'asset/images/edit-icon.gif" border=0> Edit</a>
		</td>
		</tr>';
		}
	} else {
		echo '<tr align="center"><td style="padding:5px;" colspan="11">- Pencarian Tidak Ada -</td></tr>';		
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

