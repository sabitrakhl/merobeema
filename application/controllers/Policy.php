<?php

class Policy extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Policy_model');    
    }

    public function index() {
        if (!$this->session->userdata('company_id')) {
            redirect(base_url().'company', 'refresh');
        }

        $data = [];
        $this->loadView('add', $data);
    }

    public function add() {
        $policy = array(
            'name' => $this->input->post('name'),
            'company_id' => $this->session->userdata('company_id'),
            'type_id' => $this->input->post('type_id'),
            'c_id' => $this->input->post('c_id'),
            'inv_per_year' => $this->input->post('inv_per_year'),
            'term_expected_return' => $this->input->post('term_expected_return'),
            'min_age' => $this->input->post('min_age'),
            'max_age' => $this->input->post('max_age'),
        );

        $name_check = $this->Policy_model->name_check($policy['name']);
        if ($name_check) {
            $this->Policy_model->insert_policy($policy);
            $this->session->set_flashdata('success_msg', 'Policy added successfully');
            redirect(base_url().'policy/list', 'refresh');
        } else {
            $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
            redirect(base_url().'policy', 'refresh');
        }
    }

    public function policy_list(){
        $data['company_id'] = $this->session->userdata('company_id');
        if (!$this->session->userdata('company_id')) {
            redirect(base_url().'company', 'refresh');
        }

        $data['policies'] = $this->Policy_model->list_company_policy($data['company_id']);
        $this->loadView('list', $data);
    }

    public function loadView($page_name, $data) {
        $this->load->view('home/template/header');
        $this->load->view('policy/' . $page_name, $data);
        $this->load->view('home/template/footer');
    }
}
?>