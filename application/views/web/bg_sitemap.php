<div id="content-center">
<div style="padding:5px; border:1px solid #ccc; margin-bottom:10px;"><a href="<?php echo base_url(); ?>">Beranda</a> > Site Map Produk</div>
<!-- <iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo base_url(); ?>site_map
&layout=standard&show_faces=false&width=500&action=recommend&colorscheme=light&height=40" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:40px; color:#FFFFFF;" allowTransparency="true"></iframe>  -->
<h1>Site Map Produk dan Website - An-Nas Via Production</h1>
Untuk mempermudah anda menelusuri website ini dan menemukan produk yang anda cari, kami sediakan layanan site map produk dan website.
<div class="cleaner_h20"></div>
<ul id="red" class="treeview-gray">
<li><span><a href="<?php echo base_url(); ?>">Beranda</a></span></li>
<li><span><a href="<?php echo base_url(); ?>profil_songkok_online">Tentang Kami</a></span></li>
<li><span><a href="<?php echo base_url(); ?>cara_belanja">Cara Belanja</a></span></li>
<li><span><a href="<?php echo base_url(); ?>hubungi_kami">Hubungi Kami</a></span></li>
<li><span><a href="<?php echo base_url(); ?>site_map">Site Map Produk</a></span></li>
<li><span><a href="<?php echo base_url(); ?>keranjang">Keranjang Belanja</a></span></li>
<li><span><a href="<?php echo base_url(); ?>produk">Produk</a></span>
	<ul>
	<?php
		foreach($menu->result_array() as $m1)
		{
			$ambil = "";
			$ambil_kat = $this->songkok_model->ambil_id($m1['id_kategori']);
			foreach($ambil_kat->result() as $ak1)
			{
				$ambil .= "-".$ak1->id_kategori;
				$ambil_kat2 = $this->songkok_model->ambil_id($ak1->id_kategori);
				foreach($ambil_kat2->result() as $ak2)
				{
					$ambil .= "-".$ak2->id_kategori;
				}
			}
			$nm_link1 = $m1['id_kategori'].''.$ambil;
			$ld1 = strtolower(str_replace(" ","-",$nm_link1));
			$sub1 = $this->songkok_model->menu_kategori('1',$m1['id_kategori']);

			//if(count($sub1->result_array())>0){
				//echo '<li><a href="#">'.$m1['nama_kategori'].'</a><ul>';
			//}
			//else{
				echo '<li><a href="'.$this->config->item('site_url').'kategori/produk/'.$ld1.'">'.$m1['nama_kategori'].'</a><ul>';
			//}
			
			foreach($sub1->result() as $sm1)
			{
				$gbr = "";
				$ambil2 = "";
				$ambil2_kat = $this->songkok_model->ambil_id($sm1->id_kategori);
				foreach($ambil2_kat->result() as $ak1_2)
				{
					$ambil2 .= "-".$ak1_2->id_kategori;
					$ambil2_kat2 = $this->songkok_model->ambil_id($ak1_2->id_kategori);
					foreach($ambil2_kat2->result() as $ak2_2)
					{
						$ambil2 .= "-".$ak2_2->id_kategori;
					}
				}
				
				$nm_link2 = $sm1->id_kategori.''.$ambil2;

				$ld2 = strtolower(str_replace(" ","-",$nm_link2));
				$sub2 = $this->songkok_model->menu_kategori('2',$sm1->id_kategori);
				if(count($sub2->result())>0) 
				{
					$gbr='<img src="'.base_url().'asset/images/right.gif" border="0" align="right">';
					//echo '<li><a href="#">'.$sm1->nama_kategori.''.$gbr.'</a><ul>';
					echo '<li><a href="'.$this->config->item('site_url').'kategori/produk/'.$ld2.'">'.$sm1->nama_kategori.' '.$gbr.'</a><ul>';
				}
				else
				{
					echo '<li><a href="'.$this->config->item('site_url').'kategori/produk/'.$ld2.'">'.$sm1->nama_kategori.'</a><ul>';
				}
				
				foreach($sub2->result() as $sm2)
				{
					$nm_link3 = $sm2->id_kategori;
					$ld3 = strtolower(str_replace(" ","-",$nm_link3));
					echo '<li><a href="'.$this->config->item('site_url').'kategori/produk/'.$ld3.'">'.$sm2->nama_kategori.'</a></li>';
				}
				
				echo '</ul>';
				echo '</li>';
				
			}
			echo '</ul>';
			echo '</li>';
		}
	?>
	</ul>
	</li>
<li><span><a href="<?php echo base_url(); ?>testimonial">Testimonial</a></span></li>
<li><span><a href="<?php echo base_url(); ?>member">Member</a></span></li>
</ul>
<script type="text/javascript">
ddtreemenu.createTree("treemenu1", true);
</script>
<div class="cleaner_h20"></div>
</div>
