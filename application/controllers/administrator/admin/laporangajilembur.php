<?php

class Laporangajilembur extends CI_Controller{

	public function index()
	{	
		    $filter   = $this->input->post('filter');
			$tgl  = $this->input->post('tgl');
	
			
			 if ($filter == '1') {
				$data['tb_gajilembur'] = $this->gajilembur_model->view_by_tgl_pengiriman($tgl);
		
		
			} else { 
				$data['tb_gajilembur'] = $this->gajilembur_model->view_all();
			}
      
         $this->load->library('mypdf');
        $this->mypdf->generate('administrator/laporan/print_gajilembur', $data);
}
}