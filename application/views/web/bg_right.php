<div id="content-right">
<div id="sub-content-title" style="background:#5E656E; border-bottom:1px solid #ccc; color:#fff">Keranjang Belanja Anda</div>
<div id="sub-content-center" style="background:#5E656E; color:#fff; margin-top:-1px; border-top:1px solid #4D535C;">
<i class="fa fa-shopping-cart" style="font-size:40px; float:right; margin-right:5px;"></i>
<strong><?php echo $this->cart->total_items(); ?> item produk</strong>
<div style="border-bottom:1px dashed #666666; width:80%"></div>
Total: <strong>Rp. <?php echo number_format($this->cart->total(),2,',','.'); ?></strong>
<?php
if($this->cart->total_items()>0)
{
?><br /><br />
<a href="<?php echo base_url(); ?>keranjang"><div class="lihat-keranjang-kiri">Lihat Keranjang</div></a>
<a href="<?php echo base_url(); ?>checkout"><div class="selesai-belanja-kanan">Selesai Belanja</div></a>
<?php
} else { }
?>
<div class="cleaner_h0"></div>
</div>
<div id="sub-content-title">Testimonial Pengunjung</div>
    <script type="text/javascript">
	  $(function() {
		var ticker = $("#ticker");
		ticker.children().filter("dt").each(function() {
		  var dt = $(this),
		    container = $("<div>");
		  dt.next().appendTo(container);
		  dt.prependTo(container);
		  container.appendTo(ticker);
		});
				
		ticker.css("overflow", "hidden");
		function animator(currentItem) {
		  var distance = currentItem.height();
			duration = (distance + parseInt(currentItem.css("marginTop"))) / 0.025;
		  currentItem.animate({ marginTop: -distance }, duration, "linear", function() {
			currentItem.appendTo(currentItem.parent()).css("marginTop", 0);
			animator(currentItem.parent().children(":first"));
		  }); 
		};
		
		animator(ticker.children(":first"));
		ticker.mouseenter(function() {
		  ticker.children().stop();
		});
		
		ticker.mouseleave(function() {
		  animator(ticker.children(":first"));
		});
	  });
    </script>
<script type="text/javascript">
$(document).ready(function () {
<?php
for($i=1;$i<=count($testimonial->result_array());$i++)
{
?>
  $('#dialg<?php echo $i; ?>').simpleDialog();
<?php
  }
?>
});
</script>
<div id="sub-content-center" style="height:auto;">
<p align="center" style="margin:0px auto; margin-bottom:15px; margin-top:15px; padding:0px;"><a href="<?php echo base_url(); ?>testimonial/isi" class="tombol" style="color:#fff; text-decoration:none; border-radius:4px;"><i class="fa fa-pencil-square-o"></i> Tulis</a>
<a href="<?php echo base_url(); ?>testimonial" class="tombol" style="color:#fff; text-decoration:none; border-radius:4px;"><i class="fa fa-comments-o"></i> Baca Testimonial</a></p>
	<div id="tickerContainer">
            <?php
			$no = 1;
			$x = 0;
			foreach($testimonial->result_array() as $ts)
			{
				$x++;
				if($x%2==0){
					$wrna = 'dua';
				}else {
					$wrna = '';
				}
				$komen = substr($ts['pesan'],0,100);
				echo '<div class="list '.$wrna.'"><dt class="heading">
					<b><a href="mailto:'.$ts['email'].'">'.$ts['nama'].'</a></b>
					</dt>
					<dd class="text"><span class="komen-testi">'.$komen.'...<b><br />
					<a href="'.base_url().'testimonial/baca/'.$ts['id_testi'].'/" id="dialg'.$no.'">[baca selengkapnya]</a></b></span></dd>
					</div>';
				$no++;
			}
            ?>
          </ul>
    </div>
</div>
</div>
</div>
