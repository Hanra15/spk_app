<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spk_Saw extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
    }

	public function index()
	{
		$data['title'] = 'SPK SAW | SPK APP';
		$data['page'] = 'SPK SAW';
		
		$this->template->load('templates/template','spk_saw',$data);
		

	}
}
