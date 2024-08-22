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
		view('auth/login');
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($this->User->verificar_unico_email($this->input->post('email')))
            {
                $user = $this->User->recuperar_email_user($this->input->post('email'));
                echo($user->id);
                $string = time().$user->id.$user->email;
                $hash_string = hash('sha256',$string);
                $currentDate = date('Y-m-d H:i');
                $hash_expiry = date('Y-m-d H:i',strtotime($currentDate. ' + 1 days'));
                $data = array(
                    'hash_key'=>$hash_string,
                    'hash_expiry'=>$hash_expiry,
                );
                $resetLink = base_url().'Auth/reset_password?hash='.$hash_string;
                $message = '<p>El enlace para restablecer su contraseña está aquí:</p>'.$resetLink;
				$subject = "Enlace para restablecer contraseña";
				$sentStatus = $this->sendEmail($user->email,$subject,$message);
                if($sentStatus==true)
                {
                    $this->User->actualizar_usuario($user->id, $data);
                    $data['success'] = 'El enlace para restablecer la contraseña se envió correctamente';
                    view('auth/forgot_password', $data);	
                }
                else
                {
                    $data['error'] = 'Error al enviar correo electrónico';
                    view('auth/forgot_password', $data);	
                }
            }
            else{
                $data['error'] = 'El correo no existe';
                view('auth/forgot_password', $data);
            }
        }
        else
        {
            view('auth/forgot_password');
        }
	}

    public function sendEmail($email,$subject,$message)
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'constructoraguzman14@gmail.com',
            'smtp_pass' => 'ivem fzxu eoob mira',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('noreply');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);
            
        if($this->email->send())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function reset_password()
    {
        if($this->input->get('hash'))
		{
            $user = $this->User->recuperar_hash_user($this->input->get('hash'));
            if($user)
            {
                $hash_expiry = $user->hash_expiry;
                $currentDate = date('Y-m-d H:i');
                if($currentDate < $hash_expiry)
                {
                    if($_SERVER['REQUEST_METHOD']=='POST')
					{
                        $data1 = [
                            'password' => $this->input->post('password'),
                            'confirm_password' => $this->input->post('confirm_password')
                        ];
                        if((strcmp($this->input->post('password'), $this->input->post('confirm_password')) === 0))
                        {
                            $data2 = [
                                'contraceña' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                                'hash_key'=>null,
								'hash_expiry'=>null
                            ];
                            $this->User->actualizar_usuario($user->id, $data2);
                            $this->session->set_userdata('user_id', $user->id);
                            $data = [
                                'hash' => $this->input->get('hash'),
                                'success' => 'La contraceña se actualizo corectamente',
                                'redir' => 'redir'
                            ];
                            view('auth/reset_password', $data);
                        }
                        else
                        {
                            $data = [
                                'hash' => $this->input->get('hash'),
                                'data' => $data1,
                                'error' => 'Las contraceñas no coinciden'   
                            ];
                            view('auth/reset_password', $data);
                        }
                    }
                    else{
                        $data = [
                            'hash' => $this->input->get('hash')
                        ];
                        view('auth/reset_password', $data);
                    }
                }
                else{
                    $data = [
                        'hash' => $this->input->get('hash'),
                        'error' => 'El token ya esta expirado vuelva a regenerarla'
                    ];
                    view('auth/reset_password', $data);
                }
            }else{
                redirect(base_url('Auth/forgotPassword'));
            }
        }
        else{
            redirect(base_url('Auth/forgotPassword'));
        }
    }
}
