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
                <h2>Create Product</h2>

            </div>
        </div>
        <!-- /. ROW  -->
        <hr/>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-6 ">
                <div class="form" >
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="box-content"  >
                            <?php
                            //-----Display Success or Error message---
                            if(isset($feedback)){
                                echo $feedback;
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Manufacturar Name</label>
                            <select name="txtMakeId" id="txtMakeId" class="form-control">
                                <?php
                                echo $this->select_model->Select_box($table='tbl_make');
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="red"><?php echo form_error('txtMakeId');?></label>

                        </div>

                        <div class="form-group">
                            <label>Model Name</label>
                            <select name="txtModel" id="txtModel" class="form-control">
                                <option>Select One</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="red"><?php echo form_error('txtModel');?></label>
                        </div>
                        <div class="form-group">
                            <label>Vehicle Category</label>
                            <select name="txtCategory" id="txtCategory" class="form-control">
                                <?php
                                echo $this->select_model->Select_box($table='tbl_category');
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="red"><?php echo form_error('txtCategory');?></label>
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control"  name="txtYear" placeholder="Select Year" required="required"/>

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
                            <label>Admin Role</label>

                            <select pattern="[0-9]{1,3}"  name="txtAdminRole" id="txtAdminRole" data-rel="chosen" class="form-control">
                                <option value="">Select Admin Role</option>
                                <?php
                                $this->common_model->order_column = 'role_id';
                                $this->common_model->table_name = 'admin_user_role';
                                $query=$this->common_model->select_all();
                                foreach ($query->result() as $row)
                                {
                                    ?>
                                    <option value="<?php echo $row->role_id;?>"><?php echo $row->role_name;?></option>
                                <?php

                                }
                                ?>

                            </select>

                        </div>

                        <div class="form-group">
                            <label>Profile Picture</label>
                            <input type="file" class="form-control" name="txtProfilePicture" placeholder="Select Profile Picture" required="required"/>
                        </div>
                        <div class="form-group">
                            <label class="red"><?php echo form_error('txtProfilePicture');?></label>
                        </div>

                        <div class="checkbox">
                            <label><input name="txtIsActive" type="checkbox"> IsActive</label>
                        </div>

                        <div class="form-group">
                            <label>User Name</label>
                            <?php
                            $data = array(
                                'name'        => 'username',
                                'id'          => 'username',
                                'maxlength'   => '100',
                                'size'        => '50',
                                'class'       => 'form-control',
                            );

                            echo form_input($data);
                            ?>
                        </div>

                        <div class="form-group">
                            <label class="red"><?php echo form_error('username');?></label>
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
                                    <th>Admin Name</th>
                                    <th>Role</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Edit</th>
                                    <th>Details</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $query=$this->select_model->Select_User();

                                $sl=1;
                                foreach ($query->result() as $row)
                                {
                                    if($row->status == 1){
                                        $status = '<i class="glyphicon glyphicon-ok green  ">';
                                    }else{
                                        $status = '<i class="glyphicon glyphicon-remove red ">';
                                    }
                                    ?>
                                    <tr class="odd gradeX">
                                        <td class="text-center"><?php echo $sl; ?></td>
                                        <td class="center"><?php echo $row->admin_first_name.' '.$row->admin_last_name;?></td>
                                        <td class="center"><?php echo $row->role_name;?></td>
                                        <td class="center"><?php echo $row->admin_phone;?></td>
                                        <td class="text-center"><?php echo $status;?></td>
                                        <td class="center"><?php echo $row->created;?></td>
                                        <td class="center text-center"><a href="<?php echo base_url(); ?>backdoor/edit_admin_user_role?id=<?php echo $row->admin_user_id;?>"><i class="glyphicon glyphicon-edit "></a></td>
                                        <td class="center text-center"><a href="<?php echo base_url(); ?>backdoor/admin_details/<?php echo $row->admin_user_id;?>"><i class="glyphicon glyphicon-plus green "></a></td>
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
