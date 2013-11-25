<?php
	$uzanti=array('image/jpeg','image/jpg','image/png','image/x-png','image/gif');
	$dizin=base_url().'images';
	if(in_array(strtolower($_FILES['resim']['type']),$uzanti)){
		move_uploaded_file($_FILES['resim']['tmp_name'],"$dizin/{$_FILES['resim']['name']}");
		echo "Yükleme işleminiz başarıyla gerçekleşmiştir.";
	}
	else{
		echo "Bu \"". $_FILES['resim']['type']."\" tür uzantinin yüklenmesine izniniz bulunmamaktadır.";
	}
?>
