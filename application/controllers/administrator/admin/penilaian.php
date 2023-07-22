<?php

class Penilaian extends CI_Controller{
public function index()
	{		
		$data['tb_penilaian'] = $this->penilaian_model->tampil_data('tb_penilaian')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/penilaian',$data);
		$this->load->view('templates_administrator/footer');
		}

		public function input()
		{
			$data['tb_notif'] = $this->notif_model->tampil_data()->result();
			
			$data['tb_penilaian'] = $this->penilaian_model->tampil_data('tb_penilaian')->result();
			$data['tb_karyawan'] = $this->karyawan_model->tampil_data('tb_karyawan')->result();
			$data['tb_pimpinan'] = $this->pimpinan_model->tampil_data('tb_pimpinan')->result();
			$this->load->view('templates_administrator/header');
			$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
			$this->load->view('administrator/admin/penilaian_tambah',$data);
			$this->load->view('templates_administrator/footer');
		}
	
		public function input_aksi()
		{
			$this->_rules();
	
			if($this->form_validation->run() == FALSE){
				$this->input();
			}else{
                $id_karyawan = $this->input->post('id_karyawan');
			$nama_karyawan = $this->input->post('nama_karyawan');
			$orientasi = $this->input->post('orientasi');
			$disiplin = $this->input->post('disiplin');
			$kerjasama = $this->input->post('kerjasama');
			$komitmen = $this->input->post('komitmen');
			$nilai = $this->input->post('nilai');
			$keterangan = $this->input->post('keterangan');	
			$nama_pimpinan = $this->input->post('nama_pimpinan');	
			
        		$data = array(
        			'id_karyawan' => $id_karyawan,
        			'nama_karyawan' => $nama_karyawan,
        			'orientasi' => $orientasi,
					'disiplin' => $disiplin,
					'kerjasama' => $kerjasama,
					'komitmen' => $komitmen,
        			'nilai' => $nilai,
        			'keterangan' => $keterangan,
					'nama_pimpinan' => $nama_pimpinan,
        			
        		);			
				
					$this->penilaian_model->input_data($data,'tb_penilaian');
					$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data penilaian Berhasil Ditambahkan!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('administrator/admin/penilaian');
				}
	
			}
		public function _rules()
		{
		
			$this->form_validation->set_rules('nama_karyawan','nama_karyawan ','required',['required' => '%s Tidak Boleh Kosong!']);
			$this->form_validation->set_rules('nilai','Nilai','required',['required' => '%s Tidak Boleh Kosong!']);
			$this->form_validation->set_rules('keterangan','Keterangan','required',['required' => '%s Tidak Boleh Kosong!']);
			
			
			
			
		}
	
		public function update($id)
		{
			$where = array('id' => $id);
			
			$data['tb_penilaian'] = $this->penilaian_model->edit_data($where,'tb_penilaian')->result();
	
			$this->load->view('templates_administrator/header');
			$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
			$this->load->view('administrator/admin/penilaian_update',$data);
			$this->load->view('templates_administrator/footer');
	
		}
	
		public function update_aksi(){
	
				
				$id = $this->input->post('id');
				$id_karyawan = $this->input->post('id_karyawan');	
			$nama_karyawan = $this->input->post('nama_karyawan');
			$orientasi = $this->input->post('orientasi');
			$disiplin = $this->input->post('disiplin');
			$kerjasama = $this->input->post('kerjasama');
			$komitmen = $this->input->post('komitmen');
			$nilai = $this->input->post('nilai');
			$keterangan = $this->input->post('keterangan');	
			$nama_pimpinan = $this->input->post('nama_pimpinan');	
			
        		$data = array(
                    'id_karyawan' => $id_karyawan,
        			'nama_karyawan' => $nama_karyawan,
        			'orientasi' => $orientasi,
					'disiplin' => $disiplin,
					'kerjasama' => $kerjasama,
					'komitmen' => $komitmen,
        			'nilai' => $nilai,
        			'keterangan' => $keterangan,
					'nama_pimpinan' => $nama_pimpinan,
        			
        		);
	
					$where = array('id' => $id);
	
					$this->penilaian_model->update_data($where,$data,'tb_penilaian');
					$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				 Data penilaian Berhasil Diubah!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('administrator/admin/penilaian');
	
			}
	public function delete($id)
	{
		$where = array('id' => $id);
		$this->penilaian_model->hapus_data($where,'tb_penilaian');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data penilaian Berhasil Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/admin/penilaian');
	}
}