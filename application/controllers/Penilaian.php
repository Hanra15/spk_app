<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class Penilaian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('m_alternatif');
        $this->load->model('m_kriteria');
        $this->load->model('subm_kriteria');
        $this->load->model('m_hasil');
    }

    public function index()
    {
        $data['title'] = 'Penilaian SPK WP | SPK APP';
		$data['page'] = 'Penilaian SPK WP';
        $query_alt = $this->m_alternatif->get_all();
        $data['query_alt'] = $query_alt->result();
        $query = $this->m_kriteria->get_all();
        $data['query_kriteria'] = $query->result();
        foreach ($data['query_alt'] as $row_alt) {
            foreach ($data['query_kriteria'] as $row) {
                $data['sub'][$row_alt->id_alternatif][$row->id_kriteria] = '';
                $data['bobot'][$row_alt->id_alternatif][$row->id_kriteria] = '';
                $res = $this->m_alternatif->get_selected_opt($row_alt->id_alternatif, $row->id_kriteria);
                if ($res->num_rows() > 0) {
                    $res_array = $res->row_array();
                    $res2 = $this->subm_kriteria->get_by_id($res_array['id_subkriteria'])->row_array();
                    $data['sub'][$row_alt->id_alternatif][$row->id_kriteria] = $res2['nama_subkriteria'];
                    $data['bobot'][$row_alt->id_alternatif][$row->id_kriteria] = $res2['bobot'];
                }
            }
        }
        // hasil perhitungan metode WP
        $hasil = $this->wp();
        $data['hasil'] = $hasil['wp'];
        $data['rumus'] = $hasil['rumus'];
        $this->template->load('templates/template','penilaian', $data);
    }

    public function wp()
    {
        $var_rumus = ''; // variabel untuk menampilkan rumus perhitungan
        $rumus1 = "";
        $rumus2 = "";
        $rumus1 .= 'W = [';
        $i = 1;
        // mencari nilai w
        $bobot = $this->m_kriteria->get_jumlah_bobot()->row();
        $query_kriteria = $this->m_kriteria->get_all();
        foreach ($query_kriteria->result() as $row) {
            $w[$row->id_kriteria] = round(($row->bobot / $bobot->total), 4);
            $rumus1 .= $row->bobot . ", ";
            $rumus2 .= 'W<sub>' . $i . '</sub> = ' . $row->bobot . '/' . $bobot->total . ' = ' . $w[$row->id_kriteria] . '<br>';
            $i++;
        }
        $rumus1 = substr($rumus1, 0, -2);
        $rumus1 .= ']<br>';
        $var_rumus .= '<h3 class="page-header">Bobot Preferensi W</h3>';
        $var_rumus .= $rumus1;
        $var_rumus .= '<br><h3 class="page-header">Proses Normalisasi Bobot Preferensi W</h3>';
        $var_rumus .= $rumus2;
        $var_rumus .= '<br><h3 class="page-header">Menghitung Vektor S</h3>';
        $i = 1;
        // mencari nilai s
        $jum_v = 0;
        $query_alt = $this->m_alternatif->get_all();
        foreach ($query_alt->result() as $row) {
            $jum_s = 1;
            $var_rumus .= "S<sub>" . $i . "</sub> = ";
            foreach ($query_kriteria->result() as $row_k) {
                $res = $this->m_alternatif->get_selected_opt($row->id_alternatif, $row_k->id_kriteria);
                if ($res->num_rows() > 0) {
                    $res_array = $res->row_array();
                    $res2 = $this->subm_kriteria->get_by_id($res_array['id_subkriteria'])->row_array();
                    if ($row_k->tipe == 'benefit') {
                        $jum_s = $jum_s * POW($res2['bobot'], $w[$row_k->id_kriteria]);
                        $var_rumus .= "(" . $res2['bobot'] . "<sup>" . $w[$row_k->id_kriteria] . "</sup>)";
                    } elseif ($row_k->tipe == 'cost') {
                        $jum_s = $jum_s * POW($res2['bobot'], (-1 * $w[$row_k->id_kriteria]));
                        $var_rumus .= "(" . $res2['bobot'] . "<sup>-" . $w[$row_k->id_kriteria] . "</sup>)";
                    }
                }
            }
            $s[$row->id_alternatif] = round($jum_s, 4);
            $var_rumus .= " = " . $s[$row->id_alternatif] . "<br>";
            $jum_v += $jum_s;
            $i++;
        }
        $i = 1;
        $var_rumus .= '<br><h3 class="page-header">Menghitung Nilai V</h3>';
        // mencari nilai v
        $jum_v = round($jum_v, 4);
        foreach ($query_alt->result() as $row) {
            $v[$row->id_alternatif]['nama_alternatif'] = $row->nama_alternatif;
            $v[$row->id_alternatif]['nilai'] = round(($s[$row->id_alternatif] / $jum_v), 4);
            $var_rumus .= "V<sub>" . $i . "</sub> = " . $s[$row->id_alternatif] . "/" . $jum_v . " = " . $v[$row->id_alternatif]['nilai'] . "<br>";
            $i++;

            $res = $this->m_hasil->get_by_id($row->id_alternatif);
            if ($res->num_rows() > 0) {
                $data = array(
                    'nilai' => $v[$row->id_alternatif]['nilai'],
                );
                $this->m_hasil->update($row->id_alternatif, $data);
            } else {
                $data = array(
                    'id_alternatif' => $row->id_alternatif,
                    'nilai' => $v[$row->id_alternatif]['nilai'],
                );
                $this->m_hasil->insert($data);
            }
        }
        // urutkan berdasarkan nilai terbesar
        $this->array_sort_by_column($v, 'nilai');

        $hasil['rumus'] = $var_rumus;
        $hasil['wp'] = $v;
        return $hasil;
    }

    public function array_sort_by_column(&$arr, $col, $dir = SORT_DESC)
    {
        $sort_col = array();
        foreach ($arr as $key => $row) {
            $sort_col[$key] = $row[$col];
        }
        return array_multisort($sort_col, $dir, $arr);
    }

    public function pdf()
	{
		$data['hasil'] = $this->m_hasil->get_all()->result();
        $html = $this->load->view('print', $data, TRUE);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('hasil-penilaian.pdf', array('Attachment' => FALSE));
	}
}


/* End of file Penilaian.php */
/* Location: ./application/controllers/Penilaian.php */
