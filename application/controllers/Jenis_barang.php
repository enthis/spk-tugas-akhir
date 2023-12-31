<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_barang extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_barang_model');
        $this->load->library('form_validation');
    }

    
    public function index()
    {
        $jenis_barang = $this->Jenis_barang_model->get_all();

        $data = array(
            'jenis_barang_data' => $jenis_barang
        );

        $this->template->load('template', 'jenis_barang_list', $data);
    }

    public function read($id)
    {
        $row = $this->Jenis_barang_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_jenisbarang' => $row->id_jenisbarang,
                'namaBarang' => $row->namaBarang,
            );
            $this->template->load('template', 'jenis_barang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_barang'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis_barang/create_action'),
            'id_jenisbarang' => set_value('id_jenisbarang'),
            'namaBarang' => set_value('namaBarang'),
        );
        $this->template->load('template', 'jenis_barang_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'namaBarang' => $this->input->post('namaBarang', TRUE),
            );

            $this->Jenis_barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_barang'));
        }
    }

    public function update($id)
    {
        $row = $this->Jenis_barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_barang/update_action'),
                'id_jenisbarang' => set_value('id_jenisbarang', $row->id_jenisbarang),
                'namaBarang' => set_value('namaBarang', $row->namaBarang),
            );
            $this->template->load('template', 'jenis_barang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_barang'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenisbarang', TRUE));
        } else {
            $data = array(
                'namaBarang' => $this->input->post('namaBarang', TRUE),
            );

            $this->Jenis_barang_model->update($this->input->post('id_jenisbarang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_barang'));
        }
    }

    public function delete($id)
    {
        $row = $this->Jenis_barang_model->get_by_id($id);

        if ($row) {
            $this->Jenis_barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_barang'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('namaBarang', 'namabarang', 'trim|required');

        $this->form_validation->set_rules('id_jenisbarang', 'id_jenisbarang', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function pdf()
    {
        $data = array(
            'jenis_barang_data' => $this->Jenis_barang_model->get_all(),
            'start' => 0
        );

        ini_set('memory_limit', '32M');
        $html = $this->load->view('jenis_barang_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('jenis_barang.pdf', 'D');
    }
}

/* End of file Jenis_barang.php */
/* Location: ./application/controllers/Jenis_barang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-08-09 17:26:46 */
/* http://harviacode.com */