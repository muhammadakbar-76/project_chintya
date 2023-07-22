<?php

class Reportgajilembur extends CI_Controller{

	public function index()
	{		
		$data['tb_gajilembur'] = $this->gajilembur_model->tampil_data('tb_gajilembur')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/report/reportgajilembur',$data);
		$this->load->view('templates_administrator/footer');
	}
	public function print()
 		{
 			$data['tb_gajilembur'] = $this->gajilembur_model->tampil_data('tb_gajilembur')->result();
 			$this->load->library('mypdf');
 			$this->mypdf->generate('administrator/laporan/print_gajilembur',$data);

 		}
}