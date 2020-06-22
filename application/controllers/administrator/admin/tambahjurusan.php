<?php

class Tambahjurusan extends CI_Controller{

	public function index()
	{		
		$data['tb_tambahjurusan'] = $this->tambahjurusan_model->tampil_data('tb_tambahjurusan')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/tambahjurusan',$data);
		$this->load->view('templates_administrator/footer');
	}
	public function input()
	{
		$data['tb_tambahjurusan'] = $this->tambahjurusan_model->tampil_data('tb_tambahjurusan')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/tambahjurusan_tambah',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->input();
		}else{

			$kode_jrs = $this->input->post('kode_jrs');
			$jurusan = $this->input->post('jurusan');
			
        		$data = array(
        			'kode_jrs' => $kode_jrs,
        			'jurusan' => $jurusan,
        		);

        		$this->tambahjurusan_model->input_data($data,'tb_tambahjurusan');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Jurusan Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/tambahjurusan');
			}

		}

	public function _rules()
	{
		
		$this->form_validation->set_rules('kode_jrs','Kode Jurusan','required|is_unique[tb_tambahjurusan.kode_jrs]',
			array(
				'required' => '%s Tidak Boleh Kosong!',
				'is_unique' => '%s Sudah ada!'
			));
		$this->form_validation->set_rules('jurusan','Jurusan','required',['required' => '%s Tidak Boleh Kosong!']);

	}

		public function update($id)
	{
		$where = array('id_tambahjurusan' => $id);

		$data['tb_tambahjurusan'] = $this->tambahjurusan_model->edit_data($where,'tb_tambahjurusan')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/tambahjurusan_update',$data);
		$this->load->view('templates_administrator/footer');

	}

	public function update_aksi()
	{
			$id = $this->input->post('id_tambahjurusan');
			$kode_jrs = $this->input->post('kode_jrs');
			$jurusan = $this->input->post('jurusan');
			
			$data = array(
        			'kode_jrs' => $kode_jrs,
        			'jurusan' => $jurusan,		
        		);

			$where = array(
				'id_tambahjurusan' => $id
			);

        		$this->tambahjurusan_model->update_data($where,$data,'tb_tambahjurusan');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Tambah Jurusan Berhasil Diupdate!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/tambahjurusan');
		}

	public function delete($id)
	{
		$where = array('id_tambahjurusan' => $id);
		$this->tambahjurusan_model->hapus_data($where,'tb_tambahjurusan');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Jurusan Berhasil Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/admin/tambahjurusan');
	}
}