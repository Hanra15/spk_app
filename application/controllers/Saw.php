<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saw extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        

        $this->load->model('m_saw');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = 'Penilaian dan Hasil SPK SAW | SPK APP';
		$data['page'] = 'Penilaian dan Hasil SPK SAW';

        $data['min_harga'] = $this->m_saw->min_harga();
        $data['max_harga'] = $this->m_saw->max_harga();
        $data['max_ram'] = $this->m_saw->max_ram();
        $data['max_memori'] = $this->m_saw->max_memori();
        $data['min_memori'] = $this->m_saw->min_memori();
        $data['max_processor'] = $this->m_saw->max_processor();
        $data['max_kamera'] = $this->m_saw->max_kamera();
        $data['min_kamera'] = $this->m_saw->min_kamera();
        $data['tabel'] = $this->m_saw->get_tabell();
        $data['bobot_saw'] = $this->m_saw->get_bobot();

        $this->template->load('templates/template','saw/saw', $data);
    }    

    public function create()
    {
        $data['title'] = 'Tambah Alternatif | SPK APP';
		$data['page'] = 'Tambah Alternatif SPK SAW';
        // $this->load->view('saw/header');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('ram', 'ram', 'required');
        $this->form_validation->set_rules('memori', 'memori', 'required');
        $this->form_validation->set_rules('processor', 'processor', 'required');
        $this->form_validation->set_rules('kamera', 'kamera', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->template->load('templates/template','saw/create',$data);
        } else {
            $this->m_saw->set_data();
            redirect('saw/data');
        }
        // $this->load->view('saw/footer');
    }

    public function data()
    {
        $data['title'] = 'Alternatif | SPK APP';
		$data['page'] = 'Alternatif SPK SAW';

        $data['tabel'] = $this->m_saw->get_tabell();
        $data['bobot'] = $this->m_saw->get_bobot();

        // $this->load->view('saw/header');
        $this->template->load('templates/template','saw/data', $data);
        // $this->load->view('saw/footer');
    }

    public function saw_hasil()
    {
        $data['title'] = 'Hasil SPK SAW | SPK APP';
		$data['page'] = 'Hasil SPK SAW';
        $data['tabel'] = $this->m_saw->get_tabell();
        $data['bobot'] = $this->m_saw->get_bobot();
        $data['hasil_saw'] = $this->m_saw->get_all()->result();

        $this->template->load('templates/template','saw/saw_hasil', $data);

    }
    
    public function update($id)
    {
        $data['title'] = 'Ubah Alternatif | SPK APP';
		$data['page'] = 'Ubah Alternatif SPK SAW';

        // $this->load->view('saw/header');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('ram', 'ram', 'required');
        $this->form_validation->set_rules('memori', 'memori', 'required');
        $this->form_validation->set_rules('processor', 'processor', 'required');
        $this->form_validation->set_rules('kamera', 'kamera', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['data_item'] = $this->m_saw->get_data_id($id);
            $this->template->load('templates/template','saw/update', $data);
        } else {
            $this->m_saw->update_data($id);
            redirect('saw/data');
        }
    }

    public function update_bobot()
    {
        $data['title'] = 'Ubah Bobot | SPK APP';
		$data['page'] = 'Ubah Bobot SPK SAW';
        // $this->load->view('saw/header');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('C1', 'C1', 'required');
        $this->form_validation->set_rules('C2', 'C2', 'required');
        $this->form_validation->set_rules('C3', 'C3', 'required');
        $this->form_validation->set_rules('C4', 'C4', 'required');
        $this->form_validation->set_rules('C5', 'C5', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['data_bobot'] = $this->m_saw->get_bobot();
            $this->template->load('templates/template','saw/update_bobot', $data);
        } else {
            $this->m_saw->update_data_bobot();
            redirect('saw/data');
        }
    }

    public function delete($id)
    {
        $this->m_saw->delete_data($id);
        redirect('saw/data');
    }

    
    
}
