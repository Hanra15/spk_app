<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spk_WP extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
    }

	public function index()
	{
		$data['title'] = 'SPK WP | SPK APP';
		$data['page'] = 'SPK WP';
		
		$this->template->load('templates/template','spk_wp',$data);
		

	}
	public function hasil()
	{
		$data['title'] = 'Hasil SPK WP | SPK APP';
		$data['page'] = 'Hasil SPK WP';

		$this->template->load('templates/template','h_wp',$data);
	}
}
