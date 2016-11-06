<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cari extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		session_start();
	}
	
	function index()
	{
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."cari/lihat'>";
	}

	function lihat()
	{
		$data['menu'] = $this->songkok_model->menu_kategori('0','0');
		$data['judul'] = "Hasil Pencarian Produk - Grosir Songkok Online, Toko Songkok Online Termurah dan Terlengkap di Indonesia - Harmonis Grosir songkok";
		$data['slide_atas'] = $this->songkok_model->tampil_slide_produk(10);
		$data['slide_laris'] = $this->songkok_model->tampil_slide_produk_terlaris_kiri(5);
		$data['slide_baru'] = $this->songkok_model->tampil_produk(5);
		$data['slide_rekomendasi'] = $this->songkok_model->tampil_slide_produk(6);
		//$data['intermezzo'] = $this->songkok_model->tampil_semua_berita(5,0);
		$data['testimonial'] = $this->songkok_model->tampil_testimonial(10,0);
		//$data['banner'] = $this->songkok_model->tampil_banner();
		
		$session=isset($_SESSION['username_grosir_songkok']) ? $_SESSION['username_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["nama"]=$pecah[1];
		}
		
		$data['kata']="";
			if(isset($_POST['cari']))
			{
				$data['kata'] = mysql_real_escape_string($this->input->post('cari'));
				$this->session->set_userdata('simpan_kata', $data['kata']);
			} else {
				$data['kata'] = $this->session->userdata('simpan_kata');
			}
		
		$page=$this->uri->segment(3);
      	$limit=12;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['cariproduk'] = $this->songkok_model->pencarian($limit,$offset,$data['kata']);
		$tot_hal = $this->songkok_model->hitung_isi_1tabel('tbl_produk',"where nama_produk like '%".$data['kata']."%'");
		
		$config['base_url'] = base_url() . 'cari/lihat/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
       		$this->pagination->initialize($config);
		$data["paginator"] =$this->pagination->create_links();
		
		$this->load->view('web/bg_top',$data);
		$this->load->view('web/bg_left',$data);
		$this->load->view('web/bg_cari');
		$this->load->view('web/bg_right');
		$this->load->view('web/bg_bottom');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
