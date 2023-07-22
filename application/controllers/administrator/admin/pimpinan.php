<?php

class pimpinan extends CI_Controller{

	public function index()
	{		
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$data['tb_pimpinan'] = $this->pimpinan_model->tampil_data('tb_pimpinan')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/pimpinan',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input()
	{

		$data['tb_pimpinan'] = $this->pimpinan_model->tampil_data('tb_pimpinan')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/pimpinan_tambah',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->input();
		}else{
			$id_pimpinan = $this->input->post('id_pimpinan');
			$nama_pimpinan = $this->input->post('nama_pimpinan');
			$jk = $this->input->post('jk');
			$posisi = $this->input->post('posisi');		
			$alamat = $this->input->post('alamat');
			
        		$data = array(
        			'id_pimpinan' => $id_pimpinan,
        			'nama_pimpinan' => $nama_pimpinan,
        			'jk' => $jk,
        			'posisi' => $posisi,
					'alamat' => $alamat,
        		);

        		$this->pimpinan_model->input_data($data,'tb_pimpinan');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data pimpinan Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/pimpinan');
			}

		}
	public function _rules()
	{
		
		$this->form_validation->set_rules('id_pimpinan','id_pimpinan','required|is_unique[tb_pimpinan.id_pimpinan]',
		array(
			'required' => '%s Tidak Boleh Kosong!',
			'is_unique' => '%s Sudah ada!*'
		)
		);
		$this->form_validation->set_rules('nama_pimpinan','nama_pimpinan','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('jk','jenis kelamin','required',['required' => '%s  Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('posisi','Polisi','required',['required' => '%s Tidak Boleh Kosong!']);
		
		

	}

	public function update($id)
	{
		$where = array('id' => $id);

		$data['tb_pimpinan'] = $this->pimpinan_model->edit_data($where,'tb_pimpinan')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/pimpinan_update',$data);
		$this->load->view('templates_administrator/footer');

	}
	public function update_aksi()
	{
		$id = $this->input->post('id');
		$id_pimpinan = $this->input->post('id_pimpinan');
			$nama_pimpinan = $this->input->post('nama_pimpinan');
			$jk = $this->input->post('jk');
			$posisi = $this->input->post('posisi');		
			$alamat = $this->input->post('alamat');
			
        		$data = array(
        			'id_pimpinan' => $id_pimpinan,
        			'nama_pimpinan' => $nama_pimpinan,
        			'jk' => $jk,
        			'posisi' => $posisi,
					'alamat' => $alamat,
        		);

			$where = array(
				'id' => $id
			);

        		$this->pimpinan_model->update_data($where,$data,'tb_pimpinan');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data pimpinan Sudah Diubah!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/pimpinan');
		}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->pimpinan_model->hapus_data($where,'tb_pimpinan');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data pimpinan Telah Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/admin/pimpinan');
	}

	


}