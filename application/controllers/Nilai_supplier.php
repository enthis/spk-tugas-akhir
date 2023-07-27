<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nilai_supplier extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_supplier_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $nilai_supplier = $this->Nilai_supplier_model->get_all();

        $data = array(
            'nilai_supplier_data' => $nilai_supplier,
            'nilai_supplier_data_grouped' => $this->_grouping($nilai_supplier)
        );

        $this->template->load('template', 'nilai_supplier_list', $data);
    }
    private function _grouping($data) {
        $arr = [];
        foreach ($data as $kData => $vData) {
                $arr[$vData->id_jenisbarang][$vData->id_supplier]=$vData;
        }
        return $arr;
    }
    public function read($id)
    {
        $row = $this->Nilai_supplier_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_nilaisupplier' => $row->id_nilaisupplier,
                'id_supplier' => $row->id_supplier,
                'id_jenisbarang' => $row->id_jenisbarang,
                'id_kriteria' => $row->id_kriteria,
                'id_nilaikriteria' => $row->id_nilaikriteria,
            );
            $this->template->load('template', 'nilai_supplier_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai_supplier'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('nilai_supplier/create_action'),
            'id_nilaisupplier' => set_value('id_nilaisupplier'),
            'id_supplier' => set_value('id_supplier'),
            'id_jenisbarang' => set_value('id_jenisbarang'),
            'id_kriteria' => set_value('id_kriteria'),
            'id_nilaikriteria' => set_value('id_nilaikriteria'),
        );
        $this->template->load('template', 'nilai_supplier_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_supplier' => $this->input->post('id_supplier', TRUE),
                'id_jenisbarang' => $this->input->post('id_jenisbarang', TRUE),
                'id_kriteria' => $this->input->post('id_kriteria', TRUE),
                'id_nilaikriteria' => $this->input->post('id_nilaikriteria', TRUE),
            );

            $this->Nilai_supplier_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('nilai_supplier'));
        }
    }

    public function update($id)
    {
        $row = $this->Nilai_supplier_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('nilai_supplier/update_action'),
                'id_nilaisupplier' => set_value('id_nilaisupplier', $row->id_nilaisupplier),
                'id_supplier' => set_value('id_supplier', $row->id_supplier),
                'id_jenisbarang' => set_value('id_jenisbarang', $row->id_jenisbarang),
                'id_kriteria' => set_value('id_kriteria', $row->id_kriteria),
                'id_nilaikriteria' => set_value('id_nilaikriteria', $row->id_nilaikriteria),
            );
            $this->template->load('template', 'nilai_supplier_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai_supplier'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nilaisupplier', TRUE));
        } else {
            $data = array(
                'id_supplier' => $this->input->post('id_supplier', TRUE),
                'id_jenisbarang' => $this->input->post('id_jenisbarang', TRUE),
                'id_kriteria' => $this->input->post('id_kriteria', TRUE),
                'id_nilaikriteria' => $this->input->post('id_nilaikriteria', TRUE),
            );

            $this->Nilai_supplier_model->update($this->input->post('id_nilaisupplier', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('nilai_supplier'));
        }
    }

    public function delete($id)
    {
        $row = $this->Nilai_supplier_model->get_by_id($id);

        if ($row) {
            $this->Nilai_supplier_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('nilai_supplier'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai_supplier'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_supplier', 'id supplier', 'trim|required');
        $this->form_validation->set_rules('id_jenisbarang', 'id jenisbarang', 'trim|required');
        $this->form_validation->set_rules('id_kriteria', 'id kriteria', 'trim|required');
        $this->form_validation->set_rules('id_nilaikriteria', 'id nilaikriteria', 'trim|required');

        $this->form_validation->set_rules('id_nilaisupplier', 'id_nilaisupplier', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function pdf()
    {
        $data = array(
            'nilai_supplier_data' => $this->Nilai_supplier_model->get_all(),
            'start' => 0
        );

        ini_set('memory_limit', '32M');
        $html = $this->load->view('nilai_supplier_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('nilai_supplier.pdf', 'D');
    }
}

/* End of file Nilai_supplier.php */
/* Location: ./application/controllers/Nilai_supplier.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-08-09 17:26:47 */
/* http://harviacode.com */