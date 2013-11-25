
	
	
	<section id="main" class="column">
			<?php if($bilgilendirme!=""){
echo "<h4 class='alert_info'>".$bilgilendirme."</h4>
	<div class='clear'></div>";
	
}
 ?>	<form action="urun_kaydet" method="post" enctype="multipart/form-data" > 
					
		<article class="module width_full">
			<header><h3>Kategoriler Listesi</h3></header>

<table class="table table-hover">
	 <thead>
<tr>
<th>İD</th>
<th>İSİM</th>
<th></th>
</tr>
</thead>
<?php
		if(isset($kategoriler[0][0])){
			foreach($kategoriler as $kategori){?>
					<tbody><tr>
						<td><?php echo $kategori[0]; ?></td>	
						<td><?php echo $kategori[1]; ?></td>
						<td><a   class='btn btn-primary' href='<?php echo base_url();?>index.php/admin/kategori_duzenle/<?php echo $kategori[0];?>'>Duzenle</a>
						<a   class='btn btn-primary' href="<?php echo base_url().'index.php/admin/kategori_sil_uyari/'.$kategori[0];?>">Sil</a></td>
					</tr>
				</tbody>
		<?php };}?>

		</article>
		
		</form>
		<div class="spacer"></div>
	</section>


