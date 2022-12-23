<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('m_kriteria');
    }

    public function index()
    {
        $data['title'] = 'Kriteria | SPK APP';
		$data['page'] = 'Kriteria';
        $data['query'] = $this->m_kriteria->get_all()->result();
        $this->template->load('templates/template','kriteria/data', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Kriteria | SPK APP';
		$data['page'] = 'Tambah Kriteria';
        $this->form_validation->set_rules(
            'kode_kriteria',
            'Kode Kriteria',
            'is_unique[kriteria.kode_kriteria]',
            array('is_unique' => '%s sudah ada')
        );

        if ($this->form_validation->run() === FALSE) {
            $this->template->load('templates/template','kriteria/tambah', $data);
        } else {
            $this->m_kriteria->insert();
            redirect('kriteria');
        }
    }

    public function ubah($id_kriteria = '')
    {
        $data['title'] = 'Ubah Kriteria | SPK APP';
		$data['page'] = 'Ubah Kriteria';
        $this->form_validation->set_rules(
            'kode_kriteria',
            'Kode Kriteria',
            'callback_cek_kode'
        );

        if ($this->form_validation->run() === FALSE) {
            $query = $this->m_kriteria->get_by_id($id_kriteria);
            $result = $query->row_array();
            $data['id_kriteria'] = $result['id_kriteria'];
            $data['nama_kriteria'] = $result['nama_kriteria'];
            $data['kode_kriteria'] = $result['kode_kriteria'];
            $data['bobot'] = $result['bobot'];
            $data['tipe'] = $result['tipe'];
            $this->template->load('templates/template','kriteria/ubah', $data);
        } else {
            $this->m_kriteria->update($id_kriteria);
            redirect('kriteria');
        }
    }

    public function cek_kode($kode)
    {
        $query = $this->m_kriteria->cek_kode_kriteria($kode, $this->input->post('id'));
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('cek_kode', '{field} sudah ada');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function hapus($id_kriteria = '')
    {
        $this->m_kriteria->delete($id_kriteria);
        redirect('kriteria');
    }
}


/* End of file Kriteria.php */
/* Location: ./application/controllers/Kriteria.php */
