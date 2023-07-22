<?php

class golongan extends CI_Controller{

	public function index()
	{		
		
		$data['tb_golongan'] = $this->golongan_model->tampil_data('tb_golongan')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/golongan',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input()
	{
		$data['tb_golongan'] = $this->golongan_model->tampil_data('tb_golongan')->result();
	
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/golongan_tambah',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->input();
		}else{
			$id_golongan = $this->input->post('id_golongan');
			$golongan = $this->input->post('golongan');
			
        		$data = array(
        			'id_golongan' => $id_golongan,
        			'golongan' => $golongan,
        			
        		);

        		$this->golongan_model->input_data($data,'tb_golongan');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data golongan Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/golongan');
			}

		}
	public function _rules()
	{
		
		$this->form_validation->set_rules('id_golongan','id_golongan','required|is_unique[tb_golongan.id_golongan]',
		array(
			'required' => '%s Tidak Boleh Kosong!',
			'is_unique' => '%s Sudah ada!*'
		)
		);
		$this->form_validation->set_rules('golongan','golongan','required',['required' => '%s Tidak Boleh Kosong!']);
	
		

	}

	public function update($id)
	{
		$where = array('id' => $id);

		$data['tb_golongan'] = $this->golongan_model->edit_data($where,'tb_golongan')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/golongan_update',$data);
		$this->load->view('templates_administrator/footer');

	}
	public function update_aksi()
	{
		$id = $this->input->post('id');
		$id_golongan = $this->input->post('id_golongan');
			$golongan = $this->input->post('golongan');
			
        		$data = array(
        			'id_golongan' => $id_golongan,
        			'golongan' => $golongan,
        			
        		);

			$where = array(
				'id' => $id
			);

        		$this->golongan_model->update_data($where,$data,'tb_golongan');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data golongan Sudah Diubah!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/golongan');
		}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->golongan_model->hapus_data($where,'tb_golongan');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data golongan Telah Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/admin/golongan');
	}

	


}