<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_map extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->database();
		session_start();
	}

	function index()
	{
		$data['menu'] = $this->songkok_model->menu_kategori('0','0');
		$data['judul'] = "Site Map Produk dan Website - An-Nas Via Production";
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
			
		$this->load->view('web/bg_top',$data);
		$this->load->view('web/bg_left',$data);
		$this->load->view('web/bg_sitemap');
		$this->load->view('web/bg_right');
		$this->load->view('web/bg_bottom');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
