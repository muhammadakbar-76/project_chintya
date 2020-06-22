<?php

class Datasiswa_model extends CI_Model{

		// public get_by_id($id)
		// {
		// 	$this->db->where($this->id,$id);
		// 	return $this->db->get($this->table)->rows();
		// }
		// public $table = 'tb_siswa'
		// public $id = 'id_siswa'

	// public function get($id)
 //    {
 //        $this->db->select('*');
 //        $this->db->from('tb_siswa');
 //        if($id != null){
 //            $this->db->where('id_siswa', $id);
 //        }
 //        $query = $this->db->get();
 //        return $query;
 //    }

		// public function get($id)
  //   	{
  //       $this->db->from('tb_siswa');
  //       if($id != null){
  //           $this->db->where('id_siswa', $id);
  //       }
  //       $query = $this->db->get();
  //       return $query;
  //   	}

		public function tampil_data($table)
		{
			return $this->db->get($table);
		}
		
		public function ambil_id_datasiswa($id)
		{
		$hasil = $this->db->where('id_siswa',$id)->get('tb_siswa');
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
		
	}