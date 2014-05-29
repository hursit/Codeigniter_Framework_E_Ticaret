<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sayfa extends CI_Controller {
	public function  __construct(){
		parent::__construct();
		$this->load->model('user_session');

		//Linklerde Kullanacagımız base_url degiskenimiz.
		$this->data['base_url'] = base_url();
                if($this->user_session->user_session_kontrol()){
                    $this->data['giris']=TRUE;
                    $this->data['kullanici'] = $this->user_session->get_user_session();
                }
                else{$this->data['giris']=FALSE;}  
		$this->data['kategoriler'] = $this->urun_model->kategori_ile_urun_sayisi();
		$this->data['bilgilendirme'] = "";
		$this->data['adet'] = $this->cart->total_items();
		$this->data['fiyat'] = $this->cart->total();
		$this->data['sepetim'] = $this->cart->contents();
		$this->data['sol_menu_indirimdekiler'] = $this->urun_model->get_news(4);
	}
	public function oturum_kontrol(){
		if(!$this->user_session->user_session_kontrol()){
			redirect('/sayfa', 'refresh');
                }
	}
	//Asagidaki fonksiyonlarda sayfa acma kisminin kisaltilmis fonksiyonu
	public function sayfa_ac($sayfa){
		$this->parser->parse('includes/header',$this->data);		
		$this->parser->parse($sayfa,$this->data);		
		$this->parser->parse('includes/footer',$this->data);	
	}
	public function index(){	
		$this->data['title'] = 'Anasayfa';
		$this->data['manset']=$this->urun_model->get_manset();
		$this->data['son_urunler'] = $this->urun_model->get_news(10);
		$this->sayfa_ac("statik_sayfalar/slim");
	}
  	public function hakkimizda(){
		$this->data['title'] = "Hakkimizda";
		$this->sayfa_ac("statik_sayfalar/hakkimizda");
	}
  	public function iletisim(){
		$this->data['title'] = "İletisim";
		$this->sayfa_ac("statik_sayfalar/iletisim");
	}
	public function kullanici_giris_sayfasi(){
		$this->data['title'] = 'Kullanici Giris Sayfasi';
		$this->load->helper('form');
		$this->sayfa_ac('kullanici/giris_paneli');	
	}
	public function cikis_yap(){
	  $this->user_session->session_destroy();
	     redirect('/sayfa', 'refresh');
	}
	public function kayit_basarili(){
		$this->data['title'] = 'Kayit Basarili';		
		$this->sayfa_ac('kullanici/kayit_basarili');		    
	}
	public function yeni_kayit_form(){
		$this->load->helper('form');		
		$this->data['title'] = 'Kayıt Formu' ;
		$this->sayfa_ac('kullanici/uye_kayit_form');			
	}
	public function yeni_kayit(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		$form_kural = array(
			array(
				'field' => 'isim',
				'label' => 'İsim',
				'rules' => 'trim|required|alpha_numeric|xss_clean'),
			array(
				'field' => 'soyisim',
				'label' => 'Soyisim',
				'rules' => 'trim|required|alpha_numeric|xss_clean'),
			array(
				'field' => 'sifre',
				'label' => 'Sifre',
				'rules' => 'trim|required|min_length[6]|matches[sifre2]|max_length[20]|alpha_numeric'),
			array(
				'field' => 'sifre2',
				'label' => 'Sifre Tekrari',
				'rules' => 'trim|required|min_length[6]|max_length[20]|alpha_numeric'),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|required|valid_email|xss_clean|callback_email_kontrol'),
			array(
				'field' => 'telefon',
				'label' => 'Telefon',
				'rules' => 'trim|required|xss_clean|numeric'),
			array(
				'field' => 'adres',
				'label' => 'Adres',
				'rules' => 'trim|required|xss_clean')
		);

		$this->form_validation->set_rules($form_kural);
		$this->form_validation->set_message('email_kontrol', 'Girdiğiniz e-mail daha önce kullanılmış!');
		if( $this->form_validation->run() === TRUE )
		{
			$isim = $this->input->post('isim');
			$soyisim = $this->input->post('soyisim');
			$sifre = do_hash($this->input->post('sifre'), 'md5');
			$email = $this->input->post('email');
			$telefon = $this->input->post('telefon');
			$adres = $this->input->post('adres');
			if( $this->user_model->kullanici_ekle($isim,$soyisim,$sifre,$email,$telefon,$adres))
			{
				$this->session->set_flashdata('mesaj', 'Kullanıcı kaydı başarıyla gerçekleştirildi.');
				$this->kayit_basarili();
			}
			else {	
				$this->yeni_kayit_form();
			}	
		}
		else {	
			$this->yeni_kayit_form();
		}	
	}

	function giris_yap(){
		$this->load->helper('security');	
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$form_kural = array(
			array(
				'field' => 'email',
				'label' => 'E-Mail',
				'rules' => 'trim|required|valid_email|xss_clean|'
			),
			array(
				'field' => 'sifre',
				'label' => 'Sifre',
				'rules' => 'trim|required|min_length[6]|max_length[12]|alpha_numeric|xss_clean'
			)
		);
		$this->form_validation->set_rules($form_kural);
		if( $this->form_validation->run() == TRUE )
		{
			$email = $this->input->post('email');			
			$sifre = do_hash($this->input->post('sifre'), 'md5');
			$kullanici = $this->user_model->kullanici_kontrol($email, $sifre);
			if( !$kullanici ){
				$this->session->set_flashdata('hata', 'Giriş başarısız');
				$this->kullanici_giris_sayfasi();
			}
			else{
				$this->user_session->login($email);
				redirect('/sayfa', 'refresh');
			}
		}
		else{
			$this->session->set_flashdata('hata', 'Bilgileri eksiksiz giriniz.');
		
			$this->kullanici_giris_sayfasi();
		}
	}

		
	public function giris_basarili(){
		$this->data['title'] = 'Giris Basarili';		
		$this->sayfa_ac('kullanici/giris_basarili');		
	}	

	public function email_kontrol($email)
	{
		if( $this->user_model->kullanici_al('email', $email) )
		{
			$this->form_validation->set_message('email_kontrol', 'Girdiğiniz email adresi daha önce kullanılmış.');
			return FALSE;
		}
		return TRUE;
	}
	function detayli_urun($id){
		if(!$id){
			redirect('/sayfa'.$urun_id, 'refresh');
		}
		$this->data['sepet_kontrol'] = $this->urun_model->sepette_mi_kontrol($id);	
		$this->urun_model->tiklanma_artir($id);
		$this->data['yorumlar'] = $this->urun_model->get_yorumlar($id);
		$this->data['urun']=$this->urun_model->get_urun($id);
		$this->data['title'] = $this->data['urun']['urun'][0]->isim;
		$this->data['detay'] = $this->data['urun']['urun'][0]->detay;
		$this->data['adet'] = $this->cart->total_items();
		$this->data['fiyat'] = $this->cart->total();
		$this->data['sepetim'] = $this->cart->contents();	
		$this->sayfa_ac("urunler/detayli_urun");		
	}
	public function kategori($kategori_id=null,$page=1){
		if(!$kategori_id){
			redirect('/sayfa'.$urun_id, 'refresh');
		}
		$this->data['title'] = $this->urun_model->get_kategori_isim($kategori_id);
		$toplam = $this->pagination_model->kategori_urun_toplam($kategori_id);
		$config = array(
		    'base_url'          => site_url('sayfa/kategori/'.$kategori_id."/"),
		    'total_rows'        => $toplam,
		    'per_page'          => 4,
		    'num_links'         => 2,
		    'page_query_string' => FALSE,
		    'uri_segment'       => 4,
		    'full_tag_open'     => '<div class="pagination">',
		    'full_tag_close'    => '</div>',
		    'first_link'        => 'İlk Sayfa',
		    'first_tag_open'    => '',
		    'first_tag_close'   => '',
		    'last_link'         => 'Son Sayfa',
		    'last_tag_open'     => '',
		    'last_tag_close'    => '',
		    'next_link'         => 'Sonraki',
		    'next_tag_open'     => '',
		    'next_tag_close'    => '',
		    'prev_link'         => 'Önceki',
		    'prev_tag_open'     => '',
		    'prev_tag_close'    => '',
		    'cur_tag_open'      => '<span class="current">',
		    'cur_tag_close'     => '</span>',
		    'num_tag_open'      => '',
		    'num_tag_close'     => ''

		);
		$this->data['kategori'] = $this->urun_model->get_kategori_isim($kategori_id);
		$this->data['urunler'] = $this->pagination_model->kategori_urunleri($kategori_id,$this->uri->segment(4,0),$config['per_page']);
		$this->pagination->initialize($config);
    $this->data['linkler'] = $this->pagination->create_links();
		$this->sayfa_ac('urunler/kategori');      	
  }


	public function sepete_at(){
		$id = $this->input->post('id');
		$isim = $this->input->post('isim');
		$fiyat = $this->input->post('fiyat');
		$adet = $this->input->post('adet');
		$resim = $this->input->post('resim');
		if(!$this->user_session->user_session_kontrol()){
			$this->data['bilgilendirme'] = "Önce giriş yapmalısınız.";
		}
		else{
			
			if($this->urun_model->sepet_kontrol($id,$adet)){
				if($this->urun_model->sepete_at($id,$adet,$fiyat,$isim,$resim)){
					$this->data['bilgilendirme'] = $adet.' adet '.strtoupper($isim).' sepete eklenmistir.';}
				else{	
					$this->data['bilgilendirme'] = "Sistemde Sorun";}
			}
			else{$this->data['bilgilendirme'] = "Stok miktarını aştınız";	
			}
		}
		$this->detayli_urun($id);		
		
	}
	public function sepeti_guncelle(){
		$this->oturum_kontrol();
		$id = $this->input->post('id');
		$adet = $this->input->post('adet');
		if($this->urun_model->sepet_kontrol($id,$adet)){
			if($this->urun_model->sepeti_guncelle($id,$adet)){
				$this->data['bilgilendirme'] = $adet.' adet daha sepete eklenerek sepetiniz güncellenmiştir.';	}
			else{
				$this->data['bilgilendirme'] = "Sistemde Sorun";	
			}
		}
		else{
			$this->data['bilgilendirme'] = "Stok miktarını aştınız...";	
		}
		$this->detayli_urun($id);
	}
	public function sepetim(){
		$this->oturum_kontrol();	
		$this->data['title'] = "Sepetim";
		$this->data['adet'] = $this->cart->total_items();
		$this->data['fiyat'] = $this->cart->total();
		$this->data['sepetim'] = $this->cart->contents();
		$this->sayfa_ac('urunler/sepetim');
	}
	public function sepet_urun_adedi_yenile(){
		$this->oturum_kontrol();
		$id = $this->input->post('id');
		$adet = $this->input->post('adet');		
		if($this->urun_model->sepet_urun_adedi_yenileme_kontrol($id,$adet)){
			if($this->urun_model->sepet_urun_adedi_guncelle($id,$adet)){
				$this->data['bilgilendirme'] = "Guncellendi";}
			else{
				$this->data['bilgilendirme'] = "Sistemde Sorun";	
			}
		}
		else{
			$this->data['bilgilendirme'] = "Stok miktarını aştınız...";	
		}
		$this->sepetim();
	}
	public function sepet_urun_sil($id){
		$this->oturum_kontrol();
		if($this->urun_model->sepet_urun_adedi_guncelle($id,0)){
			$this->data['bilgilendirme'] = "Urun silme başarılı";}
		else{
			$this->data['bilgilendirme'] = "Sistemde Sorun";	
		}	
		$this->sepetim();
	}
	public function alisverisi_tamamla_form(){
		$this->oturum_kontrol();
		$this->data['uye'] = $this->user_model->get_user($this->data['kullanici']['id']);
		$this->sayfa_ac('urunler/alisverisi_tamamla_form');
	}
	public function alisverisi_tamamla(){
		$this->oturum_kontrol();
		$user_id = $this->input->post('user_id');
		$adres = $this->input->post('adres');
		$this->urun_model->alisverisi_tamamla($this->data['kullanici']['id'],$adres);
		$this->cart->destroy();
		$this->bekleyen_alisverisler();
	}
	public function populer_urunler($page=1){
		$this->data['title'] = "Popüler Ürünler";
		$toplam = $this->pagination_model->populer_urun_toplam();
		$config = array(
		    'base_url'          => site_url('sayfa/populer_urunler/'),
		    'total_rows'        => $toplam,
		    'per_page'          => 5,
		    'num_links'         => 2,
		    'page_query_string' => FALSE,
		    'uri_segment'       => 3,
		    'full_tag_open'     => '<div class="pagination">',
		    'full_tag_close'    => '</div>',
		    'first_link'        => 'İlk Sayfa',
		    'first_tag_open'    => '',
		    'first_tag_close'   => '',
		    'last_link'         => 'Son Sayfa',
		    'last_tag_open'     => '',
		    'last_tag_close'    => '',
		    'next_link'         => 'Sonraki',
		    'next_tag_open'     => '',
		    'next_tag_close'    => '',
		    'prev_link'         => 'Önceki',
		    'prev_tag_open'     => '',
		    'prev_tag_close'    => '',
		    'cur_tag_open'      => '<span class="current">',
		    'cur_tag_close'     => '</span>',
		    'num_tag_open'      => '',
		    'num_tag_close'     => ''

		);
		$this->data['urunler'] = $this->pagination_model->populer_urunler($this->uri->segment(3,0),$config['per_page']);
		$this->pagination->initialize($config);
    $this->data['linkler'] = $this->pagination->create_links();
			$this->sayfa_ac('urunler/populer_urunler');
}
	public function indirimli_urunler($page=1){
		$this->data['title'] = "İndirimli Ürünler";
		$toplam = $this->pagination_model->indirimli_urun_toplam();
		$config = array(
		    'base_url'          => site_url('sayfa/indirimli_urunler/'),
		    'total_rows'        => $toplam,
		    'per_page'          => 5,
		    'num_links'         => 2,
		    'page_query_string' => FALSE,
		    'uri_segment'       => 3,
		    'full_tag_open'     => '<div class="pagination">',
		    'full_tag_close'    => '</div>',
		    'first_link'        => 'İlk Sayfa',
		    'first_tag_open'    => '',
		    'first_tag_close'   => '',
		    'last_link'         => 'Son Sayfa',
		    'last_tag_open'     => '',
		    'last_tag_close'    => '',
		    'next_link'         => 'Sonraki',
		    'next_tag_open'     => '',
		    'next_tag_close'    => '',
		    'prev_link'         => 'Önceki',
		    'prev_tag_open'     => '',
		    'prev_tag_close'    => '',
		    'cur_tag_open'      => '<span class="current">',
		    'cur_tag_close'     => '</span>',
		    'num_tag_open'      => '',
		    'num_tag_close'     => ''

		);
		$this->data['urunler'] = $this->pagination_model->indirimli_urunler($this->uri->segment(3,0),$config['per_page']);
		$this->pagination->initialize($config);
    $this->data['linkler'] = $this->pagination->create_links();
		$this->sayfa_ac('urunler/indirimli_urunler');
}
	public function yorum_kaydet(){
		$this->oturum_kontrol();
		$urun_id = $this->input->post('urun_id');
		$user_id = $this->input->post('user_id');
		$yorum = $this->input->post('yorum');
		if($this->urun_model->yorum_ekle($urun_id,$user_id,$yorum)){
			$this->data['bilgilendirme'] = "Yorum ekleme başarılı";}
		else{
			$this->data['bilgilendirme'] = "Yorum eklemede Sorun";	
		}	
                 redirect('/sayfa/detayli_urun/'.$urun_id, 'refresh');
	}
	public function iletisim_kaydet(){
		$isim = $this->input->post('isim');
		$soyisim = $this->input->post('soyisim');
		$telefon = $this->input->post('telefon');
		$email = $this->input->post('email');
		$mesaj = $this->input->post('mesaj');
		if($this->user_model->iletisim_kaydet($isim,$soyisim,$telefon,$email,$mesaj)){
			$this->data['bilgilendirme'] = "Mesaj gönderme başarılı";}
		else{
			$this->data['bilgilendirme'] = "Sistemde Sorun";	
		}	
    		redirect('/sayfa/iletisim', 'refresh');
	}
	public function sifremi_unuttum(){	
		$this->data['title'] = "Sifremi Unuttum";
		$this->sayfa_ac('kullanici/sifremi_unuttum');
	}
	public function profilim(){
		$this->oturum_kontrol();
		$this->data['title'] = "Profilim";	
		$this->sayfa_ac('kullanici/profilim');
	}
	public function bilgilerimi_guncelle(){
		$this->oturum_kontrol();
		$this->data['title'] = "Bilgilerimi Güncelle";
		$this->sayfa_ac('kullanici/bilgilerimi_guncelle');
	}
	public function bilgilerimi_guncelle_kaydet(){
		$this->oturum_kontrol();
		$isim = $this->input->post('isim');
		$soyisim = $this->input->post('soyisim');
		$telefon = $this->input->post('telefon');
		$email = $this->input->post('email');
		$adres = $this->input->post('adres');
		$id=$this->data['kullanici']['id'];
		$this->user_model->bilgilerimi_guncelle($id,$isim,$soyisim,$telefon,$email,$adres);
		$this->data['bilgilendirme'] = "Bilgileriniz Başarıyla Güncellenmiştir.";
		
		$this->bilgilerimi_guncelle();
	}
	public function parola_degistir(){
		
		$this->oturum_kontrol();
		$this->data['title'] = "Şifremi Değiştir";
		$this->sayfa_ac('kullanici/parola_degistir');
	}
	public function parola_degistir_kaydet(){
		
		$this->oturum_kontrol();
		$this->load->helper('security');
		$id=$this->data['kullanici']['id'];
		$sifre = $this->input->post('parola');
		$sifre_tekrari = $this->input->post('parola_tekrari');
		$yeni_sifre=do_hash($sifre, 'md5');
		if($sifre == $sifre_tekrari){
			if($this->user_model->parola_degistir($id,$yeni_sifre)){
				//basarili yazisi gelecek.
			}
			else{
				//basarisiz.			
			}
		}
		$this->data['bilgilendirme'] = "Sifreniz Başarıyla Değiştirilmiştir";
	 $this->parola_degistir();
	}
	public function tamamlanan_alisverisler(){
		
		$this->oturum_kontrol();
		$this->data['title'] = "Tamamlanan Alışverişler";
		$this->data['alisverisler'] = $this->urun_model->tamamlanan_alisverisler($this->data['kullanici']['id']);
		$this->sayfa_ac('kullanici/tamamlanan_alisverisler');
	}
	public function bekleyen_alisverisler(){
		
		$this->oturum_kontrol();
		$this->data['title'] = "Bekleyen Alışverişler";
		$this->data['alisverisler'] = $this->urun_model->bekleyen_alisverisler($this->data['kullanici']['id']);
		$this->sayfa_ac('kullanici/bekleyen_alisverisler');
	}
	public function bekleyen_alisveris_listesi($sepet_id){
		
		$this->oturum_kontrol();
		$this->data['title'] = "Bekleyen Alışverişiniz";
		$this->data['urunler'] = $this->urun_model->bekleyen_alisveris_listesi($sepet_id);
		$this->sayfa_ac('kullanici/bekleyen_alisveris_listesi');

	}
	public function tamamlanan_alisveris_listesi($sepet_id){
		
		$this->oturum_kontrol();
		$this->data['title'] = "Tamamlanan Alışverişiniz";
		$this->data['urunler'] = $this->urun_model->tamamlanan_alisveris_listesi($sepet_id);
		$this->sayfa_ac('kullanici/tamamlanan_alisveris_listesi');
	}
}
