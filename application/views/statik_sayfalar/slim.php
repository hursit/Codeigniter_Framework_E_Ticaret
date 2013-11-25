<div id="notification"></div>
<h1 style="display: none;">Your Store</h1>
<div id="content"><div class="slideshow">
  <div id="slideshow0" class="nivoSlider" style="width: 960px; height: 430px; position: relative;">

<!-- Manset alanımız  -->
<?php
foreach( $manset as $resim){
echo " <a style='display: block;' class='nivo-imageLink' href='#'><img style='width:960px;height:430px;display: none;' src='".$base_url."images/manset/".$resim['isim']."' alt='Elit Hediyelik'></a>";}?>
     
</div>
<script type="text/javascript"><!--
$(document).ready(function() {
	$('#slideshow0').nivoSlider();
});
--></script><div class="flhomepage">
  <div class="flhomepage-heading">İndirimdeki Ürünler</div>
  <div class="flhomepage-content">
    <div class="flhomepage-box">

<!-- Son Urunler -->
<?php
$i=0;
	foreach((array)$son_urunler as $urun){
	if($i == 5){echo "<br>";} ?>
	<div>
		        <div class='image'><a href='{base_url}index.php/sayfa/detayli_urun/<?php echo $urun[0]['id'];?>'><img style='width:150px;height:100px;' src='{base_url}images/urunler/150x150/<?php echo $urun[1][0]['isim'];?>' </a></div>
		        <div class='name'><a href='{base_url}index.php/sayfa/detayli_urun/<?php  echo $urun[0]['id'];?> '>
	<?php echo $urun[0]['isim'];?></a></div>
		        <div class='price'>

	<?php if ($urun[0]['indirimsiz_fiyati']!=0){
			echo "<span class='price-new'><strike style='color:red'>".$urun[0]['indirimsiz_fiyati']." TL</strike></span><br>";
	}; ?>
				  
	<?php  echo $urun[0]['fiyat']?> TL</div>
		      </div>
	<?php $i=$i+1;};
?> 
  </div>
</div>

<script type="text/javascript"><!--
$('#carousel0 ul').jcarousel({
	vertical: false,
	visible: 5,
	scroll: 3});
//--></script></div>

