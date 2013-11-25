<?php
class Pagination_model extends CI_Model {

	//kategorilerin yanındaki urun sayilari icin fonksiyonumuz	
	public function kategori_urun_toplam($kategori_id){
		$sql = "SELECT * FROM `urun` WHERE `kategori_id`='$kategori_id'";
		$urunler = $this->db->query($sql);
		if ($urunler){
		    return $urunler->num_rows();
		}
		return FALSE;
	}
	
	//toplam indirimli urun sayisi.Indirimli urunleri sayfalamada kullanacagiz.
	public function indirimli_urun_toplam(){
		$sql = "SELECT * FROM `urun` where `indirimsiz_fiyati`!=0";
		$urunler = $this->db->query($sql);
		if ($urunler){
		    return $urunler->num_rows();
		}
		return FALSE;
	}

	//Toplam populer urun sayisi. Populer urunleri sayfalamada kullanacagiz.
	public function populer_urun_toplam(){
		$sql = "SELECT * FROM `urun`";
		$urunler = $this->db->query($sql);
		if ($urunler){
		    return $urunler->num_rows();
		}
		return FALSE;
	}
	
	//kategori-indirimli ve populer urun sayfasindaki tek resimin adini veritabanindan cekiyoruz
	public function get_resim($id){
		$sql = "SELECT isim FROM  `resimler` WHERE  `urun_id` = $id limit 0,1;";
		$query = $this->db->query( $sql);
		if( $query->num_rows() > 0 ){
		    return $query->result_array();
		}
		else {
			return FALSE;
		}
	}

	//kategori urunleri sayfasi. Pagination ile bolunmus halde db den cekiyoruz.
	public function kategori_urunleri($kategori_id,$baslangic,$limit){
		$sql = "SELECT * FROM  `urun` WHERE `kategori_id`='$kategori_id' LIMIT $baslangic,$limit ";
		$query = $this->db->query( $sql);
		$urunler=array();
		if( $query->num_rows() > 0 ){
			foreach ( $query->result_array() as $urun){
		    		array_push($urunler,array($urun,$this->get_resim($urun['id'])));	
			}		 
			return $urunler;		
		}
		else {
			return FALSE;
		}	
	}

	//Populer urunler sayfasi. Pagination ile bolunmus halde db den cekiyouz.
	public function populer_urunler($baslangic,$limit){
		$sql = "SELECT * FROM  `urun`  order by tiklanma desc LIMIT $baslangic,$limit ";
		$query = $this->db->query( $sql);
		$urunler=array();
		if( $query->num_rows() > 0 ){
			foreach ( $query->result_array() as $urun){
		    		array_push($urunler,array($urun,$this->get_resim($urun['id'])));	
			}		 
			return $urunler;		
		}
		else {
			return FALSE;
		}	

	}

	//Indirimli urunler sayfasi. Pagination ile bolunmus halde db den cekiyouz.
	public function indirimli_urunler($baslangic,$limit){
		$sql = "SELECT * FROM  `urun`  where `indirimsiz_fiyati`!=0 order by id desc LIMIT $baslangic,$limit";
		$query = $this->db->query( $sql);
		$urunler=array();
		if( $query->num_rows() > 0 ){
			foreach ( $query->result_array() as $urun){
			  	array_push($urunler,array($urun,$this->get_resim($urun['id'])));	
			}		 
			return $urunler;		
		}
		else {
			return FALSE;
		}
	}
}
