<?php

if(isset($_GET['category_id']))
{
    $id=$_GET['category_id'];
    $table='tbl_category';
    $id_field='category_id';
    $this->delete_model->Delete_Single_Row($id,$table,$id_field);
}
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Vehicle Category</h2>

            </div>
        </div>
        <!-- /. ROW  -->
        <hr/>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-6 ">
                <div class="form" >
                        <div class="box-content"  >
                            <?php
                            //-----Display Success or Error message---
                            if(isset($feedback)){
                                echo $feedback;
                            }
                            //----Form Tag Start-------------
                            $attributes = array('class' => 'email', 'id' => 'myform');

                            echo form_open('backdoor/vehicle_category', $attributes);
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Vehicle Category</label>
                            <?php
                            $attributes=array(
                                'name'=>'txtVehicleCategory',
                                'class'=>'form-control',
                                'maxlength'   => '25',
                                'placeholder'=>'Write Vehicle Category',
                                'value' => set_value('txtVehicleCategory'),
                            );
                            echo form_input($attributes);
                            ?>
                        </div>
                        <div class="form-group">
                            <label class="red"><?php echo form_error('txtVehicleCategory');?></label>
                        </div>

                        <div class="form-group">
                            <label>Remarks</label>
                            <?php
                            $attributes=array(
                                'name'=>'txtRemarks',
                                'class'=>'form-control',
                                'placeholder'=>'Write Remarks',
                                'maxlength'   => '100',
                                'value' => set_value('txtRemarks'),
                            );
                            echo form_input($attributes);
                            ?>
                        </div>
                        <div class="form-group">
                            <label class="red"><?php echo form_error('txtRemarks');?></label>
                        </div>
                        <?php
                        $attribute=array(
                            'name'=>'btnSubmit',
                            'class'=>'btn btn-danger ',
                            'value'=>'Submit',
                        );
                        echo form_submit($attribute);//--Form Submit Button
                        echo form_close();//--Form closing tag </form>
                        ?>
                </div>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-6 ">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Vehicle Category List
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Vehicle Category</th>
                                    <th>Remarks</th>
                                    <th>Created</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $this->common_model->order_column = 'category_id';
                                $this->common_model->table_name = 'tbl_category';
                                $query=$this->common_model->select_all();
                                $sl=1;
                                foreach ($query->result() as $row)
                                {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $sl; ?></td>
                                        <td class="center"><?php echo $row->name;?></td>
                                        <td class="center"><?php echo $row->remarks;?></td>
                                        <td class="center"><?php echo $row->created;?></td>
                                        <td class="center text-center"><a href="<?php echo base_url(); ?>backdoor/edit_vehicle_category?id=<?php echo $row->category_id;?>"><i class="glyphicon glyphicon-edit "></a></td>
                                        <td class="center text-center"><a href="?category_id=<?php echo $row->category_id;?>" onclick="return confirm('Are you really want to delete this item')"><i class="glyphicon glyphicon-remove red "></a></td>

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
