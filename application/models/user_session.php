<?php
class User_session extends CI_Model {

	//Kullanici oturum acmis mi.?
	public function user_session_kontrol(){
		if($this->session->userdata('email'))
			return TRUE;
		return FALSE;
	}

	//Kullanici bilgilerini veritabanindan cek
	public function get_user_session(){
		$email = $this->session->userdata('email');
		$this->db->where('email',$email);
		$sonuclar = $this->db->get('kullanici');
		$data = $sonuclar->result_array();
		return array('isim' => $data[0]['isim'], 'soyisim' => $data[0]['soyisim'], 'id' => $data[0]['id'],'email' =>$data[0]['email'],'adres' =>$data[0]['adres'],'telefon' =>$data[0]['telefon']);
	}

	//oturumu sil
	public function session_destroy(){
		$this->cart->destroy();
		$this->session->unset_userdata('email');
	}

	//Oturum ac
	public function login($email){
		$session_bilgileri = array(
			'email' => $email,
			'giris' => TRUE
		);
		$this->session->set_userdata($session_bilgileri);
	}		
}
