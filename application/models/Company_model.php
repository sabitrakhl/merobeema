<?php
class Company_model extends CI_model{



public function register_company($company){


$this->db->insert('company', $company);

}

public function login_company($email,$pass){
  $this->db->select('*');
  $this->db->from('company');
  $this->db->where('company_email',$email);
  $this->db->where('company_password',$pass);

  if($query=$this->db->get())
  {
      return $query->row_array();
  }
  else{
    return false;
  }


}
public function email_check($email){

  $this->db->select('*');
  $this->db->from('company');
  $this->db->where('company_email',$email);
  $query=$this->db->get();

  if($query->num_rows()>0){
    return false;
  }else{
    return true;
  }

}


}


?>