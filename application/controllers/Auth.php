<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library(array('form_validation'));
    }

    function index()
    {
        $this->data = [];
        $this->data['message'] = '';

        $this->data['identity'] = array(
            'name' => 'identity',
            'id'    => 'identity',
            'class' => 'form-control',
            'placeholder' => 'Email / Username',
            'type'  => 'text',
            'value' => 'admin',
        );
        $this->data['password'] = array(
            'name' => 'password',
            'id'   => 'password',
            'type' => 'password',
            'class' => 'form-control',
            'placeholder' => 'Password',
        );

        $this->_render_page('auth/login', $this->data);
    }
    function login()
    {
        $data = $this->input->post();
        $row = $this->User_model->get_by_username($data['identity']);

        if ($row) {
            

            if ($row->password == md5($data['password'])) {
                $this->session->set_userdata('user', json_encode($row));
                redirect('Hasil', 'refresh');
                
            } else {
                redirect('auth', 'refresh');
            }
        } else {
            redirect('auth', 'refresh');
        }
    }
    function _render_page($view, $data = null, $returnhtml = false) //I think this makes more sense
    {

        $this->viewdata = (empty($data)) ? $this->data : $data;

        $view_html = $this->load->view($view, $this->viewdata, $returnhtml);

        if ($returnhtml) return $view_html; //This will return html on 3rd argument being true
    }
}
