<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keranjang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		session_start();
	}

	function index()
	{
		$data['menu'] = $this->songkok_model->menu_kategori('0','0');
		$data['judul'] = "Keranjang Belanja - An-Nas Via Production";
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
		
		$this->load->view('web/bg_top',$data);
		$this->load->view('web/bg_left',$data);
		$this->load->view('web/bg_keranjang_belanja');
		$this->load->view('web/bg_right');
		$this->load->view('web/bg_bottom');
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
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."keranjang/'>";
		} else {
			echo '<script>alert("Perhatian! Stok tidak mencukupi jumlah barang yang Anda inginkan.");</script>';
			echo "<meta http-equiv='refresh' content='0; url=".$urlproduk."'>";
		}
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
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."keranjang/'>";
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
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."keranjang/'>";
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
