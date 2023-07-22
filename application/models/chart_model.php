<?php
// Penduduk.php
class Chart_model extends CI_Model {

	//function read berfungsi mengambil/read data dari table kota di database
	public function readcuti() {
	
	

			//sql read
			$this->db->select('tb_cuti.*, COUNT(id) AS jmlh');
			// $this->db->select('tb_cuti.total AS total');
			$this->db->from('tb_cuti');
		
			// $this->db->join('tb_pelanggan', 'tb_cuti.id_pelanggan = tb_pelanggan.id_pelanggan');
	
			//filter data sesuai id yang dikirim dari controller
			// if($id_cuti != '') {
			// 	$this->db->where('tb_cuti.id_barang', $id_barang);
			// 	$this->db->where('tb_pelanggan.id_pelanggan', $id_pelanggan);
				
			// }
			
	
			$this->db->order_by('tb_cuti.id ASC');
			$this->db->group_by('tb_cuti.id_karyawan');
	
			$query = $this->db->get();
	
			//$query->result_array = mengirim data ke controller dalam bentuk semua data
			return $query->result_array();
		}
	}