<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>TST CAR Admin</title>
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
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>resource/tinymce/tinymce.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script type="text/javascript">
        tinymce.init({
            selector: "#mytextarea,#economicscenerio",
            theme: "modern",
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            content_css: "css/content.css",
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ]
        });
    </script>

    <script>
        $(function () {
            $("#datepicker01").datepicker();
            $("#datepicker02").datepicker();
        });
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
font-size: 16px;">Welcome To TST Japan Admin Panel &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a>
        </div>
    </nav>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="<?php echo base_url(); ?>resource/assets/img/find_user.png"
                         class="user-image img-responsive"/>
                </li>


                <li>
                    <a class="active-menu" href="<?php echo base_url(); ?>backdoor/"><i
                            class="fa fa-dashboard fa-2x"></i> Dashboard</a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>Admin User <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo base_url(); ?>backdoor/admin_role/">Admin Role</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>backdoor/create_user/">Create User</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>backdoor/admin_list/">Admin List</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="<?php echo base_url(); ?>backdoor/blog_post/"><i class="fa fa-clipboard fa-2x"></i>Blog
                        Post</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>backdoor/development_initiative/"><i
                            class="fa fa-clipboard fa-2x"></i>Development Initiative</a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i> Region<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo base_url(); ?>backdoor/country_info/">Country Info</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>backdoor/economic_scenarios/">Economic Scenarios</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i> ADB<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo base_url(); ?>backdoor/adb_fact_sheet/">Fact Sheet</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>backdoor/adb_business_plan/">Business Plan</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>backdoor/adb_strategy_program/">Strategy Program</a>
                        </li>
                        <li>
                            <a href="#">Projects</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo base_url(); ?>backdoor/five_years_plan/"><i class="fa fa-clipboard fa-2x"></i>Five
                        Year Plan</a>
                </li>


                <li>
                    <a href="#"><i class="fa fa-desktop fa-2x"></i> HDI BD</a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-desktop fa-2x"></i> World Bank Projects</a>
                </li>

                <!--
                <li>
                    <a  href="ui.html"><i class="fa fa-desktop fa-2x"></i>UI</a>
                </li>

                <li>
                    <a  href="tab-panel.html"><i class="fa fa-qrcode fa-2x"></i> Tabs & Panels</a>
                </li>
                       <li  >
                    <a   href="chart.html"><i class="fa fa-bar-chart-o fa-2x"></i> Morris Charts</a>
                </li>
                  <li  >
                    <a  href="table.html"><i class="fa fa-table fa-2x"></i> Table Examples</a>
                </li>
                <li  >
                    <a  href="form.html"><i class="fa fa-edit fa-2x"></i> Forms </a>
                </li>


                <li>
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Second Level Link</a>
                        </li>
                        <li>
                            <a href="#">Second Level Link</a>
                        </li>
                        <li>
                            <a href="#">Second Level Link<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>

                            </ul>

                        </li>
                    </ul>
                  </li>
                <li  >
                    <a  href="blank.html"><i class="fa fa-square-o fa-2x"></i> Blank Page</a>
                </li>
                -->

            </ul>

        </div>

    </nav>
    <!-- /. NAV SIDE  -->