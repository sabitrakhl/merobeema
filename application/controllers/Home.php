<?php

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Policy_model');    
    }

    public function index() {
        $this->loadView('home');
    }

    public function loadView($page_name) {
        $this->load->view('home/template/header');
        $this->load->view('home/' . $page_name);
        $this->load->view('home/template/footer');
    }
}
?>