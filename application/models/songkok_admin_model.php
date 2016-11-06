<?php
Class songkok_admin_model extends CI_Model
{
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	
	function menu_kategori($kd_level,$kd_parent)
	{
		$q = $this->db->query("SELECT * from tbl_kategori where kode_level=".$kd_level." and kode_parent=".$kd_parent."");
		return $q;
	}
	
	function jalankan_query_manual($datainput)
	{
		$q = $this->db->query($datainput);
	}
	
	function jalankan_query_manual_select($datainput)
	{
		$q = $this->db->query($datainput);
		return $q;
	}
	
	function tampil_produk($limit)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori 
		order by kode_produk DESC LIMIT $limit");
		return $q;
	}

	function tampil_barang_rusak()
	{
		$q = $this->db->query("SELECT p.*,u.* from tbl_pengembalian_barang p INNER JOIN tbl_user u ON u.kode_user = p.kode_user");
		return $q;
	}
	
	function tampil_semua_kategori()
	{
		$q = $this->db->query("SELECT * from tbl_kategori");
		return $q;
	}

	function tampil_hubungi_kami()
	{
		$q = $this->db->query("SELECT * from tbl_hubungi_kami");
		return $q;
	}
	function tampil_detail_hubungi_kami($kode)
	{
		$q = $this->db->query("SELECT * from tbl_hubungi_kami where id_hubungi_kami='$kode'");
		return $q;
	}
	function tampil_pengembalian_barang($kode)
	{
		$q = $this->db->query("SELECT * from tbl_pengembalian_barang where kode_pengembalian_barang='$kode'");
		return $q;
	}
	function tampil_daftar_admin()
	{
		$q = $this->db->query("SELECT * from tbl_spr_admn");
		return $q;
	}
	
	function hapus_konten($id,$seleksi,$tabel)
	{
		$this->db->where($seleksi,$id);
		$this->db->delete($tabel);
	}
	
	function tampil_semua_produk($limit,$offset)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori order by 
		kode_produk DESC LIMIT $offset,$limit");
		return $q;
	}
	
	function tampil_daftar_member($limit,$offset)
	{
		$q = $this->db->query("SELECT * from tbl_user order by kode_user,stts DESC LIMIT $offset,$limit");
		return $q;
	}
	
	function tampil_detail_produk($kode)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori where
		kode_produk='$kode'");
		return $q;
	}
	
	function tampil_produk_sejenis($kategori,$kode,$limit)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori where
		kode_produk not in('$kode') and tbl_produk.id_kategori='$kategori' order by RAND() LIMIT $limit");
		return $q;
	}
	
	function tampil_produk_per_kategori($kategori,$offset,$limit)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori where
		tbl_produk.id_kategori='$kategori' order by tbl_produk.id_kategori DESC LIMIT $offset,$limit");
		return $q;
	}
	
	
	function tampil_produk_per_harga($seleksi,$offset,$limit)
	{
		$q = $this->db->query("SELECT * from tbl_produk left join tbl_kategori on tbl_produk.id_kategori=tbl_kategori.id_kategori $seleksi order by tbl_produk.id_kategori DESC LIMIT $offset,$limit");
		return $q;
	}
	
	function hitung_isi_1tabel($tabel,$seleksi)
	{
		$q = $this->db->query("SELECT * from $tabel $seleksi");
		return $q;
	}
	
	/*function tampil_semua_berita($limit,$offset)
	{
		$q = $this->db->query("SELECT * from tbl_intermezzo order by id_berita DESC LIMIT $offset,$limit");
		return $q;
	}*/
	
	function tampil_trans_harian($tgl,$limit,$offset)
	{
		$q = $this->db->query("SELECT
tbl_user.nama,
tbl_user.nama as nama_penerima,
tbl_transaksi_detail.kode_transaksi_detail,
tbl_transaksi_detail.kode_transaksi,
tbl_transaksi_detail.jumlah,
tbl_transaksi_detail.kode_produk,
tbl_user.email,
tbl_user.alamat,
tbl_user.telpon,
tbl_user.propinsi,
tbl_user.kota,
tbl_user.kode_pos,
tbl_produk.nama_produk,
tbl_produk.harga
FROM
tbl_transaksi_detail
INNER JOIN tbl_transaksi_header ON tbl_transaksi_header.kode_transaksi = tbl_transaksi_detail.kode_transaksi
INNER JOIN tbl_user ON tbl_user.kode_user = tbl_transaksi_header.kode_user
INNER JOIN tbl_produk ON tbl_produk.kode_produk = tbl_transaksi_detail.kode_produk
WHERE tbl_transaksi_header.kode_transaksi LIKE '%$tgl%' LIMIT $offset,$limit");
		return $q;
	}
	
	/*function tampil_detail_berita($id)
	{
		$q = $this->db->query("SELECT * from tbl_intermezzo where id_berita='$id'");
		return $q;
	}
	
	function update_counter_berita($id)
	{
		$q = $this->db->query("update tbl_intermezzo set dibaca=dibaca+1 where id_berita='$id'");
		return $q;
	}
	function tampil_berita_lain($limit)
	{
		$q = $this->db->query("SELECT * from tbl_intermezzo order by RAND() LIMIT $limit");
		return $q;
	}*/
	function tampil_testimonial($limit,$offset)
	{
		$q = $this->db->query("SELECT * from tbl_testimonial order by id_testi,status DESC LIMIT $offset,$limit");
		return $q;
	}
	function simpan_testimonial($datainput)
	{
		$this->db->insert('tbl_testimonial',$datainput);
	}
	
	function pencarian($batas,$url,$kata)
	{
	$this->db->select('*');
	$this->db->from('tbl_produk');
	if(!empty($kata)) {
		$this->db->like('nama_produk',$kata);
	}
	   $this->db->order_by('kode_produk','DESC');
	   $getData = $this->db->get('', $batas, $url);

	   if($getData->num_rows() > 0)
		return $getData->result_array();
	   else
		return null;
	  }
	
	function tampil_katalog($limit,$offset)
	{
		$q = $this->db->query("SELECT * from tbl_katalog order by id_katalog DESC LIMIT $offset,$limit");
		return $q;
	}
	
	function tampil_detail_katalog($kode)
	{
		$q = $this->db->query("SELECT * from tbl_katalog where id_katalog='$kode'");
		return $q;
	}
	function data_login_admin($user,$pass)
	{
		$user_bersih=mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($user,ENT_QUOTES))));
		$pass_bersih=mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($pass,ENT_QUOTES))));
		$query=$this->db->query("select * from tbl_spr_admn where username_admn='$user_bersih' and pass_admn=md5('$pass_bersih') and stts=1");
		return $query;
	}
	function cek_username($user,$email)
	{
		$query=$this->db->query("select * from tbl_user where username_user='$user' and email='$email'");
		return $query;
	}
	function cek_email($email)
	{
		$query=$this->db->query("select * from tbl_user where email='$email'");
		return $query;
	}
	function register_member($datainput)
	{
		$this->db->insert('tbl_user',$datainput);
	}
	function aktivasi_member($kode)
	{
		$query=$this->db->query("select * from tbl_user where kode_aktivasi='$kode'");
		return $query;
	}
	function update_aktivasi($kode)
	{
		$query=$this->db->query("update tbl_user set stts='1', kode_aktivasi='' where kode_user='$kode'");
	}
	function pilih_admin($kode)
	{
		$query=$this->db->query("select * from tbl_spr_admn where kode_spr_admn='$kode'");
		return $query;
	}
	function update_profil_member($upd)
	{
		$query=$this->db->query($upd);
	}
	
	function tampil_detail_testimonial($kode)
	{
		$q = $this->db->query("SELECT * from tbl_testimonial where id_testi='$kode'");
		return $q;
	}
	function pilih_email($email)
	{
		$query=$this->db->query("select * from tbl_user where email='$email'");
		return $query;
	}
	function kirim_invoice_header($qr)
	{
		$query=$this->db->query($qr);
	}
	function cek_kode($tgl)
	{
		$query=$this->db->query("SELECT MAX(kode_transaksi) as kd FROM tbl_transaksi_header WHERE kode_transaksi like '%$tgl%'");
		return $query;
	}
	function simpan_pesanan($datainput)
	{
		$q = $this->db->query($datainput);
	}
	function update_dibeli($kd,$bl)
	{
		$query=$this->db->query("update tbl_produk set dibeli=dibeli+$bl where kode_produk='$kd'");
	}
	function lihat_histori($kd,$bl)
	{
		$query=$this->db->query("update tbl_produk set dibeli=dibeli+$bl where kode_produk='$kd'");
	}
	function tampil_semua_history($kd,$limit,$offset)
	{
		$query=$this->db->query("SELECT substring(a.kode_transaksi,1,8) as tgl, count(kode_produk) as jm, a.kode_transaksi FROM `tbl_transaksi_header` as a left join tbl_transaksi_detail as b on a.kode_transaksi=b.kode_transaksi where kode_user='$kd' group by tgl LIMIT $offset,$limit");
		return $query;
	}
	function tampil_det_history($kd_usr,$kd,$limit,$offset)
	{
		$query=$this->db->query("SELECT * FROM `tbl_transaksi_header` as a left join tbl_transaksi_detail as b on a.kode_transaksi=b.kode_transaksi where kode_user='$kd_usr' and b.kode_transaksi like '%$kd%' order by b.kode_transaksi ASC LIMIT $offset,$limit");
		return $query;
	}
	
 
}
 
?>
