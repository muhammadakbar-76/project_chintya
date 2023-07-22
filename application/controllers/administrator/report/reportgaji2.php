<?php

class Reportgaji2 extends CI_Controller{

	public function index()
	{		
		$data['tb_gaji'] = $this->gaji_model->tampil_data('tb_gaji')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/report/reportgaji2',$data);
		$this->load->view('templates_administrator/footer');
	}
	public function print()
 		{
 			$data['tb_gaji'] = $this->gaji_model->tampil_data('tb_gaji')->result();
 			$this->load->library('mypdf');
 			$this->mypdf->generate('administrator/laporan/print_gaji2',$data);

 		}
}