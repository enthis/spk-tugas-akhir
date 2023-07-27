<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nilai_kriteria extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_kriteria_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $nilai_kriteria = $this->Nilai_kriteria_model->get_all();

        $data = array(
            'nilai_kriteria_data' => $nilai_kriteria
        );

        $this->template->load('template','nilai_kriteria_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Nilai_kriteria_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nilaikriteria' => $row->id_nilaikriteria,
		'id_kriteria' => $row->id_kriteria,
		'nilai' => $row->nilai,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','nilai_kriteria_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai_kriteria'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('nilai_kriteria/create_action'),
	    'id_nilaikriteria' => set_value('id_nilaikriteria'),
	    'id_kriteria' => set_value('id_kriteria'),
	    'nilai' => set_value('nilai'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','nilai_kriteria_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kriteria' => $this->input->post('id_kriteria',TRUE),
		'nilai' => $this->input->post('nilai',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Nilai_kriteria_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('nilai_kriteria'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Nilai_kriteria_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('nilai_kriteria/update_action'),
		'id_nilaikriteria' => set_value('id_nilaikriteria', $row->id_nilaikriteria),
		'id_kriteria' => set_value('id_kriteria', $row->id_kriteria),
		'nilai' => set_value('nilai', $row->nilai),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','nilai_kriteria_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai_kriteria'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nilaikriteria', TRUE));
        } else {
            $data = array(
		'id_kriteria' => $this->input->post('id_kriteria',TRUE),
		'nilai' => $this->input->post('nilai',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Nilai_kriteria_model->update($this->input->post('id_nilaikriteria', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('nilai_kriteria'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Nilai_kriteria_model->get_by_id($id);

        if ($row) {
            $this->Nilai_kriteria_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('nilai_kriteria'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai_kriteria'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kriteria', 'id kriteria', 'trim|required');
	$this->form_validation->set_rules('nilai', 'nilai', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_nilaikriteria', 'id_nilaikriteria', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function pdf()
    {
        $data = array(
            'nilai_kriteria_data' => $this->Nilai_kriteria_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('nilai_kriteria_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('nilai_kriteria.pdf', 'D'); 
    }

}

/* End of file Nilai_kriteria.php */
/* Location: ./application/controllers/Nilai_kriteria.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-08-09 17:26:47 */
/* http://harviacode.com */