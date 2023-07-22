<?php

class Jabatan extends CI_Controller
{
    private $nama_jabatan;
    private $id_jabatan;
    private $gaji_jabatan;

    public function __construct()
    {
        parent::__construct();
        is_login('admin');

        #model
        $this->load->model('jabatan_model', 'jabatan');
        $this->load->model('notif_model');

        #request
        $this->nama_jabatan = $this->input->post('nama_jabatan');
        $this->id_jabatan = $this->input->post('id_jabatan');
        $this->gaji_jabatan = $this->input->post('gaji_jabatan');
    }

    public function index()
    {
        $data['jabatan'] = $this->jabatan->read(['*'], null, null, null, null)->result();
        $data['tb_notif'] = $this->notif_model->tampil_data()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebaradmin', $data);
        $this->load->view('administrator/admin/jabatan/index_jabatan', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function add()
    {
        $data['tb_notif'] = $this->notif_model->tampil_data()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebaradmin', $data);
        $this->load->view('administrator/admin/jabatan/add_jabatan', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function save()
    {
        $data = array(
            'id_jabatan' => create_id(),
            'nama_jabatan' => $this->nama_jabatan,
            'gaji_jabatan' => $this->gaji_jabatan
        );

        $result = $this->jabatan->insert($data);

        if ($result) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Jabatan Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Jabatan Gagal Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        }

        redirect('administrator/admin/jabatan');
    }

    public function view($id)
    {
        $data['tb_notif'] = $this->notif_model->tampil_data()->result();
        $data['jabatan'] = $this->jabatan->read(['*'], ['id_jabatan' => $id], null, null, null)->row();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebaradmin', $data);
        $this->load->view('administrator/admin/jabatan/edit_jabatan', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update()
    {
        $data = array(
            'nama_jabatan' => $this->nama_jabatan,
            'gaji_jabatan' => $this->gaji_jabatan
        );

        $where = array(
            'id_jabatan' => $this->id_jabatan
        );

        $result = $this->jabatan->update($where, $data);

        if ($result) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Jabatan Berhasil Diganti!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Jabatan Gagal Diganti!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        }

        redirect('administrator/admin/jabatan');
    }

    public function delete($id)
    {
        $result = $this->jabatan->delete(['id_jabatan' => $id]);

        if ($result) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Jabatan Berhasil Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Jabatan Gagal Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        }

        redirect('administrator/admin/jabatan');
    }
}
