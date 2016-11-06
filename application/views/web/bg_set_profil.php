<script type="text/JavaScript">
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- format penulisan '+nm+' salah...!\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' harus angka.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' harus angka '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' masih kosong...!\n'; }
  } if (errors) { alert('Oooopppzzz,,,,ada sedikit kesalahan pada :\n'+errors);
  document.MM_returnValue = (errors == ''); }
  else { document.MM_returnValue = (errors == ''); }
}
</script>
<div id="content-center">
<div style="padding:5px; border:1px solid #ccc; margin-bottom:10px;"><a href="<?php echo base_url(); ?>">Beranda</a> > <a href="<?php echo base_url(); ?>member">Halaman Member</a> > Pengaturan Profil</div>
<h1>Pengaturan Profil - An-nas Via Production</h1>
<div class="cleaner_h10"></div>
<?php
	foreach($det_member->result_array() as $dm)
	{
?>
<form method="post" action="<?php echo base_url(); ?>member/update_profil">
<table width="100%">
<tr><td width="100">Nama Lengkap</td><td>:</td><td><input name="nama" type="text" class="input-teks" size="50" value="<?php echo $dm['nama']; ?>" /></td></tr>
<tr><td width="100">Email</td><td valign="top">:</td><td><input name="email" type="text" class="input-teks" size="50" value="<?php echo $dm['email']; ?>" /></td></tr>
<tr><td width="100" valign="top">Alamat</td><td valign="top">:</td><td><textarea name="alamat" class="input-teks" cols="60" rows="6"><?php echo $dm['alamat']; ?></textarea></td></tr>
<tr><td width="100">No. Telpon</td><td valign="top">:</td><td><input name="telpon" type="text" class="input-teks" size="50" value="<?php echo $dm['telpon']; ?>" /></td></tr>
<tr><td width="100">Propinsi</td><td valign="top">:</td><td><input name="propinsi" type="text" class="input-teks" size="50" value="<?php echo $dm['propinsi']; ?>" /></td></tr>
<tr><td width="100">Kota</td><td valign="top">:</td><td><input name="kota" type="text" class="input-teks" size="50" value="<?php echo $dm['kota']; ?>" /></td></tr>
<tr><td width="100">Kode Pos</td><td valign="top">:</td><td><input name="kodepos" type="text" class="input-teks" size="50" value="<?php echo $dm['kode_pos']; ?>" /></td></tr>
<tr><td width="100">Tanggal Lahir</td><td valign="top">:</td><td><input type="text" value="<?=$dm['tgl_lahir']?>" name="tgl" class="input-teks datepickernow" size="15"></td></tr>
<!--
<tr><td width="100"></td><td></td><td><?php echo $gbr_captcha; ?></td></tr>
<tr><td width="100">Kode Captcha</td><td>:</td><td><input name="captcha" type="text" class="input-teks" id="captcha" size="50" /></td></tr>
-->
<tr><td width="100"></td><td></td><td><input type="submit" class="input-tombol" onclick="MM_validateForm('nama','','R','email','','RisEmail','alamat','','R','telpon','','RisNum','propinsi','','R','kota','','R','captcha','','R');return document.MM_returnValue" value="Register" />
<input type="reset" class="input-tombol" value="Kosongkan Form" /></td></tr>
</table>
</form>
<?php
}
?>
<div class="cleaner_h20"></div>
</div>
