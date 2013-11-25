
	
	<section id="main" class="column">
		
			<?php if($bilgilendirme!=""){
				echo "<h4 class='alert_info'>".$bilgilendirme."</h4>
					<div class='clear'></div>";	
} ?>
	<form action="kategori_kaydet" method="post" enctype="multipart/form-data" > 
					
		<article class="module width_full">
			<header><h3>Kategori Ekle</h3></header>
				<div class="module_content">


						<fieldset>
							<label>Isim</label>
							<input type="text" name="kategori">
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


