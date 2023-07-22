<?php

class Karyawan extends CI_Controller{

	public function index()
	{		
		
		$data['tb_karyawan'] = $this->karyawan_model->tampil_data('tb_karyawan')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/karyawan',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input()
	{
		$data['tb_karyawan'] = $this->karyawan_model->tampil_data('tb_karyawan')->result();
		$data['tb_golongan'] = $this->golongan_model->tampil_data('tb_golongan')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/karyawan_tambah',$data);
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
			$jk = $this->input->post('jk');
			$posisi = $this->input->post('posisi');		
			$alamat = $this->input->post('alamat');
			$masa_kerja = $this->input->post('masa_kerja');
			$golongan = $this->input->post('golongan');
			$status = $this->input->post('status');
        		$data = array(
        			'id_karyawan' => $id_karyawan,
        			'nama_karyawan' => $nama_karyawan,
        			'jk' => $jk,
        			'posisi' => $posisi,
					'alamat' => $alamat,
					'masa_kerja' => $masa_kerja,
					'golongan' => $golongan,
					'status' => $status,
        		);

        		$this->karyawan_model->input_data($data,'tb_karyawan');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data karyawan Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/karyawan');
			}

		}
	public function _rules()
	{
		
		$this->form_validation->set_rules('id_karyawan','id_karyawan','required|is_unique[tb_karyawan.id_karyawan]',
		array(
			'required' => '%s Tidak Boleh Kosong!',
			'is_unique' => '%s Sudah ada!*'
		)
		);
		$this->form_validation->set_rules('nama_karyawan','nama_karyawan','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('jk','jenis kelamin','required',['required' => '%s  Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('posisi','Polisi','required',['required' => '%s Tidak Boleh Kosong!']);
		
		

	}

	public function update($id)
	{
		$where = array('id' => $id);

		$data['tb_karyawan'] = $this->karyawan_model->edit_data($where,'tb_karyawan')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/karyawan_update',$data);
		$this->load->view('templates_administrator/footer');

	}
	public function update_aksi()
	{
		$id = $this->input->post('id');
		$id_karyawan = $this->input->post('id_karyawan');
			$nama_karyawan = $this->input->post('nama_karyawan');
			$jk = $this->input->post('jk');
			$posisi = $this->input->post('posisi');		
			$alamat = $this->input->post('alamat');
			$masa_kerja = $this->input->post('masa_kerja');
			$golongan = $this->input->post('golongan');
			$status = $this->input->post('status');
        		$data = array(
        			'id_karyawan' => $id_karyawan,
        			'nama_karyawan' => $nama_karyawan,
        			'jk' => $jk,
        			'posisi' => $posisi,
					'alamat' => $alamat,
					'masa_kerja' => $masa_kerja,
					'golongan' => $golongan,
					'status' => $status,
        		);

			$where = array(
				'id' => $id
			);

        		$this->karyawan_model->update_data($where,$data,'tb_karyawan');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data karyawan Sudah Diubah!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/karyawan');
		}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->karyawan_model->hapus_data($where,'tb_karyawan');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data karyawan Telah Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/admin/karyawan');
	}

	


}