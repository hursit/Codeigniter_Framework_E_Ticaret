<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
 //<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>	
	<section id="main" class="column">
		
				<?php if($bilgilendirme!=""){
				echo "<h4 class='alert_info'>".$bilgilendirme."</h4>
					<div class='clear'></div>";	
} ?>

		<div class="clear"></div>
	<form action="urun_kaydet" method="post" enctype="multipart/form-data" > 
					
		<article class="module width_full">
			<header><h3>Yeni Urun</h3></header>
				<div class="module_content">


						<fieldset>
							<label>Isim</label>
							<input type="text" name="isim">
						</fieldset>
						<fieldset>
							<label>Stok</label>
							<input type="text" name="stok">
						</fieldset>
						<fieldset>
							<label>İndirimsiz Fiyat</label>(Eger urun indirimde ise indirimsiz hali.İndirimde değilse boş bırakınız)
							<input type="text" name="indirimsiz_fiyati">
						</fieldset>
						<fieldset>
							<label>Fiyat</label>(Eger urun indirimde ise indirimli hali.İndirimde değilse fiyatı)
							<input type="text" name="fiyat">
						</fieldset>

						<fieldset>
							<label>Detay</label>
<div class="clear"></div>
							<textarea class='area1' name="detay" rows="12"></textarea>
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Kategori</label>
							<select name='kategori_id' style="width:92%;">
								<?php foreach($kategoriler as $kategori){
		
									  echo "<option value='".$kategori['id']."'>".$kategori['isim']."</option>";
									}
								?>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;"> 
							<label>Resimler</label>
<?php
for ($i=1;$i<=9;$i++){
	echo "<input type='file' name='resim".$i."'/>";
}?>
							
						</fieldset><div class="clear"></div>
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


