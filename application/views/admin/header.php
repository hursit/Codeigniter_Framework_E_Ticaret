<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Elit Hediyelik Admin Panel</title>
	
	<link rel="stylesheet" href="<?php echo base_url();?>styles/css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="<?php echo base_url(); ?>styles/js/admin-js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>styles/js/admin-js/hideshow.js" type="text/javascript"></script>
	<script src="j<?php echo base_url(); ?>styles/js/admin-js/jquery.tablesorter.min.js" type="text/javascript"></script>
	 <link href="<?php echo base_url();?>styles/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>styles/bootstrap//css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>styles/bootstrap//css/docs.css" rel="stylesheet">
    <link href="<?php echo base_url();?>styles/bootstrap//js/google-code-prettify/prettify.css" rel="stylesheet">

<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="<?php echo base_url() ?>index.php/admin">Elit Hediyelik Admin Paneli </a></h1>
			<h2 class="section_title">Admin Panel</h2><div class="btn_view_site"><a href="<?php echo base_url() ?>">Sitenizi Görün</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			</div>
	</section>
	
	<aside id="sidebar" class="column">
		
		<hr/>
		<h3>Urun</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="<?php echo base_url().'index.php/admin/urunler_kategori'?>">Urunler</a></li>
			<li class="icn_new_article"><a href="<?php echo base_url().'index.php/admin/urun_ekle'?>">Urun Ekle</a></li>
			
			<li class="icn_categories"><a href="<?php echo base_url().'index.php/admin/kategori_ekle'?>">Kategori Ekle</a></li>
			<li class="icn_tags"><a href="<?php echo base_url().'index.php/admin/kategori_duzenle_main'?>">Kategori Duzenle</a></li>
			<li class="icn_tags"><a href="<?php echo base_url().'index.php/admin/manset_resmi_ekle'?>">Manset Resmi Ekle</a></li>


		</ul>
		<h3>Kullanıcı</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="<?php echo base_url().'index.php/admin/kullanicilar'?>">Kullanıcılar</a></li>
		<li class="icn_profile"><a href="<?php echo base_url().'index.php/admin/okunmamis_mesajlar'?>">Okunmamis Mesajlar</a></li>
			<li class="icn_profile"><a href="<?php echo base_url().'index.php/admin/okunmus_mesajlar'?>">Okunmus Mesajlar</a></li>
		</ul>
		<h3>Sepet</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php echo base_url(); ?>index.php/admin/gelen_alisverisler">Gelen Alışverişler</a></li>
			<li class="icn_folder"><a href="<?php echo base_url(); ?>index.php/admin/tamamlanan_alisverisler">Tamamlanan Alışverişler</a></li>
		</ul>
<br><br>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php echo base_url().'index.php/admin/cikis_yap'?>"><h2 style="color:#993300">Çıkış Yap</h2></a></li>
		</ul>
		<footer>
			<hr /><br><br><br>
			<p><strong>Elit Hediyelik</strong></p>
		</footer>
	</aside>
<div style="margin-left:340px;margin-top:20px">
