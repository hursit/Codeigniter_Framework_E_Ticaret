<div id="column-right">
    <div class="box">
  <div class="box-heading">İşlemlerim</div>
  <div class="box-content">
    <ul>
            <li><a href="{base_url}index.php/sayfa/profilim">Profilim</a></li>
        
      <li><a href="{base_url}index.php/sayfa/bilgilerimi_guncelle">Bilgilerimi Guncelle</a></li>
      <li><a href="{base_url}index.php/sayfa/parola_degistir">Sifremi Değiştir</a></li>
			<li><a href="{base_url}index.php/sayfa/bekleyen_alisverisler">Bekleyen Alışverişlerim</a></li>
     <li><a href="{base_url}index.php/sayfa/tamamlanan_alisverisler">Tamamlanan Alışverişlerim</a></li>
            <li><a href="{base_url}index.php/sayfa/cikis_yap">Çıkış</a></li>
          </ul>
	  </div>
	</div>
</div>
<?php
if($bilgilendirme !=""){
	echo "<div class='breadcrumb'>
		      <a href='{base_url}'>".$bilgilendirme."</a>
		    </div>";
}?>
<div id="content">  <form action="{base_url}index.php/sayfa/bilgilerimi_guncelle_kaydet" method="post" enctype="multipart/form-data">
    <h2>Bilgilerimi Güncelle</h2>
    <div class="content">
      <table class="form">
        <tr>
          <td><span class="required">*</span> İsim :</td>
          <td><input type="text" name="isim" value="<?php echo $kullanici['isim'];?>" />
            </td>
        </tr>
        <tr>
          <td><span class="required">*</span> Soyisim :</td>
          <td><input type="text" name="soyisim" value="<?php echo $kullanici['soyisim'];?>" />
            </td>
        </tr>
        <tr>
          <td><span class="required">*</span> Telefon :</td>
          <td><input type="text" name="telefon" value="<?php echo $kullanici['telefon'];?>" />
            </td>
        </tr>
        <tr>
          <td><span class="required">*</span> E-Mail:</td>
          <td><input type="text" name="email" value="<?php echo $kullanici['email'];?>" />
            </td>
        </tr>
				<tr>
          <td><span class="required">*</span> Adres :</td>
          <td><textarea cols="90" rows="5" name="adres" /><?php echo $kullanici['adres'];?></textarea>
            </td>
        </tr>
				
      </table>
    </div>
    <div class="buttons">
      <div class="right">
        <input type="submit" value="Güncelle" class="button" />
      </div>
    </div>
  </form>
  </div>

