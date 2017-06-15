<?php

class Admisi_m extends CI_Model {

	var $table = 'Admin';

	function __construct()
		{
			parent::__construct();

			$this->load->database();
		}
	function login($username,$pass) {
        $this->db->where('username', $username);
        $this->db->where('pass', $pass);
        $q =  $this->db->get('Admin');
        if($q->num_rows()>0){
        	return TRUE; 
        }else{
        	return FALSE;
        }
    }
	function get_users()
		{
			$this->db->order_by('id');
			return $this->db->get($this->table);
		}
		
	function get_last_ten_users()
	{
		$sql = "SELECT * FROM users order by id DESC";

	return $this->db->query($sql); 

	}
	function count_num_rows()
	{
		$this->db->select('*');
		$this->db->from('users');
		return $this->db->get();
	}
	function get_all_users()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('id', 'desc');
		return $this->db->get();
	}
	function get_users_by_id($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		return $this->db->get($this->table);
	}
	function update($id, $users)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table, $users);
	}
	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
	function add($users)
	{
		$this->db->insert($this->table, $users);
	}
	function valid_kelas($id)
	{
		$this->db->where('id', $id);
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