<?php

class Mutasi extends CI_Controller
{
    private $id_pegawai;
    private $id_mutasi;
    private $id_jabatan_lama;
    private $id_divisi_lama;
    private $id_jabatan_baru;
    private $id_divisi_baru;
    private $tgl_efektif_mutasi;

    public function __construct()
    {
        parent::__construct();
        is_login('admin');

        #model
        $this->load->model('mutasi_model', 'mutasi');
        $this->load->model('pegawai_model', 'pegawai');
        $this->load->model('divisi_model', 'divisi');
        $this->load->model('jabatan_model', 'jabatan');
        $this->load->model('user_model', 'user');
        $this->load->model('notif_model');

        #request
        $this->id_pegawai = $this->input->get_post('id_pegawai');
        $this->id_mutasi = $this->input->get_post('id_mutasi');
        $this->id_jabatan_lama = $this->input->get_post('id_jabatan_lama');
        $this->id_jabatan_baru = $this->input->get_post('id_jabatan_baru');
        $this->id_divisi_lama = $this->input->get_post('id_divisi_lama');
        $this->id_divisi_baru = $this->input->get_post('id_divisi_baru');
        $this->tgl_efektif_mutasi = $this->input->get_post('tgl_efektif_mutasi');
    }

    public function index()
    {
        $where = array();

        if (!empty($this->id_pegawai)) {
            $data['id_pegawai'] = $this->id_pegawai;
            $where['a.id_pegawai'] = $this->id_pegawai;
        }
        if (!empty($this->id_jabatan_lama)) {
            $data['id_jabatan_lama'] = $this->id_jabatan_lama;
            $where['a.id_jabatan_lama'] = $this->id_jabatan_lama;
        }
        if (!empty($this->id_jabatan_baru)) {
            $data['id_jabatan_baru'] = $this->id_jabatan_baru;
            $where['a.id_jabatan_baru'] = $this->id_jabatan_baru;
        }
        if (!empty($this->id_divisi_lama)) {
            $data['id_divisi_lama'] = $this->id_divisi_lama;
            $where['a.id_divisi_lama'] = $this->id_divisi_lama;
        }
        if (!empty($this->id_divisi_baru)) {
            $data['id_divisi_baru'] = $this->id_divisi_baru;
            $where['a.id_divisi_baru'] = $this->id_divisi_baru;
        }
        if (!empty($this->tgl_efektif_mutasi)) {
            $data['tgl_efektif_mutasi'] = $this->tgl_efektif_mutasi;
            $where['tgl_efektif_mutasi'] = date('Y-m-d', strtotime($this->tgl_efektif_mutasi));
        }


        $data['mutasi'] = $this->mutasi->read([
            'a.*',
            'nik_pegawai',
            'nama_pegawai',
            'b.nama_jabatan as jabatan_lama',
            'c.nama_jabatan as jabatan_baru',
            'd.nama_divisi as divisi_lama',
            'e.nama_divisi as divisi_baru'
        ], $where, null, null, null)->result();
        $data['pegawai'] = $this->pegawai->read(['*'], ['status_aktif_pegawai' => 1], null, null, null)->result();
        $data['divisi'] = $this->divisi->read(['*'], null, null, null, null)->result();
        $data['jabatan'] = $this->jabatan->read(['*'], null, null, null, null)->result();
        $data['tb_notif'] = $this->notif_model->tampil_data()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebaradmin', $data);
        $this->load->view('administrator/admin/mutasi/index_mutasi', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function add()
    {
        $data['tb_notif'] = $this->notif_model->tampil_data()->result();
        $data['pegawai'] = $this->pegawai->read(['*'], ['status_aktif_pegawai' => 1], null, null, null)->result();
        $data['divisi'] = $this->divisi->read(['*'], null, null, null, null)->result();
        $data['jabatan'] = $this->jabatan->read(['*'], null, null, null, null)->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebaradmin', $data);
        $this->load->view('administrator/admin/mutasi/add_mutasi', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function save()
    {
        $pegawai = $this->pegawai->read(['*'], ['id_pegawai' => $this->id_pegawai], null, null, null)->row();
        $data = array(
            'id_pegawai' => $this->id_pegawai,
            'id_mutasi' => create_id(),
            'id_jabatan_lama' => $pegawai->id_jabatan,
            'id_jabatan_baru' => $this->id_jabatan_baru,
            'id_divisi_lama' => $pegawai->id_divisi,
            'id_divisi_baru' => $this->id_divisi_baru,
            'tgl_efektif_mutasi' => date('Y-m-d', strtotime($this->tgl_efektif_mutasi))
        );

        $result = $this->mutasi->insert($data);

        if ($result) {
            $this->pegawai->update(['id_pegawai' => $this->id_pegawai], [
                'id_jabatan' => $this->id_jabatan_baru,
                'id_divisi' => $this->id_divisi_baru,
            ]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Mutasi Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Mutasi Gagal Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        }

        redirect('administrator/admin/mutasi');
    }

    public function view($id)
    {
        $data['tb_notif'] = $this->notif_model->tampil_data()->result();
        $data['mutasi'] = $this->mutasi->read([
            'a.*',
            'nik_pegawai',
            'nama_pegawai',
            'b.nama_jabatan as jabatan_lama',
            'b.id_jabatan as id_jabatan_lama',
            'c.nama_jabatan as jabatan_baru',
            'c.id_jabatan as id_jabatan_baru',
            'd.nama_divisi as divisi_lama',
            'd.id_divisi as id_divisi_lama',
            'e.nama_divisi as divisi_baru',
            'e.id_divisi as id_divisi_baru'
        ], ['id_mutasi' => $id], null, null, null)->row();
        $data['pegawai'] = $this->pegawai->read(['*'], ['status_aktif_pegawai' => 1], null, null, null)->result();
        $data['divisi'] = $this->divisi->read(['*'], null, null, null, null)->result();
        $data['jabatan'] = $this->jabatan->read(['*'], null, null, null, null)->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebaradmin', $data);
        $this->load->view('administrator/admin/mutasi/edit_mutasi', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update()
    {
        $data = array(
            'id_pegawai' => $this->id_pegawai,
            'id_jabatan_lama' => $this->id_jabatan_lama,
            'id_jabatan_baru' => $this->id_jabatan_baru,
            'id_divisi_lama' => $this->id_divisi_lama,
            'id_divisi_baru' => $this->id_divisi_baru,
            'tgl_efektif_mutasi' => date('Y-m-d', strtotime($this->tgl_efektif_mutasi))
        );

        $where = array(
            'id_mutasi' => $this->id_mutasi
        );

        $result = $this->mutasi->update($where, $data);

        if ($result) {
            $this->pegawai->update(['id_pegawai' => $this->id_pegawai], [
                'id_jabatan' => $this->id_jabatan_baru,
                'id_divisi' => $this->id_divisi_baru,
            ]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Mutasi Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Mutasi Gagal Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        }

        redirect('administrator/admin/mutasi');
    }

    public function delete($id)
    {
        $result = $this->mutasi->delete(['id_mutasi' => $id]);

        if ($result) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Mutasi Berhasil Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Mutasi Gagal Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        }

        redirect('administrator/admin/mutasi');
    }

    public function cetak()
    {
        $where = array();

        if (!empty($this->id_pegawai)) {
            $where['a.id_pegawai'] = $this->id_pegawai;
        }
        if (!empty($this->id_jabatan_lama)) {
            $where['a.id_jabatan_lama'] = $this->id_jabatan_lama;
        }
        if (!empty($this->id_jabatan_baru)) {
            $where['a.id_jabatan_baru'] = $this->id_jabatan_baru;
        }
        if (!empty($this->id_divisi_lama)) {
            $where['a.id_divisi_lama'] = $this->id_divisi_lama;
        }
        if (!empty($this->id_divisi_baru)) {
            $where['a.id_divisi_baru'] = $this->id_divisi_baru;
        }
        if (!empty($this->tgl_efektif_mutasi)) {
            $where['tgl_efektif_mutasi'] = date('Y-m-d', strtotime($this->tgl_efektif_mutasi));
        }

        $data['mutasi'] = $this->mutasi->read([
            'a.*',
            'nik_pegawai',
            'nama_pegawai',
            'b.nama_jabatan as jabatan_lama',
            'c.nama_jabatan as jabatan_baru',
            'd.nama_divisi as divisi_lama',
            'e.nama_divisi as divisi_baru'
        ], $where, null, null, null)->result();

        $this->load->library('mypdf');
        $this->mypdf->generate('administrator/laporan/print_mutasi', $data);
    }
}
