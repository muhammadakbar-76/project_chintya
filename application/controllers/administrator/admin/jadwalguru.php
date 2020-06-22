<?php

class Jadwalguru extends CI_Controller{

	public function index()
	{		
		$data['tb_jadwal'] = $this->jadwalguru_model->tampil_data('tb_jadwal')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/jadwalguru',$data);
		$this->load->view('templates_administrator/footer');
	}
	public function input()
	{
		$data['tb_matpel'] = $this->matpel_model->tampil_data('tb_matpel')->result();
		$data['tb_kelas'] = $this->jadwalguru_model->tampil_data('tb_kelas')->result();
		$data['tb_guru'] = $this->dataguru_model->tampil_data('tb_guru')->result();
		$data['tb_tambahjurusan'] = $this->tambahjurusan_model->tampil_data('tb_tambahjurusan')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/jadwalguru_tambah',$data);
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
			$jurusan = $this->input->post('jurusan');
			$kelas = $this->input->post('kelas');
			$nip = $this->input->post('nip');			
			$nama_guru = $this->input->post('nama_guru');
			$kode_matpel = $this->input->post('kode_matpel');
			$matpel = $this->input->post('matpel');
			$jam_masuk = $this->input->post('jam_masuk');
			$jam_selesai = $this->input->post('jam_selesai');
			
        		$data = array(

        			'hari' => $hari,
        			'tgl_absen' => $tgl_absen,
        			'jurusan' => $jurusan,
        			'kelas' => $kelas,
        			'nip' => $nip,        			
        			'nama_guru' => $nama_guru,
        			'kode_matpel' => $kode_matpel,
        			'matpel' => $matpel,
        			'jam_masuk' => $jam_masuk,
        			'jam_selesai' => $jam_selesai,
        		);

        		$this->jadwalguru_model->input_data($data,'tb_jadwal');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Jadwal Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/jadwalguru');
			}

		}

	public function _rules()
	{
		$this->form_validation->set_rules('hari','Hari','required',['required' => 'Pilih %s!']);
		$this->form_validation->set_rules('tgl_absen','Tanggal Absen','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('jurusan','Jurusan','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('kelas','Kelas','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('nip','NIP','required',['required' => '%s Tidak Boleh Kosong!']);		
		$this->form_validation->set_rules('nama_guru','Nama','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('kode_matpel','Kode Matapelajaran','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('matpel','Mata Pelajaran','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('jam_masuk','Jam Masuk','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('jam_selesai','Jam Selesai','required',['required' => '%s Tidak Boleh Kosong!']);

	}

	public function update($id)
	{
		$where = array('id_jadwal' => $id);
		$data['tb_jadwal'] = $this->db->query("select * from tb_jadwal jw, tb_matpel mp where jw.kode_matpel=mp.kode_matpel and jw.matpel=mp.matpel and jw.id_jadwal='$id'")->result();
		$data['tb_jadwal'] = $this->db->query("select * from tb_jadwal jw, tb_guru gr where jw.nip=gr.nip and jw.nama_guru=gr.nama_guru and jw.id_jadwal='$id'")->result();
		$data['tb_jadwal'] = $this->db->query("select * from tb_jadwal jw, tb_jrs jrs where jw.jurusan=jrs.jurusan and jw.id_jadwal='$id'")->result();
		$data['tb_jadwal'] = $this->db->query("select * from tb_jadwal jw, tb_kelas kl where jw.kelas=kl.kelas and jw.id_jadwal='$id'")->result();
		$data['tb_jadwal'] = $this->jadwalguru_model->edit_data($where,'tb_jadwal')->result();
		$data['tb_matpel'] = $this->matpel_model->tampil_data('tb_matpel')->result();
		$data['tb_guru'] = $this->dataguru_model->tampil_data('tb_guru')->result();
		$data['tb_jrs'] = $this->jurusan_model->tampil_data('tb_jrs')->result();
		$data['tb_kelas'] = $this->matpel_model->tampil_data('tb_kelas')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/jadwalguru_update',$data);
		$this->load->view('templates_administrator/footer');

	}
	public function update_aksi()
	{
			
			$id = $this->input->post('id_jadwal');
			$hari = $this->input->post('hari');
			$tgl_absen = $this->input->post('tgl_absen');
			$jurusan = $this->input->post('jurusan');	
			$kelas = $this->input->post('kelas');
			$nip = $this->input->post('nip');			
			$nama_guru = $this->input->post('nama_guru');
			$kode_matpel = $this->input->post('kode_matpel');
			$matpel = $this->input->post('matpel');
			$jam_masuk = $this->input->post('jam_masuk');
			$jam_selesai = $this->input->post('jam_selesai');
			
			
        		$data = array
        		(

        			'hari' => $hari,
        			'tgl_absen' => $tgl_absen,
        			'jurusan' => $jurusan,
        			'kelas' => $kelas,
        			'nip' => $nip,        			
        			'nama_guru' => $nama_guru,
        			'matpel' => $matpel,
        			'jam_masuk' => $jam_masuk,
        			'jam_selesai' => $jam_selesai,
        		);

			$where = array('id_jadwal' => $id);

        		$this->jadwalguru_model->update_data($where,$data,'tb_jadwal');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Jadwal Berhasil Diupdate!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/jadwalguru');
		}

	public function delete($id)
	{
		$where = array('id_jadwal' => $id);
		$this->jadwalguru_model->hapus_data($where,'tb_jadwal');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Jadwal Berhasil Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/admin/jadwalguru');
	}


}