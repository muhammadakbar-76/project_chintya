<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('templates_administrator/header');
		$this->load->view('welcome_message');
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
			redirect('administrator/admin/auth');
			}

		}

	public function proses_login()
	{
			$this->form_validation->set_rules('username','username','required',['required' => 'Username Harus Diisi!']);
			$this->form_validation->set_rules('password','password','required',['required' => 'Password Harus Diisi!']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates_administrator/header');
			$this->load->view('welcome_message');
			$this->load->view('templates_administrator/footer');
		}else {
			$username	= $this->input->post('username');
			$password	= $this->input->post('password');


			$user = $username;
			$pass = MD5($password);

			$cek	= $this->login_model->cek_login($user, $pass);

			if ($cek->num_rows() > 0 ){

				foreach ($cek->result() as $ck) {
					$sess_data['username'] = $ck->username;
					$sess_data['email'] = $ck->email;
					$sess_data['level'] = $ck->level;
					$this->session->set_userdata($sess_data);
				}				
				if($sess_data['level'] == 'admin'){
					redirect('administrator/admin/dashboardadmin');
				}elseif ($sess_data['level'] == 'user') {
					redirect('administrator/admin/dashboarduser');
				}
			elseif ($sess_data['level'] == 'pegawai') {
				redirect('administrator/admin/dashboardpegawai');
			}
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Maaf Username atau Password Anda Salah !
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
				redirect('auth');

			}else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			 Username atau Password Anda Salah !
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
				redirect('auth');
			}
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}
