<?php

class Perjurusan extends CI_Controller{

	function __construct()
	{
		parent::__construct();

        $this->load->model(['jurusan_model', 'datasiswa_model', 'matpel_model', 'tambahjurusan_model']);
	}

	public function index()
	{		
		$data['tb_jrs'] = $this->jurusan_model->tampil_data('tb_jrs')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebarguru');
		$this->load->view('administrator/guru/perjurusan',$data);
		$this->load->view('templates_administrator/footer');
	}
}