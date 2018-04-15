<?php

class Admin extends CI_Controller {

  public function __construct(){
    parent::__construct();
  	$this->load->helper('url');
  	$this->load->model('Admin_model');
  }

  public function index()
  {
    $this->load->view("admin/register.php");
  }

  public function register(){
    $admin=array(
      'email'=>$this->input->post('email'),
      'password'=>md5($this->input->post('password')),
    );

    $email_check=$this->Admin_model->email_check($admin['email']);

    if($email_check){
      $this->Admin_model->register_admin($admin);
      $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
      redirect('admin/login');
    }
    else{
      $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
      redirect('admin');
    }
  }

  public function login(){
    $this->load->view("admin/login.php");
  }

  function detail(){
    $admin_login=array(
      'email'=>$this->input->post('email'),
      'password'=>md5($this->input->post('password'))
    );
    $data=$this->Admin_model->login_admin($admin_login['email'],$admin_login['password']);
      if($data)
      {
        $this->session->set_userdata('admin_id',$data['id']);
        $this->session->set_userdata('admin_email',$data['email']);
        $this->load->view('admin/detail.php');
      }
      else{
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        $this->load->view("admin/login.php");

      }
  }

  function admin_profile(){
    $this->load->view('admin/detail.php');
  }

  public function admin_logout(){
    $this->session->sess_destroy();
    redirect('admin/login', 'refresh');
  }
}
?>