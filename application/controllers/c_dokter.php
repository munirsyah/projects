<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_dokter extends CI_Controller {

	private $id_dokter;

	public function __construct(){
		parent::__construct();
		$this->load->model('m_dokter');
		$this->id_dokter = $this->session->userdata('id');

		if($this->session->userdata('status') != 'login'){
			redirect(base_url('c_authentication'));
		} elseif ($this->session->userdata('hakakses') == 'pendaftaran'){
			redirect(base_url('c_petugaspendaftaran'));
		} elseif ($this->session->userdata('hakakses') == 'logistik'){
			redirect(base_url('c_logistik'));
		} elseif ($this->session->userdata('hakakses') == 'direktur'){
			redirect(base_url('c_direktur'));
		}
	}

	public function index(){
		$this->load->view('header');
		$this->load->view('dokter/dashboard');
		$this->load->view('footer');
	}

	public function input_diagnosa(){
		$data['berobat'] = $this->m_dokter->get_data_berobat($this->id_dokter);
		$this->load->view('header');
		$this->load->view('dokter/data_pasien_berobat',$data);
		$this->load->view('footer');
	}

	public function form_input_diagnosa(){
		$id_berobat = $this->uri->segment(3);
		$where = array('id_berobat' => $id_berobat);
		$id = $this->m_dokter->cari_id_pasien($where);
		
		foreach ($id as $row) {
			$id_pasien = $row->id_pasien;
		}

		$kondisi = array('id_pasien' => $id_pasien);
		$data['berobat'] = $this->m_dokter->get_pasien_berobat($id_berobat);
		
		$jumlah_data = $this->m_dokter->total_berobat($id_pasien);

		$config['base_url']			= base_url().'c_dokter/form_input_diagnosa/'.$id_berobat.'/';
		$config['total_rows']		= $jumlah_data;
		$config['per_page']			= 1;
		$config['uri_segment']		= 4;
		$config['full_tag_open'] 	= "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
		$config['full_tag_close'] 	="</ul>";
	    $config['num_tag_open'] 	= '<li>';
	    $config['num_tag_close'] 	= '</li>';
	    $config['cur_tag_open'] 	= "<li class='disabled'><li class='active'><a href='#'>";
	    $config['cur_tag_close'] 	= "<span class='sr-only'></span></a></li>";
	    $config['next_tag_open'] 	= "<li>";
	    $config['next_tagl_close'] 	= "</li>";
	    $config['prev_tag_open'] 	= "<li>";
	    $config['prev_tagl_close'] 	= "</li>";
	    $config['first_tag_open'] 	= "<li>";
	    $config['first_tagl_close'] = "</li>";
	    $config['last_tag_open'] 	= "<li>";
	    $config['last_tagl_close'] 	= "</li>";
		$page 						= $this->uri->segment(4);

		$this->pagination->initialize($config);
		$data['rekammedispasien'] = $this->m_dokter->select($config['per_page'], $page, $id_pasien);

		$this->load->view('dokter/form_input_diagnosa',$data);
		$this->load->view('footer');
	}

	public function simpan_diagnosa(){
		$id_berobat = htmlspecialchars($this->input->post('id_berobat'));
		$keluhan = htmlspecialchars($this->input->post('keluhan'));
		$diagnosa = htmlspecialchars($this->input->post('diagnosa'));
		$tgldiagnosa = date('Y-m-d');
		$id_dokter = $this->session->userdata('id');
		$id_pasien = $this->input->post('id_pasien');
		$data = array(
			'data_keluhan' => $keluhan,
			'data_diagnosa' => $diagnosa,
			'resep' => htmlspecialchars($this->input->post('resep')),
			'tindakan' => htmlspecialchars($this->input->post('tindakan')),
			'tgl_diagnosa' => $tgldiagnosa,
			'id_dokter' => $id_dokter,
			'id_pasien' => $id_pasien
			);

		$this->m_dokter->input_diagnosa($data);

		$data = array('status' => 'Sudah');
		$where = array('id_berobat' => $id_berobat);
		$this->m_dokter->update_berobat($where,$data,'t_berobat');

		redirect('c_dokter/input_diagnosa');

	}

	public function tampil_rekam_medis_pasien(){
		if(isset($_POST['id'])){
			$id = $this->input->post('id');
			$data['pasien'] = $this->m_dokter->get_pasien($id);
			$data['rekammedispasien'] = $this->m_dokter->get_rekam_medis_pasien($id);
			$this->load->view('header');
			$this->load->view('dokter/data_rekam_medis_pasien',$data);
			$this->load->view('footer');
		} else {
			$this->load->view('header');
			$this->load->view('dokter/cari_rekam_medis_pasien');
			$this->load->view('footer');
		}
	}

}