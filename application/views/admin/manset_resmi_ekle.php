<section id='main' class='column'>

<?php if($bilgilendirme!=""){
echo "<h4 class='alert_info'>".$bilgilendirme."</h4>
	<div class='clear'></div>";
	
}
 ?>

<article class='module width_full'>

<form action="manset_resmi_kaydet" method="post" enctype="multipart/form-data" > 
	<input type='file' name='manset'/>
	<input type="submit" value="Publish" class="alt_btn">
</form>



</article>

</section>



