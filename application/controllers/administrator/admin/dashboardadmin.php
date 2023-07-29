<?php

class Dashboardadmin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		is_login('admin');
		if (!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Anda Belum Login !
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('auth');
		}
	}

	public function index()
	{
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin', $data);
		$this->load->view('administrator/admin/dashboardadmin');
		$this->load->view('templates_administrator/footer');
	}
}
