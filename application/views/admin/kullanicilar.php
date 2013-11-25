

<table class="table table-hover">
	 <thead>
<tr>
<th>İsim</th>
<th>Soyisim</th>
<th>Email</th>
<th>Kayıt Zaman</th>
<th></th>
</tr>
</thead>
<?php
 foreach($kullanicilar as $kullanici){
	echo "	<tbody><tr>
						<td>".$kullanici['isim']."</td>
						<td>".$kullanici['soyisim']."</td>
						<td>".$kullanici['email']."</td>
						<td>".$kullanici['kayit_zamani']."</td>
					</tr></tbody>";
	}
?>



