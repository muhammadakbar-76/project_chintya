<?php

class Gaji extends CI_Controller
{
  private $id_gaji;
  private $id_pegawai;
  private $tgl_dibayar;
  private $gaji_dibayar;
  private $bulan_tahun_dibayar;

  public function __construct()
  {
    parent::__construct();
    is_login('hrd');

    #model
    $this->load->model('gaji_model', 'gaji');
    $this->load->model('pegawai_model', 'pegawai');
    $this->load->model('hutang_model', 'hutang');
    $this->load->model('notif_model');

    #request
    $this->id_gaji = $this->input->get_post('id_gaji');
    $this->id_pegawai = $this->input->get_post('id_pegawai');
    $this->tgl_dibayar = $this->input->get_post('tgl_dibayar');
    $this->bulan_tahun_dibayar = $this->input->get_post('bulan_tahun_dibayar');
    $this->gaji_dibayar = $this->input->get_post('gaji_dibayar');
  }

  public function index()
  {
    $where = array();

    if (!empty($this->id_pegawai)) {
      $data['id_pegawai'] = $this->id_pegawai;
      $where['a.id_pegawai'] = $this->id_pegawai;
    }
    if (!empty($this->bulan_tahun_dibayar)) {
      $data['bulan_tahun_dibayar'] = $this->bulan_tahun_dibayar;
      $date_chunks = explode('-', $this->bulan_tahun_dibayar);
      $where['month(tgl_dibayar) ='] = $date_chunks[1];
      $where['year(tgl_dibayar) ='] = $date_chunks[0];
    }

    $data['gaji'] = $this->gaji->read(['*'], $where, null, null, null)->result();
    $data['pegawai'] = $this->pegawai->read(['*'], ['status_aktif_pegawai' => 1], null, null, null)->result();
    $data['tb_notif'] = $this->notif_model->tampil_data()->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebarhrd', $data);
    $this->load->view('administrator/hrd/gaji/index_gaji', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function add()
  {
    $data['tb_notif'] = $this->notif_model->tampil_data()->result();
    $data['pegawai'] = $this->pegawai->read(['*'], ['status_aktif_pegawai' => 1], null, null, null)->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebarhrd', $data);
    $this->load->view('administrator/hrd/gaji/add_gaji', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function save()
  {
    #get gaji pegawai
    $gaji = $this->pegawai->read(['gaji_jabatan'], ['a.id_pegawai' => $this->id_pegawai], null, null, null)->row();
    $total = empty($gaji) ? 0 : $gaji->gaji_jabatan;
    $potongan_pph = $total == 0 ? 0 : $total * 0.1; #10% pph

    $select = array('*');
    $where = array(
      'a.id_pegawai' => $this->id_pegawai,
      'hutang_dibayar' => 0,
      'tgl_hutang <=' => date('Y-m-d', strtotime($this->tgl_dibayar))
    );
    $order = 'tgl_hutang asc';
    $hutang = $this->hutang->read($select, $where, $order, null, null)->result();

    foreach ($hutang as $hut) {
      if ($total - $hut->jml_hutang >= 0) {
        $total -= $hut->jml_hutang;
        $this->hutang->update(['id_hutang' => $hut->id_hutang], ['hutang_dibayar' => 1]);
      } else {
        $this->hutang->update(['id_hutang' => $hut->id_hutang], ['jml_hutang' => ($hut->jml_hutang - $total)]);
        $total = 0;
      }
    }

    $data = array(
      'id_gaji' => create_id(),
      'id_pegawai' => $this->id_pegawai,
      'tgl_dibayar' => date('Y-m-d', strtotime($this->tgl_dibayar)),
      'gaji_dibayar' => $total - $potongan_pph
    );

    $result = $this->gaji->insert($data);

    if ($result) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Gaji Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Gaji Gagal Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
    }

    redirect('administrator/hrd/gaji');
  }

  public function view($id)
  {
    $data['tb_notif'] = $this->notif_model->tampil_data()->result();
    $data['pegawai'] = $this->pegawai->read(['*'], ['status_aktif_pegawai' => 1], null, null, null)->result();
    $data['gaji'] = $this->gaji->read(['*'], ['id_gaji' => $id], null, null, null)->row();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebarhrd', $data);
    $this->load->view('administrator/hrd/gaji/edit_gaji', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function update()
  {
    $data = array(
      // 'id_pegawai' => $this->id_pegawai,
      'gaji_dibayar' => $this->gaji_dibayar,
      'tgl_dibayar' => date('Y-m-d', strtotime($this->tgl_dibayar))
    );

    $where = array(
      'id_gaji' => $this->id_gaji
    );

    $result = $this->gaji->update($where, $data);

    if ($result) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Gaji Berhasil Diganti!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Gaji Gagal Diganti!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
    }

    redirect('administrator/hrd/gaji');
  }

  public function delete($id)
  {
    $result = $this->gaji->delete(['id_gaji' => $id]);

    if ($result) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Gaji Berhasil Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Gaji Gagal Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
    }

    redirect('administrator/hrd/gaji ');
  }

  public function cetak()
  {
    $where = array();

    if (!empty($this->id_pegawai)) {
      $data['id_pegawai'] = $this->id_pegawai;
      $where['a.id_pegawai'] = $this->id_pegawai;
    }
    if (!empty($this->bulan_tahun_dibayar)) {
      $data['bulan_tahun_dibayar'] = $this->bulan_tahun_dibayar;
      $date_chunks = explode('-', $this->bulan_tahun_dibayar);
      $where['month(tgl_dibayar) ='] = $date_chunks[1];
      $where['year(tgl_dibayar) ='] = $date_chunks[0];
    }

    $data['gaji'] = $this->gaji->read(['*'], $where, null, null, null)->result();

    $this->load->library('mypdf');
    $this->mypdf->generate('administrator/laporan/print_gaji', $data);
  }

  public function slip($id)
  {
    $where = array('id_gaji' => $id);
    $data['gaji'] = $this->gaji->read(['*'], $where, null, null, null)->row();

    $this->load->library('mypdf');
    $this->mypdf->generate('administrator/laporan/print_slip_gaji', $data);
  }
}
