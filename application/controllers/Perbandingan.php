<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perbandingan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
    }

	public function index()
	{
		$data['title'] = 'Perbandingan | SPK APP';
		$data['page'] = 'Perbandingan';
		
		$this->template->load('templates/template','perbandingan',$data);
		

	}

}
