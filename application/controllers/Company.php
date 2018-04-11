<?php

class Company extends CI_Controller {

public function __construct(){
        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('Company_model');
}

public function index()
{
$this->load->view("Register.php");
}

public function register_company(){

      $company=array(
      'company_name'=>$this->input->post('company_name'),
      'company_email'=>$this->input->post('company_email'),
      'company_password'=>md5($this->input->post('company_password')),
      'company_address'=>$this->input->post('company_address'),
      'company_phone'=>$this->input->post('company_phone')
        );
        print_r($company);

$email_check=$this->Company_model->email_check($company['company_email']);

if($email_check){
  $this->Company_model->register_company($company);
  $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
  redirect('company/login_view');

}
else{

  $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
  redirect('company');


}

}

public function login_view(){

$this->load->view("Login.php");

}

function login_company(){
  $company_login=array(

  'company_email'=>$this->input->post('company_email'),
  'company_password'=>md5($this->input->post('company_password'))

    );

    $data=$this->Company_model->login_company($company_login['company_email'],$company_login['company_password']);
      if($data)
      {
        $this->session->set_companydata($data);
        // $this->session->set_companydata('company_id',$data['company_id']);
        // $this->session->set_companydata('company_email',$data['company_email']);
        // $this->session->set_companydata('company_name',$data['company_name']);
        // $this->session->set_companydata('company_address',$data['company_address']);
        // $this->session->set_companydata('company_phone',$data['company_phone']);

        $this->load->view('company_profile.php');

      }
      else{
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        $this->load->view("Login.php");

      }


}

function company_profile(){

$this->load->view('Company_profile.php');

}
public function company_logout(){

  $this->session->sess_destroy();
  redirect('company/login_view', 'refresh');
}

}

?>