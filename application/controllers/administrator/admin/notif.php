<?php

class notif extends CI_Controller{

	public function index()
	{		
		$var=$this->notif_model->tampil_data()->result();
		var_dump($var);
	}

	public function input()
	{
		$data['tb_notif'] = $this->notif_model->tampil_data()->result();
	
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/notif_tambah',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function test()
	{
		echo ('wow');
	}

	public function input_aksi()
	{
		
			$id_cuti = $this->input->post('id_cuti');
			$viewed = $this->input->post('viewed');
			$nama_karyawan = $this->input->post('nama_karyawan');
			
			
        		$data = array(
        			'id_cuti' => $id_cuti,
        			'viewed' => $viewed,
			
        		);

        		$this->notif_model->input_data($data,'tb_notif');
        	
		

		}


	public function update($id)
	{
		$where = array('id' => $id);

		$data['tb_notif'] = $this->notif_model->edit_data($where,'tb_notif')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/notif_update',$data);
		$this->load->view('templates_administrator/footer');

	}
	public function update_aksi()
	{
		$id = $this->input->post('id');
        $id_cuti = $this->input->post('id_cuti');
        $viewed = $this->input->post('viewed');
       
        		$data = array(
                    'id_cuti' => $id_cuti,
        			'viewed' => $viewed,
					
        		);
				
			$where = array(
				'id' => $id
			);

        $this->notif_model->update_data($where,$data,'tb_notif');
    } 

}