<?php

class absenpimpinan extends CI_Controller{

	public function index()
	{		
		$data['tb_absenpimpinan'] = $this->absenpimpinan_model->tampil_data('tb_absenpimpinan')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/absenpimpinan',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input()
	{
		$data['tb_absenpimpinan'] = $this->absenpimpinan_model->tampil_data('tb_absenpimpinan')->result();
		$data['tb_pimpinan'] = $this->pimpinan_model->tampil_data('tb_pimpinan')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/absenpimpinan_tambah',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->input();
		}else{
			$id_absen = $this->input->post('id_absen');
			$id_pimpinan = $this->input->post('id_pimpinan');
			$nama_pimpinan = $this->input->post('nama_pimpinan');
			$posisi = $this->input->post('posisi');
			
			$tgl = $this->input->post('tgl');		
            $jam = $this->input->post('jam');
            $keterangan = $this->input->post('keterangan');
			
        		$data = array(
        			'id_absen' => $id_absen,
        			'id_pimpinan' => $id_pimpinan,
					'nama_pimpinan' => $nama_pimpinan,
					'posisi' => $posisi,
				
					'tgl' => $tgl,
                    'jam' => $jam,
                    'keterangan' => $keterangan,
        		);

        		$this->absenpimpinan_model->input_data($data,'tb_absenpimpinan');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data absenpimpinan Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/absenpimpinan');
			}

		}
	public function _rules()
	{
		
		$this->form_validation->set_rules('id_absen','id_absen','required|is_unique[tb_absenpimpinan.id_absen]',
		array(
			'required' => '%s Tidak Boleh Kosong!',
			'is_unique' => '%s Sudah ada!*'
		)
		);
		$this->form_validation->set_rules('id_pimpinan','id_pimpinan','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('nama_pimpinan','nama_pimpinan','required',['required' => '%s  Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('posisi','posisi','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('jam','jam','required',['required' => '%s Tidak Boleh Kosong!']);
		
		

	}

	public function update($id)
	{
		$where = array('id' => $id);

		$data['tb_absenpimpinan'] = $this->absenpimpinan_model->edit_data($where,'tb_absenpimpinan')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/absenpimpinan_update',$data);
		$this->load->view('templates_administrator/footer');

	}
	public function update_aksi()
	{
		$id = $this->input->post('id');
        $id_absen = $this->input->post('id_absen');
        $id_pimpinan = $this->input->post('id_pimpinan');
        $nama_pimpinan = $this->input->post('nama_pimpinan');
        $posisi = $this->input->post('posisi');
   
        $tgl = $this->input->post('tgl');		
        $jam = $this->input->post('jam');
        $keterangan = $this->input->post('keterangan');
			
        		$data = array(
                    'id_absen' => $id_absen,
        			'id_pimpinan' => $id_pimpinan,
					'nama_pimpinan' => $nama_pimpinan,
					'posisi' => $posisi,
			
					'tgl' => $tgl,
                    'jam' => $jam,
                    'keterangan' => $keterangan,
        		);
				
			$where = array(
				'id' => $id
			);

        		$this->absenpimpinan_model->update_data($where,$data,'tb_absenpimpinan');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data absenpimpinan Sudah Diubah!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/absenpimpinan');
		}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->absenpimpinan_model->hapus_data($where,'tb_absenpimpinan');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data absen pimpinan Telah Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/admin/absenpimpinan');
	}
}