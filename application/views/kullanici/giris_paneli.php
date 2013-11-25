<div id="notification"></div>
  <h1>Giriş Paneli</h1>
    <div class="breadcrumb">
         &raquo; <a href="{base_url}">Anasayfa</a>
      </div>
 
<div id="column-right">
    <div class="box">
  <div class="box-heading">Üyelik</div>
  <div class="box-content">
    <ul>
      <li><a href="#">Kaydol</a></li>
      <li><a href="{base_url}index.php/sayfa/sifremi_unuttum">Sifremi Unuttum</a></li>
    </ul>
  </div>
</div>
  </div>
<div id="content">  <div class="login-content">
    <div class="left">
      <h3>Yeni Üye</h3>
      <div class="content">
        <p><b>Kaydol</b></p>
        <p>Yeni üye olmak icin lütfen aşağıyı tıklayınız.</p>
        <a href="{base_url}index.php/sayfa/yeni_kayit_form" class="button">Kaydol</a></div>
    </div>
    <div class="right">



      <h3>Giris Paneli</h3>
<?php
	
    echo form_open('sayfa/giris_yap');
    echo "<div style='color:red;margin-left:30px;font-size:13px'>".$this->session->flashdata('hata')."</div>" ; 
    echo validation_errors("<div style='color:red;margin-left:30px;font-size:13px'>", "</div>");
?>
        <div class="content">
          <p></p>
          <b>E-Mail Adres:</b><br />
          <input type="text" name="email" value="" />
          <br />
          <br />
          <b>Sifre:</b><br />
          <input type="password" name="sifre" value="" />
          <br />
          <a href="{base_url}index.php/sayfa/sifremi_unuttum">Sifrenizi mi unuttunuz.?</a><br />
          <br />
          <input type="submit" value="Giris" class="button" />
                  </div>
      </form>
    </div>
  </div>
  </div>
<script type="text/javascript"><!--
$('#login input').keydown(function(e) {
	if (e.keyCode == 13) {
		$('#login').submit();
	}
});
//--></script> 
