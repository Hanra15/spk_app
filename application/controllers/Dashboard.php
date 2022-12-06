<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
    }

	public function index()
	{
		$data['title'] = 'Dashboard | SPK APP';
		$data['page'] = 'Dashboard';
		
		$this->template->load('templates/template','index',$data);
		

	}
}
