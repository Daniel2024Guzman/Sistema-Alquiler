<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function check_logged_in() {
    $ci =& get_instance();
    if (!$ci->session->userdata('user_id')) {
        redirect(base_url('login'));
    }
}