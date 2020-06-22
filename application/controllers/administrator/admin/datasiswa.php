<?php

class Datasiswa extends CI_Controller{


    
	public function index()
	{		
		$data['tb_siswa'] = $this->datasiswa_model->tampil_data('tb_siswa')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/datasiswa',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function detail($id)
	{
		$data['detail'] = $this->datasiswa_model->ambil_id_datasiswa($id);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/datasiswa_detail',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input()
	{
		$data['tb_siswa'] = $this->datasiswa_model->tampil_data('tb_siswa')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/datasiswa_tambah',$data);
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
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$agama = $this->input->post('agama');			
			$telp = $this->input->post('telp');
			$alamat = $this->input->post('alamat');
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
        			'jenis_kelamin' => $jenis_kelamin,
        			'agama' => $agama,        			
        			'telp' => $telp,
        			'alamat' => $alamat,
        			'foto' => $foto
        		);

        		$this->datasiswa_model->input_data($data,'tb_siswa');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Siswa Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/datasiswa');
			}

		}
	public function _rules()
	{
		$this->form_validation->set_rules('nis','NIS','required|is_unique[tb_siswa.nis]',
			array(
				'required' => '%s Tidak Boleh Kosong!',
				'is_unique' => '%s Sudah ada!'
			));
		$this->form_validation->set_rules('nama_siswa','Nama','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('agama','Agama','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('telp','Telepon','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('alamat','Alamat','required',['required' => '%s Tidak Boleh Kosong!']);
	}

	public function update($id)
	{
		$where = array('id_siswa' => $id);

		$data['tb_siswa'] = $this->datasiswa_model->edit_data($where,'tb_siswa')->result();
		$data['detail'] = $this->datasiswa_model->ambil_id_datasiswa($id);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/datasiswa_update',$data);
		$this->load->view('templates_administrator/footer');

	}

	public function update_aksi(){

			
			$id = $this->input->post('id_siswa');
			$nis = $this->input->post('nis');
			$nama_siswa = $this->input->post('nama_siswa');
			$tempat_lahir = $this->input->post('tempat_lahir');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$agama = $this->input->post('agama');			
			$telp = $this->input->post('telp');
			$alamat = $this->input->post('alamat');
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
        			'jenis_kelamin' => $jenis_kelamin,
        			'agama' => $agama,        			
        			'telp' => $telp,
        			'alamat' => $alamat,
        		);

        		$where = array('id_siswa' => $id);

        		$this->datasiswa_model->update_data($where,$data,'tb_siswa');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Siswa Berhasil Diupdate!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/datasiswa');

		}
	
	public function delete($id)
	{
		$where = array('id_siswa' => $id);
		$this->datasiswa_model->hapus_data($where,'tb_siswa');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Siswa Berhasil Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/admin/datasiswa');
	}

	public function print()
 		{
 			$data['tb_siswa'] = $this->datasiswa_model->tampil_data('tb_siswa')->result();
 			$this->load->library('mypdf');
 			$this->mypdf->generate('administrator/laporan/print_datasiswa',$data);

 		}

	
}