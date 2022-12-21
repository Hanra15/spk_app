<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('logged_in') !== TRUE) {
        //     redirect('login');
        // }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('m_kriteria');
    }

    public function index()
    {
        $data['title'] = 'Kriteria | SPK APP';
		$data['page'] = 'Kriteria';

		$data['query'] = $this->m_kriteria->get_all()->result();
		
		$this->template->load('templates/template','kriteria/data',$data);
    }

    public function tambah()
    {
		$data['title'] = 'Tambah Kriteria | SPK APP';
		$data['page'] = 'Tambah Kriteria';

        if ($this->form_validation->run() === FALSE) {
            $this->template->load('templates/template','kriteria/tambah',$data);
        } else {
            $this->m_kriteria->insert();
            redirect('kriteria');
        }
    }

    public function ubah($id_kriteria = '')
    {
		$data['title'] = 'Edit Kriteria | SPK APP';
		$data['page'] = 'Edit Kriteria';

        if ($this->form_validation->run() === FALSE) {
            $query = $this->m_kriteria->get_by_id($id_kriteria);
            $result = $query->row_array();
            $data['id_kriteria'] = $result['id_kriteria'];
            $data['nama_kriteria'] = $result['nama_kriteria'];
            $data['bobot'] = $result['bobot'];
            $data['tipe'] = $result['tipe'];
            $this->template->load('templates/template','kriteria/edit',$data);
        } else {
            $this->m_kriteria->update($id_kriteria);

            redirect('kriteria');
        }
    }

    public function hapus($id_kriteria = '')
    {
        $this->m_kriteria->delete($id_kriteria);
        redirect('kriteria');
    }
}
