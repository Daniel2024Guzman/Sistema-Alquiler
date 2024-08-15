<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		check_logged_in();
		$this->load->model('User');
	}

	public function index()
	{
		$data['current_segment'] = $this->uri->segment(1);
		view('panel/index', $data);
	}
}
