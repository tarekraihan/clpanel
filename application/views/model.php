<?php

if(isset($_GET['model_id']))
{
    $id=$_GET['model_id'];
    $table='tbl_model';
    $id_field='model_id';
    $this->delete_model->Delete_Single_Row($id,$table,$id_field);
}
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Create Model</h2>

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
                            //----Form Tag Start-------------
                            $attributes = array('class' => 'email', 'id' => 'myform');

                            echo form_open('backdoor/model', $attributes);
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Manufacturar Name</label>
                            <select name="txtMakeId" class="form-control">
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
                            <?php
                            $attributes=array(
                                'name'=>'txtModelName',
                                'class'=>'form-control',
                                'placeholder'=>'Write Model Name',
                                'maxlength'   => '70',
                                'value' => set_value('txtModelName'),
                            );
                            echo form_input($attributes);
                            ?>
                        </div>
                        <div class="form-group">
                            <label class="red"><?php echo form_error('txtModelName');?></label>
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
                        Manufacturar List
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Manufacturar</th>
                                    <th>Created</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $row=$this->select_model->Select_model() = 'make_id';
                                $sl=1;
                                foreach ($query->result() as $row)
                                {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $sl; ?></td>
                                        <td class="center"><?php echo $row->name;?></td>
                                        <td class="center"><?php echo $row->created;?></td>
                                        <td class="center text-center"><a href="<?php echo base_url(); ?>backdoor/edit_make?id=<?php echo $row->make_id;?>"><i class="glyphicon glyphicon-edit "></a></td>
                                        <td class="center text-center"><a href="?make_id=<?php echo $row->make_id;?>" onclick="return confirm('Are you really want to delete this item')"><i class="glyphicon glyphicon-remove red "></a></td>

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
