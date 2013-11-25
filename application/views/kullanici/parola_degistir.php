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


<div id="content">  
<form action="{base_url}index.php/sayfa/parola_degistir_kaydet" method="post">
    <h2>Şifremi Değiştir</h2>
    <div class="content">
			<table class="form">
       <tr>
      <td><span class="required">*</span> Parola:</td>
      <td><input type="password" name="parola"/>
    </td>
    </tr>
    <tr>
      <td><span class="required">*</span> Parola Tekrarı:</td>
      <td><input type="password" name="parola_tekrari"/>
        </td>
    </tr>
  </table>
		<div class="buttons">
      <div class="right">
        <input type="submit" value="Parolayı Değiştir" class="button" />
      </div>
    </div>
 </div>
</form>
  </div>







