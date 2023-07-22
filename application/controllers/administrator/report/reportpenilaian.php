<?php

class Reportpenilaian extends CI_Controller{

	public function index()
	{		
		$data['tb_penilaian'] = $this->penilaian_model->tampil_data('tb_penilaian')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/report/reportpenilaian',$data);
		$this->load->view('templates_administrator/footer');
	}
	public function print()
	{
		$filter   = $this->input->post('filter');
		$keterangan  = $this->input->post('keterangan');

		
		 if ($filter == '1') {
			$data['tb_penilaian'] = $this->penilaian_model->view_by_keterangan_pengiriman($keterangan);
	
	
		} else { 
			$data['tb_penilaian'] = $this->penilaian_model->view_all();
		}
  
	 $this->load->library('mypdf');
	$this->mypdf->generate('administrator/laporan/print_penilaian', $data);

	 }
}