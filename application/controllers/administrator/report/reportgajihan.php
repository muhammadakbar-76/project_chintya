<?php

class Reportgajihan extends CI_Controller{

	public function index()
	{		
		$data['tb_gajihan'] = $this->gajihan_model->tampil_data('tb_gajihan')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/report/reportgajihan',$data);
		$this->load->view('templates_administrator/footer');
	}
	public function print()
 		{
 			$data['tb_gajihan'] = $this->gajihan_model->tampil_data('tb_gajihan')->result();
 			$this->load->library('mypdf');
 			$this->mypdf->generate('administrator/laporan/print_gajihan',$data);

 		}
}