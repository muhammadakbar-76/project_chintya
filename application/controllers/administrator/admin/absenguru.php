<?php

class Absenguru extends CI_Controller{

	public function index()
	{		
		$data['tb_absenguru'] = $this->absenguru_model->tampil_data('tb_absenguru')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/absenguru',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input()
		{
		$data['tb_guru'] = $this->dataguru_model->tampil_data('tb_guru')->result();
		
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/absenguru_tambah',$data);
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
			$hari = $this->input->post('hari');
			$tgl_absen = $this->input->post('tgl_absen');
			$ket = $this->input->post('ket');			
			$alasan = $this->input->post('alasan');
			
        		$data = array(

        			'nip' => $nip,
        			'nama_guru' => $nama_guru,
        			'hari' => $hari,
        			'tgl_absen' => $tgl_absen,
        			'ket' => $ket,        			
        			'alasan' => $alasan,
        		);

        		$this->absenguru_model->input_data($data,'tb_absenguru');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Absen Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/absenguru');
			}

		}
	public function _rules()
	{
		$this->form_validation->set_rules('nip','NIP','required',['required' => '%s Tidak Boleh Kosong!']
				);
		$this->form_validation->set_rules('nama_guru','Nama','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('hari','Hari','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('tgl_absen','Tanggal','required',['required' => '%s Tidak Boleh Kosong!']);		
		$this->form_validation->set_rules('ket','Keterangan','required',['required' => '%s Kosong!']);

	}

	public function update($id)
	{
		$where = array('id_absen' => $id);
		$data['tb_absenguru'] = $this->db->query("select * from tb_absenguru ag, tb_guru gr where ag.nip=gr.nip and ag.nama_guru=gr.nama_guru and ag.id_absen='$id'")->result();
		$data['tb_absenguru'] = $this->absenguru_model->edit_data($where,'tb_absenguru')->result();
		$data['tb_guru'] = $this->dataguru_model->tampil_data('tb_guru')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/absenguru_update',$data);
		$this->load->view('templates_administrator/footer');

	}
	public function update_aksi()
	{
			
			$id = $this->input->post('id_absen');
			$nip = $this->input->post('nip');
			$nama_guru = $this->input->post('nama_guru');			
			$hari = $this->input->post('hari');
			$tgl_absen = $this->input->post('tgl_absen');
			$ket = $this->input->post('ket');
			$alasan = $this->input->post('alasan');
						
        		$data = array
        		(

        			'nip' => $nip,        			
        			'nama_guru' => $nama_guru,
        			'hari' => $hari,
        			'tgl_absen' => $tgl_absen,
        			'ket' => $ket,
        			'alasan' => $alasan,
        		);

			$where = array('id_absen' => $id);

        		$this->absenguru_model->update_data($where,$data,'tb_absenguru');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Absen Berhasil Diupdate!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/absenguru');
		}

	public function delete($id)
	{
		$where = array('id_absen' => $id);
		$this->jurusan_model->hapus_data($where,'tb_absenguru');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Absen Berhasil DiHapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/admin/absenguru');
	}
}