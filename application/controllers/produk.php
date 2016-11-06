<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		session_start();
	}
	
	function index()
	{
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."produk/cari'>";
	}

	function cari()
	{
		$data['menu'] = $this->songkok_model->menu_kategori('0','0');
		$data['judul'] = "Keranjang Belanja - An-nas Via Production";
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
      	$limit=12;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['produk'] = $this->songkok_model->tampil_semua_produk($limit,$offset);
		$tot_hal = $this->songkok_model->hitung_isi_1tabel('tbl_produk','');
		
		$config['base_url'] = base_url() . 'produk/cari/';
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
		$this->load->view('web/bg_produk');
		$this->load->view('web/bg_right');
		$this->load->view('web/bg_bottom');
	}

	function detail()
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
		$p_kode = explode("-",$kode);
		$data['detail_produk'] = $this->songkok_model->tampil_detail_produk($p_kode[0]);
		$judul = "";
		$kd_kategori = "";
		foreach($data['detail_produk']->result() as $dp)
		{
			$judul = $dp->nama_produk.' - Kategori '.$dp->nama_kategori;
			$kd_kategori = $dp->id_kategori;
			$data['nama_kategori'] = $dp->nama_kategori;
			$data['nama_produk'] = $dp->nama_produk;
			$link_mentah = str_replace(' ','-',$data['nama_kategori']);
			$data['link'] = strtolower($kd_kategori.'-'.$link_mentah);
		}
		$data['menu'] = $this->songkok_model->menu_kategori('0','0');
		$data['judul'] = $judul."- An-nas Via Production";
		$data['slide_atas'] = $this->songkok_model->tampil_slide_produk(10);
		$data['slide_laris'] = $this->songkok_model->tampil_slide_produk_terlaris_kiri(2);
		$data['slide_rekomendasi'] = $this->songkok_model->tampil_slide_produk(6);
		$data['slide_produk_sejenis'] = $this->songkok_model->tampil_produk_sejenis($kd_kategori,$p_kode[0],6);
		$data['testimonial'] = $this->songkok_model->tampil_testimonial(10,0);
		$data['kategori_side'] = $this->songkok_model->side_kategori();
		
		$session=isset($_SESSION['username_grosir_songkok']) ? $_SESSION['username_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["nama"]=$pecah[1];
		}
		
		$this->load->view('web/bg_top',$data);
		$this->load->view('web/bg_left',$data);
		$this->load->view('web/bg_detail_produk');
		$this->load->view('web/bg_right');
		$this->load->view('web/bg_bottom');
	}

	function belanja()
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
		$p_kode = explode("-",$kode);
		
		$page=$this->uri->segment(4);
      	$limit=12;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['nama_kategori'] = '';
		if($p_kode[0]=="")
		{
			$seleksi = 'where harga>=0 and harga<='.$p_kode[1].'';
			$data['nama_kategori'] = 'Barang Dengan Kisaran Harga Rp.0,00 - Rp.'.number_format($p_kode[1],2,',','.').'';
		}
		else if($p_kode[1]=="")
		{
			$seleksi = 'where harga>='.$p_kode[0].'';
			$data['nama_kategori'] = 'Barang Dengan Kisaran Harga Di Atas Rp.'.number_format($p_kode[0],2,',','.').'';
		}
		else
		{
			$seleksi = 'where harga>='.$p_kode[0].' and harga<='.$p_kode[1].'';
			$data['nama_kategori'] = 'Barang Dengan Kisaran Harga Rp.'.number_format($p_kode[0],2,',','.').' - Rp.'.number_format($p_kode[1],2,',','.').'';
		}
		$data['kategori'] = $this->songkok_model->tampil_produk_per_harga($seleksi,$offset,$limit);
		$tot_hal = $this->songkok_model->hitung_isi_1tabel('tbl_produk',$seleksi);
		
		$config['base_url'] = base_url() . 'produk/belanja/'.$kode;
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
	    	$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
       		$this->pagination->initialize($config);
		$data["paginator"] =$this->pagination->create_links();
		
		$judul = $data['nama_kategori'];
		$data['link'] = $kode;
			
		$data['menu'] = $this->songkok_model->menu_kategori('0','0');
		$data['judul'] = $judul." - An-nas Via Production";
		$data['slide_atas'] = $this->songkok_model->tampil_slide_produk(10);
		$data['slide_laris'] = $this->songkok_model->tampil_slide_produk_terlaris_kiri(2);
		$data['testimonial'] = $this->songkok_model->tampil_testimonial(10,0);
		$data['kategori_side'] = $this->songkok_model->side_kategori();
		
		$session=isset($_SESSION['username_grosir_songkok']) ? $_SESSION['username_grosir_songkok']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["nama"]=$pecah[1];
		}
		
		$this->load->view('web/bg_top',$data);
		$this->load->view('web/bg_left',$data);
		$this->load->view('web/bg_belanja_harga');
		$this->load->view('web/bg_right');
		$this->load->view('web/bg_bottom');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
