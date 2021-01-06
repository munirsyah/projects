<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dokter extends CI_Model {

	public function input_diagnosa($data){
		$this->db->insert('t_diagnosa', $data);
	}

	public function get_data_berobat($id){
    	$this->db->select('*');
	    $this->db->from('t_berobat');
	    $this->db->join('t_pasien', 't_berobat.id_pasien = t_pasien.id_pasien');
	    $this->db->join('t_dokter', 't_berobat.id_dokter = t_dokter.id_dokter');
	    $this->db->where('status = "Belum"');
	    $this->db->where('t_dokter.id_dokter',$id);
	    return $this->db->get()->result(); 
	}

	public function get_pasien_berobat($id){
    	$this->db->select('*');
	    $this->db->from('t_berobat');
	    $this->db->join('t_pasien', 't_berobat.id_pasien = t_pasien.id_pasien');
	    $this->db->where('id_berobat',$id);
	    return $this->db->get()->result(); 
	}

	public function get_rekam_medis_pasien($id){
    	$this->db->select('*');
	    $this->db->from('t_diagnosa');
	    $this->db->join('t_pasien', 't_diagnosa.id_pasien = t_pasien.id_pasien');
	    $this->db->join('t_dokter', 't_diagnosa.id_dokter = t_dokter.id_dokter');
	    $this->db->where('nama_pasien',$id);
	    $this->db->or_like('nama_pasien',$id);
		$this->db->or_like('nama_pasien',$id,'before');
		$this->db->or_like('nama_pasien',$id,'after');
	    $this->db->order_by('t_diagnosa.tgl_diagnosa','desc');
	    return $this->db->get()->result();
	}


		

	public function get_pasien($id){
    	$this->db->select('*');
	    $this->db->from('t_pasien');
	     $this->db->where('nama_pasien',$id);
	    $this->db->or_like('nama_pasien',$id);
		$this->db->or_like('nama_pasien',$id,'before');
		$this->db->or_like('nama_pasien',$id,'after');
	    return $this->db->get(); 
	}

	public function update_berobat($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function list_obat(){
		return $this->db->get('t_obat')->result();
	}

	public function total_berobat($id){
		return $this->db->get_where('t_diagnosa', array('id_pasien' => $id))->num_rows();
	}

	public function select($number, $offset, $id){
		$this->db->select('*');
	    $this->db->from('t_diagnosa');
	    $this->db->join('t_pasien', 't_diagnosa.id_pasien = t_pasien.id_pasien');
	    $this->db->join('t_dokter', 't_diagnosa.id_dokter = t_dokter.id_dokter');
	    $this->db->where('t_diagnosa.id_pasien = '.$id);
	    $this->db->limit($number, $offset);
	    $this->db->order_by('t_diagnosa.tgl_diagnosa','desc');
		return $this->db->get()->result();
	}

	public function cari_id_pasien($where){
		return $this->db->get_where('t_berobat', $where)->result();
	}

	public function cari_pasien($where){
		return $this->db->get_where('t_pasien', $where)->result();
	}
	
}