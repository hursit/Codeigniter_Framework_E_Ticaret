
<div id="notification"></div>
<h1>Yeni Kayıt</h1>
  <div class="breadcrumb">
        <a href="{base_url}">Home</a>
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
<div id="content">  <p>Eğer daha önce üye olduysanız,lütfen giriş sayfasına gidiniz. <a href="{base_url}index.php/sayfa/kullanici_giris_sayfasi">Giriş Sayfası</a>.</p>
  
<?php
    echo form_open('sayfa/yeni_kayit');
    echo validation_errors("<div style='color:red;margin-left:30px;font-size:13px'>", "</div>");
?>
    <h2>Kayıt Formu</h2>
    <div class="content">
      <table class="form">
        <tr>
          <td><span class="required">*</span>İsim:</td>
          <td><input type="text" name="isim" value="" />
            </td>
        </tr>

        <tr>
          <td><span class="required">*</span>Soyisim:</td>
          <td><input type="text" name="soyisim" value="" />
            </td>
        </tr>

        <tr>
          <td><span class="required">*</span> E-Mail:</td>
          <td><input type="text" name="email" value="" />
            </td>
        </tr>

		  <tr>	
      <td><span class="required">*</span> Sifre:</td>
          <td><input type="password" name="sifre" value="" />
            </td>
        </tr>

        <tr>
          <td><span class="required">*</span> Sifre Tekrarı:</td>
          <td><input type="password" name="sifre2" value="" />
            </td>
        </tr>

        <tr>
          <td><span class="required">*</span> Telefon:</td>
          <td><input type="text" name="telefon" value="" />
            </td>
        </tr>
      </table>
             
       <h2>  <span class="required">*</span>  Adres:</h2><br>
        <textarea type="text" cols="50" rows="5" name="adres" value="" /></textarea>
           

    </div>
        <div class="buttons">
      <div class="right">    <input type="submit" value="Üyeliği Tamamla"" class="button" />
      </div>
    </div>
      </form>
  </div>


