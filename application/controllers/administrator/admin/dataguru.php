<?php

class Dataguru extends CI_Controller{

	public function index()
	{		
		$data['tb_guru'] = $this->dataguru_model->tampil_data('tb_guru')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/dataguru',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function detail($id)
	{
		$data['detail'] = $this->dataguru_model->ambil_id_dataguru($id);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/dataguru_detail',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input()
	{
		$data['tb_guru'] = $this->dataguru_model->tampil_data('tb_guru')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/dataguru_tambah',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->input();
		}else{
			$nip = $this->input->post('nip');
			$nama_guru = $this->input->post('nama_guru');
			$tempat_lahir = $this->input->post('tempat_lahir');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$agama = $this->input->post('agama');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$alamat = $this->input->post('alamat');
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
        			'nip' => $nip,
        			'nama_guru' => $nama_guru,
        			'tempat_lahir' => $tempat_lahir,
        			'tgl_lahir' => $tgl_lahir,
        			'agama' => $agama,
        			'jenis_kelamin' => $jenis_kelamin,
        			'alamat' => $alamat,
        			'telp' => $telp,
        			'foto' => $foto
        		);

        		$this->dataguru_model->input_data($data,'tb_guru');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Guru Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/dataguru');
			}

		}
	public function _rules()
	{
		$this->form_validation->set_rules('nip','NIP','required|is_unique[tb_guru.nip]',
			array(
				'required' => '%s Tidak Boleh Kosong!',
				'is_unique' => '%s Sudah ada!'
			));
		$this->form_validation->set_rules('nama_guru','Nama Guru','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required',['required' => '%s  Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('agama','Agama','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('alamat','Alamat','required',['required' => '%s Belum Diisi!']);		
		$this->form_validation->set_rules('telp','Telpon','required',['required' => '%s Tidak Boleh Kosong!']);

	}

	public function update($id)
	{
		$where = array('id_guru' => $id);

		$data['tb_guru'] = $this->dataguru_model->edit_data($where,'tb_guru')->result();
		$data['detail'] = $this->dataguru_model->ambil_id_dataguru($id);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/dataguru_update',$data);
		$this->load->view('templates_administrator/footer');

	}
	public function update_aksi()
	{
			$id = $this->input->post('id_guru');
			$nip = $this->input->post('nip');
			$nama_guru = $this->input->post('nama_guru');
			$tempat_lahir = $this->input->post('tempat_lahir');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$agama = $this->input->post('agama');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$alamat = $this->input->post('alamat');
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
        			
        			'nip' => $nip,
        			'nama_guru' => $nama_guru,
        			'tempat_lahir' => $tempat_lahir,
        			'tgl_lahir' => $tgl_lahir,
        			'agama' => $agama,
        			'jenis_kelamin' => $jenis_kelamin,
        			'alamat' => $alamat,
        			'telp' => $telp,
        		);

			$where = array(
				'id_guru' => $id
			);

        		$this->dataguru_model->update_data($where,$data,'tb_guru');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Guru Berhasil Diupdate!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/dataguru');
		}

	public function delete($id)
	{
		$where = array('id_guru' => $id);
		$this->dataguru_model->hapus_data($where,'tb_guru');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Guru Berhasil Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/admin/dataguru');
	}

	public function print()
 		{
 			$data['tb_guru'] = $this->dataguru_model->tampil_data('tb_guru')->result();
 			
 			$this->load->library('mypdf');
 			$this->mypdf->generate('administrator/laporan/print_dataguru',$data);

 		}

 // 	public function get_nama(){
	// 	$nip=$this->input->post('nip');
	// 	$data=$this->dataguru_model->get_nama($nip);
	// 	echo json_encode($data)
	// }
}