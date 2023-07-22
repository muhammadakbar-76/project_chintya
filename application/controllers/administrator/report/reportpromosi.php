<?php

class Reportpromosi extends CI_Controller{

	public function index()
	{		
		$data['tb_promosi'] = $this->promosi_model->tampil_data('tb_promosi')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/report/reportpromosi',$data);
		$this->load->view('templates_administrator/footer');
	}
	public function print()
	{
		$filter   = $this->input->post('filter');
		$posisi1  = $this->input->post('posisi1');

		
		 if ($filter == '1') {
			$data['tb_promosi'] = $this->promosi_model->view_by_posisi1_pengiriman($posisi1);
	
	
		} else { 
			$data['tb_promosi'] = $this->promosi_model->view_all();
		}
  
	 $this->load->library('mypdf');
	$this->mypdf->generate('administrator/laporan/print_promosi', $data);

	 }
}