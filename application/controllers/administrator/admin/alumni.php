<?php

class Alumni extends CI_Controller{

	public function index()
	{		
		$data['tb_alumni'] = $this->alumni_model->tampil_data('tb_alumni')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/alumni',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function detail($id)
	{
		$data['detail'] = $this->alumni_model->ambil_id_alumni($id);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/alumni_detail',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input()
	{	
		$data['tb_tambahjurusan'] = $this->tambahjurusan_model->tampil_data('tb_tambahjurusan')->result();
		$data['tb_siswa'] = $this->datasiswa_model->tampil_data('tb_siswa')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/alumni_tambah',$data);
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
			$tempat_lahir = $this->input->post('tempat_lahir');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$agama = $this->input->post('agama');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$jurusan = $this->input->post('jurusan');
			$angkatan = $this->input->post('angkatan');
			$telp = $this->input->post('telp');
			$foto = $_FILES['foto'];
			if($foto=''){}else{
				$config['upload_path'] ='./assets/img';
				$config['allowed_types'] ='jpg|png|gif';
				$config['max_size']      = 2048;
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('foto')) {
					echo "Gagal Upload"; die;
				}else{
					$foto=$this->upload->data('file_name');
				}
			}
			
        		$data = array(
        			'nis' => $nis,
        			'nama_siswa' => $nama_siswa,
        			'tempat_lahir' => $tempat_lahir,
        			'tgl_lahir' => $tgl_lahir,
        			'agama' => $agama,
        			'jenis_kelamin' => $jenis_kelamin,
        			'jurusan' => $jurusan,
        			'angkatan' => $angkatan,
        			'telp' => $telp,
        			'foto' => $foto
        		);

        		$this->alumni_model->input_data($data,'tb_alumni');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Alumni Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/alumni');
			}

		}

		public function _rules()
	{
		$this->form_validation->set_rules('nis','NIS','required|is_unique[tb_alumni.nis]',
			array(
				'required' => '%s Tidak Boleh Kosong!',
				'is_unique' => '%s Sudah ada!'
			));
		$this->form_validation->set_rules('nama_siswa','Nama Siswa','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required',['required' => '%s  Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('agama','Agama','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('jurusan','Jurusan','required',['required' => '%s Belum Diisi!']);
		$this->form_validation->set_rules('angkatan','Angkatan','required',['required' => '%s Belum Diisi!']);		
		$this->form_validation->set_rules('telp','Telpon','required',['required' => '%s Tidak Boleh Kosong!']);

	}
	public function update($id)
	{
		$where = array('id' => $id);

		$data['tb_alumni'] = $this->alumni_model->edit_data($where,'tb_alumni')->result();
		$data['detail'] = $this->alumni_model->ambil_id_alumni($id);
		$data['tb_siswa'] = $this->datasiswa_model->tampil_data('tb_siswa')->result();
		$data['tb_tambahjurusan'] = $this->tambahjurusan_model->tampil_data('tb_tambahjurusan')->result();
		$data['tb_alumni'] = $this->db->query("select * from tb_alumni al, tb_siswa sw where al.nis=sw.nis and al.id='$id'")->result();
		$data['tb_alumni'] = $this->db->query("select * from tb_alumni al, tb_siswa sw where al.nama_siswa=sw.nama_siswa and al.id='$id'")->result();
		$data['tb_alumni'] = $this->db->query("select * from tb_alumni al, tb_siswa sw where al.tempat_lahir=sw.tempat_lahir and al.id='$id'")->result();
		$data['tb_alumni'] = $this->db->query("select * from tb_alumni al, tb_siswa sw where al.tgl_lahir=sw.tgl_lahir and al.id='$id'")->result();
		$data['tb_alumni'] = $this->db->query("select * from tb_alumni al, tb_siswa sw where al.agama=sw.agama and al.id='$id'")->result();
		$data['tb_alumni'] = $this->db->query("select * from tb_alumni al, tb_siswa sw where al.jenis_kelamin=sw.jenis_kelamin and al.id='$id'")->result();
		$data['tb_alumni'] = $this->db->query("select * from tb_alumni al, tb_siswa sw where al.telp=sw.telp and al.id='$id'")->result();
		$data['tb_tambahjurusan'] = $this->db->query("select * from tb_alumni al, tb_tambahjurusan tj where al.jurusan=tj.jurusan and al.id='$id'")->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/alumni_update',$data);
		$this->load->view('templates_administrator/footer');

	}

	public function update_aksi(){

			
			$id = $this->input->post('id');
			$nis = $this->input->post('nis');
			$nama_siswa = $this->input->post('nama_siswa');
			$tempat_lahir = $this->input->post('tempat_lahir');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$agama = $this->input->post('agama');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$jurusan = $this->input->post('jurusan');
			$angkatan = $this->input->post('angkatan');
			$telp = $this->input->post('telp');
			$foto = $_FILES['userfile']['name'];
			if($foto){
				$config['upload_path'] ='./assets/img';
				$config['allowed_types'] ='jpg|png|gif';
				$config['max_size']      = 2048;
				$this->load->library('upload',$config);
				if($this->upload->do_upload('userfile')) {
					$userfile = $this->upload->data('file_name');
					$this->db->set('foto', $userfile);
				}else{
					echo "Gagal Upload";
				}
			}
			
        		$data = array(

        			'nis' => $nis,
        			'nama_siswa' => $nama_siswa,
        			'tempat_lahir' => $tempat_lahir,
        			'tgl_lahir' => $tgl_lahir,
        			'agama' => $agama,  
        			'jenis_kelamin' => $jenis_kelamin,
        			'jurusan' => $jurusan,
        			'angkatan' => $angkatan,			
        			'telp' => $telp,
        			
        		);

        		$where = array('id' => $id);

        		$this->alumni_model->update_data($where,$data,'tb_alumni');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Alumni Berhasil Diupdate!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/alumni');

		}
	public function delete($id)
	{
		$where = array('id' => $id);
		$this->jurusan_model->hapus_data($where,'tb_alumni');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Alumni Berhasil Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/admin/alumni');
	}
}