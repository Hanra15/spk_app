<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subkriteria extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('form');
        $this->load->model('m_kriteria');
        $this->load->model('subm_kriteria');
    }

    public function index($id_kriteria = '')
    {
        $data['title'] = 'Subkriteria | SPK APP';
		$data['page'] = 'Subkriteria';
        $data['query'] = $this->subm_kriteria->get_all($id_kriteria)->result();
        $query = $this->m_kriteria->get_by_id($id_kriteria);
        $result = $query->row_array();
        $data['id_kriteria'] = $result['id_kriteria'];
        $data['nama_kriteria'] = $result['nama_kriteria'];
        $data['kode_kriteria'] = $result['kode_kriteria'];
        $data['bobot'] = $result['bobot'];
        $data['tipe'] = $result['tipe'];
        $this->template->load('templates/template','subkriteria/data', $data);
    }

    public function tambah($id_kriteria = '')
    {
        $data['title'] = 'Tambah Subkriteria | SPK APP';
		$data['page'] = ' Tambah Subkriteria';
        if ($this->input->post('save') === NULL) {
            $data['id_kriteria'] = $id_kriteria;
            $this->template->load('templates/template','subkriteria/tambah', $data);
        } else {
            $this->subm_kriteria->insert($id_kriteria);
            redirect('subkriteria/' . $id_kriteria);
        }
    }

    public function ubah($id_kriteria = '', $id_subkriteria = '')
    {
        $data['title'] = 'Ubah Subkriteria | SPK APP';
		$data['page'] = 'Ubah Subkriteria';
        if ($this->input->post('save') === NULL) {
            $query = $this->subm_kriteria->get_by_id($id_subkriteria);
            $result = $query->row_array();
            $data['nama_subkriteria'] = $result['nama_subkriteria'];
            $data['bobot'] = $result['bobot'];
            $data['id_subkriteria'] = $id_subkriteria;
            $data['id_kriteria'] = $id_kriteria;
            $this->template->load('templates/template','subkriteria/ubah', $data);
        } else {
            $this->subm_kriteria->update($id_subkriteria);
            redirect('subkriteria/' . $id_kriteria);
        }
    }

    public function hapus($id_kriteria = '', $id_subkriteria = '')
    {
        $this->subm_kriteria->delete($id_subkriteria);
        redirect('subkriteria/' . $id_kriteria);
    }
}


/* End of file Subkriteria.php */
/* Location: ./application/controllers/Subkriteria.php */
