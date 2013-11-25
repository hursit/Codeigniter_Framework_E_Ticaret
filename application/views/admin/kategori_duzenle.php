<section id="main" class="column">
		
			<?php if($bilgilendirme!=""){
				echo "<h4 class='alert_info'>".$bilgilendirme."</h4>
					<div class='clear'></div>";	
} ?>
	<form action="<?php echo base_url();?>index.php/admin/kategori_duzenleme_kaydet" method="post" enctype="multipart/form-data" > 
					
		<article class="module width_full">
			<header><h3>Kategori Duzenle</h3></header>
				<div class="module_content">


						<fieldset>
							<label>Isim</label>
							<input type="text" value="<?php echo $kategori_isim;?>" name="kategori">
							<input type="hidden" value="<?php echo $kategori_id;?>" name="id">
						</fieldset>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Publish" class="alt_btn">
				</div>
			</footer>
		</article>
		
		</form>
		<div class="spacer"></div>
	</section>


