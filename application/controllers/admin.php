<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
	public function  __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('urun_model');
		$this->data['base_url'] = base_url();
		$this->data['bilgilendirme'] = "";
	}
	public function oturum_kontrol(){
		if(!$this->admin_model->admin_session_kontrol()){
			redirect('/admin/login', 'refresh');
                }
	}	
	
	public function index(){
		$this->oturum_kontrol();
		redirect('admin/dashboard', 'refresh');
	}


	public function login(){
		$this->load->view('admin/login',$this->data);  
	}
	public function sayfa_ac($sayfa){
		$this->load->view('admin/header');
		$this->load->view('admin/'.$sayfa,$this->data);
		$this->load->view('admin/footer');
	}

	//admin ana sayfası
	public function dashboard(){
		if(!$this->admin_model->admin_session_kontrol()){
			 redirect('admin/login', 'refresh');
		}
		$this->sayfa_ac('dashboard');
	}


	public function cikis_yap(){
		$this->admin_model->cikis_yap();
		$this->load->view('admin/login');
	}
	
	
	public function giris(){
		$email = $this->input->post('email');
		$sifre = $this->input->post('sifre');
		if($this->admin_model->giris_kontrol($email,$sifre)){				
			$this->data['bilgilendirme'] = "Hoşgeldiniz sayın Admin.";	
			$session_bilgileri = array(
				'yetki' => 'admin',
				'giris' => TRUE
			);
			$this->session->set_userdata($session_bilgileri);
			$this->sayfa_ac('dashboard');
		}
		else {
			echo "basarisiz";
		}
	}
		
	
	public function urunler_kategori(){
		$this->oturum_kontrol();
		if(!$this->admin_model->admin_session_kontrol()){
			 redirect('admin/login', 'refresh');
		}
		$this->data['kategoriler'] = $this->urun_model->kategori_ile_urun_sayisi();
		
		$this->sayfa_ac('urunler_with_kategori');

	}
	public function kategori_urunleri($kategori_id){
		$this->oturum_kontrol();
		if(!$this->admin_model->admin_session_kontrol()){
			 redirect('admin/login', 'refresh');
		}
		$this->data['urunler'] = $this->urun_model->kategori_urunleri($kategori_id);	
		
		$this->sayfa_ac('kategori_urunleri');


}
    public function urun_ekle(){
		$this->oturum_kontrol();
		if(!$this->admin_model->admin_session_kontrol()){
			redirect('admin/login', 'refresh');
		}	
	
		$this->load->model('urun_model');
		$this->data['kategoriler'] = $this->urun_model->get_kategoriler();
		$this->sayfa_ac('urun_ekle');
    }
    public function kategori_kaydet(){
		$this->oturum_kontrol();
		if(!$this->admin_model->admin_session_kontrol()){
			 redirect('admin/login', 'refresh');
		}
		$kategori = $this->input->post('kategori');
		if($this->urun_model->kategori_ekle($kategori)){
			$this->data['bilgilendirme'] = "Kategori Ekleme Basarili";	
		}
		else {
			$this->data['bilgilendirme'] = "Sistemde sorun";	
		}
		$this->sayfa_ac('kategori_ekle');
    }
    public function kategori_ekle(){
		$this->oturum_kontrol();
		if(!$this->admin_model->admin_session_kontrol()){
			 redirect('admin/login', 'refresh');
		}
		$this->sayfa_ac('kategori_ekle');
	}
	public function urun_guncelle(){
		$this->oturum_kontrol();
		if(!$this->admin_model->admin_session_kontrol()){
			 redirect('admin/login', 'refresh');
		}
		$id = $this->input->post('id');
		$isim = $this->input->post('isim');
		$stok = $this->input->post('stok');
		$fiyat = $this->input->post('fiyat');
		$indirimsiz_fiyati = $this->input->post('indirimsiz_fiyati');
		$detay = $this->input->post('detay');
		$kategori_id = $this->input->post('kategori_id');
		if($this->urun_model->urun_guncelle($id,$isim,$stok,$indirimsiz_fiyati,$fiyat,$detay,$kategori_id)){
			$this->data['bilgilendirme'] = "Urun Guncelleme Basarili";		
		}
		else{
			$this->data['bilgilendirme'] = "Hata";		
		}
		$this->kategori_urunleri($kategori_id);
	}  
	public function urun_kaydet(){
		$this->oturum_kontrol();
		if(!$this->admin_model->admin_session_kontrol()){
			 redirect('admin/login', 'refresh');
		}
		$this->load->library('SimpleImage');
		$this->data['kategoriler'] = $this->urun_model->get_kategoriler();
		$isim = $this->input->post('isim');
		$stok = $this->input->post('stok');
		$fiyat = $this->input->post('fiyat');
		$indirimsiz_fiyati = $this->input->post('indirimsiz_fiyati');
		$kategori_id = $this->input->post('kategori_id');
		$detay = $this->input->post('detay');
		$this->urun_model->urun_ekle($isim,$stok,$indirimsiz_fiyati,$fiyat,$kategori_id,$detay);	
		$id = $this->urun_model->get_id($isim,$kategori_id);			
		$uzanti=array('image/jpeg','image/jpg','image/png','image/x-png','image/gif');
		$dizin="images/urunler/orjinal";
		for($i=1;$i<10;$i++){
			if($_FILES['resim'.$i]['name']!= ""){
				$dosya = $_FILES['resim'.$i]['name']; 
				$adi = "su-med_".rand(0,1500).substr($dosya,-4);    	
				if(in_array(strtolower($_FILES['resim'.$i]['type']),$uzanti)){
					umask(0);
					move_uploaded_file($_FILES['resim'.$i]['tmp_name'],"./$dizin/$adi");
					$this->urun_model->resim_ekle($id,$adi);
					$image = new SimpleImage();
					$image->load(base_url().'images/urunler/orjinal/'.$adi);
					$image->resize(150,150);
					 $image->save('images/urunler/150x150/'.$adi);
					$this->data['bilgilendirme'] = "Urun Kaydetme Başarılı.";			}
				else{
					$this->data['bilgilendirme'] = "Sistemde Sorun.";
				}
			}
    		 }
		$this->sayfa_ac('urun_ekle');
	}
    public function urun_gor(){
		$this->oturum_kontrol();
		if(!$this->admin_model->admin_session_kontrol()){
			 redirect('admin/login', 'refresh');
		}
		$this->load->model('urun_model');
		$urunler = $this->urun_model->get_news(30);
    }
    public function kategori_sil_uyari($id){
		$this->oturum_kontrol();
		if(!$this->admin_model->admin_session_kontrol()){
			 redirect('admin/login', 'refresh');
		}
		$this->load->model('urun_model');
		$this->data['silinecekler'] = $this->urun_model->kategori_sil_uyari($id);
		$this->data['kategori_id'] = $id;
		$this->sayfa_ac('kategori_sil_uyari');
    }
	public function kategori_sil(){
		$this->oturum_kontrol();
		if(!$this->admin_model->admin_session_kontrol()){
			 redirect('admin/login', 'refresh');
		}
		$id = $this->input->get('id');
		if($this->urun_model->kategori_sil($id)){
			$this->data['bilgilendirme'] = "Kategori Silme Başarılı";
			$this->kategori_duzenle_main();
		}
		else{
			$this->data['bilgilendirme'] = "Sistemde Sorun.";
			$this->kategori_duzenle_main();
		}
	}	
	public function urun_duzenle($id){
		$this->oturum_kontrol();
		if(!$this->admin_model->admin_session_kontrol()){
			 redirect('admin/login', 'refresh');
		}
		$this->data['kategoriler']=$this->urun_model->get_kategoriler();
		$this->data['urun'] = $this->urun_model->get_urun($id);
		$this->sayfa_ac('urun_duzenle');
	}
	
      public function kategori_duzenle_main(){
		$this->oturum_kontrol();
		if(!$this->admin_model->admin_session_kontrol()){
			redirect('admin/login', 'refresh');
		}
		$this->data['kategoriler'] = $this->urun_model->kategori_ile_urun_sayisi();		
		$this->sayfa_ac('kategori_duzenle_main');
	
	}
	public function urun_sil($id,$kategori_id){
		$this->oturum_kontrol();
		if(!$this->admin_model->admin_session_kontrol()){
			 redirect('admin/login', 'refresh');
		}
		if($this->urun_model->urun_sil($id)){
			$this->data['bilgilendirme'] = "Urun Silme Basarili";
			$this->kategori_urunleri($kategori_id);
	
		}
		else{
			$this->data['bilgilendirme'] = "Sistemde Sorun";
			$this->kategori_urunleri($kategori_id);	
		}
	}
	public function manset_resmi_kaydet(){
		$this->oturum_kontrol();
		$this->load->library('SimpleImage');
		$uzanti=array('image/jpeg','image/jpg','image/png','image/x-png','image/gif');
		$dizin="images/manset";
		umask(0);
		if($_FILES['manset']['name'] != ""){
				$dosya = $_FILES['manset']['name']; 
				$adi = "su-med_".rand(0,1500000).substr($dosya,-4);    	
				if(in_array(strtolower($_FILES['manset']['type']),$uzanti)){
					move_uploaded_file($_FILES['manset']['tmp_name'],"./".$dizin."/".$adi);
					$this->urun_model->manset_resmi_kaydet($adi);
					$image = new SimpleImage();
					$image->load(base_url().'images/manset/'.$adi);
					$image->resize(960,430);
					$image->save('images/manset/'.$adi);
					$this->data['bilgilendirme'] = "Manset Ekleme Basarili";
				}
				else{
					 $this->data['bilgilendirme'] =  "Bu \"". $_FILES['resim'.$i]['type']."\" basarisiz";
				}
				$this->manset_resmi_ekle();	
		}
	}
	public function manset_resmi_ekle(){
		$this->oturum_kontrol();
		$this->sayfa_ac('manset_resmi_ekle');
	}
	public function statik_sayfa_kategorisi_ekle(){
		$this->oturum_kontrol();
		$this->sayfa_ac('statik_sayfa_kategorisi_ekle');
	}
	public function statik_sayfa_kategorisi_kaydet(){
		$this->oturum_kontrol();
		if(!$this->admin_model->admin_session_kontrol()){
			 redirect('admin/login', 'refresh');
		}
		$kategori = $this->input->post('kategori');
		$this->oturum_kontrol();
		if($this->statik_sayfa_model->statik_sayfa_kategorisi_ekle($kategori)){
			$this->data['bilgilendirme'] = "Kategori Ekleme Basarili";	
		}
		else {
			$this->data['bilgilendirme'] = "Sistemde sorun";	
		}
		$this->statik_sayfa_kategorisi_ekle();
	}
	public function gelen_alisverisler(){
		$this->oturum_kontrol();
		$this->data['alisverisler'] = $this->admin_model->gelen_alisverisler(NULL,'beklemede');
		$this->sayfa_ac('gelen_alisverisler');
	}
	public function gelen_alisveris_detayli_goruntule($id){
		$this->oturum_kontrol();
		$this->data['alisverisler'] = $this->admin_model->gelen_alisverisler($id,'beklemede');
		$this->sayfa_ac('gelen_alisveris_detayli_goruntule');
	}
	public function tamamlanan_alisverisler(){
		$this->oturum_kontrol();
		$this->data['alisverisler'] = $this->admin_model->gelen_alisverisler(NULL,'onaylandi');
		$this->sayfa_ac('tamamlanan_alisverisler');
	}
	public function tamamlanan_alisveris_detayli_goruntule($id){
		$this->oturum_kontrol();
		$this->data['alisverisler'] = $this->admin_model->gelen_alisverisler($id,'onaylandi');
		$this->data['sepet_id'] = $id;

		$this->sayfa_ac('tamamlanan_alisveris_detayli_goruntule');
	}
	public function sepet_onayla($id){
		$this->oturum_kontrol();
		$this->admin_model->sepet_onayla($id);
		$this->data['alisverisler'] = $this->admin_model->gelen_alisverisler(NULL,'beklemede');
		$this->sayfa_ac('gelen_alisverisler');
	}
	public function kullanicilar(){
		$this->oturum_kontrol();
		$this->data['kullanicilar'] = $this->admin_model->kullanicilar();
		$this->sayfa_ac('kullanicilar');	
	}
	public function okunmamis_mesajlar(){
		$this->oturum_kontrol();
		$this->data['okunmamis_mesajlar'] = $this->admin_model->okunmamis_mesajlar();
		$this->sayfa_ac('okunmamis_mesajlar');
	}
	public function okunmus_mesajlar(){
		$this->oturum_kontrol();
		$this->data['okunmus_mesajlar'] = $this->admin_model->okunmus_mesajlar();
		$this->sayfa_ac('okunmus_mesajlar');
	}
	public function okunmamis_mesaj_oku($id){
		$this->oturum_kontrol();
		$this->admin_model->mesaj_okundu_yap($id);
		$this->data['mesaj'] = $this->admin_model->mesaj_oku($id);
		$this->sayfa_ac('mesaj_oku');
	}
	public function okunmus_mesaj_oku($id){
		$this->oturum_kontrol();
		$this->data['mesaj'] = $this->admin_model->mesaj_oku($id);
		$this->sayfa_ac('mesaj_oku');
	}
	public function mesaj_sil($id){
		$this->oturum_kontrol();
		$this->data['mesaj'] = $this->admin_model->mesaj_sil($id);
		$this->sayfa_ac('dashboard');
	}
	public function sepet_sil($id){
		$this->oturum_kontrol();
		$this->admin_model->sepet_sil($id);
		$this->sayfa_ac('dashboard');
	}
	public function alisveris_tamamlanmadi_yap($id){
		$this->oturum_kontrol();
		$this->admin_model->alisveris_tamamlanmadi_yap($id);
		$this->sayfa_ac('dashboard');
	}
	public function mesaj_okunmadi_olarak_isaretle($id){
		$this->admin_model->mesaj_okunmadi_yap($id);
		$this->okunmus_mesajlar();
	
	}
	public function kategori_duzenle($id){
		$this->oturum_kontrol();
		$this->data['kategori_isim'] = $this->urun_model->get_kategori_isim($id);
		$this->data['kategori_id'] = $id;
		$this->sayfa_ac('kategori_duzenle');
	}
	public function kategori_duzenleme_kaydet(){
		$this->oturum_kontrol();
		$id = $this->input->post('id');
		$isim = $this->input->post('kategori');
		$this->admin_model->kategori_duzenleme_kaydet($id,$isim);
		$this->kategori_duzenle_main();
	}
	public function tamamlanan_alisveris_durum_ekle(){
		$this->oturum_kontrol();
		$sepet_id = $this->input->post('sepet_id');
		$durum = $this->input->post('durum');
		$this->admin_model->tamamlanan_alisveris_durum_ekle($sepet_id,$durum);
		$this->tamamlanan_alisveris_detayli_goruntule($sepet_id);
	}
	
}	
?>
