        <header class="masthead bg-primary text-white text-center">
        </header>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th colspan="2"><h4 class="text-center">Policy List</h4></th>
                        </tr>
                        <?php foreach ($policies as $policy) { ?>
                            <tr>
                                <td>Policy</td>
                                <td><?php echo $policy->name; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <a href="<?php echo base_url('company/company_logout'); ?>" >  <button type="button" class="btn-primary">Logout</button></a>
        </div>
        