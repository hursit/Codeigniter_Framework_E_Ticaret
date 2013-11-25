<html>
<head>

 <link href="<?php echo base_url();?>styles/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>styles/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>styles/bootstrap/css/docs.css" rel="stylesheet">
    <link href="<?php echo base_url();?>styles/bootstrap/js/google-code-prettify/prettify.css" rel="stylesheet">

</head>
<body>
<form style="margin-top:200px;margin-left:280px" class="form-horizontal" action='<?php echo base_url().'index.php/'?>admin/giris' method="POST">
  <fieldset>
    <div id="legend">
      <legend style="margin-left:180px" class="">Admin Giris Paneli</legend>
    </div>
    <div class="control-group">
      <label class="control-label"  for="email">E-Mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="sifre">Sifre</label>
      <div class="controls">
        <input type="password" id="sifre" name="sifre" placeholder="" class="input-xlarge">
      </div>
    </div>


    <div class="control-group">
      <div class="controls">
        <button class="btn btn-success">Giris</button>
      </div>
    </div>
  </fieldset>
</form>
</body>
