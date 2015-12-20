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
            <div class="col-md-12">
                <?php
                //-----Display Success or Error message---
                if(isset($feedback)){
                    echo $feedback;
                }
                ?>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-6 ">
                <div class="box-content"  >
                    <?php

                    //----Form Tag Start-------------
                    $attributes = array('class' => 'email', 'id' => 'myform');
                    echo form_open_multipart('backdoor/create_product');
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
                        <option value="">Select One</option>
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
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="manufactureYear">Manufacture Year</label>
                            <select name="manufactureYear" class="form-control" >
                                <?php
                                $y= date("Y")+1;
                                for ($i = 0;$i < 50;$i++)
                                {
                                    $y -=1;
                                    echo "<option value='$y'>$y</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <div class="col-xs-6">
                            <label for="manufactureMonth">Manufacture Month</label>
                            <select name="manufactureMonth" class="form-control" >
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="red"><?php echo form_error('manufactureMonth');?></label>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <?php
                    $attributes=array(
                    'name'=>'txtPrice',
                    'class'=>'form-control',
                    'maxlength'   => '12',
                    'placeholder'=>'Write Vehicle Price',
                    'value' => set_value('txtPrice'),
                    );
                    echo form_input($attributes);
                    ?>
                </div>
                <div class="form-group">
                    <label class="red"><?php echo form_error('txtPrice');?></label>
                </div>

                <div class="form-group">

                    <label>Displacement</label>
                    <?php
                    $attributes=array(
                        'name'=>'txtDisplacement',
                        'class'=>'form-control',
                        'maxlength'   => '50',
                        'placeholder'=>'Write Displacement',
                        'value' => set_value('txtDisplacement'),
                    );
                    echo form_input($attributes);
                    ?>
                </div>

                <div class="form-group">
                    <label class="red"><?php echo form_error('txtDisplacement');?></label>
                </div>

                <div class="form-group">
                    <label>Steering</label>
                    <?php
                    $attributes=array(
                        'name'=>'txtSteering',
                        'class'=>'form-control',
                        'maxlength'   => '50',
                        'placeholder'=>'Write Steering type',
                        'value' => set_value('txtSteering'),
                    );
                    echo form_input($attributes);
                    ?>
                </div>
                <div class="form-group">
                    <label class="red"><?php echo form_error('txtSteering');?></label>
                </div>

                <div class="form-group">
                    <label>Condition</label>
                    <?php
                    $attributes=array(
                        'name'=>'txtCondition',
                        'class'=>'form-control',
                        'maxlength'   => '50',
                        'placeholder'=>'Write Vehicle Condition',
                        'value' => set_value('txtCondition'),
                    );
                    echo form_input($attributes);
                    ?>
                </div>
                <div class="form-group">
                    <label class="red"><?php echo form_error('txtCondition');?></label>
                </div>

                <div class="form-group">
                    <label>Made in</label>
                    <?php
                    $attributes=array(
                        'name'=>'txtMadeIn',
                        'class'=>'form-control',
                        'maxlength'   => '25',
                        'placeholder'=>'Write Vehicle Made in',
                        'value' => set_value('txtMadeIn'),
                    );
                    echo form_input($attributes);
                    ?>
                </div>
                <div class="form-group">
                    <label class="red"><?php echo form_error('txtMadeIn');?></label>
                </div>

                <div class="form-group">
                    <label>Fuel</label>
                    <?php
                    $attributes=array(
                        'name'=>'txtFuel',
                        'class'=>'form-control',
                        'maxlength'   => '25',
                        'placeholder'=>'Fuel used',
                        'value' => set_value('txtFuel'),
                    );
                    echo form_input($attributes);
                    ?>
                </div>

                <div class="form-group">
                    <label class="red"><?php echo form_error('txtFuel');?></label>
                </div>

            </div>
            <div class="col-md-6 col-sm-12 col-xs-6 ">

                <div class="form-group">
                    <label>Body Style</label>
                    <?php
                    $attributes=array(
                        'name'=>'txtBodyStyle',
                        'class'=>'form-control',
                        'maxlength'   => '25',
                        'placeholder'=>'Body Style',
                        'value' => set_value('txtBodyStyle'),
                    );
                    echo form_input($attributes);
                    ?>
                </div>
                <div class="form-group">
                    <label class="red"><?php echo form_error('txtBodyStyle');?></label>
                </div>

                <div class="form-group">
                    <label>Doors</label>
                    <?php
                    $attributes=array(
                        'name'=>'txtDoor',
                        'class'=>'form-control',
                        'maxlength'   => '2',
                        'placeholder'=>'Number of doors',
                        'value' => set_value('txtDoor'),
                    );
                    echo form_input($attributes);
                    ?>
                </div>
                <div class="form-group">
                    <label class="red"><?php echo form_error('txtDoor');?></label>
                </div>

                <div class="form-group">
                    <?php
                    echo form_label('Number of passenger', 'txtPassenger');
                    $attributes=array(
                        'name'=>'txtPassenger',
                        'class'=>'form-control',
                        'maxlength'   => '2',
                        'placeholder'=>'Number of passenger',
                        'value' => set_value('txtPassenger'),
                    );
                    echo form_input($attributes);
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Dimension', 'txtDimension');
                    $attributes=array(
                        'name'=>'txtDimension',
                        'class'=>'form-control',
                        'maxlength'   => '15',
                        'placeholder'=>'Dimension',
                        'value' => set_value('txtDimension'),
                    );
                    echo form_input($attributes);
                    ?>
                </div>
                <div class="form-group">
                    <label class="red"><?php echo form_error('txtDimension');?></label>
                </div>

                <div class="form-group">
                    <?php
                    echo form_label('Exterior Color', 'txtExterior');
                    $attributes=array(
                        'name'=>'txtExterior',
                        'class'=>'form-control',
                        'maxlength'   => '50',
                        'placeholder'=>'Write Exterior Color',
                        'value' => set_value('txtExterior'),
                    );
                    echo form_input($attributes);
                    ?>
                </div>
                <div class="form-group">
                    <label class="red"><?php echo form_error('txtExterior');?></label>

                </div>

                <div class="form-group">
                    <?php
                    echo form_label('Interior Color', 'txtInterior');
                    $attributes=array(
                        'name'=>'txtInterior',
                        'class'=>'form-control',
                        'maxlength'   => '50',
                        'placeholder'=>'Write Interior Color',
                        'value' => set_value('txtInterior'),
                    );
                    echo form_input($attributes);
                    ?>
                </div>
                <div class="form-group">
                    <label class="red"><?php echo form_error('txtInterior');?></label>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Expire Date', 'txtExpireDate');
                    $attributes=array(
                        'name'=>'txtExpireDate',
                        'id'=>'expire_date',
                        'class'=>'form-control',
                        'maxlength'   => '10',
                        'placeholder'=>'Write Expire Date',
                        'value' => set_value('txtExpireDate'),
                    );
                    echo form_input($attributes);
                    ?>
                </div>
                <div class="form-group">
                    <label class="red"><?php echo form_error('txtExpireDate');?></label>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Reference Number', 'txtReferenceNo');
                    $attributes=array(
                        'name'=>'txtReferenceNo',
                        'class'=>'form-control',
                        'maxlength'   => '25',
                        'placeholder'=>'Write Reference Number',
                        'value' => set_value('txtReferenceNo'),
                    );
                    echo form_input($attributes);
                    ?>
                </div>
                <div class="form-group">
                    <label class="red"><?php echo form_error('txtReferenceNo');?></label>
                </div>

                <div class="form-group">

                    <?php
                    echo form_label('Options', 'txtOptions');
                    $attributes=array(
                        'name'=>'txtOptions',
                        'class'=>'form-control',
                        'maxlength'   => '50',
                        'placeholder'=>'Write Options',
                        'value' => set_value('txtOptions'),
                    );
                    echo form_input($attributes);
                    ?>
                </div>

                <div class="form-group">
                    <label class="red"><?php echo form_error('txtOptions');?></label>
                </div>

                <div class="checkbox">
                    <label><input name="txtIsAvailable" type="checkbox"> IsAvailable</label>
                </div>

                <div class="form-group">

                    <?php
                    echo form_label('Vehicle Image', 'txtImages');
                    $attributes=array(
                        'name'=>'txtImages',
                        'class'=>'form-control',
                        'maxlength'   => '50',
                        //'multiple'=>true,
                        'placeholder'=>'Write Options',
                        'value' => set_value('txtImages'),
                    );
                    echo form_upload($attributes);
                    ?>
                </div>

                <div class="form-group">
                    <label class="red"><?php echo form_error('txtImages');?></label>
                </div>

                <input type="submit" name="btnSubmit" class="btn btn-danger" id="admin_user_role">
                <?php echo form_close();?>
            </div>
        </div>
    </div>
    <!-- /. ROW  -->
</div><!-- /. PAGE INNER  -->
</div><!-- /. PAGE WRAPPER  -->
