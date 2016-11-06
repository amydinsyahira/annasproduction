<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Konfirmasi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','captcha'));
		$this->load->database();
		$this->load->library('email');
		session_start();
	}

	function index()
	{
		$data['menu'] = $this->songkok_model->menu_kategori('0','0');
		$data['judul'] = "Konfirmasi Pembayaran - An-nas Via Production";
		$data['slide_atas'] = $this->songkok_model->tampil_slide_produk(10);
		$data['slide_laris'] = $this->songkok_model->tampil_slide_produk_terlaris_kiri(2);
		$data['slide_produk_home'] = $this->songkok_model->tampil_produk(12);
		$data['testimonial'] = $this->songkok_model->tampil_testimonial(10,0);
		$data['kategori_side'] = $this->songkok_model->side_kategori();
		
		$session=isset($_SESSION['username_grosir_songkok']) ? $_SESSION['username_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["nama"]=$pecah[1];
		}
		
		$vals = array(
		'img_path' => './captcha/',
		'img_url' => base_url().'captcha/',
		'font_path' => './system/fonts/impact.ttf',
		'img_width' => '200',
		'img_height' => 60,
		'expiration' => 90
		);
		$cap = create_captcha($vals);
	 
		$datamasuk = array(
			'captcha_time' => $cap['time'],
			'ip_address' => $this->input->ip_address(),
			'word' => $cap['word']
			);
		$expiration = time()-900;
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
		$query = $this->db->insert_string('captcha', $datamasuk);
		$this->db->query($query);
		$data['gbr_captcha'] = $cap['image'];
			
		$this->load->view('web/bg_top',$data);
		$this->load->view('web/bg_left',$data);
		$this->load->view('web/bg_konfirmasi',$data);
		$this->load->view('web/bg_right');
		$this->load->view('web/bg_bottom');
	}
	
	function kirim()
	{
		$data['menu'] = $this->songkok_model->menu_kategori('0','0');
		$data['judul'] = "Hubungi Kami - An-nas Via Production";
		$data['slide_atas'] = $this->songkok_model->tampil_slide_produk(10);
		$data['slide_laris'] = $this->songkok_model->tampil_slide_produk_terlaris_kiri(2);
		$data['slide_produk_home'] = $this->songkok_model->tampil_produk(12);
		$data['testimonial'] = $this->songkok_model->tampil_testimonial(10,0);
		$data['kategori_side'] = $this->songkok_model->side_kategori();
		
		$session=isset($_SESSION['username_grosir_songkok']) ? $_SESSION['username_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["nama"]=$pecah[1];
		}
		
		$datapesan['nama'] = mysql_real_escape_string($this->input->post('nama'));
		$datapesan['email'] = mysql_real_escape_string($this->input->post('email'));
		$datapesan['telpon'] = mysql_real_escape_string($this->input->post('telpon'));
		$datapesan['jumlah'] = mysql_real_escape_string($this->input->post('jumlah'));
		$datapesan['tanggal'] = mysql_real_escape_string($this->input->post('tanggal'));
		$datapesan['norekening'] = mysql_real_escape_string($this->input->post('norekening'));
		$datapesan['namarekening'] = mysql_real_escape_string($this->input->post('namarekening'));
		$datapesan['bank'] = mysql_real_escape_string($this->input->post('bank'));
		$datapesan['metode'] = mysql_real_escape_string($this->input->post('metode'));
		
		
		$expiration = time()-900;
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
		
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
		
		$data['pesan'] = "";
		if ($row->count == 0)
		{
			$data['pesan'] = "Kode Captcha yang Anda masukkan salah, Silakan diulang lagi";
		}
		else
		{
			if($datapesan['nama']=="" && $datapesan['email']=="" && $datapesan['telpon']=="" && $datapesan['alamat']=="" && $datapesan['kota']=="" && $datapesan['negara']=="" && 
			$datapesan['pesan']=="")
			{
				$data['pesan'] = "Field belum lengkap. Mohon diisi dengan selengkap-lengkapnya.";
			}
			else
			{
				$sql_hapus  = "delete FROM captcha";
				$query = $this->db->query($sql_hapus);
				
					$isi_psn  ='<table border="0" cellpadding=5>';
					$isi_psn .='<tr><td>Nama Pelanggan</td><td>:</td><td>'.$datapesan['nama'].'</td></tr>';
					$isi_psn .='<tr><td>Email</td><td>:</td><td>'.$datapesan['email'].'</td></tr>';
					$isi_psn .='<tr><td>Telepon</td><td>:</td><td>'.$datapesan['telpon'].'</td></tr>';
					$isi_psn .='<tr><td>Jumlah Pembayaran</td><td>:</td><td>'.number_format($datapesan['jumlah'],'2',',','.').'</td></tr>';
					$isi_psn .='<tr><td>Tanggal Pembayaran</td><td>:</td><td>'.$datapesan['tanggal'].'</td></tr>';
					$isi_psn .='<tr><td>Nomor Rekening</td><td>:</td><td>'.$datapesan['norekening'].'</td></tr>';
					$isi_psn .='<tr><td>Nama Rekening</td><td>:</td><td>'.$datapesan['namarekening'].'</td></tr>';
					$isi_psn .='<tr><td>Pembayaran ke Bank</td><td>:</td><td>'.$datapesan['bank'].'</td></tr>';
					$isi_psn .='<tr><td>Metode Pembayaran</td><td>:</td><td>'.$datapesan['metode'].'</td></tr>';
					$isi_psn .='</table><br>';

				$this->email->set_mailtype('html');
				$this->email->from($datapesan['email'], $datapesan['nama']);
				$this->email->to('admin@harmonisgrosirsongkok.com');
				
				$this->email->subject('Konfirmasi Pembayaran');
				$this->email->message($isi_psn);	
				$ml = $this->email->send();
				if($ml==TRUE)
				{
					$data['pesan'] = "Konfirmasi pembayaran berhasil dikirim";
					?>
					<script>
					alert('Konfirmasi pembayaran anda telah berhasil dikirim. Kami akan segera memprosesnya.');
					</script>
					<?php
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
				}
				else
				{
					$data['pesan'] = "Konfirmasi pembayaran Tidak Berhasil dikirim";
					?>
					<script>
					alert('Konfirmasi pembayaran tidak berhasil dikirim.');
					</script>
					<?php
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."konfirmasi'>";
				}
			}
		}
			
		$this->load->view('web/bg_top',$data);
		$this->load->view('web/bg_left',$data);
		$this->load->view('web/bg_hasil_konfirmasi');
		$this->load->view('web/bg_right');
		$this->load->view('web/bg_bottom');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
