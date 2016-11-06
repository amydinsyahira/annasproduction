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
		<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-ui-1.7.2.custom.min.js"></script>
		<script type="text/javascript">
			$(function(){
	
                               // bufferdie love m...
                                $('#tanggal').datepicker({dateFormat: 'd MM yy'});
				
			});
		</script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/redmond/jquery-ui.css" type="text/css" rel="stylesheet"/>	
<div id="content-center">
<div style="padding:5px; border:1px solid #ccc; margin-bottom:10px;"><a href="<?php echo base_url(); ?>">Beranda</a> > Konfirmasi Pembayaran</div>
<h1>Konfirmasi Pembayaran -  An-nas Via Production</h1>
<div class="cleaner_h10"></div>
<form method="post" action="<?php echo base_url(); ?>konfirmasi/kirim"><table width=100%>
	<tr><td width=170>Nama Lengkap</td><td>:</td><td><input type="text" name="nama" size="50" class="input-teks"></td></tr>
	<tr><td width=170>Email</td><td>:</td><td><input type="text" name="email" size="50" class="input-teks"></td></tr>
	<tr><td width=170>No. Telpon</td><td>:</td><td><input type="text" name="telpon" size="50" class="input-teks"></td></tr>
	<tr><td width=170>Jumlah Pembayaran</td><td>:</td><td><input type="text" name="jumlah" size="50" class="input-teks"></td></tr>
	<tr><td width=170>Tanggal Pembayaran</td><td>:</td><td><input type="text" name="tanggal" id="tanggal" size="50" class="input-teks"></td></tr>
	<tr><td width=170>No. Rekening Bank Anda</td><td>:</td><td><input type="text" name="norekening" size="50" class="input-teks"></td></tr>
	<tr><td width=170>Nama Reknening Anda</td><td>:</td><td><input type="text" name="namarekening" size="50" class="input-teks"></td></tr>
	<tr><td width=170>Bank Tujuan</td><td>:</td><td>
	<select name="bank" class="input-teks">
		 <option value="Bank Central Asia - No. Rek 1800658299">Bank Central Asia - No. Rek 1800658299</option>
		<option value="Bank Mandiri - No. Rek 143-00-1170047-1">Bank Mandiri - No. Rek 143-00-1170047-1</option>
		<option value="Bank BRI - No. Rek 6125-01-003271-53-9">Bank BRI - No. Rek 6125-01-003271-53-9</option>
		<option value="Bank Mandiri Syariah - No. Rek 2857027105">Bank Mandiri Syariah - No. Rek 2857027105</option>
	</select>
	</td></tr>
	<tr><td width=170>Metode Pembayaran</td><td>:</td><td>
	<select name="metode" class="input-teks"><option value="Setoran Tunai, Transfer Bank">Setoran Tunai, Transfer Bank</option>
		<option value="Setoran Tunai, Transfer Antar Bank">Setoran Tunai, Transfer Antar Bank</option>
		<option value="ATM">ATM</option>
		<option value="ATM - Antar Bank">ATM - Antar Bank</option>
		<option value="Internet Banking">Internet Banking</option>
		<option value="Internet Banking - Antar Bank">Internet Banking - Antar Bank</option>
		<option value="SMS Banking">SMS Banking</option>
		<option value="SMS Banking - Antar Bank">SMS Banking - Antar Bank</option>
	</select>
	</td></tr>
	<tr><td width=170></td><td></td><td><?php echo $gbr_captcha; ?></td></tr>
	<tr><td width=170>Kode Captcha</td><td>:</td><td><input type="text" name="captcha" size="50" class="input-teks"s></td></tr>
	<tr><td width=170></td><td></td><td><input type="submit" class="input-tombol" onclick="MM_validateForm('nama','','R','email','','RisEmail','telpon','','RisNum','jumlah','','R','tanggal','','R','norekening','','R','namarekening','','R','kode','','R');return document.MM_returnValue" value="Kirim Konfirmasi" > 
	<input type="reset" value="Batal" class="input-tombol" ></td></tr>
	
	</table>
	</form>
<div class="cleaner_h20"></div>
</div>
