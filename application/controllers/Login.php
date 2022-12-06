<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
    }

	public function index()
	{
		$data['title'] = 'Login | SPK APP';
		$data['page'] = 'Login';
		
		$this->template->load('templates/template-login','login/login', $data);
		

	}
}
