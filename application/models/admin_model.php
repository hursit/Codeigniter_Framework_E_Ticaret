<?php

class Admin_model extends CI_Model {
	public function giris_kontrol($email,$sifre){
	        $sql = "SELECT * FROM admin WHERE email=? AND sifre=?";
		$query = $this->db->query( $sql, array($email, $sifre ));
		if( $query->num_rows() > 0 ){
			return TRUE;
		}
		return FALSE;
	 }
	public function oturum_ac($email,$sifre){
		if($this->this->giris_kontrol($email,$sifre)){					
			$session_bilgileri = array(
				'yetki' => 'admin',
				'giris' => TRUE
			);
			$this->session->set_userdata('logged_in',$session_bilgileri);
			return true;
		}
		else{
			return false;
		}
	}
	public function admin_session_kontrol(){
		if($this->session->userdata('yetki')=='admin')
			return TRUE;
		return FALSE;

	}
	public function cikis_yap(){
		$this->session->unset_userdata('yetki');

	}
	public function gelen_alisverisler($id=0,$onay='beklemede'){echo $id;
		if(!$id){
			$sql = "SELECT * FROM `sepetler` where `onay`='$onay' order by id desc";
		}
		else{
			$sql = "SELECT * FROM `sepetler` where `onay`='$onay' AND `id`=$id";
		}
		$query = $this->db->query($sql);
		$alisverisler=array();
		foreach($query->result_array() as $sepet){
			$kullanici_sql = "SELECT * FROM `kullanici` WHERE `id` =".$sepet['kullanici_id'].";";
			$kullanici_sorgu = $this->db->query($kullanici_sql);
			$urunler_sql = "SELECT * FROM `sepet_urunleri` where `sepet_id`=".$sepet['id'];
			$urunler_sorgu = $this->db->query($urunler_sql);
			array_push($alisverisler,array('kullanici' => $kullanici_sorgu->result_array(),'urunler' => $urunler_sorgu->result_array(),'fiyat' =>$sepet['fiyat'],'id' => $sepet['id'],'zaman' => $sepet['zaman']));
		}
	return $alisverisler;
		
	}
	public function sepet_onayla($id){
		$sql = "UPDATE `sepetler` SET  `onay` =  'onaylandi' WHERE  `sepetler`.`id` =$id;";
		if($this->db->query($sql))
			return TRUE;
		return FALSE;	
	}
	public function kullanicilar(){
		$sql = "SELECT * FROM `kullanici` order by isim asc";
		if($this->db->query($sql))
			return $this->db->query($sql)->result_array();
		return FALSE;	
	}
	
	public function okunmamis_mesajlar(){
		$sql = "SELECT * FROM `iletisim` where `okunma`=0 LIMIT 0, 30 ";
		$sonuclar=$this->db->query($sql);
		if($sonuclar)
			return $sonuclar->result_array();
		return FALSE;
	}
	public function okunmus_mesajlar(){
		$sql = "SELECT * FROM `iletisim` where `okunma`=1 LIMIT 0, 30 ";
		$sonuclar=$this->db->query($sql);
		if($sonuclar)
			return $sonuclar->result_array();
		return FALSE;

	}
	public function mesaj_oku($id){		
		$sql = "SELECT * FROM `iletisim` WHERE `id` = $id";
		$sonuclar=$this->db->query($sql);
		if($sonuclar)
			return $sonuclar->result_array();
		return FALSE;
	}
	public function mesaj_sil($id){		
		$sql = "DELETE FROM `iletisim` WHERE `id` = $id";
		if($this->db->query($sql))
			return TRUE;
		return FALSE;
	}
	public function sepet_sil($id){		
		$sql1 = "DELETE FROM `sepetler` WHERE `sepetler`.`id` = $id";
		$sql2 = "DELETE FROM `sepet_urunleri` WHERE `sepet_id` = $id";
		if($this->db->query($sql1) && $this->db->query($sql2))
			return TRUE;
		return FALSE;
	}
	public function alisveris_tamamlanmadi_yap($id){		
		$sql = "UPDATE `sepetler` SET `onay` = 'beklemede' WHERE `sepetler`.`id` = $id;";
		if($this->db->query($sql))
			return TRUE;
		return FALSE;
	}
	public function mesaj_okundu_yap($id){
		$sql = "UPDATE `iletisim` SET `okunma` = '1' WHERE `id` = $id;";
		if($this->db->query($sql))
			return TRUE;
		return FALSE;

	}
	public function mesaj_okunmadi_yap($id){
		$sql = "UPDATE `iletisim` SET `okunma` = '0' WHERE `id` = $id;";
		if($this->db->query($sql))
			return TRUE;
		return FALSE;

	}
	public function kategori_duzenleme_kaydet($id,$kategori){
		$sql = "UPDATE `kategori` SET `isim` = '$kategori' WHERE `id` = $id;";
		if($this->db->query($sql))
			return TRUE;
		return FALSE;
	}
	public function tamamlanan_alisveris_durum_ekle($sepet_id,$durum){
		$sql = "UPDATE  `sepetler` SET `durum` = '$durum' WHERE  `id` = $sepet_id;";
		if($this->db->query($sql))
			return TRUE;
		return FALSE;
	}
	
}
