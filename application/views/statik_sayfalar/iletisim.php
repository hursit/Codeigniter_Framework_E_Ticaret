
<div id="notification"></div>
  <h1>İletisim</h1>
  <div class="breadcrumb">
        <a href="{base_url}">Anasayfa</a>
      </div>
 
<div id="content">  
    <h2>Adresimiz</h2>
    <div class="contact-info">
      <div class="content"><div class="left"><b>Adres:</b><br />
      Adres<br />
        buraya gelecek</div>
      <div class="right">
                <b>Telefon:</b><br />
        123456789<br />
        <br />
                      </div>
    </div>
    </div>
    <h2>İletisim Formu</h2>
    <div class="content">
<form action="{base_url}index.php/sayfa/iletisim_kaydet" method="post">
    <b>İsim:</b><br />
    <input type="text" name="isim" value="" />
    <br />
        <br />
    <b>Soyisim:</b><br />
    <input type="text" name="soyisim" value="" />
    <br />
        <br />
    <b>Telefon:</b><br />
    <input type="text" name="telefon" value="" /><br>
    <br />
    <b>Email Adres:</b><br />
    <input type="text" name="email" value="" />
    <br />
        <br />
    <b>Mesaj:</b><br />
    <textarea name="mesaj" cols="40" rows="10" style="width: 99%;"></textarea>
    <br />
        <br />
  
    <div class="buttons">
      <div class="right"><input type="submit" value="Gönder" class="button" /></div>
    </div>
  </form>
  </div>
