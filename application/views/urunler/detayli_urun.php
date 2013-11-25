 <script type="text/javascript" src="{base_url}styles/js/jquery.lightbox-0.5.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="{base_url}styles/css/jquery.lightbox-0.5.css" media="screen" />
    <script type="text/javascript">
	$(function() {
		$('#gallery a').lightBox({fixedNavigation:true});
	});
    </script>


<div id="notification"></div>
  <h1><?php echo $urun['urun'][0]->isim; ?></h1>
  <div class="breadcrumb">
        <a href="{base_url}">Anasayfa</a>
      </div>
<div id="column-left"">
    <div class="box">
  <div class="box-heading">Kategoriler</div>
  <div class="box-content">
    <div class="box-category">
      <ul>
                <li>
       
	<!-- Sol Menu -->
                <?php
			foreach($kategoriler as $kategori){
		
				echo "<li><a   style='color:#7DB122' href='{base_url}index.php/sayfa/kategori/".$kategori[0]."'>".$kategori[1]."(".$kategori[2].")</a></li>";}
		?>
                          </li>
                      </ul>
                  </li>
              </ul>
    </div>
  </div>
</div>
    <div class="box">
  <div class="box-heading">İndirimde</div>
  <div class="box-content">
    <div class="box-lsb">
           <?php foreach($sol_menu_indirimdekiler as $indirimdeki_urun){
?> 
            <div>
                <div class="image"><a href="{base_url}index.php/sayfa/detayli_urun/<?php echo $indirimdeki_urun[0]['id'] ;?>">

<img style="width:70px;height:70px;" src="{base_url}images/urunler/150x150/<?php echo $indirimdeki_urun[1][0]['isim']?>" alt="Canon EOS 5D" /></a></div>
                <div class="name"><a style="color:#7DB122"  href="{base_url}index.php/sayfa/detayli_urun/<?php echo $indirimdeki_urun[0]['id'] ;?>"><?php echo $indirimdeki_urun[0]['isim']?></a></div>
                <div class="price">
                    <span class="price-old"><?php echo $indirimdeki_urun[0]['indirimsiz_fiyati'] ?></span><br> <span class="price-new"><?php echo $indirimdeki_urun[0]['fiyat'] ?></span>
                  </div>
              </div>
<?php } ;?>
          </div>
  </div>
</div>
  </div>
<!-- Urun -->
<?php
if($bilgilendirme!=""){ 
echo "<h2 style='color:red;background-color: #f7fafd; border-top: 2px solid #b5d3ff; border-bottom: 2px solid #b5d3ff;'>".$bilgilendirme."</h2>";
}?>
<div style="margin-left:200px">
<div id="content">  <div class="product-info">
        <div class="left">
            <div class="image"><a href="{base_url}images/urunler/orjinal/<?php echo $urun['urun']['resim'][0]['isim'] ; ?>" title="Gunter Tote" class="colorbox" rel="colorbox"><img style="width:200px;height:200px" src="{base_url}images/urunler/orjinal/<?php echo $urun['urun']['resim'][0]['isim'] ; ?>" title="" alt="" id="image" /></a></div>
                </div>
        <div class="right">
      <div class="description">
                <span>Urun id:</span><?php echo $urun['urun'][0]->id; ?><br />
                <span>Stok adedi:</span><?php echo $urun['urun'][0]->stok; ?><br>
            	<span>Tıklanma:</span><?php echo $urun['urun'][0]->tiklanma; ?></div>
            <div class="price">Ucret:             
<?php if ($urun['urun'][0]->indirimsiz_fiyati!=0){
	echo "<span class='price-new'><strike style='color:red'>".$urun['urun'][0]->indirimsiz_fiyati." TL</strike></span>";

};?>


 <?php echo $urun['urun'][0]->fiyat; ?> TL              <br />
                <span class="price-tax"> </span><br />
                              </div>
                  <div class="cart">
<?php
	if($sepet_kontrol[0]){ ?>
	<form action="{base_url}index.php/sayfa/sepeti_guncelle" method="post">
		<div>Adet: <input type="text" name="adet" size="2" value="1" />
          <input type="hidden" name="id" size="2" value="<?php echo $urun['urun'][0]->id; ?>" />
          &nbsp;	<input type='submit' value='Sepete At' class='button' />
          	</div>
	</form>
<?php }; 
if(!$sepet_kontrol[0]){  ?>
		<form action="{base_url}index.php/sayfa/sepete_at" method="post">
		<div>Adet: <input type="text" name="adet" size="2" value="1" />
          <input type="hidden" name="id" size="2" value="<?php echo $urun['urun'][0]->id; ?>" />
          <input type="hidden" name="fiyat" size="2" value="<?php echo $urun['urun'][0]->fiyat; ?>" />
          <input type="hidden" name="isim" size="2" value="<?php echo $urun['urun'][0]->isim; ?>" />
          <input type="hidden" name="resim" size="2" value="<?php echo $urun['urun']['resim'][0]['isim'] ; ?>" />
          &nbsp;	<input type='submit' value='Sepete At' class='button' />
          	</div>
	</form>


<?php };?>
              </div>
            <div class="review">
        <div class="share"><!-- AddThis Button BEGIN -->
<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=300&amp;pubid=ra-514e072765f06ad4"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-514e072765f06ad4"></script>
<!-- AddThis Button END -->
      </div>
      				
	      </div>
  </div>
  <div id="tabs" class="htabs"><a href="#tab-description">Ürün Hakkında</a><a href="#tab-1">Ürün Yorumları</a><a href="#tab-2">Ürün Resimleri</a>
            <a href="#tab-review"></a>
    <!--
    --> 
  </div>
  <div id="tab-description" class="tab-content"><div class="tab-content" id="tab-description" style="display: block;"><br><br>
	<?php echo $urun['urun'][0]->detay; ?>
