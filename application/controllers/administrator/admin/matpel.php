<?php

class Matpel extends CI_Controller{

	public function index()
	{		
		$data['tb_matpel'] = $this->matpel_model->tampil_data('tb_matpel')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/matpel',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input()
	{
		$data['tb_kelas'] = $this->matpel_model->tampil_data('tb_kelas')->result();
		$data['tb_tambahjurusan'] = $this->matpel_model->tampil_data('tb_tambahjurusan')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/matpel_tambah',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input_aksi()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) 
		{
			$this->input();
		}else {
			$kode_matpel = $this->input->post('kode_matpel');
			$matpel 	 = $this->input->post('matpel');
			$jurusan 	 = $this->input->post('jurusan');
			$kelas       = $this->input->post('kelas');
			
			
			$data = array(
			'kode_matpel'		=> $kode_matpel,
			'matpel'			=> $matpel,
			'jurusan'			=> $jurusan,
			'kelas'				=> $kelas,
			
		);
			$this->matpel_model->input_data($data,'tb_matpel');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Mata Pelajaran Berhasil Ditambahkan !
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/matpel');
		
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_matpel','Kode','required|is_unique[tb_matpel.kode_matpel]',
			array(
				'required' => '%s Tidak Boleh Kosong!',
				'is_unique' => '%s Sudah ada!*'
			)
			);
		$this->form_validation->set_rules('matpel','Mata Pelajaran','required|is_unique[tb_matpel.matpel]',
			array(
				'required' => 'Mata Pelajaran Belum Diisi!',
				'is_unique' => '%s Tidak Boleh Sama!*'
			));
		$this->form_validation->set_rules('jurusan','Jurusan','required',['required' => '%s Belum Diinput!']);
		$this->form_validation->set_rules('kelas','Kelas','required',['required' => '%s Tidak Boleh Kosong!']);
	}

	public function update($id)
	{
		$where = array('id_matpel' => $id);
		$data['tb_matpel'] = $this->db->query("select * from tb_matpel mp, tb_tambahjurusan tj where mp.jurusan=tj.jurusan and mp.id_matpel='$id'")->result();
		$data['tb_tambahjurusan'] = $this->matpel_model->tampil_data('tb_tambahjurusan')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/matpel_update',$data);
		$this->load->view('templates_administrator/footer');
	}
	
	public function update_aksi()
	{
		$id 			= $this->input->post('id_matpel');
		$kode_matpel 	= $this->input->post('kode_matpel');
		$matpel 		= $this->input->post('matpel');
		$jurusan 		= $this->input->post('jurusan');
		$kelas 			= $this->input->post('kelas');	

		$data = array(
			'kode_matpel' => $kode_matpel,
			'matpel' 	  => $matpel,
			'jurusan' 	  => $jurusan,
			'kelas'       => $kelas,
		);
		$where = array(
			'id_matpel' => $id
		);
		
		$this->matpel_model->update_data($where,$data,'tb_matpel');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Mata Pelajaran Berhasil Diupdate !
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/admin/matpel');
	}
	public function delete($id)
	{
		$where = array('id_matpel' => $id);
		$this->matpel_model->hapus_data($where,'tb_matpel');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Mata Pelajaran Berhasil DiHapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/admin/matpel');
	}
}

