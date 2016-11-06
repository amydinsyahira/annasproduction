<?php
		foreach($det->result_array() as $tst)
		{
				echo '<div class="tampil-testi">
	<table celpadding=5 width=100%>
	<tr><td valign="top" width=60>Nama</td><td valign="top" width=5>:</td><td valign="top">'.$tst['nama'].'</td></tr>
	<tr><td valign="top" width=60>Waktu</td><td valign="top" width=5>:</td><td valign="top">'.$tst['waktu'].'</td></tr>
	<tr><td valign="top" width=60>Email</td><td valign="top" width=5>:</td><td valign="top">'.$tst['email'].'</td></tr>
	<tr><td valign="top" width=60>Pesan</td><td valign="top" width=5>:</td><td valign="top">'.$tst['pesan'].'</td></tr>
	</table>
	</div>';
		}
?>