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



<div id="content">    <div class="wishlist-info">
    <table>
      <thead>
        <tr>
          <td class="name">Sepet Oluşturulma Zamanı</td>
          <td class="model">Durum</td>
          <td class="price">Fiyat</td>
        </tr>
      </thead>
            <tbody id="wishlist-row42">
        <?php foreach($alisverisler as $alisveris){
		echo "<tr>
          
          <td class=''><a href='{base_url}index.php/sayfa/tamamlanan_alisveris_listesi/".$alisveris['id']."'>".$alisveris['zaman']."</a></td>
          <td class='stock'>".$alisveris['durum']."</td>
          <td class='price'>            <div class='price'>
                            <b>".$alisveris['fiyat']."</b>
                          </div>
            </td>
        </tr>"; }?>
      </tbody>
          </table>
  </div>
  <div class="buttons">
    <div class="right"><a href="{base_url}index.php/sayfa/profilim" class="button">Profilim</a></div>
  </div>
    </div>

