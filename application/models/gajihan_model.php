<?php

class Gajihan_model extends CI_Model{
		
		

		public function tampil_data($table)
		{
			return $this->db->get($table);
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
		public function view_by_tgl_pengiriman($tgl)
		{
		$this->db->where('tgl', $tgl);
		return $this->db->get('tb_gajihan')->result();
		}
		public function view_all()
		{
		return $this->db->get('tb_gajihan')->result();
		}
}