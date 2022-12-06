<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
    }

	public function index()
	{
		$data['title'] = 'Kriteria | SPK APP';
		$data['page'] = 'Kriteria';
		
		$this->template->load('templates/template','kriteria',$data);
		

	}
}
