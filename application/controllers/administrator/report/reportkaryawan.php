<?php

class Reportkaryawan extends CI_Controller{

	public function index()
	{		
		$data['tb_karyawan'] = $this->karyawan_model->tampil_data('tb_karyawan')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/report/reportkaryawan',$data);
		$this->load->view('templates_administrator/footer');
	}
	public function print()
 		{
 		   $filter   = $this->input->post('filter');
			$golongan  = $this->input->post('golongan');
	
			
			 if ($filter == '1') {
				$data['tb_karyawan'] = $this->karyawan_model->view_by_golongan_pengiriman($golongan);
		
		
			} else { 
				$data['tb_karyawan'] = $this->karyawan_model->view_all();
			}
      
         $this->load->library('mypdf');
        $this->mypdf->generate('administrator/laporan/print_karyawan', $data);

 		}
}