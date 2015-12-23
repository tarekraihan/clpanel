<?php

if(isset($_GET['car_id']))
{
    $id=$_GET['car_id'];
    $table='tbl_product';
    $id_field='product_id';
    $this->delete_model->Delete_Single_Row($id,$table,$id_field);
}
?>

<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Vehicle / Car List</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Car List
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="carList">
                                <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Vehicle ID</th>
                                    <th>Images</th>
                                    <th>Manufacture</th>
                                    <th>Model</th>
                                    <th>Price</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query=$this->select_model->Select_Car_List();

                                $sl=1;
                                foreach ($query->result() as $row)
                                {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td class="text-center"><?php echo $sl; ?></td>
                                        <td class="text-center"><?php echo $row->product_id; ?></td>
                                        <td class="text-center"><img src="<?php echo base_url();?>resource/images/car/<?php echo $row->feature_image; ?>" width="100"></td>
                                        <td class="center"><?php echo $row->name;?></td>
                                        <td class="center"><?php echo $row->model_name;?></td>
                                        <td class="center"><?php echo $row->price;?></td>
                                        <td class="center text-center"><a href="<?php echo base_url(); ?>backdoor/edit_product?id=<?php echo $row->product_id;?>"><i class="glyphicon glyphicon-edit "></a></td>
                                        <td class="center text-center"><a href="<?php echo base_url(); ?>backdoor/vehicle_list/<?php echo $row->product_id;?>" onclick="return confirm('Are you really want to delete this item')"><i class="glyphicon glyphicon-remove red "></a></td>
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
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div><!-- /. PAGE WRAPPER  -->
