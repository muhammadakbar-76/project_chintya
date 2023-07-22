<?php

class Pegawai extends CI_Controller
{
    private $id_pegawai;
    private $id_jabatan;
    private $id_divisi;
    private $nik_pegawai;
    private $nama_pegawai;
    private $tgl_lahir_pegawai;
    private $tempat_lahir_pegawai;
    private $alamat_pegawai;
    private $jml_tanggungan_pegawai;
    private $status_kawin_pegawai;
    private $status_aktif_pegawai;
    private $photo_pegawai;

    public function __construct()
    {
        parent::__construct();
        is_login('admin');

        #model
        $this->load->model('pegawai_model', 'pegawai');
        $this->load->model('divisi_model', 'divisi');
        $this->load->model('jabatan_model', 'jabatan');
        $this->load->model('user_model', 'user');
        $this->load->model('notif_model');

        #request
        $this->id_pegawai = $this->input->get_post('id_pegawai');
        $this->id_jabatan = $this->input->get_post('id_jabatan');
        $this->id_divisi = $this->input->get_post('id_divisi');
        $this->nik_pegawai = $this->input->get_post('nik_pegawai');
        $this->nama_pegawai = $this->input->get_post('nama_pegawai');
        $this->tgl_lahir_pegawai = $this->input->get_post('tgl_lahir_pegawai');
        $this->tempat_lahir_pegawai = $this->input->get_post('tempat_lahir_pegawai');
        $this->alamat_pegawai = $this->input->get_post('alamat_pegawai');
        $this->jml_tanggungan_pegawai = $this->input->get_post('jml_tanggungan_pegawai');
        $this->status_kawin_pegawai = $this->input->get_post('status_kawin_pegawai');
        $this->status_aktif_pegawai = $this->input->get_post('status_aktif_pegawai');
        $this->photo_pegawai = $this->input->get_post('photo_pegawai');
    }

