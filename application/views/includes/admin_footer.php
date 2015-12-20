<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo base_url(); ?>/backdoor/">DataPage</a>
    </div>
    <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> © TST Japan Car Ltd -
        20115
    </div>
</nav>
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="<?php echo base_url(); ?>resource/assets/js/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!-- BOOTSTRAP SCRIPTS -->
<script src="<?php echo base_url(); ?>resource/assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="<?php echo base_url(); ?>resource/assets/js/jquery.metisMenu.js"></script>
 <!--MORRIS CHART SCRIPTS -->
<script src="<?php echo base_url(); ?>resource/assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="<?php echo base_url(); ?>resource/assets/js/morris/morris.js"></script>

<!-- DATA TABLE SCRIPTS -->
<script src="<?php echo base_url(); ?>resource/assets/js/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>resource/assets/js/dataTables/dataTables.bootstrap.js"></script>

<!-- CUSTOM SCRIPTS -->
<script>


    //---------add by tarek----
    //--For create_product.php view

    $(document).ready(function(){
        //alert("hhis");
        $("#txtMakeId").change(function(){
            var make=$("#txtMakeId").val();
            //alert(company_id);
            $.ajax({
                type:"POST",
                url:"<?php echo base_url();?>backdoor/get_model/",
                data:{make_id:make},
                success: function(response){
                    // alert(response);
                    $("#txtModel").html(response);
                }
            })
        });
        //-- Car List DataTable
        $('#carList').dataTable();
    });

    $(function() {
        $( "#expire_date" ).datepicker();


    });
</script>
<script src="<?php echo base_url(); ?>resource/assets/js/custom.js"></script>
</body>
</html>