</div></div>
<p>
	&nbsp;</p>
</div>
<div id="tabs">
   <div style="margin-top:-50px" id="tab-1">
<?php foreach($yorumlar as $yorum){?>
     		<div class="reviewcontent"><?php echo $yorum['zaman'];?> tarihinde &nbsp;&nbsp;<b><?php echo strtoupper($yorum['kullanici']);?> </b>yazdı :<br><br>&nbsp;<div class="reviewstars"></div>  <span class="reviewtext"><?php echo $yorum['yorum'];?></span></div>
<?php }; ?>
  <br>

<?php if($giris){ ?>
    <h2 id="review-title" style="color:red">Yeni Yorum Yazın.</h2>
    <b>Yorum:</b>
<form action="{base_url}index.php/sayfa/yorum_kaydet" method="post">
    <input type="hidden" name="urun_id" value="<?php echo $urun['urun'][0]->id; ?>">
    <input type="hidden" name="user_id" value="<?php echo $kullanici['id']; ?>">
    <textarea name="yorum" cols="40" rows="8" style="width: 98%;"></textarea>
    <br />
    <br />
	<input type="submit"  value="Gönder">
</form>
<?php }; ?>
</div>
   <div style="margin-top:-50px" id="tab-2">
   
<div id="gallery">
<center>
<?php
foreach($urun['urun']['resim'] as $urunumuz){ ?>
	<a href="{base_url}images/urunler/orjinal/<?php echo $urunumuz['isim']; ?>" title="">
        <img src="{base_url}images/urunler/150x150/<?php echo $urunumuz['isim']; ?>" width="150" height="150" alt="" /></a>
<?php }; ?>           		
     </center>           </div>
           


   </div>
 </div>

</div>

<script type="text/javascript"><!--
$('.colorbox').colorbox({
	overlayClose: true,
	opacity: 0.5
});
//--></script> 
<script type="text/javascript"><!--
$('#button-cart').bind('click', function() {
	$.ajax({
		url: 'index.php?route=checkout/cart/add',
		type: 'post',
		data: $('.product-info input[type=\'text\'], .product-info input[type=\'hidden\'], .product-info input[type=\'radio\']:checked, .product-info input[type=\'checkbox\']:checked, .product-info select, .product-info textarea'),
		dataType: 'json',
		success: function(json) {
			$('.success, .warning, .attention, information, .error').remove();
			
			if (json['error']) {
				if (json['error']['option']) {
					for (i in json['error']['option']) {
						$('#option-' + i).after('<span class="error">' + json['error']['option'][i] + '</span>');
					}
				}
			} 
			
			if (json['success']) {
				$('#notification').html('<div class="success" style="display: none;">' + json['success'] + '<img src="catalog/view/theme/theia/image/close.png" alt="" class="close" /></div>');
					
				$('.success').fadeIn('slow');
					
				$('#cart-total').html(json['total']);
				
				$('html, body').animate({ scrollTop: 0 }, 'slow'); 
			}	
		}
	});
});
//--></script>
<script type="text/javascript">
$(function() {
    $('select.styled').customStyle();
});
</script>
<script type="text/javascript"><!--
$('#review .pagination a').live('click', function() {
	$('#review').fadeOut('slow');
		
	$('#review').load(this.href);
	
	$('#review').fadeIn('slow');
	
	return false;
});			

$('#review').load('index.php?route=product/product/review&product_id=53');

$('#button-review').bind('click', function() {
	$.ajax({
		url: 'index.php?route=product/product/write&product_id=53',
		type: 'post',
		dataType: 'json',
		data: 'name=' + encodeURIComponent($('input[name=\'name\']').val()) + '&text=' + encodeURIComponent($('textarea[name=\'text\']').val()) + '&rating=' + encodeURIComponent($('input[name=\'rating\']:checked').val() ? $('input[name=\'rating\']:checked').val() : '') + '&captcha=' + encodeURIComponent($('input[name=\'captcha\']').val()),
		beforeSend: function() {
			$('.success, .warning').remove();
			$('#button-review').attr('disabled', true);
			$('#review-title').after('<div class="attention"><img src="catalog/view/theme/theia/image/loading.gif" alt="" /> Please Wait!</div>');
		},
		complete: function() {
			$('#button-review').attr('disabled', false);
			$('.attention').remove();
		},
		success: function(data) {
			if (data['error']) {
				$('#review-title').after('<div class="warning">' + data['error'] + '</div>');
			}
			
			if (data['success']) {
				$('#review-title').after('<div class="success">' + data['success'] + '</div>');
								
				$('input[name=\'name\']').val('');
				$('textarea[name=\'text\']').val('');
				$('input[name=\'rating\']:checked').attr('checked', '');
				$('input[name=\'captcha\']').val('');
			}
		}
	});
});
//--></script> 
<script type="text/javascript"><!--
$('#tabs a').tabs();
//--></script> 
<script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-timepicker-addon.js"></script> 
<script type="text/javascript"><!--
if ($.browser.msie && $.browser.version == 6) {
	$('.date, .datetime, .time').bgIframe();
}

$('.date').datepicker({dateFormat: 'yy-mm-dd'});
$('.datetime').datetimepicker({
	dateFormat: 'yy-mm-dd',
	timeFormat: 'h:m'
});
$('.time').timepicker({timeFormat: 'h:m'});
//--></script>
