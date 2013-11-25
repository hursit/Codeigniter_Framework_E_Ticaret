<div style="font-family: Arial, sans-serif;font-size: 18px;color: #369;padding-bottom: 4px;border-bottom: 1px solid #999;"><span style="font-weight:bold">Uye İsim :</span></weight><?php echo $alisverisler[0]['kullanici'][0]['isim'];?></div>

<div style="font-family: Arial, sans-serif;font-size: 18px;color: #969;padding-bottom: 4px;border-bottom: 1px solid #999;"><span style="font-weight:bold">Uye Soyisim :</span><?php echo $alisverisler[0]['kullanici'][0]['soyisim'];?></div>

<div style="font-family: Arial, sans-serif;font-size: 18px;color: #419;padding-bottom: 4px;border-bottom: 1px solid #999;"><span style="font-weight:bold">Telefon:</span><?php echo $alisverisler[0]['kullanici'][0]['telefon'];?></div>

<div style="font-family: Arial, sans-serif;font-size: 18px;color: #419;padding-bottom: 4px;border-bottom: 1px solid #999;"><span style="font-weight:bold">Email :</span><?php echo $alisverisler[0]['kullanici'][0]['email'];?></div>

<div style="font-family: Arial, sans-serif;font-size: 18px;color: #419;padding-bottom: 4px;border-bottom: 1px solid #999;"><span style="font-weight:bold">Adres :</span><?php echo $alisverisler[0]['kullanici'][0]['adres'];?></div>


<hr><br>


<table class="table table-hover">
	 <thead>
		<tr>
			<th>Urun-İsim</th>
			<th>Adet</th>
			<th>Tane Fiyat</th>
			<th>Resim</th>
		</tr>
		</thead>



<?php foreach($alisverisler[0]['urunler'] as $urun){
echo "<tbody><tr><td>".$urun['urun_isim']."</td>
	<td>".$urun['adet']."</td>
	<td>".$urun['fiyat']." TL</td>
	<td><img style='height:60px;width:60px' src='".base_url()."images/urunler/150x150/".$urun['resim']."' ></td></tr></tbody>";
}?>
</table>
<center><a class="btn btn-large btn-primary" href="<?php echo base_url().'index.php/admin/sepet_onayla/'.$alisverisler[0]['id']; ?> ">Alışverişi Tamamla</a> <a class="btn btn-large btn-primary" href="<?php echo base_url().'index.php/admin/sepet_sil/'.$alisverisler[0]['id']; ?> ">Sil</a>
</center>
