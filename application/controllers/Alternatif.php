<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
    }

	public function index()
	{
		$data['title'] = 'Alternatif | SPK APP';
		$data['page'] = 'Alternatif';
		
		$this->template->load('templates/template','alternatif',$data);
		

	}
}
