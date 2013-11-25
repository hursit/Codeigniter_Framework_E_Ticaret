<section id='main' class='column'>

<?php if($bilgilendirme!=""){
echo "<h4 class='alert_info'>".$bilgilendirme."</h4>
	<div class='clear'></div>";
	
}
 ?>

<article class='module width_full'>


<table border="0">
<tr>
	
<?php
if(isset($urunler[0][0])){$i=1;
	foreach($urunler as $urun)
	{
		
		?>
		<td>
		<table class="table table-hover">
			<tr>
			<td><img class="img-rounded" style="width:200px;height:140px;" src='<?php echo base_url()."images/urunler/150x150/".$urun[1][0]['isim']; ?>' 
			</td></tr><tr><td style="width:50px">

<input  class='btn btn-primary'  type='button' style="float:left;" onClick="location.href='<?php echo base_url()."index.php/admin/urun_duzenle/".$urun[0]['id']?>'" value='Duzenle'>
<input  class='btn btn-primary'  type='button' style="float:right;" onClick="location.href='<?php echo base_url()."index.php/admin/urun_sil/".$urun[0]['id']."/".$urun[0]['kategori_id'];?>'" value='Sil'>
</td></tr></table>
	</td>
			      
	<?php 
		if($i%3 == 0){
			echo "</tr><tr>";
		}
	$i = $i+1;
	}
echo "<br><br>";} ?>

</tr>
</table>


</article>
</section>

