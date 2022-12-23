<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Hasil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('m_hasil');
    }

    public function index()
    {
        $data['title'] = 'Hasil Perhitungan SPK WP | SPK APP';
		$data['page'] = 'Hasil Perhitungan SPK WP';
        $data['hasil'] = $this->m_hasil->get_all()->result();
        $this->template->load('templates/template','hasil/data', $data);
    }
}


/* End of file Hasil.php */
/* Location: ./application/controllers/Hasil.php */