    public function index()
    {
        $where = array(
            'status_aktif_pegawai' => 1
        );

        if (!empty($this->id_jabatan)) {
            $data['id_jabatan'] = $this->id_jabatan;
            $where['id_jabatan'] = $this->id_jabatan;
        }
        if (!empty($this->id_divisi)) {
            $data['id_divisi'] = $this->id_divisi;
            $where['id_divisi'] = $this->id_divisi;
        }
        if (!empty($this->nik_pegawai)) {
            $data['nik_pegawai'] = $this->nik_pegawai;
            $where['LOWER(nik_pegawai) like'] = '%%' . strtolower($this->nik_pegawai) . '%%';
        }
        if (!empty($this->nama_pegawai)) {
            $data['nama_pegawai'] = $this->nama_pegawai;
            $where['LOWER(nama_pegawai) like'] = '%%' . strtolower($this->nama_pegawai) . '%%';
        }
        if (!empty($this->status_kawin_pegawai)) {
            $data['status_kawin_pegawai'] = $this->status_kawin_pegawai;
            $where['status_kawin_pegawai'] = $this->status_kawin_pegawai;
        }
        if (!empty($this->status_aktif_pegawai)) {
            $data['status_aktif_pegawai'] = $this->status_aktif_pegawai;
            $where['status_aktif_pegawai'] = $this->status_aktif_pegawai;
        }

        $data['pegawai'] = $this->pegawai->read(['*'], $where, null, null, null)->result();
        $data['divisi'] = $this->divisi->read(['*'], null, null, null, null)->result();
        $data['jabatan'] = $this->jabatan->read(['*'], null, null, null, null)->result();
        $data['tb_notif'] = $this->notif_model->tampil_data()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebaradmin', $data);
        $this->load->view('administrator/admin/pegawai/index_pegawai', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function add()
    {
        $data['tb_notif'] = $this->notif_model->tampil_data()->result();
        $data['divisi'] = $this->divisi->read(['*'], null, null, null, null)->result();
        $data['jabatan'] = $this->jabatan->read(['*'], null, null, null, null)->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebaradmin', $data);
        $this->load->view('administrator/admin/pegawai/add_pegawai', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function save()
    {
        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'jpg|png';
        $config['encrypt_name']       = true;
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $this->load->library('upload', $config);

        $id_pegawai = create_id();

        if (!$this->upload->do_upload('photo_pegawai')) {
            $data = array(
                'id_pegawai' => $id_pegawai,
                'id_jabatan' => $this->id_jabatan,
                'id_divisi' => $this->id_divisi,
                'nik_pegawai' => $this->nik_pegawai,
                'nama_pegawai' => $this->nama_pegawai,
                'tgl_lahir_pegawai' => date('Y-m-d', strtotime($this->tgl_lahir_pegawai)),
                'tempat_lahir_pegawai' => $this->tempat_lahir_pegawai,
                'alamat_pegawai' => $this->alamat_pegawai,
                'jml_tanggungan_pegawai' => $this->jml_tanggungan_pegawai,
                'status_kawin_pegawai' => $this->status_kawin_pegawai,
            );
            // echo $this->upload->display_errors();
        } else {
            $_data = array('upload_data' => $this->upload->data());
            $data = array(
                'id_pegawai' => $id_pegawai,
                'id_jabatan' => $this->id_jabatan,
                'id_divisi' => $this->id_divisi,
                'nik_pegawai' => $this->nik_pegawai,
                'nama_pegawai' => $this->nama_pegawai,
                'tgl_lahir_pegawai' => date('Y-m-d', strtotime($this->tgl_lahir_pegawai)),
                'tempat_lahir_pegawai' => $this->tempat_lahir_pegawai,
                'alamat_pegawai' => $this->alamat_pegawai,
                'jml_tanggungan_pegawai' => $this->jml_tanggungan_pegawai,
                'status_kawin_pegawai' => $this->status_kawin_pegawai,
                'photo_pegawai' => $_data['upload_data']['file_name']
            );
        }

        $result = $this->pegawai->insert($data);

        if ($result) {

            //Buat Akun
            $username = join('.', explode(' ', $this->nama_pegawai));

            $user = array(
                'id_user' => create_id(),
                'username' => $username,
                'password' => md5('123456'),
                'id_pegawai' => $id_pegawai
            );

            $this->user->insert($user);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Pegawai Berhasil Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Pegawai Gagal Ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        }

        redirect('administrator/admin/pegawai');
    }

    public function view($id)
    {
        $data['tb_notif'] = $this->notif_model->tampil_data()->result();
        $data['pegawai'] = $this->pegawai->read(['*'], ['id_pegawai' => $id], null, null, null)->row();
        $data['divisi'] = $this->divisi->read(['*'], null, null, null, null)->result();
        $data['jabatan'] = $this->jabatan->read(['*'], null, null, null, null)->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebaradmin', $data);
        $this->load->view('administrator/admin/pegawai/edit_pegawai', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update()
    {
        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'jpg|png';
        $config['encrypt_name']       = true;
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo_pegawai')) {
            $data = array(
                'id_jabatan' => $this->id_jabatan,
                'id_divisi' => $this->id_divisi,
                'nik_pegawai' => $this->nik_pegawai,
                'nama_pegawai' => $this->nama_pegawai,
                'tgl_lahir_pegawai' => date('Y-m-d', strtotime($this->tgl_lahir_pegawai)),
                'tempat_lahir_pegawai' => $this->tempat_lahir_pegawai,
                'alamat_pegawai' => $this->alamat_pegawai,
                'jml_tanggungan_pegawai' => $this->jml_tanggungan_pegawai,
                'status_kawin_pegawai' => $this->status_kawin_pegawai,
                'status_aktif_pegawai' => $this->status_aktif_pegawai,
            );
        } else {
            $_data = array('upload_data' => $this->upload->data());
            $data = array(
                'id_jabatan' => $this->id_jabatan,
                'id_divisi' => $this->id_divisi,
                'nik_pegawai' => $this->nik_pegawai,
                'nama_pegawai' => $this->nama_pegawai,
                'tgl_lahir_pegawai' => date('Y-m-d', strtotime($this->tgl_lahir_pegawai)),
                'tempat_lahir_pegawai' => $this->tempat_lahir_pegawai,
                'alamat_pegawai' => $this->alamat_pegawai,
                'jml_tanggungan_pegawai' => $this->jml_tanggungan_pegawai,
                'status_kawin_pegawai' => $this->status_kawin_pegawai,
                'status_aktif_pegawai' => $this->status_aktif_pegawai,
                'photo_pegawai' => $_data['upload_data']['file_name']
            );
        }
        $where = array(
            'id_pegawai' => $this->id_pegawai
        );

        $result = $this->pegawai->update($where, $data);

        if ($result) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Pegawai Berhasil Diganti!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Pegawai Gagal Diganti!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        }

        redirect('administrator/admin/pegawai');
    }

    public function delete($id)
    {
        $photo = $this->pegawai->read(['photo_pegawai'], ['id_pegawai' => $id], null, null, null)->row();

        if (!empty($photo)) {
            unlink("./assets/img/$photo->photo_pegawai");
        }

        $result = $this->pegawai->delete(['id_pegawai' => $id]);

        if ($result) {
            $this->user->delete(['id_pegawai' => $id]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Pegawai Berhasil Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Pegawai Gagal Dihapus!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        }

        redirect('administrator/admin/pegawai');
    }

    public function detail($id)
    {
        $data['pegawai'] = $this->pegawai->read(['*'], ['id_pegawai' => $id], null . null, null)->row();
        $data['tb_notif'] = $this->notif_model->tampil_data()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebaradmin', $data);
        $this->load->view('administrator/admin/pegawai/detail_pegawai', $data);
        $this->load->view('templates_administrator/footer');
    }
}
