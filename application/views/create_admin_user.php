<?php

if(isset($_GET['role_id']))
{
    $id=$_GET['role_id'];
    $table='admin_user_role';
    $id_field='role_id';
    $this->delete_model->Delete_Single_Row($id,$table,$id_field);
}
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Create Admin User</h2>

            </div>
        </div>
        <!-- /. ROW  -->
        <hr/>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-6 ">
                <div class="form" >
                    <form action="" method="post">
                        <div class="box-content"  >
                            <?php
                            //-----Display Success or Error message---
                            if(isset($feedback)){
                                echo $feedback;
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="txtFirstName" placeholder="Enter First Name" required="required"/>
                        </div>
                        <div class="form-group">
                            <label class="red"><?php echo form_error('txtFirstName');?></label>
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="txtLastName" placeholder="Enter Last Name" required="required"/>
                        </div>
                        <div class="form-group">
                            <label class="red"><?php echo form_error('txtLastName');?></label>
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="txtEmailAddress" placeholder="Enter Email Address" required="required"/>
                        </div>
                        <div class="form-group">
                            <label class="red"><?php echo form_error('txtEmailAddress');?></label>
                        </div>

                        <div class="form-group">

                                <label>Address</label>
                                <textarea class="form-control" rows="3" name="txtAddress" placeholder="Enter Address" required="required"></textarea>

                        </div>

                        <div class="form-group">
                            <label class="red"><?php echo form_error('txtAddress');?></label>
                        </div>

                        <div class="form-group">
                            <label>Phone No</label>
                            <input type="tel" class="form-control" name="txtPhone" placeholder="Enter Phone no" required="required"/>
                        </div>
                        <div class="form-group">
                            <label class="red"><?php echo form_error('txtPhone');?></label>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="txtPassword" placeholder="Enter Password" required="required"/>
                        </div>
                        <div class="form-group">
                            <label class="red"><?php echo form_error('txtPassword');?></label>
                        </div>

                        <div class="form-group">
                            <label>Re Password</label>
                            <input type="password" class="form-control" name="txtRePassword" placeholder="Enter Re Password" required="required"/>
                        </div>
                        <div class="form-group">
                            <label class="red"><?php echo form_error('txtRePassword');?></label>
                        </div>

                        <div class="form-group">
                            <label>Profile Picture</label>
                            <input type="file" class="form-control" name="txtProfilePicture" placeholder="Select Profile Picture" required="required"/>
                        </div>
                        <div class="form-group">
                            <label class="red"><?php echo form_error('txtRePassword');?></label>
                        </div>



                        <input type="submit" name="btnSubmit" class="btn btn-danger" id="admin_user_role">
                    </form>
                </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-6 ">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Admin Role List
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Role Name</th>
                                    <th>Created</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $this->common_model->order_column = 'role_id';
                                $this->common_model->table_name = 'admin_user_role';
                                $query=$this->common_model->select_all();
                                $sl=1;
                                foreach ($query->result() as $row)
                                {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $sl; ?></td>
                                        <td class="center"><?php echo $row->role_name;?></td>
                                        <td class="center"><?php echo $row->created;?></td>
                                        <td class="center text-center"><a href="<?php echo base_url(); ?>backdoor/edit_admin_user_role?id=<?php echo $row->role_id;?>"><i class="glyphicon glyphicon-edit "></a></td>
                                        <td class="center text-center"><a href="?role_id=<?php echo $row->role_id;?>" onclick="return confirm('Are you really want to delete this item')"><i class="glyphicon glyphicon-remove red "></a></td>

                                    </tr>
                                    <?php
                                    $sl++;
                                }
                                ?>


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
    <!-- /. ROW  -->
</div><!-- /. PAGE INNER  -->
</div><!-- /. PAGE WRAPPER  -->
