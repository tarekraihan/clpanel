<?php

if(isset($_GET['role_id']))
{
    $id=$_GET['role_id'];
    $table='admin_user_role';
    $id_field='role_id';
    $this->delete_model->Delete_Single_Row($id,$table,$id_field);
}

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $table='tst_admin_user';
    $id_field='admin_user_id';
    $row=$this->select_model->Select_Single_Row($id,$table,$id_field);
    /*print_r($row);
        die;*/
}else{
    $row['admin_user_id']='';
    $row['admin_first_name']='';
    $row['admin_last_name']='';
    $row['admin_email']='';
    $row['admin_address']='';
    $row['admin_phone']='';

}
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Update Admin User Info</h2>

            </div>
        </div>
        <!-- /. ROW  -->
        <hr/>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-6 ">
                <div class="box-content"  >
                    <?php

                    //----Form Tag Start-------------
                    $attributes = array('class' => 'email', 'id' => 'edit_admin_user');
                    echo form_open_multipart('backdoor/create_product');
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('First Name', 'txtFirstName');
                    $attributes=array(
                        'name'=>'txtFirstName',
                        'class'=>'form-control',
                        'maxlength'   => '25',
                        'placeholder'=>'Enter First Name',
                        'value' => set_value('txtFirstName'),
                    );
                    echo form_input($attributes);

                    $data=array(
                        'name'=>'admin_user_id',
                        'value' => $row['admin_user_id']
                    );
                    echo form_hidden($data);
                    ?>
                    <input type="hidden" value="<?php echo $row['admin_user_id'];?>" name="admin_user_id"/>
                </div>
                <div class="form-group">
                    <label class="red"><?php echo form_error('txtFirstName');?></label>
                </div>

                <div class="form-group">
                    <?php
                    echo form_label('Last Name', 'txtLastName');
                    $attributes=array(
                        'name'=>'txtLastName',
                        'class'=>'form-control',
                        'maxlength'   => '25',
                        'placeholder'=>'Enter Last Name',
                        'value' => set_value('txtLastName'),
                    );
                    echo form_input($attributes);
                    ?>
                </div>
                <div class="form-group">
                    <label class="red"><?php echo form_error('txtLastName');?></label>
                </div>

                <div class="form-group">
                    <?php
                    echo form_label('Email Address', 'txtEmailAddress');
                    $attributes=array(
                        'name'=>'txtEmailAddress',
                        'class'=>'form-control',
                        'maxlength'   => '70',
                        'placeholder'=>'Enter Email Address',
                        'value' => set_value('txtEmailAddress'),
                    );
                    echo form_input($attributes);
                    ?>
                </div>
                <div class="form-group">
                    <label class="red"><?php echo form_error('txtEmailAddress');?></label>
                </div>

                <div class="form-group">
                    <?php
                    echo form_label('User Name', 'username');
                    $attributes=array(
                        'name'=>'username',
                        'class'=>'form-control',
                        'maxlength'   => '15',
                        'placeholder'=>'Enter User Name',
                        'value' => set_value('username'),
                    );
                    echo form_input($attributes);
                    ?>
                </div>
                <div class="form-group">
                    <label class="red"><?php echo form_error('username');?></label>
                </div>

                <div class="form-group">
                    <?php
                    echo form_label('Address', 'txtAddress');
                    $attributes=array(
                        'name'=>'txtAddress',
                        'class'=>'form-control',
                        'maxlength'   => '250',
                        'placeholder'=>'Write  Address',
                        'value' => set_value('txtAddress'),
                    );
                    echo form_textarea($attributes);
                    ?>
                </div>

                <div class="form-group">
                    <label class="red"><?php echo form_error('txtAddress');?></label>
                </div>

                <div class="form-group">
                    <?php
                    echo form_label('Phone Number', 'txtPhone');
                    $attributes=array(
                        'name'=>'txtPhone',
                        'class'=>'form-control',
                        'maxlength'   => '15',
                        'placeholder'=>'Write Phone Number',
                        'value' => set_value('txtPhone'),
                    );
                    echo form_input($attributes);
                    ?>
                </div>
                <div class="form-group">
                    <label class="red"><?php echo form_error('txtPhone');?></label>
                </div>

                <div class="form-group">
                    <?php
                    echo form_label('Password', 'txtPassword');
                    $attributes=array(
                        'name'=>'txtPassword',
                        'class'=>'form-control',
                        'maxlength'   => '15',
                        'placeholder'=>'Write Password',
                        'value' => set_value('txtPassword'),
                    );
                    echo form_password($attributes);
                    ?>
                </div>
                <div class="form-group">
                    <label class="red"><?php echo form_error('txtPassword');?></label>
                </div>

                <div class="form-group">
                    <?php
                    echo form_label('Confirm Password', 'txtConfirmPassword');
                    $attributes=array(
                        'name'=>'txtConfirmPassword',
                        'class'=>'form-control',
                        'maxlength'   => '15',
                        'placeholder'=>'Confirm Password',
                        'value' => set_value('txtConfirmPassword'),
                    );
                    echo form_password($attributes);
                    ?>
                </div>
                <div class="form-group">
                    <label class="red"><?php echo form_error('txtConfirmPassword');?></label>
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
                    <?php
                    echo form_label('Profile Picture', 'txtProfilePicture');
                    $data = array(
                        'name'        => 'txtProfilePicture',
                        'id'          => 'txtProfilePicture',
                        'maxlength'   => '100',
                        'size'        => '50',
                        'class'       => 'form-control',
                        'placeholder'=> 'Select Profile Picture',
                        'value'=> set_value('txtProfilePicture')
                    );

                    echo form_upload($data);
                    ?>
                </div>
                <div class="form-group">
                    <label class="red"><?php echo form_error('txtProfilePicture');?></label>
                </div>

                <div class="checkbox">
                    <label><input name="txtIsActive" checked type="checkbox"> IsActive</label>
                </div>
                <input type="submit" name="btnSubmit" class="btn btn-danger" value="Update">
                <?php echo form_close();?>
            </div>

        <div class="col-md-6 col-sm-12 col-xs-6 ">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Admin Role List
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTables-example">
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
                                    <td class="center text-center"><a href="<?php echo base_url(); ?>backdoor/edit_admin_user?id=<?php echo $row->admin_user_id;?>"><i class="glyphicon glyphicon-edit "></a></td>
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
