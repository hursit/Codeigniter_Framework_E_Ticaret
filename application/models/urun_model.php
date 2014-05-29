<?php

class Urun_model extends CI_Model {

	//Db ye admin panelinden urun ekleme
	public function urun_ekle($isim,$stok,$indirimsiz_fiyati,$fiyat,$kategori_id,$detay){
		$data = array(
		   'isim' => $isim ,
		   'stok' => $stok ,
		   'fiyat' => $fiyat,
		   'kategori_id' => $kategori_id ,
		   'tiklanma' => 0,
		   'detay' => $detay ,
		   'indirimsiz_fiyati' => $indirimsiz_fiyati
		);
		if($this->db->insert('urun', $data))
		    return TRUE;
		return FALSE;
	}

	//Burada urune coklu resim ekleme yapıyoruz. Admin panelinde urunun detayli kisimlari dolduruluyor
	//sonra resimler seciliyor. Ekle dediginde ilk urun db ye ekleniyor. sonra resimler farkli bi tabloya
	//eklenecek. Ama urun id lazim. o yuzden bu sekilde cekiyoruz.
	public function get_id($isim,$kategori_id){
		$sql = "SELECT * FROM  `urun`  WHERE  `urun`.`isim`='$isim' and `kategori_id` = $kategori_id order by id desc;";
		$query = $this->db->query( $sql);
		if( $query->num_rows() > 0 ){
		    $user=$query->row();
		    return $user->id;
		}
		else {
			return FALSE;
		}
	}

	//Urune resim ekleme
	public function resim_ekle($urun_id,$resim_isim){
		$data = array(
		   "urun_id" => $urun_id ,
		   "isim" => $resim_isim
		);
		if($this->db->insert('resimler', $data))
		    return TRUE;
		return FALSE;
	}

	//admin paneli kategori ekleme
	public function kategori_ekle($isim){
		$sql = "INSERT INTO `kategori` (`id`, `isim`) VALUES (NULL, '$isim');";
		if ( $this->db->query($sql)){
		    return TRUE;
		}
		return FALSE;
	}

	//kategoriler
	public function get_kategoriler(){
		$sql = "SELECT  * FROM  `kategori` order by `isim` asc";
		$query = $this->db->query( $sql);
		if( $query->num_rows() > 0 ){
		    return $query->result_array();			 
		}
		else {
			return FALSE;
		}
	}

	// Urun guncelleme.
	public function urun_guncelle($id,$isim,$stok,$indirimsiz_fiyati,$fiyat,$detay,$kategori_id){
		$sql = "UPDATE `urun` SET `isim` = '$isim',`stok` = '$stok',`fiyat` = '$fiyat',`kategori_id` =  '$kategori_id',`detay` = '$detay' ,`indirimsiz_fiyati` = '$indirimsiz_fiyati' WHERE `urun`.`id` =$id;";
		if($this->db->query( $sql)){
			return TRUE;}
		else{return FALSE;};
	}

	//Ust menude ya da yan menude surekli olan kategori(urun_sayisi) burdan cekiyoruz.
	public function kategori_ile_urun_sayisi(){
		$sql = "SELECT  * FROM  `kategori` order by `isim` asc";
		$query = $this->db->query( $sql);
		$kategoriler=array();
		if( $query->num_rows() > 0 ){
		   foreach($query->result_array() as $kategori){
				$id=$kategori['id'];
				$isim=$kategori['isim'];
				$sorgu = "SELECT * FROM  `urun` where `kategori_id`='$id'";
				$sonuc = $this->db->query( $sorgu);
				array_push($kategoriler,array($id,$isim,$sonuc->num_rows()));
			}		
			return $kategoriler;	 
		}
		else {
			return FALSE;
		}
	}

