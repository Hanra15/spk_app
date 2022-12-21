<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// if ($this->session->userdata('logged_in') !== TRUE) {
        //     redirect('login');
        // }
		$this->load->helper('url');
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('m_alternatif');
        $this->load->model('m_kriteria');
    }
	

	public function index()
	{
		$data['title'] = 'Alternatif | SPK APP';
		$data['page'] = 'Alternatif';

		$data['query'] = $this->m_alternatif->get_all()->result();
		
		$this->template->load('templates/template','alternatif/data',$data);
		

	}

	public function tambah()
    {
		$data['title'] = 'Tambah Alternatif | SPK APP';
		$data['page'] = 'Tambah Alternatif';
        $this->form_validation->set_rules(
            'nama_alternatif',
            'Nama Alternatif',
            'is_unique[alternatif.nama_alternatif]',
            array('is_unique' => '%s sudah ada')
        );

        if ($this->form_validation->run() === FALSE) {
            $query = $this->m_kriteria->get_all();
            $data['query'] = $query->result();
            
            $this->template->load('templates/template','alternatif/tambah',$data);
        } else {
            $this->m_alternatif->insert();
            $id_alternatif = $this->db->insert_id();
            $query = $this->m_kriteria->get_all();
            foreach ($query->result() as $row) {
                $this->m_alternatif->insert_opt_alternatif($id_alternatif, $row->id_kriteria);
            }
            redirect('alternatif');
        }
    }

    public function ubah($id_alternatif = '')
    {
		$data['title'] = 'Edit Alternatif | SPK APP';
		$data['page'] = 'Edit Alternatif';
        $this->form_validation->set_rules(
            'nama_alternatif',
            'Nama Alternatif',
            'callback_cek_nama'
        );

        if ($this->form_validation->run() === FALSE) {
            $query_alt = $this->m_alternatif->get_by_id($id_alternatif);
            $result = $query_alt->row_array();
            $data['id_alternatif'] = $result['id_alternatif'];
            $data['nama_alternatif'] = $result['nama_alternatif'];
            $query = $this->m_kriteria->get_all();
            $data['query'] = $query->result();
            foreach ($data['query'] as $row) {
                $query2 = $this->subm_kriteria->get_by_id_kriteria($row->id_kriteria);
                $data['sub'][$row->id_kriteria] = $query2->result();
                $res = $this->m_alternatif->get_selected_opt($id_alternatif, $row->id_kriteria)->row_array();
                $data['alt'][$row->id_kriteria] = $res['id_subkriteria'];
            }
            $this->template->load('templates/template','alternatif/edit',$data);
        } else {
            $this->m_alternatif->update($id_alternatif);
            $query = $this->m_kriteria->get_all();
            foreach ($query->result() as $row) {
                $res = $this->m_alternatif->get_selected_opt($id_alternatif, $row->id_kriteria);
                if ($res->num_rows() > 0) {
                    $this->m_alternatif->update_opt_alternatif($id_alternatif, $row->id_kriteria);
                } else {
                    $this->m_alternatif->insert_opt_alternatif($id_alternatif, $row->id_kriteria);
                }
            }
            redirect('alternatif');
        }
    }

    public function cek_nama($nama)
    {
        $query = $this->m_alternatif->cek_nama_alternatif($nama, $this->input->post('id'));
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('cek_nama', '{field} sudah ada');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function hapus($id_alternatif = '')
    {
        $this->m_alternatif->delete($id_alternatif);
        redirect('alternatif');
    }

    public function lihat($id_alternatif = '')
    {
        $query_alt = $this->m_alternatif->get_by_id($id_alternatif);
        $result = $query_alt->row_array();
        $data['nama_alternatif'] = $result['nama_alternatif'];
        $query = $this->m_kriteria->get_all();
        $data['query'] = $query->result();
        foreach ($data['query'] as $row) {
            $data['sub'][$row->id_kriteria] = '';
            $res = $this->m_alternatif->get_selected_opt($id_alternatif, $row->id_kriteria);
            if ($res->num_rows() > 0) {
                $res_array = $res->row_array();
                $res2 = $this->subm_kriteria->get_by_id($res_array['id_subkriteria'])->row_array();
                $data['sub'][$row->id_kriteria] = $res2['nama_subkriteria'];
            }
        }
        $this->load->view('alternatif/lihat', $data);
    }
}
