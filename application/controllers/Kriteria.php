<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kriteria extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Kriteria_model');
        $this->load->library('form_validation');
        $sifat = ['Cost', 'Benefit'];
    }

    public function index()
    {
        $kriteria = $this->Kriteria_model->get_all();

        $data = array(
            'kriteria_data' => $kriteria
        );

        $this->template->load('template', 'kriteria_list', $data);
    }

    public function read($id)
    {
        $row = $this->Kriteria_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_kriteria' => $row->id_kriteria,
                'namaKriteria' => $row->namaKriteria,
                'sifat' => $row->sifat,
            );
            $this->template->load('template', 'kriteria_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kriteria'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kriteria/create_action'),
            'id_kriteria' => set_value('id_kriteria'),
            'namaKriteria' => set_value('namaKriteria'),
            'sifat' => set_value('sifat'),
        );
        $this->template->load('template', 'kriteria_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'namaKriteria' => $this->input->post('namaKriteria', TRUE),
                'sifat' => $this->input->post('sifat', TRUE),
            );

            $this->Kriteria_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kriteria'));
        }
    }

    public function update($id)
    {
        $row = $this->Kriteria_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kriteria/update_action'),
                'id_kriteria' => set_value('id_kriteria', $row->id_kriteria),
                'namaKriteria' => set_value('namaKriteria', $row->namaKriteria),
                'sifat' => set_value('sifat', $row->sifat),
            );
            $this->template->load('template', 'kriteria_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kriteria'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kriteria', TRUE));
        } else {
            $data = array(
                'namaKriteria' => $this->input->post('namaKriteria', TRUE),
                'sifat' => $this->input->post('sifat', TRUE),
            );

            $this->Kriteria_model->update($this->input->post('id_kriteria', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kriteria'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kriteria_model->get_by_id($id);

        if ($row) {
            $this->Kriteria_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kriteria'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kriteria'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('namaKriteria', 'namakriteria', 'trim|required');
        $this->form_validation->set_rules('sifat', 'sifat', 'trim|required');

        $this->form_validation->set_rules('id_kriteria', 'id_kriteria', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function pdf()
    {
        $data = array(
            'kriteria_data' => $this->Kriteria_model->get_all(),
            'start' => 0
        );

        ini_set('memory_limit', '32M');
        $html = $this->load->view('kriteria_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('kriteria.pdf', 'D');
    }
}

/* End of file Kriteria.php */
/* Location: ./application/controllers/Kriteria.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-08-09 17:26:46 */
/* http://harviacode.com */