	//Son Urunler	
	public function get_news($sayi){
		$sql = "SELECT * FROM  `urun` where `indirimsiz_fiyati`!=0 order by id desc LIMIT 0,$sayi ";
		$query = $this->db->query( $sql);
		$urunler=array();
		if( $query->num_rows() > 0 ){
			foreach ( $query->result_array() as $urun){
			    	array_push($urunler,array($urun,$this->pagination_model->get_resim($urun['id'])));	
			}		 
			return $urunler;		
		}
		else {
			return FALSE;
		}
	}

	//Kategori id uzerinden kategori ismi
	public function get_kategori_isim($kategori_id){
		$sql = "SELECT * FROM  `kategori` WHERE `id`='$kategori_id' ";
		$query = $this->db->query( $sql);
		$kategori = $query->result_array();
		return $kategori[0]['isim'];
	}

	//Urunun butun resimleri. detayli urun sayfasindaki resimler burdan geliyor.
	public function get_resim($id){
		$sql = "SELECT isim FROM  `resimler` WHERE  `urun_id` = $id;";
		$query = $this->db->query( $sql);
		if( $query->num_rows() > 0 )
		    return $query->result_array();
		return FALSE;
	}

	//detayli urun sayfasindaki urun bilgilerini buradan cekiyoruz.
	public function get_urun($id){
		$sql = "SELECT * FROM  `urun`  WHERE  `id` =  '$id';";
		$query = $this->db->query( $sql);
		if( $query->num_rows() > 0 ){
		    return array('urun'=>array($query->row(),'resim' =>$this->get_resim($id)));
		}
		else {
			return FALSE;
		}
	}

	//Urun sayfasi acildiginda tiklanmayi artirma fonksiyonumuz
	public function tiklanma_artir($id){
		$sql = "SELECT tiklanma  FROM  `urun`  WHERE  `id` =  '$id';";
		$query = $this->db->query( $sql);
		if( $query->num_rows() > 0 ){
			$result = $query->result_array();
			$tiklanma = $result[0]['tiklanma']+1;
			$sql = "UPDATE `urun` SET  `tiklanma` =  '$tiklanma' WHERE  `urun`.`id` =$id;";
			$query = $this->db->query( $sql);
			return $tiklanma;
		}
	}

	//Kategoriler sayfamizdaki kategori urunlerimizi buradan cekiyoruz.
	public function kategori_urunleri($kategori_id){
		$sql = "SELECT * FROM  `urun` WHERE `kategori_id`='$kategori_id' ";
		$query = $this->db->query( $sql);
		$urunler=array();
		if( $query->num_rows() > 0 ){
			foreach ( $query->result_array() as $urun){
	 	    		array_push($urunler,array($urun,$this->pagination_model->get_resim($urun['id'])));	
			}		 
			return $urunler;		
		}
		else {
			return FALSE;
		}
	}

	//admin urun silme.Resimleriyle birlikte tamamen.
	public function urun_sil($id){
		$sql1 = "DELETE FROM `urun` WHERE `urun`.`id` = $id";
		$sql2 = "SELECT * FROM `resimler` WHERE `urun_id` = $id";
		foreach($this->db->query($sql2)->result_array() as $urun){
			unlink("images/urunler/orjinal/".$urun['isim']);
		}			
		$sql3 = "DELETE FROM `resimler` WHERE `urun_id` = $id";
		if($this->db->query($sql1) && $this->db->query($sql3)){
			return TRUE;
		}
		else{
			return FALSE;
		}		
	}

	//admin panelindekategori siliminden once kategoride bulunan urunleri gosteren uyari.
	public function kategori_sil_uyari($id){
		$sql = "SELECT * FROM  `urun` WHERE  `kategori_id` = $id";
		$query = $this->db->query( $sql);
		return $query->result_array();		
	}

