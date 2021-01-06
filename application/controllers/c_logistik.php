<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_logistik extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_logistik');
		$this->load->library('pagination');

		if($this->session->userdata('status') != 'login'){
			redirect(base_url('c_authentication'));
		} elseif ($this->session->userdata('hakakses') == 'dokter'){
			redirect(base_url('c_dokter'));
		} elseif ($this->session->userdata('hakakses') == 'pendaftaran'){
			redirect(base_url('c_petugaspendaftaran'));
		} elseif ($this->session->userdata('hakakses') == 'direktur'){
			redirect(base_url('c_direktur'));
		}

	}

	public function index(){
		$this->load->view('header');
		$this->load->view('logistik/dashboard');
		$this->load->view('footer');
	}

	public function input_obat(){
		$this->load->view('header');
		$this->load->view('logistik/input_obat');
		$this->load->view('footer');
	}

	public function tampil_obat(){
		/*$jumlah_data = $this->m_logistik->total_obat();

		$config['base_url']			= base_url().'c_logistik/tampil_obat/';
		$config['total_rows']		= $jumlah_data;
		$config['per_page']			= 3;
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
		$page 					= $this->uri->segment(3);

		$this->pagination->initialize($config);*/
		$data['obat'] = $this->db->get('t_obat')->result();

		$this->load->view('header');
		$this->load->view('logistik/data_obat', $data);
		$this->load->view('footer');
	}

	public function simpan_obat(){
		$id = htmlspecialchars($this->input->post('id'));
		$nama = htmlspecialchars($this->input->post('nama'));
		$jenis = $this->input->post('jenis');
		$tanggal = date_format(date_create($this->input->post('tanggal')), "Y-m-d");
		$harga = htmlspecialchars($this->input->post('harga'));
		$stok = htmlspecialchars($this->input->post('stok'));
		$satuan = htmlspecialchars($this->input->post('satuan'));

		
		$where = array('id_obat' => $id);

		$data = array(
				'nama_obat' => $nama,
				'jenis_obat' => $jenis,
				'tglkadaluarsa_obat' => $tanggal,
				'hargajual_obat' => $harga,
				'stok_obat' => $stok,
				'satuan' => $satuan
				);

		if(isset($_POST['id'])){
			$this->m_logistik->edit_data_obat($data, $where);
			redirect('c_logistik/tampil_obat');
		} else {
			$this->m_logistik->input_obat($data);
			redirect('c_logistik/tampil_obat');
		}

	}

	public function edit_obat(){
		$id = $this->uri->segment(3);
		$where = array('id_obat' => $id);
		$data['obat'] = $this->m_logistik->cari_obat($where)->result();

		$this->load->view('header');
		$this->load->view('logistik/edit_obat', $data);
		$this->load->view('footer');
	}

	public function hapus_obat(){
		$id = $this->uri->segment(3);
		$where = array('id_obat' => $id);
		$this->m_logistik->hapus_obat($where);
		redirect('c_logistik/tampil_obat');
	}

	public function penjualan_obat(){
		$data['obat'] = $this->db->get('t_obat')->result();
		$data['penjualan'] = $this->db->get('t_penjualan')->result();
		$this->load->view('header');
		$this->load->view('logistik/penjualan', $data);
		$this->load->view('footer');
	}

	public function input_penjualan(){
		$data['obat'] = $this->db->get('t_obat')->result();
		$this->load->view('header');
		$this->load->view('logistik/input_penjualan',$data);
		$this->load->view('footer');

	}

	public function simpan_penjualan(){
		$id_obat = $this->input->post('id');
		$jumlah = $this->input->post('jumlah');
		$where = array('id_obat' => $id_obat);

		$getnama = $this->m_logistik->selectx('t_obat',$where)->result();
		$getstok = $this->m_logistik->selectx('t_obat',$where)->result();

		foreach ($getstok as $key ) {
			$stok=$key->stok_obat;
		}

		foreach ($getnama as $key ) {
			$selectnama=$key->nama_obat;
		}
		
		
	

		$data = array(
			'id_obat' => $id_obat,
			'nama_obat' => $selectnama,
			'jumlah_beli' => $jumlah
		);

		$dataupdate = array(
			'stok_obat' => $stok-$jumlah
		);

		

		$this->m_logistik->edit_data_obat($dataupdate, $where);
		$this->m_logistik->input_penjualan($data);

		redirect('c_logistik/penjualan_obat');
	}

	public function tampil_item_non_obat(){
		$data['item'] = $this->m_logistik->tampil_item_non_obat()->result();

		$this->load->view('header');
		$this->load->view('logistik/data_medis_non_obat', $data);
		$this->load->view('footer');
	}

	public function input_item_non_obat(){
		$this->load->view('header');
		$this->load->view('logistik/input_medis_non_obat');
		$this->load->view('footer');
	}

	public function simpan_item_non_obat(){
		$id = htmlspecialchars($this->input->post('id'));
		$nama = htmlspecialchars($this->input->post('nama'));
		$tanggal = date_format(date_create($this->input->post('tanggal')), "Y-m-d");
		$harga = htmlspecialchars($this->input->post('harga'));
		$kuantitas = htmlspecialchars($this->input->post('kuantitas'));
		
		$where = array('id_item_medis' => $id);

		$data = array(
				'nama_item_medis' => $nama,
				'tanggal_kadaluarsa_item_medis' => $tanggal,
				'harga_jual_item_medis' => $harga,
				'kuantitas_item_medis' => $kuantitas
				);

		if(isset($_POST['id'])){
			$this->m_logistik->edit_item_non_obat($data, $where);
			redirect('c_logistik/tampil_item_non_obat');
		} else {
			$this->m_logistik->input_item_non_obat($data);
			redirect('c_logistik/tampil_item_non_obat');
		}

	}

	public function edit_item_non_obat(){
		$id = $this->uri->segment(3);
		$where = array('id_item_medis' => $id);
		$data['item'] = $this->m_logistik->cari_item_medis($where)->result();

		$this->load->view('header');
		$this->load->view('logistik/edit_medis_non_obat', $data);
		$this->load->view('footer');
	}

	public function hapus_item_non_obat(){
		$id = $this->uri->segment(3);
		$where = array('id_item_medis' => $id);
		$this->m_logistik->hapus_item_medis($where);
		redirect('c_logistik/tampil_item_non_obat');
	}

	public function tampil_restock(){
		$where = array('stok_obat <=' => 50);

		$jumlah_data = $this->m_logistik->stokminimum('*', 't_obat', $where)->num_rows();

		$config['base_url']			= base_url().'c_logistik/tampil_restock/';
		$config['total_rows']		= $jumlah_data;
		$config['per_page']			= 5;
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
		$page 						= $this->uri->segment(3); 

		$this->pagination->initialize($config);
		$data['obat'] = $this->m_logistik->selectstokminimum('*', 't_obat', $where, $config['per_page'], $page);

		$this->load->view('header');
		$this->load->view('logistik/rekomendasi_obat', $data);
		$this->load->view('footer');
	}

	public function cetak_obat(){
		$data['obat'] = $this->db->get('t_obat')->result();
		$this->load->view('logistik/cetak_obat', $data);
	}

	public function cetak_medis(){
		$data['medis'] = $this->db->get('t_medis')->result();
		$this->load->view('logistik/cetak_medis', $data);
	}

}