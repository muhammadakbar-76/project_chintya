<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanjurusan extends CI_Controller {

 public function index()
 {
  $data['tb_tambahjurusan'] = $this->db->get('tb_tambahjurusan')->result();
  $this->load->view('administrator/admin/laporan/filter', $data);  
 }
 public function filter($id)
 	{
  if ($id == 0) {
   $data = $this->db->get('tb_jrs')->result();
  }
  else
  {
   $data = $this->db->get_where('tb_jrs', ['jurusan'=>$id])->result();
  }
  $dt['jrs'] = $data;
  $dt['jurusan'] = $id;
  $this->load->view('administrator/admin/laporan/result', $dt);
 }
}