<?php

class jadwal_m extends CI_Model {

	var $table = 'jadwal_bus';

	function __construct()
		{
			parent::__construct();

			$this->load->database();
		}
	function get_jadwal_bus()
		{
			$this->db->order_by('kode_bus');
			return $this->db->get($this->table);
		}
	function get_last_ten_jadwal_bus()
	{
		$sql = "SELECT * FROM jadwal_bus order by kode_jadwal DESC";

	return $this->db->query($sql); 

	}
	function count_num_rows()
	{
		$this->db->select('*');
		$this->db->from('jadwal_bus');
		return $this->db->get();
	}
	function get_all_jadwal_bus()
	{
		$this->db->select('*');
		$this->db->from('jadwal_bus');
		$this->db->order_by('kode_jadwal', 'desc');
		return $this->db->get();
	}
	function get_jadwal_bus_by_kode_jadwal($kode_jadwal)
	{
		$this->db->select('*');
		$this->db->where('kode_jadwal', $kode_jadwal);
		return $this->db->get($this->table);
	}
	function update($kode_jadwal, $jadwal_bus)
	{
		$this->db->where('kode_jadwal', $kode_jadwal);
		$this->db->update($this->table, $jadwal_bus);
	}
	function delete($kode_jadwal)
	{
		$this->db->where('kode_jadwal', $kode_jadwal);
		$this->db->delete($this->table);
	}
	function add($jadwal_bus)
	{
		$this->db->insert($this->table, $jadwal_bus);
	}
	function valid_kelas($kode_jadwal)
	{
		$this->db->where('kode_jadwal', $kode_jadwal);
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