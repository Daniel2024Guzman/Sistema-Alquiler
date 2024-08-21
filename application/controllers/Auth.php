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

    function forgotPassword()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if($this->User->verificar_unico_email(-$this->input->post('email')))
            {
                $user = $this->User->recuperar_email_user($this->input->post('email'));
                echo($user->id);
                $string = time().$user->id.$user->email;
                $hash_string = hash('sha256', $string);
                $currentData = date('y-m-d-h:i');
                $hash_expiry = date('Y-m-d H:i',strtotime($currentDate. ' + 1 days'));
                $data = array(
                    'hash_key'=>$hash_string,
                    'hash_expiry'=>$hash_expiry,);
                $resetLink = base_url().'Auth/reset_password?hash='.$hash_string;
                $message = '<p>El enlace para restablecer su contraseña está aquí:</p>'.$resetLink;
                $subject = "Enlace para restablecer contraseña";
                $sentStatus = $this->sendEmail($user->email,$subject,$message);
                if($sentStatus==true)
                {
                    $this->User->actualizar_usuario($user->id, $data);
                    $data['success'] = 'El enlace para reestablecer la contraseña se envió correctamente';
                    view('auth/forgot_password', $data);
                }
                else
                {
                    $data['error'] = 'Error al enviar correo electrónico';
                    view('auth/forgot_password', $data);
                }
            }
            else
            {
                $data['error'] = 'El correo no existe';
                view('auth/forgot_password', $data);
            }
        }
        else
        {
            view('auth/forgot_password');
        }
    }
}
