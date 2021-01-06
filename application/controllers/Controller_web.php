<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_web extends CI_Controller {


	public function index()
	{
		$data=array();
		$data['title']				= 'Beranda';
		$data['kontak']				= $this->Config_model->kontak();
		$data['email']				= $this->Config_model->email();
		$data['alamat']				= $this->Config_model->alamat();
		$data['footer']				= $this->Config_model->footer();
		
		$data['spesialis2']			= $this->Administrator_model->spesialis();
		$data['pasien']				= $this->Administrator_model->getPasien();
		$data['pasien_total']		= $data['pasien']->num_rows();
		
		$data['spesialis']			= $this->Administrator_model->getSpesialis();
		$data['spesialis_total']	= $data['spesialis']->num_rows();
		
		$data['dokter']				= $this->Administrator_model->getDokter();
		$data['dokter_total']		= $data['dokter']->num_rows();
		
		$this->load->view('web/head',$data);
		$this->load->view('web/menu');
		$this->load->view('web/slider');
		$this->load->view('web/home',$data);
		$this->load->view('web/footer');
		$this->load->view('login',$data);
	}
	
	public function pendaftaran()
	{
		$data=array();
		$data['title']				= 'Pendaftaran Online Pasien';
		$data['kontak']				= $this->Config_model->kontak();
		$data['email']				= $this->Config_model->email();
		$data['alamat']				= $this->Config_model->alamat();
		$data['footer']				= $this->Config_model->footer();
		
		$data['spesialis']			= $this->Administrator_model->spesialis();
		$data['spesialis2']			= $this->Administrator_model->spesialis();
		
		
		$this->load->view('web/head',$data);
		$this->load->view('web/menu');
		$this->load->view('web/pendaftaran',$data);
		$this->load->view('web/footer');
	}
	
	function pendaftaran_save(){
		$data['spesialis_id']		= $this->input->post('spesialis_id',true);
		$data['perawatan_id']		= $this->input->post('perawatan_id',true);
		$data['nama_pasien']		= $this->input->post('nama_pasien',true);
		$data['umur']				= $this->input->post('umur',true);
		$data['kontak']				= $this->input->post('kontak',true);
		$data['sex']				= $this->input->post('sex',true);
		$data['email_pasien']		= $this->input->post('email_pasien',true);
		$data['keluhan_penyakit']	= $this->input->post('keluhan_penyakit',true);
		
		$this->Pasien_model->pendaftaran_save($data);
		
		$xdata['message']			= 'Data Pendaftaran Anda Telah Tersimpan..!';
		$xdata['token']				=  $data['perawatan_id'];
		$this->session->set_userdata($xdata);
		redirect('Controller_web/pendaftaran');
		

		}
	
	public function token()
	{
		$data=array();
		$data['title']				= 'Token';
		$data['kontak']				= $this->Config_model->kontak();
		$data['email']				= $this->Config_model->email();
		$data['alamat']				= $this->Config_model->alamat();
		$data['footer']				= $this->Config_model->footer();
		
		$data['spesialis']			= $this->Administrator_model->spesialis();
		$data['spesialis2']			= $this->Administrator_model->spesialis();
		
		
		$this->load->view('web/head',$data);
		$this->load->view('web/menu');
		$this->load->view('web/token',$data);
		$this->load->view('web/footer');
	}
	
	public function cek_token()
	{
		$data=array();
		$data['title']				= 'Token';
		$data['kontak']				= $this->Config_model->kontak();
		$data['email']				= $this->Config_model->email();
		$data['alamat']				= $this->Config_model->alamat();
		$data['footer']				= $this->Config_model->footer();
		
		$data['spesialis']			= $this->Administrator_model->spesialis();
		$data['spesialis2']			= $this->Administrator_model->spesialis();
		
		$data['token']				= $this->input->post('token',true);
		$data['progress']			= $this->Pasien_model->pasien_progress_info($data['token']);
			if($data['progress']->progress==1) {
				$data['progress_info']	= $this->Pasien_model->pasien_total_info($data['token']);
				} 
			else {
					$xdata['message']		= 'Maaf data anda belum diperiksa atau diperbaharui oleh dokter';
					$this->session->set_userdata($data);
					redirect('Controller_web/pendaftaran');
					}
		
		$this->load->view('web/head',$data);
		$this->load->view('web/menu');
		$this->load->view('web/cek_token',$data);
		$this->load->view('web/footer');
	}
	
	
	public function dokter()
	{
		$data=array();
		$data['title']				= 'Data Dokter';
		$data['kontak']				= $this->Config_model->kontak();
		$data['email']				= $this->Config_model->email();
		$data['alamat']				= $this->Config_model->alamat();
		$data['footer']				= $this->Config_model->footer();
		
		$data['spesialis']			= $this->Administrator_model->spesialis();
		$data['spesialis2']			= $this->Administrator_model->spesialis();
		
		$data['dokter']				= $this->Administrator_model->dokter();
		
		
		$this->load->view('web/head',$data);
		$this->load->view('web/menu');
		$this->load->view('web/dokter',$data);
		$this->load->view('web/footer');
	}
	
	
	public function kontak()
	{
		$data=array();
		$data['title']				= 'Hubungi Kami';
		$data['kontak']				= $this->Config_model->kontak();
		$data['email']				= $this->Config_model->email();
		$data['alamat']				= $this->Config_model->alamat();
		$data['footer']				= $this->Config_model->footer();
		
		$data['spesialis']			= $this->Administrator_model->spesialis();
		$data['spesialis2']			= $this->Administrator_model->spesialis();
		

		$this->load->view('web/head',$data);
		$this->load->view('web/menu');
		$this->load->view('web/kontak',$data);
		$this->load->view('web/footer');
	}
	
	
	public function kontak_kirim()
	{
		$data['nama']		= $this->input->post('nama',true);
		$data['sex']		= $this->input->post('sex',true);
		$data['hp']			= $this->input->post('hp',true);
		$data['email']		= $this->input->post('email',true);
		$data['message']	= $this->input->post('message',true);
		$this->Administrator_model->kontak_kirim($data);
		$xdata['message']	= 'Pesan Anda Telah Masuk Ke Kotak Pesan Kami, Kami Akan Segera Merespon Melalui Email Atau Nomor HP Anda';
		$this->session->set_userdata($xdata);
		redirect('Controller_web/kontak');
		
		$data['title']				= 'Hubungi Kami';
		$data['kontak']				= $this->Config_model->kontak();
		$data['email']				= $this->Config_model->email();
		$data['alamat']				= $this->Config_model->alamat();
		$data['footer']				= $this->Config_model->footer();
		
		$data['spesialis']			= $this->Administrator_model->spesialis();
		$data['spesialis2']			= $this->Administrator_model->spesialis();
		

		$this->load->view('web/head',$data);
		$this->load->view('web/menu');
		$this->load->view('web/kontak',$data);
		$this->load->view('web/footer');
	}
	
	
	
	
	
}
