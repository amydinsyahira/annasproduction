<div id="content-center">
<div style="padding:5px; border:1px solid #ccc; margin-bottom:10px;"><a href="<?php echo base_url(); ?>">Beranda</a> > Log In Member</div>
<h1>Log In Member</h1>
<div class="cleaner_h10"></div>
<form method="post" action="<?php echo base_url(); ?>member/aksilogin">
<table width="100%">
<tr><td width="150">Username</td><td>: </td><td><input type="text" name="usrname" size="40" class="input-teks" /></td></tr>
<tr><td>Password</td><td>: </td><td><input type="password" name="pwd" size="40" class="input-teks" /></td></tr>
<!-- <tr><td></td><td></td><td><?php echo $gbr_captcha; ?></td></tr>
<tr><td>Kode Captcha</td><td>: </td><td><input type="text" name="captcha" size="40" class="input-teks" /></td></tr> -->
<tr><td></td><td></td><td><input type="submit" value="Log In" class="input-tombol" /> <input type="reset" value="Hapus" class="input-tombol" /></td></tr>
</table>
</form>
<div style="width:230px; text-align:center; float:left; padding:10px; margin-top:20px;border-top:3px solid #eee; padding-top:20px;">
<a href="<?php echo base_url(); ?>member/lupa" class="tombol" style="color:#fff; border-radius:4px; padding:13px 20px;">Lupa Password Anda</a>
</div>
<div style="width:230px;text-align:center; float:left; padding:10px; margin-top:20px;border-top:3px solid #eee; padding-top:20px;">
<a href="<?php echo base_url(); ?>member/daftar" class="tombol" style="color:#fff; border-radius:4px; padding:13px 20px;">Daftar Sebagai Member</a>
</div>
<div class="cleaner_h20"></div>
</div>