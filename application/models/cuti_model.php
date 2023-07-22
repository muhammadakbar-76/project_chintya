<?php

class Cuti_model extends CI_Model{
		
		

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
		public function view_by_tanggal_pengajuan_pengiriman($tanggal_pengajuan, $tanggal_pengajuan2)
		{
				$this->db->where('tanggal_pengajuan >=', $tanggal_pengajuan);
				$this->db->where('tanggal_pengajuan <=', $tanggal_pengajuan2);
		return $this->db->get('tb_cuti')->result();
		}
		public function view_all()
		{
		return $this->db->get('tb_cuti')->result();
		}
		public function ambil_id_cuti($id)
		{
		$hasil = $this->db->where('id',$id)->get('tb_cuti');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
		}
}