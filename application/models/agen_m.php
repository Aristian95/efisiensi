<?php

class agen_m extends CI_Model {

	var $table = 'agen_bus';

	function __construct()
		{
			parent::__construct();

			$this->load->database();
		}
	function get_agen_bus()
		{
			$this->db->order_by('kode_agen');
			return $this->db->get($this->table);
		}
	function get_last_ten_agen_bus()
	{
		$sql = "SELECT * FROM agen_bus order by kode_agen DESC";

	return $this->db->query($sql); 

	}
	function count_num_rows()
	{
		$this->db->select('*');
		$this->db->from('agen_bus');
		return $this->db->get();
	}
	function get_all_agen_bus()
	{
		$this->db->select('*');
		$this->db->from('agen_bus');
		$this->db->order_by('kode_agen', 'desc');
		return $this->db->get();
	}
	function get_agen_bus_by_kode_agen($kode_agen)
	{
		$this->db->select('*');
		$this->db->where('kode_agen', $kode_agen);
		return $this->db->get($this->table);
	}
	function update($kode_agen, $agen_bus)
	{
		$this->db->where('kode_agen', $kode_agen);
		$this->db->update($this->table, $agen_bus);
	}
	function delete($kode_agen)
	{
		$this->db->where('kode_agen', $kode_agen);
		$this->db->delete($this->table);
	}
	function add($agen_bus)
	{
		$this->db->insert($this->table, $agen_bus);
	}
	function valid_kelas($kode_agen)
	{
		$this->db->where('kode_agen', $kode_agen);
		$query = $this->db->get($this->table)->num_rows();
						
		if($query > 0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}	
}