	//admin panel. Kategori ve urunlerini sil.
	public function kategori_sil($id){
		$bool=TRUE;
		$sql = "SELECT * FROM  `urun` WHERE  `kategori_id` = $id";
		$query = $this->db->query( $sql);
		$urunler = $query->result_array();
		foreach ($urunler as $urun){
			if(!$this->urun_sil($urun['id'])){
				$bool=FALSE;
			}
		}
		$sql1 = "DELETE FROM `kategori` WHERE `id` = $id ";
		$sql2 = "DELETE FROM  `urun` WHERE  `kategori_id` = $id";
		if($this->db->query( $sql1) && $this->db->query( $sql2) && $bool){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function sepete_at($id,$adet,$fiyat,$isim,$resim){
		$data = array(
		       'id'      => $id,
		       'qty'     => $adet,
		       'price'   => $fiyat,
		       'name'    => $isim,
		       'options' => array('resim' => $resim));
		if($this->cart->insert($data)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function sepette_mi_kontrol($id){
		$sepetim = $this->cart->contents();
		$kontrol=FALSE;
		$adet = 0;
		foreach($sepetim as $urun){
			if($urun['id'] == $id){
				$kontrol=TRUE;
				$adet = $urun['qty'];
			}
		}
		return array($kontrol,$adet);
	}

	
	//sepete atilan urun sepette var ise sadece adet artır.
	public function sepeti_guncelle($id,$adet){
		foreach($this->cart->contents() as $cart)
                if($cart['id'] == $id)
                {
		  $row_id=$cart['rowid'];
                  $newqty = $cart['qty']+$adet;
                  $dataUpdate = array('rowid'=>$row_id,'qty'=>$newqty);
                  $this->cart->update($dataUpdate);
     		  return TRUE;
                }
		return FALSE;
	}	
	public function manset_resmi_kaydet($adi){
		$sql = "INSERT INTO `manset` (`id`, `isim`) VALUES (NULL, '$adi');";
		if($query = $this->db->query( $sql)){
			return TRUE;
		}	
		else{ return FALSE;}

	}
	public function get_manset(){
		$sql = "SELECT isim FROM  `manset` order by id desc LIMIT 0,10";
		if($query = $this->db->query( $sql)){
			return $query->result_array();
		}	
		else{ return FALSE;}

	}
	public function sepet_kontrol($urun_id,$adet){
		$kontrol = $this->sepette_mi_kontrol($urun_id);
		$urun_stok = $this->get_urun($urun_id);	
		if($kontrol[0] == 1){
			$yeni_adet = $kontrol[1]+$adet;
			if(($urun_stok['urun'][0]->stok)>=$yeni_adet){
				return TRUE;}
			else{ return FALSE;}
		}
		else{
			if(($urun_stok['urun'][0]->stok)>=$adet){
				return TRUE;}
			else{ return FALSE;}

		}

	}
	public function sepet_urun_adedi_yenileme_kontrol($urun_id,$adet){
		$urun_stok = $this->get_urun($urun_id);	
		if(($urun_stok['urun'][0]->stok)>=$adet){
				return TRUE;}
		else{ 
			return FALSE;}

	}
	public function sepet_urun_adedi_guncelle($id,$adet){
		foreach($this->cart->contents() as $cart)
                if($cart['id'] == $id)
                {
		  $row_id=$cart['rowid'];
                  $newqty = $adet;
                  $dataUpdate = array('rowid'=>$row_id,'qty'=>$newqty);
                  $this->cart->update($dataUpdate);
     		  return TRUE;
                }
		return FALSE;
	}
	public function yorum_ekle($urun_id,$kullanici_id,$yorum){

		$sql = "INSERT INTO  `yorumlar` (`id` ,`urun_id` ,`kullanici_id` ,`yorum`) VALUES (NULL ,  '$urun_id',  '$kullanici_id',  '$yorum');";
		if($query = $this->db->query( $sql)){	
			return TRUE;
		return FALSE;}
	}
  function kullanici_al($ozellik,$deger){
        $sql = "SELECT * FROM kullanici WHERE $ozellik=?";
        $query = $this->db->query( $sql, $deger);
        if( $query->num_rows() > 0 )
            return $query->result();
        return FALSE;
  }
	public function get_yorumlar($urun_id){
		$sql = "SELECT * FROM  `yorumlar` WHERE  `urun_id` = $urun_id  LIMIT 0 , 30;";
		$query = $this->db->query( $sql);
		$yorumlar = array();
		foreach($query->result_array() as $yorum){
			$kullanici = $this->kullanici_al('id',$yorum['kullanici_id']);
			$kullanici = ucfirst((string)$kullanici[0]->isim)." ".ucfirst((string)$kullanici[0]->soyisim);
			array_push($yorumlar,array('zaman' => $yorum['zaman'],'yorum' => $yorum['yorum'],'kullanici' => $kullanici));
		}
		return $yorumlar;	
	}
	public function sepet_ac($kullanici_id,$adres){
		$fiyat = $this->data['fiyat'];
		$sql = "INSERT INTO `sepetler` (`id`, `kullanici_id`, `adres`, `zaman`, `fiyat`, `onay`) VALUES (NULL, '$kullanici_id', '$adres', CURRENT_TIMESTAMP,$fiyat, 'beklemede');";
		if ( $this->db->query($sql)){
		    return TRUE;
		}
		return FALSE;
	}	
	public function get_sepet_id($kullanici_id,$adres){
		$sql = "SELECT * FROM  `sepetler`  WHERE  `kullanici_id` =  '$kullanici_id' AND  `adres` = '$adres' order by id desc  LIMIT 0,1 ";
		$query = $this->db->query( $sql);
		if( $query->num_rows() > 0 ){
		    $user=$query->row();
		    return $user->id;
	
	}
		else {
			return FALSE;
		}
	}
	public function urunleri_sepete_kaydet($sepet_id,$kullanici_id){
		foreach($this->data['sepetim'] as $urun){
			$urun_isim = $urun['name'];
			$adet=$urun['qty'];
			$fiyat = $urun['price'];
			$resim =$urun['options']['resim'];

			$sql = "INSERT INTO `sepet_urunleri` (`kullanici_id`, `urun_isim`, `sepet_id`, `adet`, `fiyat`, `resim`) VALUES ($kullanici_id, '$urun_isim',	$sepet_id, $adet, $fiyat,'$resim');";
			$query = $this->db->query( $sql);
			$sql = "SELECT `stok` FROM  `urun`  WHERE `id` = ".$urun['id'];
			$query = $this->db->query( $sql);
			$result = $query->result_array();
			$stok = $result[0]['stok']-$adet;
			$sql = "UPDATE .`urun` SET `stok` = '$stok' WHERE `urun`.`id` = ".$urun['id'];
			$query = $this->db->query( $sql);
		}
	}
	public function alisverisi_tamamla($kullanici_id,$adres){
		$this->sepet_ac($kullanici_id,$adres);
		$this->urunleri_sepete_kaydet($this->get_sepet_id($kullanici_id,$adres),$kullanici_id,$adres);
	}
	public function bekleyen_alisverisler($user_id){
	$sql = "SELECT * FROM `sepetler` WHERE `kullanici_id` = $user_id AND `onay` = 'beklemede' ";
		$sorgu = $this->db->query($sql);
		return $sorgu->result_array();
	}		
	public function tamamlanan_alisverisler($user_id){
	$sql = "SELECT * FROM `sepetler` WHERE `kullanici_id` = $user_id AND `onay` = 'onaylandi' ";
		$sorgu = $this->db->query($sql);
		return $sorgu->result_array();
	}		
	public function bekleyen_alisveris_listesi($sepet_id){
		$sql = "SELECT * FROM `sepet_urunleri` WHERE `sepet_id` = $sepet_id";
		$sorgu = $this->db->query($sql);
		return $sorgu->result_array();
	}		
	public function tamamlanan_alisveris_listesi($sepet_id){
		$sql = "SELECT * FROM `sepet_urunleri` WHERE `sepet_id` = $sepet_id ";
		$sorgu = $this->db->query($sql);
		return $sorgu->result_array();

	}
}


