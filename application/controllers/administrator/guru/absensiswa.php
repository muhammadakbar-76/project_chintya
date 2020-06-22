<?php

class Absensiswa extends CI_Controller{

		public function index()
		{		
		$data['tb_absensiswa'] = $this->absensiswa_model->tampil_data('tb_absensiswa')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebarguru');
		$this->load->view('administrator/guru/absensiswa',$data);
		$this->load->view('templates_administrator/footer');
		}

		public function input()
		{
		$data['tb_siswa'] = $this->datasiswa_model->tampil_data('tb_siswa')->result();
		$data['tb_tambahjurusan'] = $this->tambahjurusan_model->tampil_data('tb_tambahjurusan')->result();
		$data['tb_kelas'] = $this->matpel_model->tampil_data('tb_kelas')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebarguru');
		$this->load->view('administrator/guru/absensiswa_tambah',$data);
		$this->load->view('templates_administrator/footer');
		}

		public function input_aksi()
		{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->input();
		}else{
			$hari = $this->input->post('hari');
			$tgl_absen = $this->input->post('tgl_absen');
			$nis = $this->input->post('nis');			
			$nama_siswa = $this->input->post('nama_siswa');
			$jurusan = $this->input->post('jurusan');			
			$kelas = $this->input->post('kelas');
			$ket = $this->input->post('ket');			
			$alasan = $this->input->post('alasan');
			
        		$data = array(

        			'hari' => $hari,
        			'tgl_absen' => $tgl_absen,
        			'nis' => $nis,
        			'nama_siswa' => $nama_siswa,        			
        			'jurusan' => $jurusan,        			
        			'kelas' => $kelas,
        			'ket' => $ket,        			
        			'alasan' => $alasan,
        		);

        		$this->absensiswa_model->input_data($data,'tb_absensiswa');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Absen Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/guru/absensiswa');
			}

		}
	public function _rules()
	{
		$this->form_validation->set_rules('hari','Hari','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('tgl_absen','Tanggal','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('nis','Nis','required',['required' => '%s Tidak Boleh Kosong!']
				);
		$this->form_validation->set_rules('nama_siswa','Nama','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('jurusan','Jurusan','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('kelas','Kelas','required',['required' => '%s Tidak Boleh Kosong!']);				
		$this->form_validation->set_rules('ket','Keterangan','required',['required' => '%s Kosong!']);

	}

	public function update($id)
	{
		$where = array('id_as' => $id);
		// $data['tb_absensiswa'] = $this->db->query("select * from tb_absensiswa as, tb_siswa sw where as.nis=sw.nis and as.nama_siswa=sw.nama_siswa and as.id_as='$id'")->result();
		$data['tb_absensiswa'] = $this->absensiswa_model->edit_data($where,'tb_absensiswa')->result();
		$data['tb_siswa'] = $this->datasiswa_model->tampil_data('tb_siswa')->result();
		$data['tb_kelas'] = $this->matpel_model->tampil_data('tb_kelas')->result();
		$data['tb_tambahjurusan'] = $this->tambahjurusan_model->tampil_data('tb_tambahjurusan')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebarguru');
		$this->load->view('administrator/guru/absensiswa_update',$data);
		$this->load->view('templates_administrator/footer');

	}
	public function update_aksi()
	{
			
			$id = $this->input->post('id_as');
			$hari = $this->input->post('hari');
			$tgl_absen = $this->input->post('tgl_absen');
			$nis = $this->input->post('nis');
			$nama_siswa = $this->input->post('nama_siswa');			
			$jurusan = $this->input->post('jurusan');
			$kelas = $this->input->post('kelas');
			$ket = $this->input->post('ket');
			$alasan = $this->input->post('alasan');
						
        		$data = array
        		(
        			'hari' => $hari,
        			'tgl_absen' => $tgl_absen,
        			'nis' => $nis,        			
        			'nama_siswa' => $nama_siswa,
        			'jurusan' => $jurusan,
        			'kelas' => $kelas,
        			'ket' => $ket,
        			'alasan' => $alasan,
        		);

			$where = array('id_as' => $id);

        		$this->absensiswa_model->update_data($where,$data,'tb_absensiswa');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Absen Berhasil Diupdate!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/guru/absensiswa');
		}


	public function delete($id)
	{
		$where = array('id_as' => $id);
		$this->absensiswa_model->hapus_data($where,'tb_absensiswa');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Absen Berhasil DiHapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/guru/absensiswa');
	}
}