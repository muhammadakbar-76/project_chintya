<?php

class Notif_model extends CI_Model{
		
		

		public function tampil_data()
		{
			return $this->db->query("SELECT COUNT(id) AS jumlah FROM `tb_notif` WHERE viewed='n'");
		}

		public function input_data($data,$table)
		{
			$this->db->insert($table,$data);
		}

		public function edit_data($where,$table)
		{
			return $this->db->get_where($table,$where);
		}

		public function update_data($where,$data,$table)
		{
			$this->db->where($where);
			$this->db->update($table,$data);
		}
		
		public function hapus_data($where,$table)
		{
			$this->db->where($where);
			return $this->db->delete($table);
		}
}