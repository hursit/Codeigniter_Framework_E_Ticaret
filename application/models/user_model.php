<?php

class User_model extends CI_Model {

    public function __construct()
    {
         parent::__construct();
    }

    function kullanici_ekle($isim,$soyisim,$sifre,$email,$telefon,$adres)
    {
        $sql = "INSERT INTO `kullanici` (`isim`, `soyisim`, `sifre`, `email`, `telefon`, `adres`) VALUES ('$isim', '$soyisim', '$sifre', '$email', '$telefon', '$adres');";
        if ( $this->db->query($sql))
            return TRUE;
        return FALSE;
    }

    function kullanici_kontrol($email,$sifre)
    {
        $sql = "SELECT * FROM kullanici WHERE email=? AND sifre=?";
        $query = $this->db->query( $sql, array($email, $sifre ));
	if( $query->num_rows() > 0 )
            return TRUE;
        return FALSE;
	}
    function kullanici_al($ozellik,$deger){
        $sql = "SELECT * FROM kullanici WHERE $ozellik=?";
        $query = $this->db->query( $sql, $deger);

        if( $query->num_rows() > 0 ){
            return $query->result();
		}
		else{
       		return FALSE;
		}    
	}
	public function get_user($id){
		$sql = "SELECT * FROM  `kullanici` WHERE  `id` = $id;";
		$query = $this->db->query($sql);
		if( $query->num_rows() > 0 )
				return $query->result_array();
		return FALSE;
	}
	public function iletisim_kaydet($isim,$soyisim,$telefon,$email,$mesaj){
		$sql = "INSERT INTO `iletisim` (`id`, `isim`, `soyisim`, `telefon`, `email`, `mesaj`) VALUES (NULL, '$isim', '$soyisim', '$telefon', '$email', '$mesaj');";
		if($this->db->query($sql))
			return TRUE;
		return FALSE;
	}
	public function bilgilerimi_guncelle($id,$isim,$soyisim,$telefon,$email,$adres){
		$sql = "UPDATE `kullanici` SET `id` = NULL, `isim` = '$isim', `soyisim` = '$soyisim', `email` = '$email', `telefon` = '$telefon', `adres` = '$adres' WHERE `id` = $id;";
		if($this->db->query($sql))
			return TRUE;
		return FALSE;
	}

	public function parola_degistir($id,$parola){
		$sql = "UPDATE `kullanici` SET `sifre` = '$parola' WHERE `id` = $id;";
		if($this->db->query($sql))
			return TRUE;
		return FALSE;
	}	
}
