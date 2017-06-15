<?php

class bus_m extends CI_Model {

	var $table = 'bus';

	function __construct()
		{
			parent::__construct();

			$this->load->database();
		}
	function get_bus()
		{
			$this->db->order_by('kode_bus');
			return $this->db->get($this->table);
		}
	function get_last_ten_bus()
	{
		$sql = "SELECT * FROM bus order by kode_bus DESC";

	return $this->db->query($sql); 

	}
	function count_num_rows()
	{
		$this->db->select('*');
		$this->db->from('bus');
		return $this->db->get();
	}
	function get_all_bus()
	{
		$this->db->select('*');
		$this->db->from('bus');
		$this->db->order_by('kode_bus', 'desc');
		return $this->db->get();
	}
	function get_bus_by_kode_bus($kode_bus)
	{
		$this->db->select('*');
		$this->db->where('kode_bus', $kode_bus);
		return $this->db->get($this->table);
	}
	function update($kode_bus, $bus)
	{
		$this->db->where('kode_bus', $kode_bus);
		$this->db->update($this->table, $bus);
	}
	function delete($kode_bus)
	{
		$this->db->where('kode_bus', $kode_bus);
		$this->db->delete($this->table);
	}
	function add($bus)
	{
		$this->db->insert($this->table, $bus);
	}
	function valid_kelas($kode_bus)
	{
		$this->db->where('kode_bus', $kode_bus);
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