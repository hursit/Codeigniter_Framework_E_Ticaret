<div id="notification"></div>
	<h1>Sepetim</h1>
  <div class="breadcrumb">
        <a href="{base_url}">Anasayfa</a>
      </div>

<?php
	if($bilgilendirme!=""){ 
echo "<h2 style='color:red;background-color: #f7fafd; border-top: 2px solid #b5d3ff; border-bottom: 2px solid #b5d3ff;'>".$bilgilendirme."</h2>";
}?>
<div id="content"> 
    <div class="cart-info">
      <table>
        <thead>
          <tr>
            <td class="image">Resim</td>
            <td class="name">Urun Adı</td>
            <td class="quantity">Adet</td>
            <td class="price">Birim Ücret</td>
            <td class="total">Toplam Ücret</td>
          </tr>
        </thead>
        <tbody>


<?php foreach($sepetim as $urun){ ?>
            <tr>
            <td class="image">         
	     <a href="#"><img style="width:50px;height:50px" src="{base_url}images/urunler/150x150/<?php echo $urun['options']['resim']?>" alt="" title="" /></a>
            </td>
            <td class="name"><a href=""><?php echo $urun['name']; ?></a>
                            <div>
                              </div>
            </td>

            <td>

<form action="{base_url}index.php/sayfa/sepet_urun_adedi_yenile" method="post">
	<input type="text" name="adet" value="<?php echo $urun['qty']; ?>" size="1" />
	<input type="hidden" name="id" value="<?php echo $urun['id']; ?>" size="1" />    
	<input type="submit" class="button" value="yenile">
</form>
            <a class="button" href='{base_url}index.php/sayfa/sepet_urun_sil/<?php echo $urun['id']; ?>'>Sil</a>
	   </td>
            <td class="price"><?php echo $urun['price']; ?> TL</td>
            <td class="total"><?php echo $urun['subtotal']; ?> TL</td>
          </tr><?php echo "<br>";} ?>
                            </tbody>
      </table>
    </div>
    <div class="mini-cart-total">
      <table>
         <tr>
          <td align="right"><b>Toplam:</b></td>
          <td align="right">{fiyat} TL</td>
        </tr>
              </table>
    </div>

  <div class="buttons">
    <div class="right"><a href="{base_url}index.php/sayfa/alisverisi_tamamla" class="button">Alışverişi Tamamla</a></div>
    <div class="center"><a href="{base_url}" class="button">Alışverişe Devam</a></div>
  </div>
  </div>

