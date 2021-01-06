<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_petugaspendaftaran extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_petugaspendaftaran');

		if($this->session->userdata('status') != 'login'){
			redirect(base_url('c_authentication'));
		} elseif ($this->session->userdata('hakakses') == 'dokter'){
			redirect(base_url('c_dokter'));
		} elseif ($this->session->userdata('hakakses') == 'logistik'){
			redirect(base_url('c_logistik'));
		} elseif ($this->session->userdata('hakakses') == 'direktur'){
			redirect(base_url('c_direktur'));
		}
	}

	public function index(){
		$data['pasien'] = $this->m_petugaspendaftaran->select_pasien()->result();
		$this->load->view('header');
		$this->load->view('petugas_pendaftaran/dashboard');
		$this->load->view('footer',$data);
	}

	public function tampil_pasien(){
		$data['pasien'] = $this->m_petugaspendaftaran->select_pasien()->result();

		$this->load->view('header');
		$this->load->view('petugas_pendaftaran/list_pasien', $data);
		$this->load->view('footer');
	}

	public function tambah_pasien(){
		$this->load->view('header');
		$this->load->view('petugas_pendaftaran/tambah_pasien');
		$this->load->view('footer');
	}

	public function edit_pasien(){
		$id = $this->uri->segment(3);
		$where = array('id_pasien' => $id);
		$data['pasien'] = $this->m_petugaspendaftaran->cari_pasien($where)->result();

		$this->load->view('header');
		$this->load->view('petugas_pendaftaran/edit_pasien', $data);
		$this->load->view('petugas_pendaftaran/footer_petugaspendaftaran');
	}

	public function simpan_pasien(){
		$identitas = $this->input->post('identitas');
		$nama = htmlspecialchars($this->input->post('nama'));
		$jk = $this->input->post('jk');
		$tempat = htmlspecialchars($this->input->post('tempat'));
		$tanggal = $this->input->post('tanggal');
		$alamat = htmlspecialchars($this->input->post('alamat'));
		$goldar = $this->input->post('goldar');
		$notelp = htmlspecialchars($this->input->post('notelp'));
		$status = $this->input->post('status');
		$pekerjaan = $this->input->post('pekerjaan');

		$usia = floor(((abs(strtotime ($tanggal) - strtotime (date("Y-m-d"))))/(60*60*24))/365);
		
		$tanggal = date_format(date_create($this->input->post('tanggal')), "Y-m-d");

		$where = array('id_pasien' => $identitas);

		$data = array(
				'nama_pasien' => ucwords($nama),
				'jeniskelamin_pasien' => $jk,
				'tmptlahir_pasien' => ucfirst($tempat),
				'tgllahir_pasien' => $tanggal,
				'alamat_pasien' => $alamat,
				'goldar_pasien' => $goldar,
				'notelp_pasien' => $notelp,
				'usia_pasien' => $usia,
				'statuspernikahan_pasien' => $status,
				'pekerjaan_pasien' => $pekerjaan
				 );

		if(isset($_POST['identitas'])){
			$this->m_petugaspendaftaran->edit_data_pasien($data,$identitas);
			redirect('c_petugaspendaftaran/tampil_pasien');
		} else {
			$this->m_petugaspendaftaran->daftar_pasien($data);
			redirect('c_petugaspendaftaran/tampil_pasien');
		}

	}

	public function hapus_pasien(){
		$id = $this->uri->segment(3);
		$where = array('id_pasien' => $id);
		$this->m_petugaspendaftaran->hapus_pasien($where);
		redirect('c_petugaspendaftaran/tampil_pasien');
	}

	public function form_daftar_berobat(){
		$id = $this->uri->segment(3);
		$where = array('id_pasien' => $id);
		$data['pasien'] = $this->m_petugaspendaftaran->cari_pasien($where)->result();
		$this->load->view('header');
		$this->load->view('petugas_pendaftaran/fix_daftar_berobat_pasien',$data);
		$this->load->view('footer');
	}

	public function daftar_berobat_pasien(){
		$id_pasien = $this->input->post('id_pasien');
		if(isset($id_pasien)){
			$id_dokter = $this->input->post('poliklinik');


			$data = array(
				'id_pasien' => $id_pasien,
				'id_dokter' => $id_dokter,
				'tgl_berobat' => $this->input->post('tanggal'),
				'status' => 'Belum'
				);
			$this->m_petugaspendaftaran->daftar_berobat_pasien($data);
			
			$data['berobat'] = $this->m_petugaspendaftaran->list_data_berobat()->result();

			$this->load->view('header');
			$this->load->view('petugas_pendaftaran/list_data_berobat', $data);
			$this->load->view('footer');
		} else {
			$this->load->view('header');
			$this->load->view('petugas_pendaftaran/daftar_berobat_pasien');
			$this->load->view('footer');	
		}
	}

	public function cari_pasien(){
		$nama = $this->input->post('nama');
		$data['pasien'] = $this->m_petugaspendaftaran->cari_detil_pasien($nama)->result();
		$this->load->view('header');
		$this->load->view('petugas_pendaftaran/input_berobat_pasien',$data);
		$this->load->view('footer');
	}

	public function detil_pasien(){
		$this->load->view('header');
		$this->load->view('petugas_pendaftaran/lihat_detil_pasien');
		$this->load->view('footer');
	}

	public function cari_detil_pasien(){
		$nama = $this->input->post('nama');
		$data['data_rinci'] = $this->m_petugaspendaftaran->cari_detil_pasien($nama);
		$this->load->view('header');
		$this->load->view('petugas_pendaftaran/list_hasil_cari_pasien',$data);
		$this->load->view('footer');
	}

	public function lihat_detil_pasien(){
		$id = $this->uri->segment(3);
		$where = array('id_pasien' => $id);
		$data['detil'] = $this->m_petugaspendaftaran->cari_pasien($where)->result();
		$data['berobat'] = $this->m_petugaspendaftaran->lihat_detil_pasien($id)->result();

		$this->load->view('header');
		$this->load->view('petugas_pendaftaran/data_detil_pasien', $data);
		$this->load->view('footer');
	}

	public function list_data_berobat(){
		$data['berobat'] = $this->m_petugaspendaftaran->list_data_berobat()->result();

		$this->load->view('header');
		$this->load->view('petugas_pendaftaran/list_data_berobat', $data);
		$this->load->view('footer');
	}

	public function canceldaftar(){
		$id = $this->uri->segment(3);
		$where = array('id_berobat' => $id);
		$this->m_petugaspendaftaran->canceldaftar($where);
		redirect('c_petugaspendaftaran/list_data_berobat');
	}
	public function cetak_pasien(){
		$data['pasien'] = $this->db->get('t_pasien')->result();
		$this->load->view('petugas_pendaftaran/cetak_pasien', $data);
	}

	public function laporan_pasien(){
		$data['pasien'] = $this->m_petugaspendaftaran->selectjoin('t_dokter','t_berobat','t_dokter.id_dokter = t_berobat.id_dokter','t_pasien','t_berobat.id_pasien = t_pasien.id_pasien')->result();
		$this->load->view('petugas_pendaftaran/cetak_berobat', $data);
	}

}