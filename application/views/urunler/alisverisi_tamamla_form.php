<link rel="stylesheet" href="<?php echo base_url();?>styles/css/layout.css" type="text/css" media="screen" />
	
	<section id="main" class="column">
		
				<?php if($bilgilendirme!=""){
				echo "<h4 class='alert_info'>".$bilgilendirme."</h4>
					<div class='clear'></div>";	
} ?>

		<div class="clear"></div>
	<form action="{base_url}index.php/sayfa/alisverisi_tamamla" method="post" enctype="multipart/form-data" > 
					
		<article class="module width_full">
			<header><h3 style="font-weight:bold">Alışverişi Tamamla</h3></header>
				<div class="module_content">

						<input type="hidden" name="user_id" value="<?php echo $uye[0]['id'])?>">
						<fieldset>
							<label>Isim :</label><input type="text" value="<?php echo $uye[0]['isim'];?>" readonly>
							
						</fieldset>
						<fieldset>
							<label>Soyisim :</label>
							<input type="text" value="<?php echo $uye[0]['soyisim'];?>" readonly>
						</fieldset>
						<fieldset>
							<label>Email :</label>
							<input type="text" value="<?php echo $uye[0]['email'];?>" readonly>
							
						</fieldset>
						<fieldset>
							<label>Numara :</label>
							<input type="text" value="<?php echo $uye[0]['telefon'];?>">
						</fieldset>

						<fieldset>
							<label>Adres</label>
<div class="clear"></div>
							<textarea class='area1' style="font-color:red" name="adres" rows="12"><?php echo $uye[0]['adres'];?></textarea>
						</fieldset>

						<fieldset>
							<label>Sepetteki Urunler :</label>
<div class="clear"></div>
							<textarea class='area1' style="font-color:red" rows="12">
<?php
foreach($sepetim as $urun){ ?>
<?php echo $urun['name'] ?> X <?php echo $urun['qty'] ?> Adet
<?php };
?>
							</textarea>
						</fieldset>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Alışverişi Tamamla" class="alt_btn">
				</div>
			</footer>
		</article><!-- end of post new article -->
		
		</form>
		<div class="spacer"></div>
	</section>


	
