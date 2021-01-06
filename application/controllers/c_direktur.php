<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_direktur extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_direktur');
		$this->id_dokter = $this->session->userdata('id');

		if($this->session->userdata('status') != 'login'){
			redirect(base_url('c_authentication'));
		} elseif ($this->session->userdata('hakakses') == 'pendaftaran'){
			redirect(base_url('c_petugaspendaftaran'));
		} elseif ($this->session->userdata('hakakses') == 'logistik'){
			redirect(base_url('c_logistik'));
		} elseif ($this->session->userdata('hakakses') == 'dokter'){
			redirect(base_url('c_dokter'));
		}
	}

	public function index(){
		$this->load->view('header');
		$this->load->view('direktur/dashboard');
		$this->load->view('footer');
	}

	public function cari_laporan_profil(){
		$nama = $this->input->post('nama');
		if(isset($nama)){
			$data['pasien'] = $this->m_direktur->certain_data_pasien($nama);
			$this->load->view('header');
			$this->load->view('direktur/hasil_cari_laporan_profil',$data);
			$this->load->view('footer');
		} else {
			$this->load->view('header');
			$this->load->view('direktur/cari_laporan_profil');
			$this->load->view('footer');
		}
	}

	public function laporan_profil(){
		$id = $this->uri->segment(3);
		$where = array('id_pasien' => $id);
		$data['pasien'] = $this->m_direktur->single_data('t_pasien', $where);
		$data['berobat'] = $this->m_direktur->data_profil_pasien($id);
		$this->load->view('direktur/laporan_profil', $data);
	}

	public function statistikkunjungan(){
		$tanggalawal = $this->input->post('tanggalawal');
		$tanggalakhir = $this->input->post('tanggalakhir');
		if(isset($tanggalawal) and isset($tanggalakhir)){
			$data['total'] = $this->m_direktur->totalkunjungan($tanggalawal, $tanggalakhir);
			$data['tanggal'] = $this->m_direktur->tglkunjungan($tanggalawal, $tanggalakhir);
			$this->load->view('header');
			$this->load->view('direktur/statistikkunjungan', $data);
		} else {
			$this->load->view('header');
			$this->load->view('direktur/statistikkunjungan');
		}
	}

	public function statistikpendaftar(){
		$tanggalawal = $this->input->post('tanggalawal');
		$tanggalakhir = $this->input->post('tanggalakhir');
		$poliklinik = $this->input->post('poliklinik');
		if(isset($tanggalawal) and isset($tanggalakhir) and isset($poliklinik)){
			$data['poliklinikselected'] = $this->m_direktur->selecteddataberobatklinik($tanggalawal, $tanggalakhir, $poliklinik);
			$data['nama'] = $poliklinik;
			$data['poliklinik'] = $this->m_direktur->databerobatklinik();
			$this->load->view('header');
			$this->load->view('direktur/statistikpoliklinik', $data);
		} else {
			$data['poliklinik'] = $this->m_direktur->databerobatklinik();
			$this->load->view('header');
			$this->load->view('direktur/statistikpoliklinik', $data);
		}
	}

}