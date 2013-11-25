<style type="text/css">
        a{color:#21759B;text-decoration:none;}

        #table th{background:#eee;padding:5px;text-align:left; vertical-align: top; }
        #table td{padding:5px; border-bottom: 1px solid #c3c3c3; vertical-align: top; }
        #table{ -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; width:500px; border:1px solid #c3c3c3;}
        #table tr:hover{ background: #bed9ee;}

        .pagination{margin-top:20px;text-align:center}
        .pagination a, .pagination span{background: #fff;padding:5px;margin:2px;border:1px solid #d9d9d9;font-weight: bold;text-decoration:none;-moz-border-radius:3px;-webkit-border-radius: 3px;}
    </style>


<div id="notification"></div>
  <h1>İndirimli Ürünler</h1>
  <div class="breadcrumb">
        <a href="{base_url}">Anasayfa</a>

      </div>
<div id="column-left">
    <div class="box">
  <div class="box-heading">Kategoriler</div>
  <div class="box-content">
    <div class="box-category">
      <ul>              
                <?php
				foreach((array)$kategoriler as $kategori){
					echo "<li><a  style='color:#7DB122' href='{base_url}index.php/sayfa/kategori".$kategori[0]."'>".$kategori[1]."(".$kategori[2].")</a></li>";};
		?>
              </ul>
    </div>
  </div>
</div>
    <div class="box">
  		

		<div class="box-heading">İndirimde</div>
			<div class="box-content">
				<div class="box-lsb">
				       <?php 
						foreach((array)$sol_menu_indirimdekiler as $indirimdeki_urun){
		?> 
				        <div>
				            <div class="image"><a href="{base_url}index.php/sayfa/detayli_urun/<?php echo $indirimdeki_urun[0]['id'] ;?>">

		<img style="width:70px;height:70px;" src="{base_url}images/urunler/150x150/<?php echo $indirimdeki_urun[1][0]['isim']?>" alt="Canon EOS 5D" /></a></div>
				            <div class="name"><a style="color:#7DB122"  href="{base_url}index.php/sayfa/detayli_urun/<?php echo $indirimdeki_urun[0]['id'] ;?>"><?php echo $indirimdeki_urun[0]['isim']?></a></div>
				            <div class="price">
				                <span class="price-old"><?php echo $indirimdeki_urun[0]['indirimsiz_fiyati'] ?></span><br> <span class="price-new"><?php echo $indirimdeki_urun[0]['fiyat'] ?></span>
				              </div>
				          </div>
					<?php }; ?>
				      </div>
			</div>
</div>
  </div>
 
<div class="product-list" >
<?php
	if(isset($urunler[0][0])){
	foreach($urunler as $urun)
		{
		?>
		<div style="margin-left:200px"><div class='image'><a href='{base_url}index.php/sayfa/detayli_urun/<?php echo $urun[0]['id'];?>'><img style="width:180px;height:140px;" src='{base_url}images/urunler/150x150/<?php echo $urun[1][0]['isim'] ?>' title='<?php echo $urun[0]['isim'];?>' alt='<?php echo $urun[0]['isim'];?>' /></a></div>
			    <div class='name'><a href='{base_url}index.php/sayfa/detayli_urun/<?php echo $urun[0]['id'];?>'><?php echo $urun[0]['isim'];?></a></div>
		      <div class='description'>
						<?php echo substr(strip_tags($urun[0]['detay']),0,50);?></div>
			    <div class='price'>
<?php if ($urun[0]['indirimsiz_fiyati']!=0){
	echo "<span class='price-new'><strike style='color:red'>".$urun[0]['indirimsiz_fiyati']." TL</strike></span>";

};?>
			  
			      <span class='price-new'><?php echo $urun[0]['fiyat'];?> TL</span>
				        <br />
			<span class='price-tax'>Stok : <?php echo $urun[0]['stok'];?> adet </span>
			      </div>
				  <div class='cart'>
			<input type='button' value='Urunu Gör' onclick='location.href="{base_url}index.php/sayfa/detayli_urun/<?php echo $urun[0]['id'];?>"' class='button' />
		      </div>
		      <div class='wishlist'><a onclick='addToWishList('42');'> </a></div>
		      <div class='compare'><a onclick='addToCompare('42');'> </a></div>
		    </div>
	<?php };} ?>

<script type="text/javascript"><!--
function display(view) {
	if (view == 'list') {
		$('.product-grid').attr('class', 'product-list');
		
		$('.product-list > div').each(function(index, element) {
			html  = '<div class="right">';
			
			var price = $(element).find('.price').html();
			
			if (price != null) {
				html += '<div class="price">' + price  + '</div>';
			}
			
			html += '  <div class="cart">' + $(element).find('.cart').html() + '</div>';
			html += '  <div class="wishlist">' + $(element).find('.wishlist').html() + '</div>';
			html += '  <div class="compare">' + $(element).find('.compare').html() + '</div>';
			html += '</div>';			
			
			html += '<div class="left">';
			
			var image = $(element).find('.image').html();
			
			if (image != null) { 
				html += '<div class="image">' + image + '</div>';
			}
					
			html += '  <div class="name">' + $(element).find('.name').html() + '</div>';
			html += '  <div class="description">' + $(element).find('.description').html() + '</div>';
			
			var rating = $(element).find('.rating').html();
			
			if (rating != null) {
				html += '<div class="rating">' + rating + '</div>';
			}
				
			html += '</div>';

						
			$(element).html(html);
		});		
		
		$('.display').html('<span class="displaytext">Display:</span> <div class="listviewactive"><span class="listtext">List</span></div><a onclick="display(\'grid\');"><div class="gridview"><span class="gridtext">Grid</span></div></a>');
		
		$.cookie('display', 'list'); 
	} else {
		$('.product-list').attr('class', 'product-grid');
		
		$('.product-grid > div').each(function(index, element) {
			html = '';
			
			var image = $(element).find('.image').html();
			
			if (image != null) {
				html += '<div class="image">' + image + '</div>';
			}
			
			html += '<div class="name">' + $(element).find('.name').html() + '</div>';
			html += '<div class="description">' + $(element).find('.description').html() + '</div>';
			
			var price = $(element).find('.price').html();
			
			if (price != null) {
				html += '<div class="price">' + price  + '</div>';
			}
			
			var rating = $(element).find('.rating').html();
			
			if (rating != null) {
				html += '<div class="rating">' + rating + '</div>';
			}
						
			html += '<div class="cart">' + $(element).find('.cart').html() + '</div>';
			html += '<div class="wishlist">' + $(element).find('.wishlist').html() + '</div>';
			html += '<div class="compare">' + $(element).find('.compare').html() + '</div>';
			
			$(element).html(html);
		});	
					
		$('.display').html('<span class="displaytext">Display:</span> <a onclick="display(\'list\');"><div class="listview"><span class="listtext">List</span></div></a><div  class="gridviewactive"><span class="gridtext">Grid</span></div>');
		
		$.cookie('display', 'grid');
	}
}

$(function() {
    $('select.styled').customStyle();
});

view = $.cookie('display');

if (view) {
	display(view);
} else {
	display('list');
}
//--></script> 

  </div>
  <?php echo $linkler; ?>
