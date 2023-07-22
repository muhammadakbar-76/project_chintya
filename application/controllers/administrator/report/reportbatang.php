<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Reportbatang extends CI_Controller {
 
    public function index()
    {
            $this->pie();
        }
    
        public function pie() {
            //memanggil function read pada kota model
            //function read berfungsi mengambil/read data dari table kota di database
            $data_barang = $this->chart_model->readcuti();
    
            //mengirim data ke view
            $output = array(
                        'theme_page' => 'chart_pie',
                        'judul' => 'Pie Chart',
                        'data_barang' => $data_barang
                    );
    
            //memanggil file view
            $this->load->view('administrator/admin/report/reportbatang', $output);
    
    
       
                 }
                }