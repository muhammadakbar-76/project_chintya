<?php

class Login_model extends CI_Model
{

	public function cek_login($username, $password)
	{
		$this->db->select('*');
		$this->db->join('tb_pegawai b', 'b.id_pegawai = a.id_pegawai', 'left');
		$this->db->join('tb_jabatan c', 'c.id_jabatan = b.id_jabatan', 'left');
		$this->db->join('tb_usertype d', 'd.id_usertype = c.id_usertype', 'left');
		$this->db->where("username", $username);
		$this->db->where("password", $password);
		return $this->db->get('user a');
	}

	public function getLoginData($user, $pass)
	{
		$u = $user;
		$p = MD5($pass);

		$query_cekLogin = $this->db->get_where('user', array('username' => $u, 'password' => $p));

		if (count($query_ceklogin->result()) > 0) {
			foreach ($query_ceklogin->result() as $qck) {
				foreach ($query_ceklogin->result() as $ck) {
					$sess_data['logged_in']	= TRUE;
					$sess_data['username']		= $ck->username;
					$sess_data['password']		= $ck->password;
					$sess_data['level']		= $ck->level;
					$this->session->set_userdata($sess_data);
				}
				redirect('administrator/admin/dashboardadmin');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Maaf Username atau Password Anda Salah !!!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('auth');
		}
	}
}
