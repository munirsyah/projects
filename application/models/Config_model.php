<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_model extends CI_Model {

	
	public function kontak()
	{
		$this->db->select('*');
		$this->db->from('config');
		$this->db->where('id_config',8);
		$query 	= $this->db->get();
		$result	= $query->result();
		return $result;
	}
	
	public function email()
	{
		$this->db->select('*');
		$this->db->from('config');
		$this->db->where('id_config',9);
		$query 	= $this->db->get();
		$result	= $query->result();
		return $result;
	}
	
	public function alamat()
	{
		$this->db->select('*');
		$this->db->from('config');
		$this->db->where('id_config',6);
		$query 	= $this->db->get();
		$result	= $query->result();
		return $result;
	}
	
	public function footer()
	{
		$this->db->select('*');
		$this->db->from('config');
		$this->db->where('id_config',7);
		$query 	= $this->db->get();
		$result	= $query->result();
		return $result;
	}


}


