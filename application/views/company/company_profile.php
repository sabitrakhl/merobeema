<?php
//echo $company_id;
//echo $this->session->userdata('company_id');
//$company_id=$this->session->userdata('company_id');
//if(!$company_id){
//  redirect('company/login-view');
//}
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
                            <th colspan="2"><h4 class="text-center">company Info</h3></th>
                        </tr>
                        <?php foreach ($company_details as $company_detail) { ?>
                            <tr>
                                <td>company Name</td>
                                <td><?php echo $company_detail->company_name; ?></td>
                            </tr>
                            <tr>
                                <td>company Email</td>
                                <td><?php echo $company_detail->company_email; ?></td>
                            </tr>
                            <tr>
                                <td>company address</td>
                                <td><?php echo $company_detail->company_address; ?></td>
                            </tr>
                            <tr>
                                <td>company phone</td>
                                <td><?php echo $company_detail->company_phone; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <a href="<?php echo base_url('company/company_logout'); ?>" >  <button type="button" class="btn-primary">Logout</button></a>
        </div>
    </body>
</html>