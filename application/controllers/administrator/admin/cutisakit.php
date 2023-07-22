<?php

class cutisakit extends CI_Controller{

	public function index()
	{		
		$data['tb_cutisakit'] = $this->cutisakit_model->tampil_data('tb_cutisakit')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/cutisakit',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input()
	{
		$data['tb_cutisakit'] = $this->cutisakit_model->tampil_data('tb_cutisakit')->result();
		$data['tb_karyawan'] = $this->karyawan_model->tampil_data('tb_karyawan')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/cutisakit_tambah',$data);
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
			$tgl_mulai = $this->input->post('tgl_mulai');
		
			$tgl_surat= $this->input->post('tgl_surat');		
            $tgl_akhir = $this->input->post('tgl_akhir');
            $file = $this->input->post('file');
			
        		$data = array(
        			
        			'id_karyawan' => $id_karyawan,
					'nama_karyawan' => $nama_karyawan,
					'tgl_mulai' => $tgl_mulai,
			
					'tgl_surat' => $tgl_surat,
                    'tgl_akhir' => $tgl_akhir,
                    'file' => $file,
        		);

        		$this->cutisakit_model->input_data($data,'tb_cutisakit');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data cutisakit Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/cutisakit');
			}

		}
	public function _rules()
	{
		
		
		$this->form_validation->set_rules('id_karyawan','id_karyawan','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('nama_karyawan','nama_karyawan','required',['required' => '%s  Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('tgl_mulai','tgl_mulai','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('tgl_akhir','tgl_akhir','required',['required' => '%s Tidak Boleh Kosong!']);
		
		

	}

	public function update($id)
	{
		$where = array('id' => $id);

		$data['tb_cutisakit'] = $this->cutisakit_model->edit_data($where,'tb_cutisakit')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/cutisakit_update',$data);
		$this->load->view('templates_administrator/footer');

	}
	public function update_aksi()
	{
		$id = $this->input->post('id');
        
        $id_karyawan = $this->input->post('id_karyawan');
        $nama_karyawan = $this->input->post('nama_karyawan');
        $tgl_mulai = $this->input->post('tgl_mulai');
     
        $tgl_surat= $this->input->post('tgl_surat');		
        $tgl_akhir = $this->input->post('tgl_akhir');
        $file = $this->input->post('file');
			
        		$data = array(
                    
        			'id_karyawan' => $id_karyawan,
					'nama_karyawan' => $nama_karyawan,
					'tgl_mulai' => $tgl_mulai,
					
					'tgl_surat' => $tgl_surat,
                    'tgl_akhir' => $tgl_akhir,
                    'file' => $file,
        		);
				
			$where = array(
				'id' => $id
			);

        		$this->cutisakit_model->update_data($where,$data,'tb_cutisakit');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data cutisakit Sudah Diubah!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/cutisakit');
		}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->cutisakit_model->hapus_data($where,'tb_cutisakit');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data absen karyawan Telah Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/admin/cutisakit');
	}
}