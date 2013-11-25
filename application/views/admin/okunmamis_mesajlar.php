
<table class="table table-hover">
	 <thead>
<tr>
<th>İsim</th>
<th>Soyisim</th>
<td>Telefon</td>
<th>Email</th>
<th>Mesaj(25 Karakter)</th>
<th></th>
</tr>
</thead>

<?php


foreach($okunmamis_mesajlar as $mesaj){
	echo "
		<tbody><tr>
			<td>".$mesaj['isim']."</td>
			<td>".$mesaj['soyisim']."</td>
			<td>".$mesaj['telefon']."</td>
			<td>".$mesaj['email']."</td>
			<td>".$mesaj['mesaj']."</td>
			<td>

				<a class='btn btn-primary' href='".base_url()."index.php/admin/okunmamis_mesaj_oku/".$mesaj['id']."'>Oku</a>
				<a class='btn btn-primary' href='".base_url()."index.php/admin/mesaj_sil/".$mesaj['id']."/'>Sil</a>


			</td>
		</tr></tbody>
	";
}

?>
</table>
