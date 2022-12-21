<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subkriteria extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('logged_in') !== TRUE) {
        //     redirect('login');
        // }
        $this->load->helper('form');
        $this->load->model('m_kriteria');
        $this->load->model('m_subkriteria');
    }

    public function index($id_kriteria = '')
    {
		$data['title'] = 'Sub Kriteria | SPK APP';
		$data['page'] = 'Sub Kriteria';
        $data['query'] = $this->m_subkriteria->get_all($id_kriteria)->result();
        $query = $this->m_kriteria->get_by_id($id_kriteria);
        $result = $query->row_array();
        $data['id_kriteria'] = $result['id_kriteria'];
        $data['nama_kriteria'] = $result['nama_kriteria'];
        $data['kode_kriteria'] = $result['kode_kriteria'];
        $data['bobot'] = $result['bobot'];
        $data['tipe'] = $result['tipe'];
        $this->template->load('templates/template','subkriteria/data',$data);
    }

    public function tambah($id_kriteria = '')
    {
		$data['title'] = 'Tambah Sub Kriteria | SPK APP';
		$data['page'] = 'Tambah Sub Kriteria';
        if ($this->input->post('save') === NULL) {
            $data['id_kriteria'] = $id_kriteria;
            $this->template->load('templates/template','subkriteria/tambah',$data);
        } else {
            $this->m_subkriteria->insert($id_kriteria);
            redirect('subkriteria/' . $id_kriteria);
        }
    }

    public function ubah($id_kriteria = '', $id_subkriteria = '')
    {
		$data['title'] = 'Edit Sub Kriteria | SPK APP';
		$data['page'] = 'Edit Sub Kriteria';
        if ($this->input->post('save') === NULL) {
            $query = $this->m_subkriteria->get_by_id($id_subkriteria);
            $result = $query->row_array();
            $data['nama_subkriteria'] = $result['nama_subkriteria'];
            $data['bobot'] = $result['bobot'];
            $data['id_subkriteria'] = $id_subkriteria;
            $data['id_kriteria'] = $id_kriteria;
            $this->template->load('templates/template','subkriteria/edit',$data);
        } else {
            $this->m_subkriteria->update($id_subkriteria);
            redirect('subkriteria/' . $id_kriteria);
        }
    }

    public function hapus($id_kriteria = '', $id_subkriteria = '')
    {
        $this->m_subkriteria->delete($id_subkriteria);
        redirect('subkriteria/' . $id_kriteria);
    }
}

