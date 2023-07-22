<?php

class absenkaryawan extends CI_Controller{

	public function index()
	{		
		$data['tb_absenkaryawan'] = $this->absenkaryawan_model->tampil_data('tb_absenkaryawan')->result();
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/absenkaryawan',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input()
	{
		$data['tb_absenkaryawan'] = $this->absenkaryawan_model->tampil_data('tb_absenkaryawan')->result();
		$data['tb_karyawan'] = $this->karyawan_model->tampil_data('tb_karyawan')->result();
		
		$this->load->view('templates_administrator/header');
	
		$this->load->view('administrator/admin/absenkaryawan_tambah',$data);
	
	}

	public function input_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->input();
		}else{
			$id_absen = $this->input->post('id_absen');
			$id_karyawan = $this->input->post('id_karyawan');
			$nama_karyawan = $this->input->post('nama_karyawan');
			$posisi = $this->input->post('posisi');
		
			$tgl = $this->input->post('tgl');		
            $jam = $this->input->post('jam');
            $keterangan = $this->input->post('keterangan');
			
        		$data = array(
        			'id_absen' => $id_absen,
        			'id_karyawan' => $id_karyawan,
					'nama_karyawan' => $nama_karyawan,
					'posisi' => $posisi,
			
					'tgl' => $tgl,
                    'jam' => $jam,
                    'keterangan' => $keterangan,
        		);

        		$this->absenkaryawan_model->input_data($data,'tb_absenkaryawan');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data absenkaryawan Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('auth');
			}

		}
	public function _rules()
	{
		
		$this->form_validation->set_rules('id_absen','id_absen','required|is_unique[tb_absenkaryawan.id_absen]',
		array(
			'required' => '%s Tidak Boleh Kosong!',
			'is_unique' => '%s Sudah ada!*'
		)
		);
		$this->form_validation->set_rules('id_karyawan','id_karyawan','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('nama_karyawan','nama_karyawan','required',['required' => '%s  Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('posisi','posisi','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('jam','jam','required',['required' => '%s Tidak Boleh Kosong!']);
		
		

	}

	public function update($id)
	{
		$where = array('id' => $id);

		$data['tb_absenkaryawan'] = $this->absenkaryawan_model->edit_data($where,'tb_absenkaryawan')->result();
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/absenkaryawan_update',$data);
		$this->load->view('templates_administrator/footer');

	}
	public function update_aksi()
	{
		$id = $this->input->post('id');
        $id_absen = $this->input->post('id_absen');
        $id_karyawan = $this->input->post('id_karyawan');
        $nama_karyawan = $this->input->post('nama_karyawan');
        $posisi = $this->input->post('posisi');
     
        $tgl = $this->input->post('tgl');		
        $jam = $this->input->post('jam');
        $keterangan = $this->input->post('keterangan');
			
        		$data = array(
                    'id_absen' => $id_absen,
        			'id_karyawan' => $id_karyawan,
					'nama_karyawan' => $nama_karyawan,
					'posisi' => $posisi,
					
					'tgl' => $tgl,
                    'jam' => $jam,
                    'keterangan' => $keterangan,
        		);
				
			$where = array(
				'id' => $id
			);

        		$this->absenkaryawan_model->update_data($where,$data,'tb_absenkaryawan');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data absenkaryawan Sudah Diubah!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/absenkaryawan');
		}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->absenkaryawan_model->hapus_data($where,'tb_absenkaryawan');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data absen karyawan Telah Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/admin/absenkaryawan');
	}
}