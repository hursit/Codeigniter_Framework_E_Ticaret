
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>{title}</title>
<meta name="description" content="My Store" />
<link href="{base_url}images/cart.png" rel="icon" />
<link rel="stylesheet" type="text/css" href="{base_url}styles/css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="{base_url}styles/css/slideshow.css" media="screen" />
<link rel="stylesheet" type="text/css" href="{base_url}styles/css/carousel.css" media="screen" />
<script type="text/javascript" src="{base_url}styles/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="{base_url}styles/js/jquery-ui-1.8.16.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="{base_url}styles/css/jquery-ui-1.8.16.custom.css" />
<script type="text/javascript" src="{base_url}styles/js/jquery.cookie.js"></script>
<script type="text/javascript" src="{base_url}styles/js/jquery.colorbox.js"></script>
<link rel="stylesheet" type="text/css" href="{base_url}styles/css/colorbox.css" media="screen" />
<script type="text/javascript" src="{base_url}styles/js/tabs.js"></script>
<script type="text/javascript" src="{base_url}styles/js/common.js"></script>
<script type="text/javascript" src="{base_url}styles/js/custom.js"></script>
<script type="text/javascript" src="{base_url}styles/js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="{base_url}styles/js/jquery.jcarousel.min.js"></script>
</head>
<body>
    
   
<div id="container">
<div id="header">
    <div id="logo"><a href="{base_url}"><img src="{base_url}images/logo.png" title="Your Store" alt="Your Store" /></a></div>
    
  <div id="cart">
  <div class="heading">Alışverişleriniz :&nbsp;&nbsp;<a><span id="cart-total">{adet} ürün(ler) - {fiyat} TL</span></a></div>
 <div class="content">
        <div class="mini-cart-info">
<table border="0">
<?php
foreach($sepetim as $urun){
echo "<tr><td>".$urun['name']."</td><td style='color:red'> x </td><td>".$urun['qty']."</td><td style='color:red'> = </td><td>".$urun['subtotal']."</td></tr>";}
?>
</table>
	</div><div class="mini-cart-total">
      <table>
         <tr>
          <td align="right"><b>Toplam:</b></td>
          <td align="right">{fiyat} TL</td>
        </tr>
     </table>
    </div>
    <div class="checkout"><a href="{base_url}index.php/sayfa/sepetim">Sepetim</a><?php if($fiyat){ ?> <a href="{base_url}index.php/sayfa/alisverisi_tamamla">Alışverişi Tamamla</a><?php ;} ?></div>
      


      </div>
</div>
  <div id="search">
    <div class="button-search"></div>
        <input type="text" name="filter_name" value="Arama Yap" onclick="this.value = '';" onkeydown="this.style.color = '#444444';" />
      </div>
  <div class="links">
    <?php if ($giris){?>
     <a style="color:#7DB122" href='#'><?php echo "Hosgeldiniz, ".ucfirst($kullanici['isim']).' '.ucfirst($kullanici['soyisim']);  ?></a>
<a href="{base_url}index.php/sayfa/profilim">Profilim</a>
<a href="{base_url}index.php/sayfa/sepetim">Sepetim</a>
<a href="{base_url}index.php/sayfa/cikis_yap">Cikis Yap</a>
   <?php } else{ ?>

        <a href="{base_url}index.php/sayfa/kullanici_giris_sayfasi">Uye Giriş/Kayıt</a>

   <?php }; ?>
  
<a href="{base_url}index.php/sayfa/iletisim">İletişim</a></div>
</div>
<div id="menu">
  <ul>
        <li><a href="{base_url}">Anasayfa</a>
          </li>
        <li><a href="{base_url}index.php/sayfa/indirimli_urunler">İndirimli Ürünler</a>
          </li>
        <li><a href="{base_url}index.php/sayfa/populer_urunler">Popüler Ürünler</a>
          </li>
        <li><a href="">Kategoriler</a>
            <div>

<ul>
                <?php	
			
				$i=1;
				foreach((array)$kategoriler as $kategori){
					echo "<li><a href='{base_url}index.php/sayfa/kategori/".$kategori[0]."'>".$kategori[1]."(".$kategori[2].")</a></li>";
					if(intval((count($kategoriler)+1)/2)==$i){echo "</ul><ul>";}
					$i=$i+1;
				};
			?>
</ul>         </div>
          </li>
      </ul>
</div>
