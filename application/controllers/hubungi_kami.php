<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hubungi_kami extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('captcha','url','date','text_helper','date'));
		$this->load->database();
		$this->load->library('email');
		session_start();
	}

	function index()
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
		$this->load->view('web/bg_hubungi');
		$this->load->view('web/bg_right');
		$this->load->view('web/bg_bottom');
	}

	function kirim_pesan()
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
		$datapesan['alamat'] = mysql_real_escape_string($this->input->post('alamat'));
		$datapesan['kota'] = mysql_real_escape_string($this->input->post('kota'));
		$datapesan['negara'] = mysql_real_escape_string($this->input->post('negara'));
		$datapesan['pesan'] = mysql_real_escape_string($this->input->post('pesan'));
		
		/*
		$expiration = time()-900;
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
		
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
		
		$data['pesan'] = "";
		if ($row->count == 0)
		{
			$data['pesan'] = "Kode Captcha yang anda masukkan salah, silakan diulang lagi";
		}
		else
		{*/
			if($datapesan['nama']=="" || $datapesan['email']=="" || $datapesan['telpon']=="" || $datapesan['alamat']=="" || $datapesan['kota']=="" || $datapesan['negara']=="" || 
			$datapesan['pesan']=="")
			{
				$data['pesan'] = "Field belum lengkap. Mohon diisi dengan selengkap-lengkapnya.";
			}
			else
			{
				// $sql_hapus  = "delete FROM captcha";
				// $query = $this->db->query($sql_hapus);
				/*
					$isi_psn  ='<table border="0" cellpadding=5>';
					$isi_psn .='<tr><td valign="top">Nama Pengirim</td><td valign="top">:</td><td>'.$datapesan['nama'].'</td></tr>';
					$isi_psn .='<tr><td valign="top">Email</td><td valign="top">:</td><td>'.$datapesan['email'].'</td></tr>';
					$isi_psn .='<tr><td valign="top">Telepon</td><td valign="top">:</td><td>'.$datapesan['telpon'].'</td></tr>';
					$isi_psn .='<tr><td valign="top">Alamat</td><td valign="top">:</td><td>'.$datapesan['alamat'].'</td></tr>';
					$isi_psn .='<tr><td valign="top">Kota</td><td valign="top">:</td><td>'.$datapesan['kota'].'</td></tr>';
					$isi_psn .='<tr><td valign="top">Negara</td><td valign="top">:</td><td>'.$datapesan['negara'].'</td></tr>';
					$isi_psn .='<tr><td valign="top">Pesan</td><td valign="top">:</td><td>'.$datapesan['pesan'].'</td></tr>';
					$isi_psn .='</table><br>';
				*/	
					$q_update = "INSERT INTO tbl_hubungi_kami VALUES(null,'".$datapesan['nama']."','".$datapesan['email']."','".$datapesan['telpon']."','".$datapesan['alamat']."','".$datapesan['kota']."','".$datapesan['negara']."','".$datapesan['pesan']."')";
						$this->songkok_model->kirim_hubungi_kami($q_update);
						$data['pesan'] = "Berhasil mengirim pesan.";
						?>
							<script>
								alert('Berhasil mengirim pesan anda.');
							</script>
						<?php
						echo "<meta http-equiv='refresh' content='0; url=".base_url()."hubungi_kami'>";
				
				/*$this->email->set_mailtype('html');
				$this->email->from($datapesan['email'], $datapesan['nama']);
				$this->email->to('bangke.kucing@yahoo.co.id');
				
				$this->email->subject('Hubungi Kami - Pertanyaan Dari Pelanggan');
				$this->email->message($isi_psn);	
				$ml = $this->email->send();
				if($ml==TRUE)
				{
					$data['pesan'] = "Pesan Berhasil dikirim";
					?>
					<script>
					alert('Pesan anda telah berhasil dikirim. Terima Kasih telah mengirimkan kritik atau saran untuk kami.');
					</script>
					<?php
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
				}
				else
				{
					$data['pesan'] = "Pesan Tidak Berhasil dikirim";
					?>
					<script>
					alert('Pesan anda telah tidak berhasil dikirim.');
					</script>
					<?php
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."hubungi_kami'>";
				}*/
			}
		// }
			
		$this->load->view('web/bg_top',$data);
		$this->load->view('web/bg_left',$data);
		$this->load->view('web/bg_hasil_pesan');
		$this->load->view('web/bg_right');
		$this->load->view('web/bg_bottom');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
