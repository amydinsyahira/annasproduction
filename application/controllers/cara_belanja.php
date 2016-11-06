<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cara_belanja extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		session_start();
	}

	function index()
	{
		$data['menu'] = $this->songkok_model->menu_kategori('0','0');
		$data['judul'] = "Cara Berbelanja Online - An-nas Via Production";
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
		$this->load->view('web/bg_cara_belanja');
		$this->load->view('web/bg_right');
		$this->load->view('web/bg_bottom');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
