<?php

class Admin_model extends CI_Model{
	
	public function ambil_data($id)
	{
		$this->db->where('username', $id);
		return $this->db->get('tb_admin')->row();
	}
}