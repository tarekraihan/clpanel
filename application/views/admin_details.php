<style>
    .left-div img{
        height:150px;
        width:150px;
    }
    .heading-div{
        height:40px;
        width:auto;
        background-color:#000;
        color:#fff;
        padding:10px;
    }
    .right-div p{
        margin:0 15px;
        padding:0;
    }
</style>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <?php
                echo $this->select_model->Select_Single_Employee_Info($admin_id);
            ?>

            <div class="col-md-12">
                <div class="right-div">
                    <div class="heading-div"></div>
                </div>
            </div>
        </div>
    </div>
</div>