<?php

class Nilaisiswa extends CI_Controller{

	public function index()
	{		
		$data['tb_nilaisiswa'] = $this->nilaisiswa_model->tampil_data('tb_nilaisiswa')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/nilaisiswa',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input()
		{
		$data['tb_kelas'] = $this->matpel_model->tampil_data('tb_kelas')->result();
		$data['tb_jrs'] = $this->jurusan_model->tampil_data('tb_jrs')->result();
		$data['tb_siswa'] = $this->datasiswa_model->tampil_data('tb_siswa')->result();
		$data['tb_matpel'] = $this->matpel_model->tampil_data('tb_matpel')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/nilaisiswa_tambah',$data);
		$this->load->view('templates_administrator/footer');
		}

	public function input_aksi()
		{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->input();
		}else{

			$nis = $this->input->post('nis');			
			$nama_siswa = $this->input->post('nama_siswa');
			$matpel = $this->input->post('matpel');
			$kelas = $this->input->post('kelas');
			$semester = $this->input->post('semester');
			$thn_ajaran = $this->input->post('thn_ajaran');			
			$absen = $this->input->post('absen');
			$tugas = $this->input->post('tugas');
			$uts = $this->input->post('uts');
			$uas = $this->input->post('uas');
			$rata = $this->input->post('rata');
			$predikat = $this->input->post('predikat');

        		$data = array(

        			'nis' => $nis,
        			'nama_siswa' => $nama_siswa,
        			'matpel' => $matpel,
        			'kelas' => $kelas,
        			'semester' => $semester,        			
        			'thn_ajaran' => $thn_ajaran,
        			'absen' => $absen,
        			'tugas' => $tugas,
        			'uts' => $uts,
        			'uas' => $uas,        			
        			'rata' => $rata,
        			'predikat' => $predikat,
        		);

        		$this->nilaisiswa_model->input_data($data,'tb_nilaisiswa');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Nilai Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/nilaisiswa');
			}

		}
	public function _rules()
	{
		$this->form_validation->set_rules('nis','NIS','required',
			array(
				'required' => '%s Tidak Boleh Kosong!',
			));
		$this->form_validation->set_rules('nama_siswa','Nama','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('matpel','Mata Pelajaran','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('kelas','Kelas','required',['required' => '%s Tidak Boleh Kosong!']);		
		$this->form_validation->set_rules('semester','Semester','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('thn_ajaran','Tahun Ajaran','required',['required' => '%s Tidak Boleh Kosong!']);
		// $this->form_validation->set_rules('nilai1','Nilai 1','required',['required' => '%s Tidak Boleh Kosong!']);
		// $this->form_validation->set_rules('nilai2','Nilai 2','required',['required' => '%s Tidak Boleh Kosong!']);
		// $this->form_validation->set_rules('nilai3','Nilai 3','required',['required' => '%s Tidak Boleh Kosong!']);
		// $this->form_validation->set_rules('uts','UTS','required',['required' => '%s Tidak Boleh Kosong!']);
		// $this->form_validation->set_rules('uas','UAS','required',['required' => '%s Tidak Boleh Kosong!']);		
		
	}

	public function update($id)
	{
		$where = array('id_nilai' => $id);
		$data['tb_nilaisiswa'] = $this->nilaisiswa_model->edit_data($where,'tb_nilaisiswa')->result();
		$data['tb_kelas'] = $this->matpel_model->tampil_data('tb_kelas')->result();
		$data['tb_jrs'] = $this->jurusan_model->tampil_data('tb_jrs')->result();
		$data['tb_siswa'] = $this->datasiswa_model->tampil_data('tb_siswa')->result();
		$data['tb_matpel'] = $this->matpel_model->tampil_data('tb_matpel')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/nilaisiswa_update',$data);
		$this->load->view('templates_administrator/footer');
	}
	
	public function update_aksi()
	{
			$id = $this->input->post('id_nilai');
			$nis = $this->input->post('nis');			
			$nama_siswa = $this->input->post('nama_siswa');
			$matpel = $this->input->post('matpel');
			$kelas = $this->input->post('kelas');
			$semester = $this->input->post('semester');
			$thn_ajaran = $this->input->post('thn_ajaran');			
			$absen = $this->input->post('absen');
			$tugas = $this->input->post('tugas');
			$uts = $this->input->post('uts');
			$uas = $this->input->post('uas');
			$rata = $this->input->post('rata');
			$predikat = $this->input->post('predikat');

        		$data = array(

        			'nis' => $nis,
        			'nama_siswa' => $nama_siswa,
        			'matpel' => $matpel,
        			'kelas' => $kelas,
        			'semester' => $semester,        			
        			'thn_ajaran' => $thn_ajaran,
        			'absen' => $absen,
        			'tugas' => $tugas,
        			'uts' => $uts,
        			'uas' => $uas,        			
        			'rata' => $rata,
        			'predikat' => $predikat,
        		);

		$where = array(
			'id_nilai' => $id
		);
		
		$this->nilaisiswa_model->update_data($where,$data,'tb_nilaisiswa');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Nilai Berhasil Diupdate !
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/admin/nilaisiswa');
	}

	public function delete($id)
	{
		$where = array('id_nilai' => $id);
		$this->nilaisiswa_model->hapus_data($where,'tb_nilaisiswa');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Nilai Berhasil DiHapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/admin/nilaisiswa');
	}
	
}