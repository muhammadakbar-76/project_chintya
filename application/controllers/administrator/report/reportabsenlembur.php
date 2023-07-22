<?php

class Reportabsenlembur extends CI_Controller{

	public function index()
	{		
		$data['tb_absenlembur'] = $this->absenlembur_model->tampil_data('tb_absenlembur')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/report/reportabsenlembur',$data);
		$this->load->view('templates_administrator/footer');
	}
	public function print()
 		
			{
				$filter   = $this->input->post('filter');
				$posisi  = $this->input->post('posisi');
		
				
				 if ($filter == '1') {
					$data['tb_absenlembur'] = $this->absenlembur_model->view_by_posisi_pengiriman($posisi);
			
			
				} else { 
					$data['tb_absenlembur'] = $this->absenlembur_model->view_all();
				}
		  
			 $this->load->library('mypdf');
			$this->mypdf->generate('administrator/laporan/print_absenlembur', $data);
	
			 }

 		
}