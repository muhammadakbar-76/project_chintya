<?php

class Jurusan extends CI_Controller{

	function __construct()
	{
		parent::__construct();

        $this->load->model(['jurusan_model', 'datasiswa_model', 'matpel_model', 'tambahjurusan_model']);
	}

	public function index()
	{	
	if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $jurusan = $_GET['jurusan'];
                $kelas = $_GET['kelas'];
                $url_cetak = 'jurusan/cetak?filter=1&jurusan='.$jurusan.'&kelas='.$kelas;
                $jurusan = $this->jurusan_model->view_by_jurusan($jurusan, $kelas); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else{
            	$kelas = $_GET['kelas'];
                $url_cetak = 'jurusan/cetak?filter=3&kelas='.$kelas;
                $jurusan = $this->jurusan_model->view_by_kelas($kelas);// Jika filter nya 2 (per bulan)
                // Panggil fungsi view_by_month yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $url_cetak = 'jurusan/cetak';
            $jurusan = $this->jurusan_model->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }	
		$data['tb_jrs'] = $this->jurusan_model->tampil_data('tb_jrs')->result();
		$data['tb_kelas'] = $this->matpel_model->tampil_data('tb_kelas')->result();
	 	$data['tb_tambahjurusan'] = $this->tambahjurusan_model->tampil_data('tb_tambahjurusan')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/jurusan',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function input()
		{
		$data['tb_kelas'] = $this->matpel_model->tampil_data('tb_kelas')->result();
		$data['tb_siswa'] = $this->datasiswa_model->tampil_data('tb_siswa')->result();
		$data['tb_tambahjurusan'] = $this->tambahjurusan_model->tampil_data('tb_tambahjurusan')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/jurusan_tambah',$data);
		$this->load->view('templates_administrator/footer');
		}

		public function input_aksi()
		{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->input();
		}else{


			$nis = $this->input->post('nis');			
			$nama_siswa = $this->input->post('nama_siswa');
			$jurusan = $this->input->post('jurusan');
			$kelas = $this->input->post('kelas');
			$semester = $this->input->post('semester');			
			$thn_ajaran = $this->input->post('thn_ajaran');
			
        		$data = array(

        			'nis' => $nis,
        			'nama_siswa' => $nama_siswa,
        			'jurusan' => $jurusan,
        			'kelas' => $kelas,
        			'semester' => $semester,        			
        			'thn_ajaran' => $thn_ajaran,
        		);

        		$this->jurusan_model->input_data($data,'tb_jrs');
        		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Jurusan Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('administrator/admin/jurusan');
			}

		}
	public function _rules()
	{
		$this->form_validation->set_rules('nis','NIS','required',
			array(
				'required' => '%s Tidak Boleh Kosong!'));
		$this->form_validation->set_rules('nama_siswa','Nama','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('jurusan','Jurusan','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('kelas','Kelas','required',['required' => '%s Tidak Boleh Kosong!']);		
		$this->form_validation->set_rules('semester','Semester','required',['required' => '%s Tidak Boleh Kosong!']);
		$this->form_validation->set_rules('thn_ajaran','Tahun Ajaran','required',['required' => '%s Tidak Boleh Kosong!']);

	}


	public function update($id)
	{
		$where = array('id_jrs' => $id);
		$data['tb_jrs'] = $this->db->query("select * from tb_jrs jrs, tb_siswa sw where jrs.nis=sw.nis and jrs.id_jrs='$id'")->result();
		$data['tb_jrs'] = $this->db->query("select * from tb_jrs jrs, tb_siswa sw where jrs.nama_siswa=sw.nama_siswa and jrs.id_jrs='$id'")->result();
		$data['tb_kelas'] = $this->db->query("select * from tb_jrs jrs, tb_kelas kl where jrs.kelas=kl.kelas and jrs.id_jrs='$id'")->result();
		$data['tb_jrs'] = $this->jurusan_model->edit_data($where,'tb_jrs')->result();
		$data['tb_siswa'] = $this->jurusan_model->tampil_data('tb_siswa')->result();
		$data['tb_kelas'] = $this->jurusan_model->tampil_data('tb_kelas')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebaradmin');
		$this->load->view('administrator/admin/jurusan_update',$data);
		$this->load->view('templates_administrator/footer');
	}
	
	public function update_aksi()
	{
			$id = $this->input->post('id_jrs');
			$nis 	 = $this->input->post('nis');
			$nama_siswa 	 = $this->input->post('nama_siswa');
			$jurusan       = $this->input->post('jurusan');
			$kelas       = $this->input->post('kelas');
			$semester       = $this->input->post('semester');
			$thn_ajaran       = $this->input->post('thn_ajaran');
			
			$data = array(
			'nis'			=> $nis,
			'nama_siswa'			=> $nama_siswa,
			'jurusan'				=> $jurusan,
			'kelas'			=> $kelas,
			'semester'				=> $semester,
			'thn_ajaran'			=> $thn_ajaran,			
		);
		$where = array(
			'id_jrs' => $id
		);
		$this->jurusan_model->update_data($where,$data,'tb_jrs');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Mata Pelajaran Berhasil Diupdate !
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/admin/jurusan');
	}
	public function delete($id)
	{
		$where = array('id_jrs' => $id);
		$this->jurusan_model->hapus_data($where,'tb_jrs');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Mata Pelajaran Berhasil DiHapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('administrator/admin/jurusan');
	}
	public function print()
 		{
 			$data['tb_jrs'] = $this->db->get('tb_jrs')->result();

 			$this->load->library('mypdf');
 			$this->mypdf->generate('administrator/laporan/print_jurusan',$data);

 		}

 	// public function filter($id)
 	// {
  //  	if ($id == 0) {
  //  	$data = $this->db->get('tb_jrs')->result();
  // 	}
  // 	else
  // 	{
  //  	$data = $this->db->get_where('tb_jrs', ['jurusan'=>$id])->result();
  // 	}
  // 	$dt['jrs'] = $data;
  // 	$dt['jurusan'] = $id;
  // 	$this->load->view('administrator/admin/jurusan',$dt);
 	// }

	// public function search()
	// {
	// 	$keyword = $this->input->post('keyword');
	// 	$data['tb_jrs']=$this->jurusan_model->get_keyword($keyword);
	// 	$this->load->view('templates_administrator/header');
	// 	$this->load->view('templates_administrator/sidebar');
	// 	$this->load->view('administrator/jurusan',$data);
	// 	$this->load->view('templates_administrator/footer');

	// }

	}