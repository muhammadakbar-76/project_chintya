<?php

class Sidebaradmin extends CI_Controller{


	public function index()
	{
		$data = $this->admin_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'nama' 	=> $data->nama,
		);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('templates_administrator/footer');

	}
}