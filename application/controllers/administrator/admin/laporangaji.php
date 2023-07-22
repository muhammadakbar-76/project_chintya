<?php

class Laporangaji extends CI_Controller{

	public function index()
	{	
		    $filter   = $this->input->post('filter');
			$tgl  = $this->input->post('tgl');
	
			
			 if ($filter == '1') {
				$data['tb_gaji'] = $this->gaji_model->view_by_tgl_pengiriman($tgl);
		
		
			} else { 
				$data['tb_gaji'] = $this->gaji_model->view_all();
			}
      
         $this->load->library('mypdf');
        $this->mypdf->generate('administrator/laporan/print_gaji', $data);
}
}