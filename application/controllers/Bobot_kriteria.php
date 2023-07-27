<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bobot_kriteria extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Hasil_model');
        $this->load->model('Bobot_kriteria_model');
        $this->load->library('form_validation');
    }

    public function updateBobot()
    {
        $hasil = $this->Hasil_model->get_all();

        $data = array(
            'hasil_data' => $hasil
        );

        $this->template->load('template', 'hasil_list', $data);
    }
    public function index()
    {
        $bobot_kriteria = $this->Bobot_kriteria_model->get_all();

        $data = array(
            'bobot_kriteria_data' => $bobot_kriteria
        );

        $this->template->load('template', 'bobot_kriteria_list', $data);
    }

    public function read($id)
    {
        $row = $this->Bobot_kriteria_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_bobotkriteria' => $row->id_bobotkriteria,
                'id_jenisbarang' => $row->id_jenisbarang,
                'id_kriteria' => $row->id_kriteria,
                'bobot' => $row->bobot,
            );
            $this->template->load('template', 'bobot_kriteria_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bobot_kriteria'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bobot_kriteria/create_action'),
            'id_bobotkriteria' => set_value('id_bobotkriteria'),
            'id_jenisbarang' => set_value('id_jenisbarang'),
            'id_kriteria' => set_value('id_kriteria'),
            'bobot' => set_value('bobot'),
        );
        $this->template->load('template', 'bobot_kriteria_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_jenisbarang' => $this->input->post('id_jenisbarang', TRUE),
                'id_kriteria' => $this->input->post('id_kriteria', TRUE),
                'bobot' => $this->input->post('bobot', TRUE),
            );

            $this->Bobot_kriteria_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bobot_kriteria'));
        }
    }

    public function update($id)
    {
        $row = $this->Bobot_kriteria_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bobot_kriteria/update_action'),
                'id_bobotkriteria' => set_value('id_bobotkriteria', $row->id_bobotkriteria),
                'id_jenisbarang' => set_value('id_jenisbarang', $row->id_jenisbarang),
                'id_kriteria' => set_value('id_kriteria', $row->id_kriteria),
                'bobot' => set_value('bobot', $row->bobot),
            );
            $this->template->load('template', 'bobot_kriteria_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bobot_kriteria'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_bobotkriteria', TRUE));
        } else {
            $data = array(
                'id_jenisbarang' => $this->input->post('id_jenisbarang', TRUE),
                'id_kriteria' => $this->input->post('id_kriteria', TRUE),
                'bobot' => $this->input->post('bobot', TRUE),
            );

            $this->Bobot_kriteria_model->update($this->input->post('id_bobotkriteria', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bobot_kriteria'));
        }
    }

    public function delete($id)
    {
        $row = $this->Bobot_kriteria_model->get_by_id($id);

        if ($row) {
            $this->Bobot_kriteria_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bobot_kriteria'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bobot_kriteria'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_jenisbarang', 'id jenisbarang', 'trim|required');
        $this->form_validation->set_rules('id_kriteria', 'id kriteria', 'trim|required');
        $this->form_validation->set_rules('bobot', 'bobot', 'trim|required');

        $this->form_validation->set_rules('id_bobotkriteria', 'id_bobotkriteria', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Bobot_kriteria.php */
/* Location: ./application/controllers/Bobot_kriteria.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-08-09 17:26:46 */
/* http://harviacode.com */