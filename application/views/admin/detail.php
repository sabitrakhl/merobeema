<?php
$admin_id=$this->session->userdata('admin_id');
echo("aaaa");


if(!$admin_id){
  redirect('admin/login');
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>company Profile Dashboard-CodeIgniter Login Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>

<div class="container">
  <div class="row">
    <div class="col-md-4">

      <table class="table table-bordered table-striped">


        <tr>
          <th colspan="2"><h4 class="text-center">Admin Info</h3></th>

        </tr>
          <tr>
            <td>company Name</td>
            <td><?php echo $this->session->userdata('company_name'); ?></td>
          </tr>
          <tr>
            <td>company Email</td>
            <td><?php echo $this->session->userdata('company_email');  ?></td>
          </tr>
          <tr>
            <td>company address</td>
            <td><?php echo $this->session->userdata('company_address');  ?></td>
          </tr>
          <tr>
            <td>company phone</td>
            <td><?php echo $this->session->userdata('company_phone');  ?></td>
          </tr>
      </table>


    </div>
  </div>
<a href="<?php echo base_url('company/company_logout');?>" >  <button type="button" class="btn-primary">Logout</button></a>
</div>
  </body>
</html>