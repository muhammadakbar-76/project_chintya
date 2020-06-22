<?php

class Pengguna extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengguna_model');
	}

	public function index()
	{	
		$data['tb_admin'] = $this->pengguna_model->tampil_data()->result();	
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/pengguna',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input()
	{
		$data = array(
			'username' => set_value('username'),
			'nama' => set_value('nama'),
			'password' => set_value('password'),
			'email' => set_value('email'),
			'level' => set_value('level'),
		);
		
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/pengguna_tambah',$data);
		$this->load->view('templates_administrator/footer');
	}


		public function input_aksi()
	{
		

		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$this->input();
		}else {
			$username	= $this->input->post('username');
			$nama	= $this->input->post('nama');
			$password	= $this->input->post('password');
			$email	= $this->input->post('username');
			$level	= $this->input->post('level');


			$data = array(

					'username' => $username,        			
        			'nama' => $nama,
        			'password' => MD5($password),
        			'email' => $email,
        			'level' => $level,

		);
			$this->pengguna_model->input_data($data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Pengguna Berhasil Ditambahkan !
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/pengguna');
		}
	}

		public function _rules()
	{
		$this->form_validation->set_rules('username','Username','required|is_unique[tb_admin.username]',
			array(
				'required' => 'Username Tidak Boleh Kosong!',
				'is_unique' => '%s Sudah ada!*'
			)
		);
		$this->form_validation->set_rules('nama','Nama','required',['required' => 'Nama Belum Diisi!']);
		$this->form_validation->set_rules('password','password','required',['required' => 'Jurusan Belum Diisi!']);
		$this->form_validation->set_rules('email','email','required',['required' => 'Kode Jurusan Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('level','level','required',['required' => 'Jurusan Belum Diisi!']);

	}

	public function update($id)
	{
		$where = array('id' => $id);
		$data['tb_admin'] = $this->pengguna_model->edit_data($where,'tb_admin')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/pengguna_update',$data);
		$this->load->view('templates_administrator/footer');
	}
	
	public function update_aksi()
	{
		$id 			= $this->input->post('id');
		$username	  	= $this->input->post('username');
		$nama	  	= $this->input->post('nama');
		$password 		= $this->input->post('password');
		$email	  	= $this->input->post('email');
		$level 		= $this->input->post('level');		

		$data = array(
					'username' => $username,        			
        			'nama' => $nama,
        			'password' => MD5($password),
        			'email' => $email,
        			'level' => $level,
		);
		$where = array(
			'id' => $id
		);
		$this->pengguna_model->update_data($where,$data,'tb_admin');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Mata Pelajaran Berhasil Diupdate !
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/pengguna');
	}
	public function delete($id)
	{
		$where = array('id' => $id);
		$this->pengguna_model->hapus_data($where,'tb_admin');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Mata Pelajaran Berhasil DiHapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/pengguna');
	}
}