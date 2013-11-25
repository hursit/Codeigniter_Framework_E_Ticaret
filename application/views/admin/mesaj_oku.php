</script>	
	<section id="main" class="column">
		
				<?php if($bilgilendirme!=""){
				echo "<h4 class='alert_info'>".$bilgilendirme."</h4>
					<div class='clear'></div>";	
} ?>

		<div class="clear"></div>
		<article class="module width_full">
			<header><h3>Gelen Mesaj</h3></header>
				<div class="module_content">


						<fieldset>
							<label>Isim</label>
							<input type="text" value="<?php echo $mesaj[0]['isim']; ?>" readonly>
						</fieldset>
						<fieldset>
							<label>Soyisim</label>
							<input type="text" value="<?php echo $mesaj[0]['soyisim']; ?>" readonly>
						</fieldset>
						<fieldset>
							<label>Telefon</label>
							<input type="text" value="<?php echo $mesaj[0]['telefon']; ?>" readonly>
						</fieldset>
						<fieldset>
							<label>Email</label>
						<input type="text" value="<?php echo $mesaj[0]['email']; ?>" readonly>
						</fieldset>

						<fieldset>
							<label>Mesaj</label>
<div class="clear"></div>
							<textarea class='area1' rows="12"  readonly><?php echo $mesaj[0]['mesaj']; ?></textarea>
						</fieldset>

				</div>
<center><a  class="btn btn-large btn-primary" href="">Gelen Mesajlar</a></center>
<br>		</article>
		
		</form>
		<div class="spacer"></div>
	</section>



