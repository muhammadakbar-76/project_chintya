<?php

class Hutang extends CI_Controller
{
    private $id_hutang;
    private $id_pegawai;
    private $jml_hutang;
    private $tgl_hutang;
    private $hutang_dibayar;

    public function __construct()
    {
        parent::__construct();
        is_login('koperasi');

        #model
        $this->load->model('divisi_model', 'divisi');
        $this->load->model('notif_model');

        #request
        $this->nama_divisi = $this->input->post('nama_divisi');
        $this->id_divisi = $this->input->post('id_divisi');
    }

    public function index()
    {
        $data['divisi'] = $this->divisi->read(['*'], null, null, null, null)->result();
        $data['tb_notif'] = $this->notif_model->tampil_data()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebaradmin', $data);
        $this->load->view('administrator/admin/divisi/index_divisi', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function add()
    {
        $data['tb_notif'] = $this->notif_model->tampil_data()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebaradmin', $data);
        $this->load->view('administrator/admin/divisi/add_divisi', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function save()
    {
        $data = array(
            'id_divisi' => create_id(),
            'nama_divisi' => $this->nama_divisi
        );

        $result = $this->divisi->insert($data);

        if ($result) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Divisi Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Divisi Gagal Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        }

        redirect('administrator/admin/divisi');
    }

    public function view($id)
    {
        $data['tb_notif'] = $this->notif_model->tampil_data()->result();
        $data['divisi'] = $this->divisi->read(['*'], ['id_divisi' => $id], null, null, null)->row();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebaradmin', $data);
        $this->load->view('administrator/admin/divisi/edit_divisi', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update()
    {
        $data = array(
            'nama_divisi' => $this->nama_divisi
        );

        $where = array(
            'id_divisi' => $this->id_divisi
        );

        $result = $this->divisi->update($where, $data);

        if ($result) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Divisi Berhasil Diganti!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Divisi Gagal Diganti!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        }

        redirect('administrator/admin/divisi');
    }

    public function delete($id)
    {
        $result = $this->divisi->delete(['id_divisi' => $id]);

        if ($result) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Divisi Berhasil Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Divisi Gagal Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        }

        redirect('administrator/admin/divisi');
    }
}
