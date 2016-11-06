<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aksesroot extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('captcha','date','text_helper'));
		$this->load->library(array('email'));
		$this->load->model('songkok_admin_model');
		session_start();
	}
	
	function index()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["lvl"]=$pecah[3];
			/*if($data["lvl"]=="spradmn")
			{*/
				$data["judul"] = "Dashboard - An-nas Via Production";
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_home',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}

	function login()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot'>";
		}
		else{
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
			
			$this->load->view('admin/bg_login',$data);
		}
	}
	
	function logout()
	{
		session_destroy();
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/'>";
	}
	
	function set_akun()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$data["judul"] = "Pengaturan Akun Admin - An-nas Via Production";
				$data["det"] = $this->songkok_admin_model->pilih_admin($data["kd"]);
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_set_akun',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	
	
	function tambah_admin()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$data["judul"] = "Tambah Admin - An-nas Via Production";
				$data["ls"] = $this->songkok_admin_model->tampil_daftar_admin();
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_tambah_admin',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}

	function edit_admin()
	{
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$data["judul"] = "Edit Admin - An-nas Via Production";
				//$data["ls"] = $this->songkok_admin_model->tampil_daftar_admin();
				$data["kat"] = $this->songkok_admin_model->jalankan_query_manual_select("SELECT * FROM tbl_spr_admn WHERE kode_spr_admn = ".$kode);
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_edit_admin',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	function lihat_semua_member()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$page=$this->uri->segment(3);
				$limit=15;
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;
				
				
				$data["judul"] = "Semua Member - An-nas Via Production";
				$data["ls"] = $this->songkok_admin_model->tampil_daftar_member($limit,$offset);
				$tot_hal = $this->songkok_model->hitung_isi_1tabel('tbl_user','');
				
				$config['base_url'] = base_url() . 'aksesroot/lihat_semua_member/';
					$config['total_rows'] = $tot_hal->num_rows();
					$config['per_page'] = $limit;
					$config['uri_segment'] = 3;
					$config['first_link'] = 'Awal';
					$config['last_link'] = 'Akhir';
					$config['next_link'] = 'Selanjutnya';
					$config['prev_link'] = 'Sebelumnya';
					$this->pagination->initialize($config);
				$data["paginator"] =$this->pagination->create_links();
				
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_lihat_semua_member',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	function lihat_semua_testimonial()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$page=$this->uri->segment(3);
				$limit=15;
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;
				
				
				$data["judul"] = "Semua Testimonial - An-nas Via Production";
				$data["ls"] = $this->songkok_admin_model->tampil_testimonial($limit,$offset);
				$tot_hal = $this->songkok_model->hitung_isi_1tabel('tbl_testimonial','');
				
				$config['base_url'] = base_url() . 'aksesroot/lihat_semua_testimonial/';
					$config['total_rows'] = $tot_hal->num_rows();
					$config['per_page'] = $limit;
					$config['uri_segment'] = 3;
					$config['first_link'] = 'Awal';
					$config['last_link'] = 'Akhir';
					$config['next_link'] = 'Selanjutnya';
					$config['prev_link'] = 'Sebelumnya';
					$this->pagination->initialize($config);
				$data["paginator"] =$this->pagination->create_links();
				
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_lihat_testimonial',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	function lihat_produk()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$page=$this->uri->segment(3);
				$limit=15;
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;	
				
				$data["judul"] = "Semua Produk - An-nas Via Production";
				$data["tampil"] = $this->songkok_admin_model->tampil_semua_produk($limit,$offset);
				$tot_hal = $this->songkok_model->hitung_isi_1tabel('tbl_produk','');
				
				$config['base_url'] = base_url() . 'aksesroot/lihat_produk/';
					$config['total_rows'] = $tot_hal->num_rows();
					$config['per_page'] = $limit;
					$config['uri_segment'] = 3;
					$config['first_link'] = 'Awal';
					$config['last_link'] = 'Akhir';
					$config['next_link'] = 'Selanjutnya';
					$config['prev_link'] = 'Sebelumnya';
					$this->pagination->initialize($config);
				$data["paginator"] =$this->pagination->create_links();
				
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_lihat_produk',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	function transaksi_histori()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$page=$this->uri->segment(3);
				$limit=15;
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;	
				
				$data['awaltanggaltemp'] ="";$data['akhirtanggaltemp'] ="";
				$awaltanggal = $this->input->post("tgl");
				$akhirtanggal = $this->input->post("tgl2");
				if(!empty($awaltanggal) && !empty($akhirtanggal))
				{
					$data['awaltanggaltemp'] = $awaltanggal;
					$data['akhirtanggaltemp'] = $akhirtanggal;
					$this->session->set_userdata('awaltanggal', $data['awaltanggaltemp']);
					$this->session->set_userdata('akhirtanggal', $data['akhirtanggaltemp']);
				} else {
					$data['awaltanggaltemp'] = $this->session->userdata('awaltanggal');
					$data['akhirtanggaltemp'] = $this->session->userdata('akhirtanggal');
				}
				$data["judul"] = "Transaksi Histori - An-nas Via Production";
				if(empty($awaltanggal) || empty($akhirtanggal)) {
					if(empty($data['awaltanggaltemp']) || empty($data['akhirtanggaltemp'])) {
						$awaltanggal = gmdate("Y-m-d", time()+60*60*7);
						$akhirtanggal = gmdate("Y-m-d", time()+60*60*7);
					} else {
						$awaltanggal = $data['awaltanggaltemp'];
						$akhirtanggal = $data['akhirtanggaltemp'];						
					}
				}
				$data["tampil"] = $this->songkok_admin_model->jalankan_query_manual_select("
					SELECT tbl_transaksi_header.*, tbl_transaksi_detail.*, tbl_user.*, tbl_produk.nama_produk, tbl_pengiriman.pengiriman, tbl_kota.kota 
					FROM tbl_transaksi_header 
					INNER JOIN tbl_transaksi_detail ON tbl_transaksi_detail.kode_transaksi = tbl_transaksi_header.kode_transaksi 
					INNER JOIN tbl_produk ON tbl_produk.kode_produk = tbl_transaksi_detail.kode_produk 
					INNER JOIN tbl_user ON tbl_user.kode_user = tbl_transaksi_header.kode_user 
					LEFT JOIN tbl_biayakirim ON tbl_biayakirim.id_biayakirim = tbl_transaksi_header.paket_kirim
					LEFT JOIN tbl_pengiriman ON tbl_pengiriman.id_pengiriman = tbl_biayakirim.id_pengiriman
					LEFT JOIN tbl_kota ON tbl_kota.id_kota = tbl_biayakirim.id_kota
					WHERE tbl_transaksi_header.tgltransaksi BETWEEN '".$awaltanggal."' AND '".$akhirtanggal."' 
					GROUP BY tbl_transaksi_header.kode_transaksi
					ORDER BY tbl_transaksi_header.tgltransaksi DESC, tbl_transaksi_header.jamtransaksi DESC 
					LIMIT ".$offset.", ".$limit."");
				$tot_hal = $this->songkok_admin_model->jalankan_query_manual_select("
					SELECT tbl_transaksi_header.*, tbl_transaksi_detail.*, tbl_user.*, tbl_produk.nama_produk, tbl_pengiriman.pengiriman, tbl_kota.kota 
					FROM tbl_transaksi_header 
					INNER JOIN tbl_transaksi_detail ON tbl_transaksi_detail.kode_transaksi = tbl_transaksi_header.kode_transaksi 
					INNER JOIN tbl_produk ON tbl_produk.kode_produk = tbl_transaksi_detail.kode_produk 
					INNER JOIN tbl_user ON tbl_user.kode_user = tbl_transaksi_header.kode_user 
					LEFT JOIN tbl_biayakirim ON tbl_biayakirim.id_biayakirim = tbl_transaksi_header.paket_kirim
					LEFT JOIN tbl_pengiriman ON tbl_pengiriman.id_pengiriman = tbl_biayakirim.id_pengiriman
					LEFT JOIN tbl_kota ON tbl_kota.id_kota = tbl_biayakirim.id_kota
					WHERE tbl_transaksi_header.tgltransaksi BETWEEN '".$awaltanggal."' AND '".$akhirtanggal."' 
					GROUP BY tbl_transaksi_header.kode_transaksi
					ORDER BY tbl_transaksi_header.tgltransaksi DESC, tbl_transaksi_header.jamtransaksi DESC 
				");
				//$data["tampil"] = $this->songkok_admin_model->tampil_trans_harian($data['kata'],$limit,$offset);
				//$tot_hal = $this->songkok_model->hitung_isi_1tabel('tbl_transaksi_detail',"where kode_transaksi like '%".$data['kata']."%'");
				
				$config['base_url'] = base_url() . 'aksesroot/transaksi_histori/';
					$config['total_rows'] = $tot_hal->num_rows();
					$config['per_page'] = $limit;
					$config['uri_segment'] = 3;
					$config['first_link'] = 'Awal';
					$config['last_link'] = 'Akhir';
					$config['next_link'] = 'Selanjutnya';
					$config['prev_link'] = 'Sebelumnya';
					$this->pagination->initialize($config);
				$data["paginator"] =$this->pagination->create_links();
				
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_transaksi_histori',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	function edit_status_transaksi()
	{
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$data["judul"] = "Edit Status Transaksi - An-nas Via Production";
				//$data["ls"] = $this->songkok_admin_model->tampil_daftar_admin();
				$data["kat"] = $this->songkok_admin_model->jalankan_query_manual_select("SELECT kode_transaksi, noresi, status FROM tbl_transaksi_header WHERE kode_transaksi = ".$kode);
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_edit_status_transaksi',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}

	function cetak_status_transaksi()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session != "") {
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$data["judul"] = "Transaksi History";
				$data['awaltanggalsess'] = $this->session->userdata('awaltanggal');
				$data['akhirtanggalsess'] = $this->session->userdata('akhirtanggal');
				$data["tampil"] = $this->songkok_admin_model->jalankan_query_manual_select("
					SELECT tbl_transaksi_header.*, tbl_transaksi_detail.*, tbl_user.*, tbl_produk.nama_produk, tbl_pengiriman.pengiriman, tbl_kota.kota 
					FROM tbl_transaksi_header 
					LEFT JOIN tbl_biayakirim ON tbl_biayakirim.id_biayakirim = tbl_transaksi_header.paket_kirim
					LEFT JOIN tbl_pengiriman ON tbl_pengiriman.id_pengiriman = tbl_biayakirim.id_pengiriman
					LEFT JOIN tbl_kota ON tbl_kota.id_kota = tbl_biayakirim.id_kota
					INNER JOIN tbl_transaksi_detail ON tbl_transaksi_detail.kode_transaksi = tbl_transaksi_header.kode_transaksi 
					INNER JOIN tbl_produk ON tbl_produk.kode_produk = tbl_transaksi_detail.kode_produk 
					INNER JOIN tbl_user ON tbl_user.kode_user = tbl_transaksi_header.kode_user 
					WHERE tbl_transaksi_header.tgltransaksi BETWEEN '".$data['awaltanggalsess']."' AND '".$data['akhirtanggalsess']."' 
					GROUP BY tbl_transaksi_header.kode_transaksi
					ORDER BY tbl_transaksi_header.tgltransaksi DESC, tbl_transaksi_header.jamtransaksi DESC 
				");
				$this->load->view('admin/bg_cetak_status_transaksi',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}

	function update_status_transaksi()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$kodetransaksi = mysql_real_escape_string($this->input->post('kodetransaksi'));
				$statustrans = mysql_real_escape_string($this->input->post('statustrans'));
				$noresi = mysql_real_escape_string($this->input->post('noresi'));
				$q = "UPDATE tbl_transaksi_header SET noresi = '".$noresi."', status = ".$statustrans." WHERE kode_transaksi = ".$kodetransaksi;
				$data["upd"] = $this->songkok_admin_model->jalankan_query_manual($q);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/transaksi_histori'>";
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}

	function transaksi_harian()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$page=$this->uri->segment(3);
				$limit=15;
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;	
				
				$data['kata']="";
				$tg = $this->input->post("tgl");
				$bl = $this->input->post("bln");
				$th = $this->input->post("thn");
				$tanggal = $th.$bl.$tg;
				if(!empty($tg))
				{
					$data['kata'] = $tanggal;
					$this->session->set_userdata('Transaksi', $data['kata']);
				} else {
					$data['kata'] = $this->session->userdata('Transaksi');
				}
				$data["judul"] = "Transaksi Harian - An-nas Via Production";
				$data["tampil"] = $this->songkok_admin_model->tampil_trans_harian($data['kata'],$limit,$offset);
				$tot_hal = $this->songkok_model->hitung_isi_1tabel('tbl_transaksi_detail',"where kode_transaksi like '%".$data['kata']."%'");
				
				$config['base_url'] = base_url() . 'aksesroot/transaksi_harian/';
					$config['total_rows'] = $tot_hal->num_rows();
					$config['per_page'] = $limit;
					$config['uri_segment'] = 3;
					$config['first_link'] = 'Awal';
					$config['last_link'] = 'Akhir';
					$config['next_link'] = 'Selanjutnya';
					$config['prev_link'] = 'Sebelumnya';
					$this->pagination->initialize($config);
				$data["paginator"] =$this->pagination->create_links();
				
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_transaksi_harian',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	function transaksi_bulanan()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$page=$this->uri->segment(3);
				$limit=15;
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;	
				
				$data['kata']="";
				$bl = $this->input->post("bln");
				$th = $this->input->post("thn");
				$tanggal = $th.$bl;
				if(!empty($bl))
				{
					$data['kata'] = $tanggal;
					$this->session->set_userdata('trans_bulanan', $data['kata']);
				} else {
					$data['kata'] = $this->session->userdata('trans_bulanan');
				}
				$data["judul"] = "Transaksi Bulanan - An-nas Via Production";
				$data["tampil"] = $this->songkok_admin_model->tampil_trans_harian($data['kata'],$limit,$offset);
				$tot_hal = $this->songkok_model->hitung_isi_1tabel('tbl_transaksi_detail',"where kode_transaksi like '%".$data['kata']."%'");
				
				$config['base_url'] = base_url() . 'aksesroot/transaksi_bulanan/';
					$config['total_rows'] = $tot_hal->num_rows();
					$config['per_page'] = $limit;
					$config['uri_segment'] = 3;
					$config['first_link'] = 'Awal';
					$config['last_link'] = 'Akhir';
					$config['next_link'] = 'Selanjutnya';
					$config['prev_link'] = 'Sebelumnya';
					$this->pagination->initialize($config);
				$data["paginator"] =$this->pagination->create_links();
				
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_transaksi_bulanan',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	function transaksi_tahunan()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$page=$this->uri->segment(3);
				$limit=15;
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;	
				
				$data['kata']="";
				$th = $this->input->post("thn");
				$tanggal = $th;
				if(!empty($th))
				{
					$data['kata'] = $tanggal;
					$this->session->set_userdata('trans_tahunan', $data['kata']);
				} else {
					$data['kata'] = $this->session->userdata('trans_tahunan');
				}
				$data["judul"] = "Transaksi Tahunan - An-nas Via Production";
				$data["tampil"] = $this->songkok_admin_model->tampil_trans_harian($data['kata'],$limit,$offset);
				$tot_hal = $this->songkok_model->hitung_isi_1tabel('tbl_transaksi_detail',"where kode_transaksi like '%".$data['kata']."%'");
				
				$config['base_url'] = base_url() . 'aksesroot/transaksi_tahunan/';
					$config['total_rows'] = $tot_hal->num_rows();
					$config['per_page'] = $limit;
					$config['uri_segment'] = 3;
					$config['first_link'] = 'Awal';
					$config['last_link'] = 'Akhir';
					$config['next_link'] = 'Selanjutnya';
					$config['prev_link'] = 'Sebelumnya';
					$this->pagination->initialize($config);
				$data["paginator"] =$this->pagination->create_links();
				
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_transaksi_tahunan',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	function lihat_kategori_produk()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$data["judul"] = "Semua Kategori Produk - An-nas Via Production";
				$data["kat_level"] = $this->songkok_admin_model->menu_kategori(0,0);
				
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_lihat_kategori_produk',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}

	function hubungi_kami()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$page=$this->uri->segment(3);
				$limit=15;
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;	
				
				$data["judul"] = "Hubungi Kami - An-nas Via Production";
				$data["tampil"] = $this->songkok_admin_model->tampil_hubungi_kami($limit,$offset);
				$tot_hal = $this->songkok_model->hitung_isi_1tabel('tbl_hubungi_kami','');
				
				$config['base_url'] = base_url() . 'aksesroot/hubungi_kami/';
					$config['total_rows'] = $tot_hal->num_rows();
					$config['per_page'] = $limit;
					$config['uri_segment'] = 3;
					$config['first_link'] = 'Awal';
					$config['last_link'] = 'Akhir';
					$config['next_link'] = 'Selanjutnya';
					$config['prev_link'] = 'Sebelumnya';
					$this->pagination->initialize($config);
				$data["paginator"] =$this->pagination->create_links();
				
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_hubungi_kami',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	function lihat_katalog()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$page=$this->uri->segment(3);
				$limit=15;
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;	
				
				$data["judul"] = "Semua Katalog Produk - An-nas Via Production";
				$data["katalog"] = $this->songkok_admin_model->tampil_katalog($limit,$offset);
				$tot_hal = $this->songkok_model->hitung_isi_1tabel('tbl_katalog','');
				
				$config['base_url'] = base_url() . 'aksesroot/lihat_katalog/';
					$config['total_rows'] = $tot_hal->num_rows();
					$config['per_page'] = $limit;
					$config['uri_segment'] = 3;
					$config['first_link'] = 'Awal';
					$config['last_link'] = 'Akhir';
					$config['next_link'] = 'Selanjutnya';
					$config['prev_link'] = 'Sebelumnya';
					$this->pagination->initialize($config);
				$data["paginator"] =$this->pagination->create_links();
				
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_lihat_katalog',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	function pengembalian_barang()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$page=$this->uri->segment(3);
				$limit=15;
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;	
				
				$data["judul"] = "Pengembalian Barang Rusak - An-nas Via Production";
				$data["tampil"] = $this->songkok_admin_model->tampil_barang_rusak($limit,$offset);
				$tot_hal = $this->songkok_model->hitung_isi_1tabel('tbl_pengembalian_barang','');
				
				$config['base_url'] = base_url() . 'aksesroot/pengembalian_barang/';
					$config['total_rows'] = $tot_hal->num_rows();
					$config['per_page'] = $limit;
					$config['uri_segment'] = 3;
					$config['first_link'] = 'Awal';
					$config['last_link'] = 'Akhir';
					$config['next_link'] = 'Selanjutnya';
					$config['prev_link'] = 'Sebelumnya';
					$this->pagination->initialize($config);
				$data["paginator"] =$this->pagination->create_links();
				
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_pengembalian_barang',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}	

//===================Modul Insert==========================//

	
	function insert_admin()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$usr = mysql_real_escape_string($this->input->post('username'));
				$ps = mysql_real_escape_string($this->input->post('password'));
				$pass = md5($ps);
				$nama = mysql_real_escape_string($this->input->post('nama'));
				$email = mysql_real_escape_string($this->input->post('email'));
				$alamat = mysql_real_escape_string($this->input->post('alamat'));
				$tgl = $this->input->post('tgl');
				$lvl = $this->input->post('lvl');
				$stts = $this->input->post('stts');
				$q = "insert into tbl_spr_admn (username_admn,pass_admn,nama_admn,stts,lvl,email,alamat,tgl_lahir) values('".$usr."','".$pass."','".$nama."','".$stts."','".$lvl."','".$email."','".$alamat."','".$tgl."')";
				$data["upd"] = $this->songkok_admin_model->jalankan_query_manual($q);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/tambah_admin'>";
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	function update_admin()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$idadmin = mysql_real_escape_string($this->input->post('idadmin'));
				$usr = mysql_real_escape_string($this->input->post('username'));
				$ps = mysql_real_escape_string($this->input->post('password'));
				if(!empty($ps)) $pass = md5($ps);
				$nama = mysql_real_escape_string($this->input->post('nama'));
				$email = mysql_real_escape_string($this->input->post('email'));
				$alamat = mysql_real_escape_string($this->input->post('alamat'));
				$tgl = $this->input->post('tgl');
				$lvl = $this->input->post('lvl');
				$stts = $this->input->post('stts');
				if($idadmin == $data["kd"]) {
					$session_username = $usr."|".$nama."|".$idadmin."|".$lvl;
					$_SESSION['admin_grosir_songkok'] = $session_username;
				}
				if(empty($ps)) {
					$q = "UPDATE tbl_spr_admn SET username_admn = '".$usr."',nama_admn = '".$nama."',stts = '".$stts."',lvl = '".$lvl."',email = '".$email."',alamat = '".$alamat."',tgl_lahir = '".$tgl."' WHERE kode_spr_admn = ".$idadmin;
				} else {
					$q = "UPDATE tbl_spr_admn SET username_admn = '".$usr."',pass_admn = '".$pass."',nama_admn = '".$nama."',stts = '".$stts."',lvl = '".$lvl."',email = '".$email."',alamat = '".$alamat."',tgl_lahir = '".$tgl."' WHERE kode_spr_admn = ".$idadmin;
				}
					$data["upd"] = $this->songkok_admin_model->jalankan_query_manual($q);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/tambah_admin'>";
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}

	function balas_hubungi_kami_aksi()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$em = mysql_real_escape_string($this->input->post('email'));
				$ps = mysql_real_escape_string($this->input->post('balas_pesan'));
				$isi_psn  ='Balasan Pesan dari An-nas Via Production<br />'.$ps;
				echo '
				<script>
								alert(\'Berhasil mengirim pesan anda.\');
							</script>
				';
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/hubungi_kami'>";
				$this->email->set_mailtype('html');
				$this->email->from($datapesan['email'], $datapesan['nama']);
				$this->email->to($em);
				
				$this->email->subject('Hubungi Kami - Balasan dari An-nas Via Production');
				$this->email->message($isi_psn);	
				$ml = $this->email->send();
				if($ml==TRUE)
				{
					$data['pesan'] = "Pesan Berhasil dikirim";
					?>
					<script>
					alert('Pesan anda telah berhasil dikirim.');
					</script>
					<?php
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
				}
				else
				{
					$data['pesan'] = "Pesan Tidak Berhasil dikirim";
					?>
					<script>
					alert('Pesan anda tidak berhasil dikirim.');
					</script>
					<?php
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."hubungi_kami'>";
				}
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}

	function balas_hubungi_kami()
	{
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
	   			$data['scriptmce'] = $this->scripttiny_mce();
				$data["ls"] = $this->songkok_admin_model->tampil_detail_hubungi_kami($kode);
				$data["kat"] = $this->songkok_admin_model->tampil_hubungi_kami();
				$data["judul"] = "Balas Hubungi Kami";
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_balas_hubungi_kami',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	function proses_pengembalian_barang()
	{
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$data["ls"] = $this->songkok_admin_model->tampil_pengembalian_barang($kode);
			
			/*if($data["lvl"]=="spradmn")
			{*/
				foreach($data["ls"]->result_array() as $e){}
				$q = "UPDATE tbl_pengembalian_barang SET status = 1 WHERE kode_pengembalian_barang = ".$e['kode_pengembalian_barang'];
				$data["upd"] = $this->songkok_admin_model->jalankan_query_manual($q);
				echo '
				<script>
								alert(\'Berhasil memproses pengembalian barang.\');
							</script>
				';
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/pengembalian_barang'>";
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	function insert_kategori()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$nama = mysql_real_escape_string($this->input->post('nama'));
				$kategori = $this->input->post('kategori');
				$tingkat = $this->input->post('tingkat');
				$q = "insert into tbl_kategori (nama_kategori,kode_level,kode_parent) values('".$nama."','".$tingkat."','".$kategori."')";
				$data["upd"] = $this->songkok_admin_model->jalankan_query_manual($q);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/lihat_kategori_produk'>";
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	function insert_katalog()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$nama = mysql_real_escape_string($this->input->post('nama'));
				$tgl = " %Y-%m-%d";
				$time = time();
				$tgl_posting = mdate($tgl,$time);
				
				$acak=rand(00000000000,99999999999);
				$bersih=$_FILES['userfile']['name'];
				
				$ext = end(explode('.', $bersih));
				$ext = substr(strrchr($bersih, '.'), 1);
				$ext = substr($bersih, strrpos($bersih, '.') + 1);
				$ext = preg_replace('/^.*\.([^.]+)$/D', '$1', $bersih);
				$exts = split("[/\\.]", $bersih);
				$n = count($exts)-1;
				$ext = $exts[$n];
				
				$nama_fl = $acak.'.'.$ext;
				
				$config["file_name"]=$acak;
				$config['upload_path'] = './asset/download/';
				$config['allowed_types'] = 'pdf|xls|zip|jpg|jpeg|png|txt|doc|docx|xlsx';
				$config['max_size'] = '50000';						
				$this->load->library('upload', $config);
				
				if(!$this->upload->do_upload())
				{
					echo $this->upload->display_errors();
				}
				else {
					$this->songkok_admin_model->jalankan_query_manual("insert into tbl_katalog (judul_file,nama_file,tgl_posting) values('".$nama."','".$nama_fl."','".$tgl_posting."')");
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/lihat_katalog'>";
				}
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	
	
	function insert_produk()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$kategori = mysql_real_escape_string($this->input->post('kategori'));
				$nama = mysql_real_escape_string($this->input->post('nama'));
				$harga = mysql_real_escape_string($this->input->post('harga'));
				$stok = mysql_real_escape_string($this->input->post('stok'));
				$dibeli = mysql_real_escape_string($this->input->post('dibeli'));
				$beratitem = mysql_real_escape_string($this->input->post('beratitem'));
				$deskripsi = mysql_real_escape_string($this->input->post('deskripsi'));
				$kd_maks = $this->input->post('digit');
				$kode = 'SKK'.$kd_maks;
				
				if ($_FILES['imagefile']['type'] == "image/jpeg"){
					$ori_src="asset/produk/imgoriginal/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
					if(move_uploaded_file ($_FILES['imagefile']['tmp_name'],$ori_src))
					{
						chmod("$ori_src",0777);
					}else{
						echo "Gagal melakukan proses upload file.";
						exit;
					}

					$thumb_src="asset/produk/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
					
					$n_width = 150;
					$n_height = 150;
				
					if(($_FILES['imagefile']['type']=="image/jpeg") || ($_FILES['imagefile']['type']=="image/png") ||($_FILES['imagefile']['type']=="image/gif"))
					{
						$im = @ImageCreateFromJPEG ($ori_src) or // Read JPEG Image
						$im = @ImageCreateFromPNG ($ori_src) or // or PNG Image
						$im = @ImageCreateFromGIF ($ori_src) or // or GIF Image
						$im = false; // If image is not JPEG, PNG, or GIF
						
						//$im=ImageCreateFromJPEG($ori_src); 
						$width=ImageSx($im);              // Original picture width is stored
						$height=ImageSy($im);             // Original picture height is stored
						if(($n_height==0) && ($n_width==0)) {
							$n_height = $height;
							$n_width = $width;
						}	
		
						if(!$im) {
							echo '<p>Gagal membuat thumnail</p>';
							exit;
						}
						else {				
							$newimage=@imagecreatetruecolor($n_width,$n_height);                 
							@imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							@ImageJpeg($newimage,$thumb_src);
							chmod("$thumb_src",0777);
						}
					}
					$this->songkok_admin_model->jalankan_query_manual("insert into tbl_produk 
					(kode_produk,id_kategori,nama_produk,harga,stok,dibeli,gbr_kecil,gbr_besar,deskripsi,berat) 
					values('".$kode."','".$kategori."','".$nama."','".$harga."','".$stok."','".$dibeli."','".$_FILES['imagefile']['name']."'
					,'".$_FILES['imagefile']['name']."','".$deskripsi."',".$beratitem.")");
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/lihat_produk'>";
				}
				else
				{
					echo "File yang anda upload tidak cocok, silahkan masukan file jpg,png,bmp";
				}
				
				
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}


//====================Modul Hapus==================//


	function hapus_admin()
	{
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$data["upd"] = $this->songkok_admin_model->hapus_konten($kode,"kode_spr_admn","tbl_spr_admn");
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/tambah_admin'>";
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	function hapus_testi()
	{
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$data["upd"] = $this->songkok_admin_model->hapus_konten($kode,"id_testi","tbl_testimonial");
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/lihat_semua_testimonial'>";
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	function hapus_member()
	{
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$data["upd"] = $this->songkok_admin_model->hapus_konten($kode,"kode_user","tbl_user");
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/lihat_semua_member'>";
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	function hapus_produk()
	{
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		$gb='';		
		if ($this->uri->segment(4) === FALSE)
		{
    			$gb='';
		}
		else
		{
    			$gb = $this->uri->segment(4);
		}
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$file_kcl = './asset/produk/'.$gb;
				$file_bsr = './asset/produk/imgoriginal/'.$gb;
				unlink($file_kcl);
				unlink($file_bsr);
				$data["upd"] = $this->songkok_admin_model->hapus_konten($kode,"kode_produk","tbl_produk");
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/lihat_produk'>";
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	
	function hapus_kategori()
	{
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$data["upd"] = $this->songkok_admin_model->hapus_konten($kode,"id_kategori","tbl_kategori");
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/lihat_kategori_produk'>";
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	function hapus_katalog()
	{
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		$nm='';		
		if ($this->uri->segment(4) === FALSE)
		{
    			$nm='';
		}
		else
		{
    			$nm = $this->uri->segment(4);
		}
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$file = './asset/download/'.$nm;
				$data["upd"] = $this->songkok_admin_model->hapus_konten($kode,"id_katalog","tbl_katalog");
				unlink($file);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/lihat_katalog'>";
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	
	
	
	
//=======================Modul Tambah======================//

	
	function tambah_produk()
	{
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$data["digit_akhir"] = "";
	   			$data['scriptmce'] = $this->scripttiny_mce();
				$data["kat"] = $this->songkok_admin_model->tampil_semua_kategori();
				$q = $this->songkok_admin_model->jalankan_query_manual_select("select MAX(substring(kode_produk,4,6)) as akhir from tbl_produk");
				foreach($q->result() as $a)
				{
					if($a->akhir==NULL){
						$data["digit_akhir"] = "100001";
					}
					else{
						$data["digit_akhir"] = $a->akhir+1;
					}
				}
				$data["judul"] = "Tambah Produk - An-nas Via Production";
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_tambah_produk',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	function tambah_kategori_produk()
	{
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
	   			$data['scriptmce'] = $this->scripttiny_mce();
				$data["kat"] = $this->songkok_admin_model->tampil_semua_kategori();
				$data["judul"] = "Tambah Kategori Produk - An-nas Via Production";
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_tambah_kategori_produk',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	function tambah_katalog()
	{
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
	   			$data['scriptmce'] = $this->scripttiny_mce();
				$data["judul"] = "Tambah Katalog Produk - An-nas Via Production";
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_tambah_katalog',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	
	
	
	
//=======================Modul Edit======================//
	
	
	
	function edit_produk()
	{
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
	   			$data['scriptmce'] = $this->scripttiny_mce();
				$data["ls"] = $this->songkok_admin_model->tampil_detail_produk($kode);
				$data["kat"] = $this->songkok_admin_model->tampil_semua_kategori();
				$data["judul"] = "Edit Produk";
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_edit_produk',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}	
	
	
	function edit_kategori()
	{
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
	   			$data['scriptmce'] = $this->scripttiny_mce();
				$data["ls"] = $this->songkok_admin_model->jalankan_query_manual_select("select * from tbl_kategori where id_kategori='$kode'");
				$data["kat"] = $this->songkok_admin_model->jalankan_query_manual_select("select * from tbl_kategori where id_kategori!='$kode'");
				$data["judul"] = "Edit Produk - An-nas Via Production";
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_edit_kategori_produk',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}	
	
	
	function edit_katalog()
	{
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$data["kat"] = $this->songkok_admin_model->jalankan_query_manual_select("select * from tbl_katalog where id_katalog='$kode'");
				$data["judul"] = "Edit Katalog - An-nas Via Production";
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_edit_katalog',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}	
	
	
	function edit_member()
	{
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
	   			$data['scriptmce'] = $this->scripttiny_mce();
				$data["kat"] = $this->songkok_admin_model->jalankan_query_manual_select("select * from tbl_user where kode_user='$kode'");
				$data["judul"] = "Edit Member - An-nas Via Production";
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_edit_member',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}	
	
	
	function edit_testi()
	{
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
	   			$data['scriptmce'] = $this->scripttiny_mce();
				$data["kat"] = $this->songkok_admin_model->jalankan_query_manual_select("select * from tbl_testimonial where id_testi='$kode'");
				$data["judul"] = "Edit Testimonial - An-nas Via Production";
				$this->load->view('admin/bg_top',$data);
				$this->load->view('admin/bg_edit_testi',$data);
				$this->load->view('admin/bg_footer',$data);
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}	
	
	
	
	
	
	
//=======================MODUL UPDATE===================================//


	function update_profil()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$usr = mysql_real_escape_string($this->input->post('username'));
				$nama = mysql_real_escape_string($this->input->post('nama'));
				$email = mysql_real_escape_string($this->input->post('email'));
				$alamat = mysql_real_escape_string($this->input->post('alamat'));
				$tgl = $this->input->post('tgl');
				$kd = $this->input->post('kd_usr');
				$q = "update tbl_spr_admn set username_admn='".$usr."', nama_admn='".$nama."', email='".$email."', alamat='".$alamat."', tgl_lahir='".$tgl."' where kode_spr_admn = 
				'".$kd."'";
				$data["upd"] = $this->songkok_admin_model->jalankan_query_manual($q);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/set_akun'>";
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}

	function update_kategori()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$id = $this->input->post('id');
				$nama = mysql_real_escape_string($this->input->post('nama'));
				$prnt = $this->input->post('prnt');
				$lvl = $this->input->post('lvl');
				$q = "update tbl_kategori set nama_kategori='".$nama."', kode_level='".$lvl."', kode_parent='".$prnt."' where id_kategori = 
				'".$id."'";
				$data["upd"] = $this->songkok_admin_model->jalankan_query_manual($q);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/lihat_kategori_produk'>";
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}
	
	function update_pass()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
			$datapesan['username'] = mysql_real_escape_string($this->input->post('username'));
			$datapesan['passlama'] = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($this->input->post('passlama'),ENT_QUOTES))));
			$datapesan['passbaru'] = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($this->input->post('passbaru'),ENT_QUOTES))));
			$datapesan['ulangi'] = mysql_real_escape_string($this->input->post('ulangi'));
			$bersih = md5($datapesan['passbaru']);

				if($datapesan['passlama']=="" && $datapesan['passbaru']=="" && $datapesan['ulangi']=="")
				{
					echo "Field belum lengkap. Mohon diisi dengan selengkap-lengkapnya.";
				}
				else
				{
					$cek = $this->songkok_admin_model->data_login_admin($datapesan['username'],$datapesan['passlama']);
					if($datapesan['ulangi']==$datapesan['passbaru']){
						if(count($cek->result())>0){
							$q_update = "update tbl_spr_admn set pass_admn='".$bersih."' where kode_spr_admn='".$data["kd"]."'";
							$this->songkok_admin_model->jalankan_query_manual($q_update);
							echo "Berhasil memperbaharui data profil anda.";
							?>
								<script>
								alert('Berhasil memperbaharui data profil anda.');
								</script>
							<?php
							echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/set_akun'>";
						}
						else{
							echo "Password Lama Salah. Gagal memperbaharui data password anda.";
							?>
								<script>
								alert('Password Lama Salah. Gagal memperbaharui data password anda.');
								</script>
							<?php
							echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/set_akun'>";
						}
					}
					else{
						echo "Password Tidak Sama/Sinkron. Gagal memperbaharui data password anda.";
						?>
							<script>
							alert('Password Tidak Sama/Sinkron. Gagal memperbaharui data password anda.');
							</script>
						<?php
						echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/set_akun'>";
						
					}
				}
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}

	function update_katalog()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$nama = mysql_real_escape_string($this->input->post('nama'));
				$id = $this->input->post('id');
				$fl = $this->input->post('nm_fl');
				
				if(empty($_FILES['userfile']['name']))
				{
					$this->songkok_admin_model->jalankan_query_manual("update tbl_katalog set judul_file='".$nama."' where id_katalog='".$id."'");
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/lihat_katalog'>";
				}
				else
				{
					$acak=rand(00000000000,99999999999);
					$bersih=$_FILES['userfile']['name'];
					
					$ext = end(explode('.', $bersih));
					$ext = substr(strrchr($bersih, '.'), 1);
					$ext = substr($bersih, strrpos($bersih, '.') + 1);
					$ext = preg_replace('/^.*\.([^.]+)$/D', '$1', $bersih);
					$exts = split("[/\\.]", $bersih);
					$n = count($exts)-1;
					$ext = $exts[$n];
					
					$nama_fl = $acak.'.'.$ext;
					
					$config["file_name"]=$acak;
					$config['upload_path'] = './asset/download/';
					$config['allowed_types'] = 'pdf|xls|zip|jpg|jpeg|png|txt|doc|docx|xlsx';
					$config['max_size'] = '50000';						
					$this->load->library('upload', $config);
				
					if(!$this->upload->do_upload())
					{
						echo $this->upload->display_errors();
						echo $config['upload_path'];
					}
					else {
						$file = './asset/download/'.$fl;
						unlink($file);
						$this->songkok_admin_model->jalankan_query_manual("update tbl_katalog set judul_file='".$nama."',nama_file='".$nama_fl."' 
						where id_katalog='".$id."'");
						echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/lihat_katalog'>";
					}
				}
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}

	function update_member()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$datapesan['nama'] = mysql_real_escape_string($this->input->post('nama'));
				$datapesan['username'] = mysql_real_escape_string($this->input->post('username'));
				$datapesan['email'] = mysql_real_escape_string($this->input->post('email'));
				$datapesan['alamat'] = mysql_real_escape_string($this->input->post('alamat'));
				$datapesan['telpon'] = mysql_real_escape_string($this->input->post('telpon'));
				$datapesan['propinsi'] = mysql_real_escape_string($this->input->post('propinsi'));
				$datapesan['kota'] = mysql_real_escape_string($this->input->post('kota'));
				$datapesan['kodepos'] = mysql_real_escape_string($this->input->post('kodepos'));
				$datapesan['pass'] = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($this->input->post('pass'),ENT_QUOTES))));
				$bersih = md5($datapesan['pass']);
				$tgl = $this->input->post('tgl');
				$bln = $this->input->post('bln');
				$thn = $this->input->post('thn');
				$datapesan['tgl_lahir'] = $tgl.'-'.$bln.'-'.$thn;
				
				if(empty($datapesan['pass']))
				{
					$q = "update tbl_user set username_user='".$datapesan['username']."', nama='".$datapesan['nama']."',email='".$datapesan['email']."',alamat='".$datapesan['alamat']."',telpon='".$datapesan['telpon']."',propinsi='".$datapesan['propinsi']."',kota='".$datapesan['kota']."',tgl_lahir='".$datapesan['tgl_lahir']."',kode_pos='".$datapesan['kodepos']."' where kode_user='".$pecah[2]."'";
				
					$data["upd"] = $this->songkok_admin_model->jalankan_query_manual($q);
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/lihat_semua_member'>";
				}
				else
				{
					$q = "update tbl_user set username_user='".$datapesan['username']."',pass_user='".$bersih."', nama='".$datapesan['nama']."',email='".$datapesan['email']."',alamat='".$datapesan['alamat']."',telpon='".$datapesan['telpon']."',propinsi='".$datapesan['propinsi']."',kota='".$datapesan['kota']."',tgl_lahir='".$datapesan['tgl_lahir']."',kode_pos='".$datapesan['kodepos']."' where kode_user='".$pecah[2]."'";
				
					$data["upd"] = $this->songkok_admin_model->jalankan_query_manual($q);
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/lihat_semua_member'>";
				}
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}

	function update_testi()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$id = $this->input->post('id');
				$nama = mysql_real_escape_string($this->input->post('nama'));
				$email = mysql_real_escape_string($this->input->post('email'));
				$pesan = mysql_real_escape_string($this->input->post('pesan'));
				$status = $this->input->post('stts');
				$waktu = mysql_real_escape_string($this->input->post('waktu'));
				$q = "update tbl_testimonial set nama='".$nama."', email='".$email."', pesan='".$pesan."', status='".$status."', waktu='".$waktu."' 
				where id_testi = '".$id."'";
				$data["upd"] = $this->songkok_admin_model->jalankan_query_manual($q);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/lihat_semua_testimonial'>";
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}

	

	function update_produk()
	{
		$session=isset($_SESSION['admin_grosir_songkok']) ? $_SESSION['admin_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["kd"]=$pecah[2];
			$data["lvl"]=$pecah[3];
			
			/*if($data["lvl"]=="spradmn")
			{*/
				$kategori = mysql_real_escape_string($this->input->post('kategori'));
				$nama = mysql_real_escape_string($this->input->post('nama'));
				$harga = mysql_real_escape_string($this->input->post('harga'));
				$stok = mysql_real_escape_string($this->input->post('stok'));
				$dibeli = mysql_real_escape_string($this->input->post('dibeli'));
				$beratitem = mysql_real_escape_string($this->input->post('beratitem'));
				$deskripsi = mysql_real_escape_string($this->input->post('deskripsi'));
				$kode = $this->input->post('id');
				$gbr = $this->input->post('gbr');
				
				if(empty($_FILES['imagefile']['name']))
				{
					$this->songkok_admin_model->jalankan_query_manual("update tbl_produk set id_kategori='".$kategori."', nama_produk='".$nama."', harga='".$harga."', 
					stok='".$stok."', dibeli='".$dibeli."', berat=".$beratitem.", deskripsi='".$deskripsi."' where kode_produk='".$kode."'");;
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/lihat_produk'>";
				}
				else
				{
					if ($_FILES['imagefile']['type'] == "image/jpeg"){
						$ori_src="asset/produk/imgoriginal/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
						if(move_uploaded_file ($_FILES['imagefile']['tmp_name'],$ori_src))
						{
							chmod("$ori_src",0777);
						}else{
							echo "Gagal melakukan proses upload file.";
							exit;
						}
	
						$thumb_src="asset/produk/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
						
						$n_width = 150;
						$n_height = 150;
					
						if(($_FILES['imagefile']['type']=="image/jpeg") || ($_FILES['imagefile']['type']=="image/png") ||($_FILES['imagefile']['type']=="image/gif"))
						{
							$im = @ImageCreateFromJPEG ($ori_src) or // Read JPEG Image
							$im = @ImageCreateFromPNG ($ori_src) or // or PNG Image
							$im = @ImageCreateFromGIF ($ori_src) or // or GIF Image
							$im = false; // If image is not JPEG, PNG, or GIF
							
							//$im=ImageCreateFromJPEG($ori_src); 
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);             // Original picture height is stored
							if(($n_height==0) && ($n_width==0)) {
								$n_height = $height;
								$n_width = $width;
							}	
			
							if(!$im) {
								echo '<p>Gagal membuat thumnail</p>';
								exit;
							}
							else {				
								$newimage=@imagecreatetruecolor($n_width,$n_height);                 
								@imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
								@ImageJpeg($newimage,$thumb_src);
								chmod("$thumb_src",0777);
							}
						}
						$this->songkok_admin_model->jalankan_query_manual("update tbl_produk set id_kategori='".$kategori."', nama_produk='".$nama."', harga='".$harga."', 
						stok='".$stok."', dibeli='".$dibeli."', berat=".$beratitem.", gbr_kecil='".$_FILES['imagefile']['name']."', gbr_besar='".$_FILES['imagefile']['name']."', 
						deskripsi='".$deskripsi."' where kode_produk='".$kode."'");
						$file_kcl = './asset/produk/'.$gbr;
						$file_bsr = './asset/produk/imgoriginal/'.$gbr;
						unlink($file_kcl);
						unlink($file_bsr);
						echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/lihat_produk'>";
					}
					else
					{
						echo "Gagal, file yang anda upload tidak sesuai, file yang diperbolehkan adalah jpg,png,bmp";
					}
				}
				
			//}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
	}



//==================Login============================//


	function aksilogin()
	{
		$username = mysql_real_escape_string($this->input->post('username'));
		$pwd = mysql_real_escape_string($this->input->post('password'));
		$hasil = $this->songkok_admin_model->data_login_admin($username,$pwd);
		
		/*$expiration = time()-9000;
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
		
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();*/
		
		/*if ($row->count == 0)
		{
			?>
			<script type="text/javascript">
			alert("Captcha salah. Silakan ulangi lagi..");			
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
		}
		else
		{*/
			//cek time limit
			
			if (!ctype_alnum($username) OR !ctype_alnum($pwd)){
				?>
				<script type="text/javascript">
				alert("Protected....!!!");			
				</script>
				<?php
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
			}
			else{
				if (count($hasil->result_array())>0){
					/*$sql_hapus  = "delete FROM captcha";
					$query = $this->db->query($sql_hapus);*/
					foreach($hasil->result() as $items){
						$session_username=$items->username_admn."|".$items->nama_admn."|".$items->kode_spr_admn."|".$items->lvl;
					}
					$_SESSION['admin_grosir_songkok']=$session_username;
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot'>";
				}
				else{
					$q = $this->songkok_admin_model->jalankan_query_manual_select("select tgltransaksi,jamtransaksi from tbl_transaksi_header where status = 1");
					foreach($q->result() as $a)
					{

						$sql = "SELECT DATE_ADD('".$a->tgltransaksi." ".$a->jamtransaksi."',INTERVAL 24 HOUR) AS tgljamtransaksi, kode_transaksi FROM tbl_transaksi_header WHERE tgltransaksi = '".$a->tgltransaksi."' AND jamtransaksi = '".$a->jamtransaksi."'";
						$query = $this->db->query($sql);
						$row = $query->row();
						if (date("Y-m-d H:i:s")>$row->tgljamtransaksi) {
							//echo '('.$row->kode_transaksi.')'.$row->tgljamtransaksi.'=true<br />';
							$qx = $this->songkok_admin_model->jalankan_query_manual_select("SELECT kode_produk,jumlah FROM tbl_transaksi_detail WHERE kode_transaksi = '".$row->kode_transaksi."'");
							foreach($qx->result() as $ax)
							{
								//cek jumlah asli
								$sqlcekpr = "SELECT stok FROM tbl_produk WHERE kode_produk = '".$ax->kode_produk."'";
								$querycekpr = $this->db->query($sqlcekpr);
								$rowcekpr = $querycekpr->row();
								$data["stokbaru"] = ($rowcekpr->stok+$ax->jumlah);

								//update jumlah stok
								$data["upd"] = $this->songkok_admin_model->jalankan_query_manual("update tbl_produk set stok='".$data['stokbaru']."' where kode_produk='".$ax->kode_produk."'");
								$data["del"] = $this->songkok_admin_model->jalankan_query_manual("delete from tbl_transaksi_detail where kode_transaksi='".$row->kode_transaksi."'");
							}
							
							//delete transaksi
							$data["del"] = $this->songkok_admin_model->jalankan_query_manual("delete from tbl_transaksi_header where kode_transaksi='".$row->kode_transaksi."'");
						}else{
							echo '';
							//echo '('.$row->kode_transaksi.')'.$row->tgljamtransaksi.'=false<br />';
						}
						//echo $row->tgljamtransaksi;
					}
					?>
					<script type="text/javascript">
					alert("Username atau Password yang Anda masukkan salah!");			
					</script>
					<?php
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."aksesroot/login'>";
				}
			}
		//}
	}
	
//====================Tiny MCE===============================//

//Function TinyMce------------------------------------------------------------------
		private function scripttiny_mce() {
		return '
		<!-- TinyMCE -->
		<script type="text/javascript" src="'.base_url().'jscripts/tiny_mce/tiny_mce_src.js"></script>
		<script type="text/javascript">
		tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "'.base_url().'system/application/views/themes/css/BrightSide.css",

		// Drop lists for link/image/media/template dialogs
		//"'.base_url().'media/lists/image_list.js"
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "'.base_url().'index.php/adminweb/image_list/",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : \'Bold text\', inline : \'b\'},
			{title : \'Red text\', inline : \'span\', styles : {color : \'#ff0000\'}},
			{title : \'Red header\', block : \'h1\', styles : {color : \'#ff0000\'}},
			{title : \'Example 1\', inline : \'span\', classes : \'example1\'},
			{title : \'Example 2\', inline : \'span\', classes : \'example2\'},
			{title : \'Table styles\'},
			{title : \'Table row 1\', selector : \'tr\', classes : \'tablerow1\'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>';	
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
