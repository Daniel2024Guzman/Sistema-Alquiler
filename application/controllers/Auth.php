<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('User');
	}
    
	public function index()
	{
		view('auth/reset_password');
	}

	public function login()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $this->input->post('email');
            $contraceña = $this->input->post('contraceña');
            $user = $this->User->getUserByEmailAndPassword($email, $contraceña);
            if ($user) {
                $this->session->set_userdata('user_id', $user->id);
                //redirect('Panel');
                redirect(base_url('Panel'));
            } else {
                $data['error'] = 'Invalid email or password';
            }
        }
        $data['title'] = 'Login';
        view('auth/login', $data);
	}

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        redirect(base_url('Auth'));
    }
}
