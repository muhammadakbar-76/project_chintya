<?php

class Reportcuti extends CI_Controller{

	public function index()
	{		
		$data['tb_cuti'] = $this->cuti_model->tampil_data('tb_cuti')->result();
		$this->load->view('templates_administrator/header');
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
		$this->load->view('templates_administrator/sidebaradmin',$data);
		$this->load->view('administrator/admin/report/reportcuti',$data);
		$this->load->view('templates_administrator/footer');
	}
	public function print()
	{
		$filter   = $this->input->post('filter');
		$tanggal_pengajuan  = $this->input->post('tanggal_pengajuan');
		$tanggal_pengajuan2  = $this->input->post('tanggal_pengajuan2');

		
		 if ($filter == '1') {
			$data['tb_cuti'] = $this->cuti_model->view_by_tanggal_pengajuan_pengiriman($tanggal_pengajuan, $tanggal_pengajuan2);
	
	
		} else { 
			$data['tb_cuti'] = $this->cuti_model->view_all();
		}
  
	 $this->load->library('mypdf');
	$this->mypdf->generate('administrator/laporan/print_cuti', $data);

	 }
	 public function print1($id)
	 {
		$data['tb_cuti'] = $this->cuti_model->ambil_id_cuti($id);
		 $this->load->library('mypdf');
		 $this->mypdf->generate('administrator/laporan/print_cuti',$data);

	 }
}