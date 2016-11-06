<div id="content-center">
<div style="padding:5px; border:1px solid #ccc; margin-bottom:10px;"><a href="<?php echo base_url(); ?>">Beranda</a> > <a href="<?php echo base_url(); ?>member">Halaman Member</a> > Input Password Baru</div>
<h1>Input Password Baru - Harmonis Grosir Songkok Online</h1>
<div class="cleaner_h10"></div>
<form method="post" action="<?php echo base_url(); ?>member/update_reset_pass">
<input type="hidden" name="kode" value="<?php echo $kode; ?>" />
<table width="100%">
<tr>
	<td width="150">Password Baru</td>
	<td>: </td>
	<td><input type="password" name="passbaru" size="40" class="input-teks" /></td>
</tr>
<tr>
	<td>Ulangi Password</td>
	<td>: </td>
	<td><input type="password"  name="ulangi" size="40" class="input-teks" /></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><input type="submit" value="Ubah Password" class="input-tombol" /> <input type="reset" value="Hapus" class="input-tombol" /></td>
</tr>
</table>
</form>
<div style="width:230px; text-align:center; float:left; padding:10px;">
<a href="<?php echo base_url(); ?>member/lupa">Lupa dengan password anda..???<br /><img src="<?php echo base_url(); ?>asset/images/lupa-pass.png" border="0" /></a>
</div>
<div style="width:230px;text-align:center; float:left; padding:10px;">
<a href="<?php echo base_url(); ?>member/daftar">Belum menjadi member..???<br /><img src="<?php echo base_url(); ?>asset/images/reg-member.png" border="0" /></a>
</div>
<div class="cleaner_h20"></div>
</div>
