<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_direktur extends CI_Model {

	public function single_data($table, $where){
		return $this->db->get_where($table, $where)->result();
	}

	public function certain_data_pasien($nama){		
		$this->db->select('*');
		$this->db->from('t_pasien');
		$this->db->where('nama_pasien',$nama);
		$this->db->or_like('nama_pasien',$nama);
		$this->db->or_like('nama_pasien',$nama,'before');
		$this->db->or_like('nama_pasien',$nama,'after');
		$this->db->order_by('nama_pasien','asc');
		return $this->db->get()->result();
	}

	public function data_profil_pasien($id){		
		$this->db->select('*');
		$this->db->from('t_diagnosa');
		$this->db->join('t_pasien','t_diagnosa.id_pasien = t_pasien.id_pasien');
		$this->db->join('t_dokter','t_diagnosa.id_dokter = t_dokter.id_dokter');
		$this->db->where('t_diagnosa.id_pasien',$id);
		$this->db->order_by('t_diagnosa.tgl_diagnosa','desc');
		return $this->db->get()->result();
	}

	public function totalkunjungan($awal, $akhir){
		$this->db->select('count(id_pasien) as jumlah');
		$this->db->from('t_berobat');
		$this->db->where('tgl_berobat >=',$awal);
		$this->db->where('tgl_berobat <=',$akhir);
		$this->db->group_by('tgl_berobat');
		$this->db->order_by('tgl_berobat','desc');
		return $this->db->get()->result();
	}

	public function tglkunjungan($awal, $akhir){
		$this->db->select('distinct(tgl_berobat)');
		$this->db->from('t_berobat');
		$this->db->where('tgl_berobat >=',$awal);
		$this->db->where('tgl_berobat <=',$akhir);
		$this->db->order_by('tgl_berobat','desc');
		return $this->db->get()->result();
	}

	public function databerobatklinik(){
		$this->db->select('count(t_berobat.id_pasien) as jumlah, t_dokter.spesialis_dokter');
		$this->db->from('t_berobat');
		$this->db->join('t_dokter','t_berobat.id_dokter = t_dokter.id_dokter');
		$this->db->group_by('t_berobat.id_dokter');
		$this->db->order_by('t_dokter.spesialis_dokter','asc');
		return $this->db->get()->result();
	}

	public function selecteddataberobatklinik($awal, $akhir, $poliklinik){
		$this->db->select('count(t_berobat.id_pasien) as jumlah, t_berobat.tgl_berobat');
		$this->db->from('t_berobat');
		$this->db->join('t_dokter','t_berobat.id_dokter = t_dokter.id_dokter');
		$this->db->where('t_dokter.spesialis_dokter', $poliklinik);
		$this->db->where('t_berobat.tgl_berobat >=', $awal);
		$this->db->where('t_berobat.tgl_berobat <=', $akhir);
		$this->db->group_by('t_berobat.tgl_berobat');
		$this->db->order_by('t_berobat.tgl_berobat','desc');
		return $this->db->get()->result();
	}
	
}