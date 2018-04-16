<?php

class Company extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Company_model');    
    }

    public function index() {
        $data = [];
        $this->loadView('login', $data);
    }

    public function register_company() {

        $company = array(
            'company_name' => $this->input->post('company_name'),
            'company_email' => $this->input->post('company_email'),
            'company_password' => md5($this->input->post('company_password')),
            'company_address' => $this->input->post('company_address'),
            'company_phone' => $this->input->post('company_phone')
        );

        $email_check = $this->Company_model->email_check($company['company_email']);

        if ($email_check) {
            $this->Company_model->register_company($company);
            $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
            redirect('company');
        } else {

            $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
            redirect('company');
        }
    }

    public function register_view() {
        $data = [];
        $this->loadView('register', $data);
    }

    function login_company() {
        $company_login = array(
            'company_email' => $this->input->post('company_email'),
            'company_password' => md5($this->input->post('company_password'))
        );
        $data = $this->Company_model->login_company($company_login['company_email'], $company_login['company_password']);
        if ($data) {
            $this->session->set_userdata('company_id', $data['company_id']);
            redirect(base_url() . 'company/company-profile', 'refresh');
        } else {
            $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
            redirect(base_url() . 'company', 'refresh');
        }
    }

    public function company_profile() {
        $data['company_id'] = $this->session->userdata('company_id');
        if (!$this->session->userdata('company_id')) {
            redirect('company');
        }

        $data['company_details'] = $this->Company_model->list_company($data['company_id']);
        $this->loadView('company_profile', $data);
    }

    public function company_logout() {
        $this->session->sess_destroy();
        redirect(base_url().'company', 'refresh');
    }

    public function loadView($page_name, $data) {
        $this->load->view('home/template/header');
        $this->load->view('company/' . $page_name, $data);
        $this->load->view('home/template/footer');
    }

}

?>