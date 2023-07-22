<?php

class cuti extends CI_Controller{

	public function index()
	{		
		$data = array(
			
			'viewed' => 'y',
		);
		
		$where = array(
			'viewed' => 'n'
		);
		$this->notif_model->update_data($where,$data,'tb_notif');
	
		$data['tb_cuti'] = $this->cuti_model->tampil_data('tb_cuti')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaruser',$data);
		$this->load->view('administrator/user/cuti',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input()
	{
		$data['tb_cuti'] = $this->cuti_model->tampil_data('tb_cuti')->result();
		$data['tb_karyawan'] = $this->karyawan_model->tampil_data('tb_karyawan')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaruser',$data);
		$this->load->view('administrator/user/cuti_tambah',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->input();
		}else{
			$tanggal_pengajuan = $this->input->post('tanggal_pengajuan');
			$id_karyawan = $this->input->post('id_karyawan');
			$nama_karyawan = $this->input->post('nama_karyawan');
			$posisi = $this->input->post('posisi');
		
			$jenis_cuti = $this->input->post('jenis_cuti');		
            $tgl_cuti = $this->input->post('tgl_cuti');
            $tgl_masuk = $this->input->post('tgl_masuk');
			$verifikasi = $this->input->post('verifikasi');
        		$data = array(
        			'tanggal_pengajuan' => $tanggal_pengajuan,
        			'id_karyawan' => $id_karyawan,
					'nama_karyawan' => $nama_karyawan,
					'posisi' => $posisi,
			
					'jenis_cuti' => $jenis_cuti,
                    'tgl_cuti' => $tgl_cuti,
                    'tgl_masuk' => $tgl_masuk,
					'verifikasi' => $verifikasi,
        		);

				$data2 = array(
        			'id_cuti' => '0',
        			'viewed' => 'n',
        		);

				$this->notif_model->input_data($data2,'tb_notif');
        		$this->cuti_model->input_data($data,'tb_cuti');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data cuti Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/user/cuti');
			}

		}
	public function _rules()
	{
		
		$this->form_validation->set_rules('tanggal_pengajuan','tanggal_pengajuan','required|is_unique[tb_cuti.tanggal_pengajuan]',
		array(
			'required' => '%s Tidak Boleh Kosong!',
			'is_unique' => '%s Sudah ada!*'
		)
		);
		$this->form_validation->set_rules('id_karyawan','id_karyawan','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('nama_karyawan','nama_karyawan','required',['required' => '%s  Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('posisi','posisi','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('tgl_cuti','tgl_cuti','required',['required' => '%s Tidak Boleh Kosong!']);
		
		

	}

	public function update($id)
	{
		$where = array('id' => $id);

		$data['tb_cuti'] = $this->cuti_model->edit_data($where,'tb_cuti')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaruser',$data);
		$this->load->view('administrator/user/cuti_update',$data);
		$this->load->view('templates_administrator/footer');

	}
	public function update_aksi()
	{
		$id = $this->input->post('id');
        $tanggal_pengajuan = $this->input->post('tanggal_pengajuan');
        $id_karyawan = $this->input->post('id_karyawan');
        $nama_karyawan = $this->input->post('nama_karyawan');
        $posisi = $this->input->post('posisi');
     
        $jenis_cuti = $this->input->post('jenis_cuti');		
        $tgl_cuti = $this->input->post('tgl_cuti');
        $tgl_masuk = $this->input->post('tgl_masuk');
		$verifikasi = $this->input->post('verifikasi');
		$ket = $this->input->post('ket');		
        		$data = array(
                    'tanggal_pengajuan' => $tanggal_pengajuan,
        			'id_karyawan' => $id_karyawan,
					'nama_karyawan' => $nama_karyawan,
					'posisi' => $posisi,
					
					'jenis_cuti' => $jenis_cuti,
                    'tgl_cuti' => $tgl_cuti,
                    'tgl_masuk' => $tgl_masuk,
					'verifikasi' => $verifikasi,
					'ket' => $ket,
        		);
				
			$where = array(
				'id' => $id
			);

        		$this->cuti_model->update_data($where,$data,'tb_cuti');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data cuti Sudah Diubah!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/user/cuti');
		}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->cuti_model->hapus_data($where,'tb_cuti');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data absen karyawan Telah Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/user/cuti');
	}
}