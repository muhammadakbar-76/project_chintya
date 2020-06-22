<?php

class Datasiswa extends CI_Controller{

	public function index()
	{		
		$data['tb_siswa'] = $this->datasiswa_model->tampil_data('tb_siswa')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebarguru');
		$this->load->view('administrator/guru/datasiswa',$data);
		$this->load->view('templates_administrator/footer');
	}
	public function detail($id)
	{
		$data['detail'] = $this->datasiswa_model->ambil_id_datasiswa($id);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebarguru');
		$this->load->view('administrator/guru/datasiswa_detail',$data);
		$this->load->view('templates_administrator/footer');
	}
}
