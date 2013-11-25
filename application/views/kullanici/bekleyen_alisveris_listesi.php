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
          <td class="image">Resim</td>
          <td class="name">Urun İsmi</td>
          <td class="model">Adet Fiyat</td>
          <td class="stock">Adet</td>
          <td class="price">Toplam Fiyat</td>
        </tr>
      </thead>
<?php foreach($urunler as $urun){
	echo "
            <tbody id='wishlist-row42'>
        <tr>
          <td class='image'>            <img style='width:50px;height:50px
' src='{base_url}images/urunler/150x150/".$urun['resim']."'/>
            </td>
          <td class='name'><a href='#'>".$urun['urun_isim']."</a></td>
          <td class='model'>".$urun['fiyat']."</td>

          <td class='stock'>".$urun['adet']."</td>
          <td class='price'>            <div class='price'>
                             <b>".$urun['fiyat']*$urun['adet']." TL</b>
                          </div>
            </td>
         
        </tr>
      </tbody>";} ?>          </table>
  </div>
  <div class="buttons">
    <div class="right"><a href="{base_url}index.php/sayfa/bekleyen_alisverisler" class="button">Bekleyen Alışverişler</a></div>
  </div>
    </div>
<?php
	print_r($urunler);
?>
