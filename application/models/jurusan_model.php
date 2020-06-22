<?php

class Jurusan_model extends CI_Model{
		public function tampil_data($table)
		{
			return $this->db->get($table);
		}

		public function input_data($data,$table)
		{
			$this->db->insert($table, $data);
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
  		public function view_by_jurusan($kelas,$jurusan){
        $this->db->where('jurusan', $jurusan);
         $this->db->where('kelas', $kelas);
    	return $this->db->get('tb_jrs')->result();
  		}
    
  		public function view_by_kelas($kelas){
        $this->db->where('kelas', $kelas); 
      	return $this->db->get('tb_jrs')->result();
 		}
  	 	public function view_all(){
    	return $this->db->get('tb_jrs')->result(); 
  		}


	// 	public function get_keyword($keyword){
	// 	$this->db->select('*');
	// 	$this->db->from('tb_jrs');
	// 	$this->db->like('nip',$keyword);
	// 	$this->db->or_like('nama',$keyword);
	// 	$this->db->or_like('jabatan',$keyword);
	// 	$this->db->or_like('tempat_lahir',$keyword);
	// 	$this->db->or_like('tgl_lahir',$keyword);
	// 	$this->db->or_like('alamat',$keyword);
	// 	$this->db->or_like('masa_kerja',$keyword);
	// 	$this->db->or_like('no_hp',$keyword);
	// 	return $this->db->get()->result();
	// }

		// public function get($id)
  //   {
  //       $this->db->select('tb_jrs.*, tb_siswa.nis as nis, tb_siswa.nama_siswa as nama');
  //       $this->db->from('tb_jrs');
  //       $this->db->join('tb_siswa', 'tb_siswa.id_siswa = tb_jrs.id_siswa');
  //       if($id != null){
  //           $this->db->where('id_siswa', $id);
  //       }
  //       $this->db->order_by('id_siswa','asc');
  //       $query = $this->db->get();
  //       return $query;
  //   }
	}