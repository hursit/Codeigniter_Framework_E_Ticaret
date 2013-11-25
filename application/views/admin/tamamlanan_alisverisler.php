<section id="main" class="column">
	<?php if($bilgilendirme!=""){
		echo "<h4 class='alert_info'>".$bilgilendirme."</h4>
			<div class='clear'></div>";	
	} ?>

	<article class="module width_full">

	<table class="table table-hover">
	 <thead>
<tr>
<th>İsim</th>
<th>Soyisim</th>
<th>Fiyat</th>
<th>Zaman</th>
<th></th>
</tr>
</thead>

<?php 
	foreach($alisverisler as $alisveris){
?>
<tbody>
	<tr>
		<td><?php echo $alisveris['kullanici'][0]['isim'];?></td>
			<td><?php echo $alisveris['kullanici'][0]['soyisim'];?></td>
			<td><?php echo $alisveris['zaman'];?></td>
			<td><?php echo $alisveris['fiyat'];?> TL</td>
			<td><a  class='btn btn-small btn-primary' href="<?php echo base_url().'index.php/admin/tamamlanan_alisveris_detayli_goruntule/'.$alisveris['id'];?>">Goruntule</a>
<a  class='btn btn-small btn-primary' href="<?php echo base_url().'index.php/admin/alisveris_tamamlanmadi_yap/'.$alisveris['id'];?>">Gelenlere At</a>
<a  class='btn btn-small btn-primary' href="<?php echo base_url().'index.php/admin/tamamlanan_alisveris_sepet_sil/'.$alisveris['id'];?>">Sil</a></td>
		</tr>
</tbody>

<?php } ; ?>
</table>

</article>
</section>

