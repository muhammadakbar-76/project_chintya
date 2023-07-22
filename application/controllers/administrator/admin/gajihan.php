<?php

class gajihan extends CI_Controller{

	public function index()
	{		
		
		$data['tb_gajihan'] = $this->gajihan_model->tampil_data('tb_gajihan')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/gajihan',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input()
	{
		$data['tb_gajihan'] = $this->gajihan_model->tampil_data('tb_gajihan')->result();
		$data['tb_gaji'] = $this->gaji_model->tampil_data('tb_gaji')->result();
		$data['tb_gajilembur'] = $this->gajilembur_model->tampil_data('tb_gajilembur')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/gajihan_tambah',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->input();
		}else{
			$id_gaji = $this->input->post('id_gaji');
			$id_karyawan = $this->input->post('id_karyawan');
			$nama_karyawan = $this->input->post('nama_karyawan');
			$posisi = $this->input->post('posisi');
		
			$tgl = $this->input->post('tgl');		
            $gaji = $this->input->post('gaji');
			$tunjangan = $this->input->post('tunjangan');
            $gajil = $this->input->post('gajil');
            $utang = $this->input->post('utang');
            $total = $this->input->post('total');
			$ket = $this->input->post('ket');
        		$data = array(
        			'id_gaji' => $id_gaji,
        			'id_karyawan' => $id_karyawan,
					'nama_karyawan' => $nama_karyawan,
					'posisi' => $posisi,
				
					'tgl' => $tgl,
                    'gaji' => $gaji,
					'tunjangan' => $tunjangan,
					'gajil' => $gajil,
                    'utang' => $utang,
                    'total' => $total,
					'ket' => $ket,
        		);

        		$this->gajihan_model->input_data($data,'tb_gajihan');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data gaji Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/gajihan');
			}

		}
	public function _rules()
	{
		
		$this->form_validation->set_rules('id_gaji','id_gaji','required|is_unique[tb_gajihan.id_gaji]',
		array(
			'required' => '%s Tidak Boleh Kosong!',
			'is_unique' => '%s Sudah ada!*'
		)
		);
		$this->form_validation->set_rules('id_karyawan','id_karyawan','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('nama_karyawan','nama_karyawan','required',['required' => '%s  Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('posisi','posisi','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('gaji','gaji','required',['required' => '%s Tidak Boleh Kosong!']);
		
		

	}

	public function update($id)
	{
		$where = array('id' => $id);

		$data['tb_gajihan'] = $this->gajihan_model->edit_data($where,'tb_gajihan')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/gajihan_update',$data);
		$this->load->view('templates_administrator/footer');

	}
	public function update_aksi()
	{
		$id = $this->input->post('id');
        $id_gaji = $this->input->post('id_gaji');
        $id_karyawan = $this->input->post('id_karyawan');
        $nama_karyawan = $this->input->post('nama_karyawan');
        $posisi = $this->input->post('posisi');
      
        $tgl = $this->input->post('tgl');		
        $gaji = $this->input->post('gaji');
			$tunjangan = $this->input->post('tunjangan');
            $gajil = $this->input->post('gajil');
            $utang = $this->input->post('utang');
            $total = $this->input->post('total');
			$ket = $this->input->post('ket');
        		$data = array(
                    'id_gaji' => $id_gaji,
        			'id_karyawan' => $id_karyawan,
					'nama_karyawan' => $nama_karyawan,
					'posisi' => $posisi,
					
					'tgl' => $tgl,
                    'gaji' => $gaji,
					'tunjangan' => $tunjangan,
					'gajil' => $gajil,
                    'utang' => $utang,
                    'total' => $total,
					'ket' => $ket,
                  
        		);
				
			$where = array(
				'id' => $id
			);

        		$this->gajihan_model->update_data($where,$data,'tb_gajihan');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data gaji Sudah Diubah!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/gajihan');
		}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->gajihan_model->hapus_data($where,'tb_gajihan');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data gaji karyawan Telah Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/admin/gajihan');
	}
}