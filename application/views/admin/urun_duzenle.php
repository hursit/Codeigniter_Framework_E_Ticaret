	<section id="main" class="column">
		

		<div class="clear"></div>
	<form action="<?php echo base_url().'index.php/admin/urun_guncelle/'?>" method="post" enctype="multipart/form-data"> 
					
		<article class="module width_full">
			<header><h3>Urun Duzenle</h3></header>
				<div class="module_content">
						<fieldset>
							<label>Isim</label>
							<input type="text" name="isim" value="<?php echo $urun['urun'][0]->isim?>" >
						</fieldset>
							<input type="hidden" name="id" value="<?php echo $urun['urun'][0]->id?>" >
						
						<fieldset>
							<label>Stok</label>
							<input type="text" name="stok" value="<?php echo $urun['urun'][0]->stok?>">
						</fieldset>
						<fieldset>
							<label>İndirimsiz Fiyat</label>
							<input type="text" name="indirimsiz_fiyati" value="<?php echo $urun['urun'][0]->indirimsiz_fiyati?>">
						</fieldset>
						<fieldset>
							<label>Fiyat</label>
							<input type="text" name="fiyat" value="<?php echo $urun['urun'][0]->fiyat?>">
						</fieldset>

						<fieldset>
							<label>Detay</label>
							<textarea name="detay" rows="12"><?php echo $urun['urun'][0]->detay?></textarea>
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;"> 
							<label>Kategori</label>
							<select name="kategori_id" style="width:92%;">
								<?php foreach($kategoriler as $kategori){
									if($kategori['id'] == $urun['urun'][0]->kategori_id){
		  echo "<option value='".$kategori['id']."' selected>".$kategori['isim']."</option>";
									}
									else{  
									echo "<option value='".$kategori['id']."'>".$kategori['isim']."</option>";
		

									}
								}
								?>
							</select>
					
						</fieldset>
						<fieldset style="width:48%; float:left;"> 
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


