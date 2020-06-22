<?php

class Dataguru_model extends CI_Model{
		
		// public get_by_id($id)
		// {
		// 	$this->db->where($this->id,$id);
		// 	return $this->db->get($this->table)->rows();
		// }
		// public $table = 'tb_guru'
		// public $id = 'id_guru'

		public function tampil_data($table)
		{
			return $this->db->get($table);
		}

		public function ambil_id_dataguru($id)
		{
		$hasil = $this->db->where('id_guru',$id)->get('tb_guru');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
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

		// public function get_nama($id){
		// 	$hasil = $this->db->where('id_guru',$id)->get('tb_guru');
		// 	if($hasil->num_rows() > 0){
		// 		foreach ($hasil->result() as $data){
		// 			$hasil=array(
		// 				'nip' => $data->nip,
		// 				'nama_guru' => $data->nama_guru,
		// 				);
		// 		}
		// 	}
		// 	return $hasil;
		// }
}