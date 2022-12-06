<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spk_Topsis extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
    }

	public function index()
	{
		$data['title'] = 'SPK Topsis | SPK APP';
		$data['page'] = 'SPK Topsis';
		
		$this->template->load('templates/template','spk_topsis',$data);
		

	}
	public function hasil()
	{
		$data['title'] = 'Hasil SPK Topsis | SPK APP';
		$data['page'] = 'Hasil SPK Topsis';

		$this->template->load('templates/template','h_topsis',$data);
	}
}
