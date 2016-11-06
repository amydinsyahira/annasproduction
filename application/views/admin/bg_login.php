<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrator An-Nas Studio</title>
<link href="<?php echo base_url(); ?>asset/css/style-login.css" rel="stylesheet" type="text/css" />
</head>

<body><br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<form method="post" action="<?php echo base_url();?>aksesroot/aksilogin">
<div id="bg-login"><br />
<div id="judul"><img src="<?php echo base_url(); ?>asset/images/logo.png" /></div>
<br />
<br />
<div id="bg-login-kiri">Username</div>
<div id="bg-login-kanan"><input type="text" class="input" size="30" value="Username" onblur="if(this.value=='') this.value='Username';" onfocus="if(this.value=='Username') this.value='';" name="username" autocomplete="off" /></div>
<div style="margin:0px auto; width:100%; clear:both;"></div>
<div id="bg-login-kiri">Password</div>
<div id="bg-login-kanan"><input type="password" class="input" size="30" value="Password" onblur="if(this.value=='') this.value='Password';" onfocus="if(this.value=='Password') this.value='';" name="password" autocomplete="off" /></div>
<div style="margin:0px auto; width:100%; clear:both;"></div>
<!-- <div id="bg-login-kiri"></div><div id="bg-login-kanan"><?php echo $gbr_captcha; ?></div>
<div style="margin:0px auto; width:100%; clear:both;"></div>
<div id="bg-login-kiri">Captcha</div><div id="bg-login-kanan"><input type="text" class="input" size="30" value="Captcha" onblur="if(this.value=='') this.value='Captcha';" onfocus="if(this.value=='Captcha') this.value='';" name="captcha" autocomplete="off" /></div> -->
<div style="margin:0px auto; width:100%; clear:both;"></div>
<div id="bg-login-kiri"></div>
<div id="bg-login-kanan">
	<input type="submit" class="tombol" value="Masuk" /> <input type="reset" class="tombol" value="Reset" /></div>
<div id="judul"><br />Administrator An-nas Via Production - <?php echo date('Y'); ?></div>
</div>
</form>
</body>
</html>
