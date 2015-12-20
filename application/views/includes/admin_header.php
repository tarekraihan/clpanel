<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?php echo $title;?></title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url(); ?>resource/assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url(); ?>resource/assets/css/font-awesome.css" rel="stylesheet"/>
    <!-- MORRIS CHART STYLES-->
    <link href="<?php echo base_url(); ?>resource/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet"/>
    <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url(); ?>resource/assets/css/custom.css" rel="stylesheet"/>
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>


    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script>

    </script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url();?>"><?php echo $this->session->userdata('admin_first_name').' '.$this->session->userdata('admin_last_name');?></a>
        </div>
        <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">Welcome To TST Japan Admin Panel &nbsp; <a href="<?php echo base_url();?>login/admin_log_out" class="btn btn-danger square-btn-adjust">Logout</a>
        </div>
    </nav>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="<?php echo base_url(); ?>resource/assets/img/find_user.png" class="user-image img-responsive"/>
                </li>


                <li>
                    <a class="active-menu" href="<?php echo base_url(); ?>backdoor/"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>Admin User <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo base_url(); ?>backdoor/admin_user_role/">Admin Role</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>backdoor/admin_user/">Create User</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>Vehicle Information <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo base_url(); ?>backdoor/make/">Manufacturar</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>backdoor/model/">Car Model</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>backdoor/vehicle_category/">Vehicle Category</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>backdoor/create_product/">Vehicle Information</a>
                        </li>

                    </ul>
                </li>

            </ul>

        </div>

    </nav>
    <!-- /. NAV SIDE  -->