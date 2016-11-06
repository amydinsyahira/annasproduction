<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('captcha','date','text_helper','form'));
		$this->load->library('email');
		session_start();
	}

	function index()
	{
		$session=isset($_SESSION['username_grosir_songkok']) ? $_SESSION['username_grosir_songkok']:'';
		if($session!="")
		{
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data['menu'] = $this->songkok_model->menu_kategori('0','0');
			$data['judul'] = "Selesai Belanja - Grosir Songkok Online, Toko Songkok Online Termurah dan Terlengkap di Indonesia - Harmonis Grosir Songkok";
			$data['slide_atas'] = $this->songkok_model->tampil_slide_produk(10);
			$data['slide_laris'] = $this->songkok_model->tampil_slide_produk_terlaris_kiri(5);
			$data['slide_baru'] = $this->songkok_model->tampil_produk(3);
			$data['slide_rekomendasi'] = $this->songkok_model->tampil_slide_produk(6);
			$data['testimonial'] = $this->songkok_model->tampil_testimonial(10,0);
			$data['det_member'] = $this->songkok_model->pilih_member($pecah[2]);
			//$data['banner'] = $this->songkok_model->tampil_banner();
			$data['kategori_side'] = $this->songkok_model->side_kategori();
			$data['tampil_pengiriman'] = $this->songkok_model->tampil_pengiriman();
			//$data['formulajne'] = $this->songkok_model->formula_jne(0 * $ttlweight / 1000);
			
		
			$session=isset($_SESSION['username_grosir_songkok']) ? $_SESSION['username_grosir_songkok']:'';
			if($session!=""){
				$pecah=explode("|",$session);
				$data["nama"]=$pecah[1];
			}
			
			$this->load->view('web/bg_top',$data);
			$this->load->view('web/bg_left',$data);
			$this->load->view('web/bg_checkout',$data);
			$this->load->view('web/bg_right');
			$this->load->view('web/bg_bottom');
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."member/login'>";
		}
	}

	function ambildatakota() {
		$_idpengiriman = $this->input->post('_idpengiriman');
		if($_idpengiriman == 0) {
			echo '0~';
			echo '<option value="0|0" selected="selected">AMBIL DITEMPAT</option>';
		} else {
			echo '1~';
			$q = $this->songkok_model->jalankan_query_manual_select("SELECT kt.id_kota, kt.kota, bk.biayakirim FROM tbl_biayakirim bk INNER JOIN tbl_kota kt ON kt.id_kota = bk.id_kota WHERE bk.id_pengiriman = ".$_idpengiriman." GROUP BY bk.id_biayakirim ORDER BY kt.kota ASC");
			$found = $q->num_rows();
			if($found > 0) {
				foreach($q->result() as $a) echo '<option value="'.$a->id_kota.'|'.$a->biayakirim.'">'.$a->kota.'</option>';
			} else {
				echo '<option value="0|0" selected="selected">AMBIL DITEMPAT</option>';
			}			
		}
	}

	function tambah_barang()
	{
		$urlproduk = $this->input->post('urlproduk');
		$data = array(
			'id'      => $this->input->post('kode_produk'),
			'qty'     => $this->input->post('banyak'),
		    'price'   => $this->input->post('harga'),
			'weight'  => $this->input->post('berat_produk'),
			'name'    => $this->input->post('nama_produk')
		);
		$resultstock = $this->songkok_model->cekstok_produk($data['id']);
		$statusstok = FALSE;
		foreach($resultstock->result() as $xv) {
			if($xv->stok < $data['qty']) $statusstok = FALSE;
			else $statusstok = TRUE;
		}
		if($statusstok == TRUE) {
			$this->cart->insert($data);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."checkout/'>";
		} else {
			echo '<script>alert("Perhatian! Stok tidak mencukupi jumlah barang yang Anda inginkan.");</script>';
			echo "<meta http-equiv='refresh' content='0; url=".$urlproduk."'>";
		}		
		/*$data = array(
			'id'      => $this->input->post('kode_produk'),
			'qty'     => $this->input->post('banyak'),
		       'price'   => $this->input->post('harga'),
			'weight'    => $this->input->post('berat_produk'),
			'name'    => $this->input->post('nama_produk'));
		$this->cart->insert($data);
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."checkout/'>";*/
	}
	
	
	function update_keranjang()
	{
		$total = $this->cart->total_items();
		$kodeproduk = $this->input->post('kodeproduk');
		$item = $this->input->post('rowid');
		$qty = $this->input->post('qty');
		$urlproduk = $this->input->post('urlproduk');
		for($i=0;$i < $total;$i++)
		{
			$data = array(
				'kodeproduk' => $kodeproduk[$i],
				'rowid' => $item[$i],
				'qty'   => $qty[$i]
			);
			$resultstock = $this->songkok_model->cekstok_produk($data['kodeproduk']);
			$statusstok = FALSE;
			foreach($resultstock->result() as $xv) {
				if($xv->stok < $data['qty']) $statusstok = FALSE;
				else $statusstok = TRUE;
			}
			if($statusstok == TRUE) {
				$this->cart->update($data);
			} else {
				echo '<script>alert("Perhatian! Terdapat stok yang tidak mencukupi jumlah barang yang Anda inginkan.");</script>';
				echo "<meta http-equiv='refresh' content='0; url=".$urlproduk."'>";
			}
		}
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."checkout/'>";
		/*$total = $this->cart->total_items();
		$item = $this->input->post('rowid');
		$qty = $this->input->post('qty');
		for($i=0;$i < $total;$i++)
		{
			$data = array(
			'rowid' => $item[$i],
			'qty'   => $qty[$i]);
			$this->cart->update($data);
		}
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."checkout/'>";*/
	}

	function hapus_keranjang($kode)
	{
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array(
			'rowid' => $kode,
			'qty'   => 0);
			$this->cart->update($data);
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."checkout/'>";
	}
	
	function kirim_invoice()
	{
		$session=isset($_SESSION['username_grosir_songkok']) ? $_SESSION['username_grosir_songkok']:'';
		if($session==""){
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."member'>";
		}
		else{
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd_user"]=$pecah[2];
			$data["email"]=$pecah[3];
			$data['menu'] = $this->songkok_model->menu_kategori('0','0');
			$data['judul'] = "Kirim Pesanan - Grosir Songkok Online, Toko Songkok Online Termurah dan Terlengkap di Indonesia - Harmonis Grosir Songkok";
			$data['slide_atas'] = $this->songkok_model->tampil_slide_produk(10);
			$data['slide_laris'] = $this->songkok_model->tampil_slide_produk_terlaris_kiri(5);
			$data['slide_baru'] = $this->songkok_model->tampil_produk(3);
			$data['slide_rekomendasi'] = $this->songkok_model->tampil_slide_produk(6);
			$data['testimonial'] = $this->songkok_model->tampil_testimonial(10,0);
			//$data['banner'] = $this->songkok_model->tampil_banner();
			
			$tgl_skr = date('Ymd');
			$cek_kode = $this->songkok_model->cek_kode($tgl_skr);
			$kode_trans = "";
			foreach($cek_kode->result() as $ck)
			{
				if($ck->kd==NULL)
				{
					$kode_trans = $tgl_skr.'001';
				}
				else
				{
					$kd_lama = $ck->kd;
					$kode_trans = $kd_lama+1;
				}
			}
			
			$datapesan['kode_user'] = $pecah[2];
			$datapesan['nama_penerima'] = mysql_real_escape_string($this->input->post('namapen'));
			$datapesan['email_penerima'] = mysql_real_escape_string($this->input->post('emailpen'));
			$datapesan['alamat_penerima'] = mysql_real_escape_string($this->input->post('alamatpen'));
			$datapesan['propinsi_penerima'] = mysql_real_escape_string($this->input->post('propinsipen'));
			$datapesan['telpon_penerima'] = mysql_real_escape_string($this->input->post('telponpen'));
			$datapesan['kota_penerima'] = mysql_real_escape_string($this->input->post('kotapen'));
			$datapesan['kodepos_penerima'] = mysql_real_escape_string($this->input->post('kodepospen'));
			
			$datapesan['nama_pembeli'] = mysql_real_escape_string($this->input->post('namapem'));
			$datapesan['email_pembeli'] = mysql_real_escape_string($this->input->post('emailpem'));
			$datapesan['alamat_pembeli'] = mysql_real_escape_string($this->input->post('alamatpem'));
			$datapesan['propinsi_pembeli'] = mysql_real_escape_string($this->input->post('propinsipem'));
			$datapesan['telpon_pembeli'] = mysql_real_escape_string($this->input->post('telponpem'));
			$datapesan['kota_pembeli'] = mysql_real_escape_string($this->input->post('kotapem'));
			$datapesan['kodepos_pembeli'] = mysql_real_escape_string($this->input->post('kodepospem'));
			
			$datapesan['metode'] = mysql_real_escape_string($this->input->post('metode'));
			$datapesan['paket'] = mysql_real_escape_string($this->input->post('paket'));
			$datapesan['bank'] = mysql_real_escape_string($this->input->post('bank'));
			$datapesan['pesan'] = mysql_real_escape_string($this->input->post('pesan'));
			$datapesan['kotapaket'] = mysql_real_escape_string($this->input->post('kotapaket'));
			$datapesan['kotapaket'] = explode('|', $datapesan['kotapaket']);
			$datapesan['hargaberatperpiece'] = mysql_real_escape_string($this->input->post('hargaberatperpiece'));
			$datapesan['totalberat'] = mysql_real_escape_string($this->input->post('totalberat'));
			$datapesan['subtotalkirim'] = mysql_real_escape_string($this->input->post('subtotalkirim'));
			if($datapesan['pesan']=="")
			{
				$datapesan['pesan'] = "-";
			}
			else
			{
				$datapesan['pesan'] = mysql_real_escape_string($this->input->post('pesan'));
			}
			
			
			$data['pesan'] = "";
				if($datapesan['nama_penerima']=="" || $datapesan['email_penerima']=="" || $datapesan['alamat_penerima']=="" || $datapesan['propinsi_penerima']=="" || $datapesan['kota_penerima']=="" || $datapesan['kodepos_penerima']=="" || $datapesan['telpon_penerima']=="" )
				{
					$data['pesan'] = "Field belum lengkap. Mohon diisi dengan selengkap-lengkapnya.";
					$data['kategori_side'] = $this->songkok_model->side_kategori();
					$this->load->view('web/bg_top',$data);
					$this->load->view('web/bg_left',$data);
					$this->load->view('web/bg_hasil_selesai_belanja',$data);
					$this->load->view('web/bg_right');
					$this->load->view('web/bg_bottom');
				}
				else
				{
					$isi_psn = 'Terima kasih telah berbelanja di Harmonis Grosir Songkok Online. Berikut detail produk yang anda beli :<br><br>
					
Detail Data Pembeli<br>
Kode Transaksi : '.$kode_trans.'<br>
Nama Pembeli : '.$datapesan['nama_pembeli'].'<br>
Email Pembeli : '.$datapesan['email_pembeli'].'<br>
Alamat Pembeli : '.$datapesan['alamat_pembeli'].'<br>
No. Telpon Pembeli : '.$datapesan['telpon_pembeli'].'<br>
Propinsi Pembeli : '.$datapesan['propinsi_pembeli'].'<br>
Kota Pembeli : '.$datapesan['kota_pembeli'].'<br>
Kode Pos Pembeli : '.$datapesan['kodepos_pembeli'].'<br><br>
					
					
Detail Data Penerima<br>
Kode Transaksi : '.$kode_trans.'<br>
Nama Penerima : '.$datapesan['nama_penerima'].'<br>
Email Penerima : '.$datapesan['email_penerima'].'<br>
Alamat Penerima : '.$datapesan['alamat_penerima'].'<br>
No. Telpon Penerima : '.$datapesan['telpon_penerima'].'<br>
Propinsi Penerima : '.$datapesan['propinsi_penerima'].'<br>
Kota Penerima : '.$datapesan['kota_penerima'].'<br>
Kode Pos Penerima : '.$datapesan['kodepos_penerima'].'<br><br>
					
					
Bank Tujuan : '.$datapesan['bank'].'<br>
Metode Pembayaran : '.$datapesan['metode'].'<br>
Paket Pengiriman : '.$datapesan['paket'].'<br>
Pesan : '.$datapesan['pesan'].'<br><br>

';
					$isi_psn .='<table style="border:1px solid #000;" border="1" cellpadding=0>';
					$isi_psn .='<tr><td>Kode Produk</td><td>Nama Produk</td><td>Harga</td><td>Jumlah</td><td>Subtotal</td></tr>';
					foreach($this->cart->contents() as $items)
					{
$isi_psn .= '<tr><td>'.$items["id"].'</td><td>'.$items["name"].'</td><td>Rp.'.$this->cart->format_number($items["price"]).'</td><td>'.$items["qty"].'</td><td>Rp.'.$this->cart->format_number($items["subtotal"]).'</td></tr>
';
					}
					$isi_psn .= '<tr><td>Total Belanja (belum biaya kirim): </td><td colspan=4>Rp.'.$this->cart->format_number($this->cart->total()).'</td></tr>
';
					$isi_psn .='</table><br>';
					$isi_psn .='Terima kasih sudah belanja di toko kami ^_^ <br>';
					$isi_psn .='Salam, Harmonis Grosir Songkok';
					
					$this->email->set_mailtype('html');
					$this->email->from("admin@harmonisgrosirsongkok.com", "Admin Grosir Songkok Online");
					$this->email->to($data["email"]);
					$this->email->subject('Detail Pesanan/Belanja - Member Harmonis Grosi Songkok Online');
					$this->email->message($isi_psn);	
					//$hsl = $this->email->send();
					
					$this->email->clear();
					
					$this->email->from($data["email"],$data["nama"]);
					$this->email->to("admin@harmonisgrosirsongkok.com");
					$this->email->subject('Detail Pesanan/Belanja - Member Harmonis Grosi Songkok Online');
					$this->email->message($isi_psn);	
					//$hsl2 = $this->email->send();
					$hsl2 = true;
					
					if($hsl2==TRUE)
					{
						if($datapesan['paket'] > 0 && $datapesan['kotapaket'][0] > 0) {
							$xxx = $this->songkok_model->jalankan_query_manual_select("SELECT id_biayakirim FROM tbl_biayakirim WHERE id_pengiriman = ".$datapesan['paket']." AND id_kota = ".$datapesan['kotapaket'][0]);
							foreach($xxx->result() as $xv) $idbiayakirim = $xv->id_biayakirim;
						} else {
							$idbiayakirim = 0;
						}
						$q = "insert into tbl_transaksi_header(kode_transaksi,tgltransaksi,jamtransaksi,kode_user,nama_penerima,email_penerima,alamat_penerima,propinsi,kota,kodepos,telpon,metode,paket_kirim,hargaperkilo,subberat,subtotal,bank,pesan,status) values('".$kode_trans."','".gmdate("Y-m-d", time()+60*60*7)."','".gmdate("H:i:s", time()+60*60*7)."','".$data["kd_user"]."','".$datapesan['nama_penerima']."','".$datapesan['email_penerima']."','".$datapesan['alamat_penerima']."','".$datapesan['propinsi_penerima']."','".$datapesan['kota_penerima']."','".$datapesan['kodepos_penerima']."','".$datapesan['telpon_penerima']."','".$datapesan['metode']."',".$idbiayakirim.",".$datapesan['hargaberatperpiece'].",".$datapesan['totalberat'].",".$datapesan['subtotalkirim'].",'".$datapesan['bank']."','".$datapesan['pesan']."', 1)";
						$this->songkok_model->simpan_pesanan($q);
						foreach($this->cart->contents() as $items)
						{
							$this->songkok_model->simpan_pesanan("insert into tbl_transaksi_detail (kode_transaksi,kode_produk,harga,jumlah) values('".$kode_trans."','".$items['id']."','".$items['price']."','".$items['qty']."')");
							$this->songkok_model->update_dibeli($items['id'],$items['qty']);
						}
						$this->cart->destroy();
						?>
						<script type="text/javascript">
						alert("Pesanan anda telah terkirim. Jika dalam 1x24 jam belum ada konfirmasi, pemesanan dianggap batal.\n Terima Kasih");			
						</script>
						<?php
						echo "<meta http-equiv='refresh' content='0; url=".base_url()."member/'>";
					}
					else
					{
						$data['pesan'] = "Gagal mengirim detail pesanan/belanja.";
						$data['kategori_side'] = $this->songkok_model->side_kategori();
						$this->load->view('web/bg_top',$data);
						$this->load->view('web/bg_left',$data);
						$this->load->view('web/bg_hasil_selesai_belanja',$data);
						$this->load->view('web/bg_right');
						$this->load->view('web/bg_bottom');
					}
				}
			

		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
