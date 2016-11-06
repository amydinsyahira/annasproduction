<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Katalog extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		session_start();
	}
	
	function index()
	{
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."katalog/lihat'>";
	}

	function lihat()
	{
		$data['menu'] = $this->songkok_model->menu_kategori('0','0');
		$data['judul'] = "Download Katalog Produk - An-nas Via Production";
		$data['slide_atas'] = $this->songkok_model->tampil_slide_produk(10);
		$data['slide_laris'] = $this->songkok_model->tampil_slide_produk_terlaris_kiri(2);
		$data['slide_rekomendasi'] = $this->songkok_model->tampil_slide_produk(6);
		$data['testimonial'] = $this->songkok_model->tampil_testimonial(10,0);
		$data['kategori_side'] = $this->songkok_model->side_kategori();
		
		$session=isset($_SESSION['username_grosir_songkok']) ? $_SESSION['username_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["nama"]=$pecah[1];
		}
		
		$page=$this->uri->segment(3);
      	$limit=8;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['katalog'] = $this->songkok_model->tampil_katalog($limit,$offset);
		$tot_hal = $this->songkok_model->hitung_isi_1tabel('tbl_katalog','');
		
		$config['base_url'] = base_url() . 'katalog/lihat/';
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
		$this->load->view('web/bg_katalog',$data);
		$this->load->view('web/bg_right');
		$this->load->view('web/bg_bottom');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
