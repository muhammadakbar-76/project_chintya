<?php

class Change_password extends CI_Controller
{
    private $old_password;
    private $new_password;
    private $confirm_new_password;

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('username'))) redirect('auth');

        #model
        $this->load->model('user_model', 'user');
        $this->load->model('notif_model');

        #request
        $this->old_password = $this->input->get_post('old_password');
        $this->new_password = $this->input->get_post('new_password');
        $this->confirm_new_password = $this->input->get_post('confirm_new_password');
    }

    public function index()
    {
        $data['tb_notif'] = $this->notif_model->tampil_data()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebaradmin', $data);
        $this->load->view('administrator/user/index_password');
        $this->load->view('templates_administrator/footer');
    }

    public function save()
    {
        $username = $this->session->userdata('username');
        $password = md5($this->old_password);

        $user = $this->user->read(['*'], [
            'username' => $username,
            'password' => $password
        ], null, null, null)->row();

        if (empty($user)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Password lama salah!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');

            redirect('administrator/user/change_password');
        }

        if ($this->new_password !== $this->confirm_new_password) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Password baru dan konfirmasi tidak cocok!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

            redirect('administrator/user/change_password');
        }

        $data = array(
            'password' => md5($this->new_password)
        );

        $result = $this->user->update([
            'username' => $this->session->userdata('username'),
            'password' => $password
        ], $data);

        if ($result) {
            $this->session->sess_destroy();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Password berhasil diganti, mohon untuk login ulang.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Password gagal diganti!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
        }

        redirect('administrator/user/change_password');
    }
}
