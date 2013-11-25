
	
	
	<section id="main" class="column">
		
		<h4 class="alert_info">Kategoriler</h4>

		<div class="clear"></div>
	<form action="urun_kaydet" method="post" enctype="multipart/form-data" > 
					
		<article class="module width_full">
			<header><h3>Kategoriler Listesi</h3></header>
				<ul><?php
		if(isset($kategoriler[0][0])){
			foreach($kategoriler as $kategori){
			$i=0;
				echo "<li style='list-style:none;font-size:15px;font-weight:bold;line-height:2em'><a href='".base_url()."index.php/admin/kategori_urunleri/".$kategori[0]."'>".$kategori[1]."(".$kategori[2].")</a></li>";
		};}?>

</ul>
		</article>
		
		</form>
		<div class="spacer"></div>
	</section>


