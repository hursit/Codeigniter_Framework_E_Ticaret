<section id="main" class="column">
		
		<h4 class="alert_info">Bu kategoriyi silerseniz, aşağıdaki ürünler de silinecektir.</h4>

		<div class="clear"></div>
		
		<article class="module width_full">
			<header><h3>Urunler</h3></header>
				<div class="module_content">
					<?php 
						foreach($silinecekler as $urun){

						echo $urun['isim']."<br>";


					}?>
				</div>
			<footer>
				<div class="submit_link">
					<form method="get" action="<?php echo base_url()?>index.php/admin/kategori_sil" />
					<input type="hidden" name="id" value="<?php echo $kategori_id ;?>">
					<input type="submit" value="Sil" class="alt_btn">
				</div>
			</footer>
		</article>
		
		
		<div class="spacer"></div>
	</section>

