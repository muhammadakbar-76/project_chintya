<?php

defined('BASEPATH') or exit('No direct script access allowed');

function is_login($level)
{
    $ci = get_instance();
    if (!$ci->session->userdata('id_user') && $ci->session->userdata('level') != $level) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Anda tidak bisa mengakses menu ini!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('auth');
    }
}

if (!function_exists('create_id')) {
    $ci = get_instance();
    $ci->load->helper('string');
    function create_id()
    {
        $unix = date('Y-m-d H:i:s') . random_string('alnum', 16);
        return md5($unix);
    }
}
