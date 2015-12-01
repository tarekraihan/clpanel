<!DOCTYPE html>
<html>
<head>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">

    <title>Login</title>

    <link href="<?php echo base_url(); ?>resource/css/login.css" rel="stylesheet"/>
    <script src="<?php echo base_url();?>resource/js/jquery-1.11.3.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#btnSubmit').click(function(){

                alert($('#username').value);
//                if($('#username').value == ''){
////                    $(this).focus();
//                    alert("sd5fs");

            });


        });
    </script>
</head>

<body>

<div class="logo"></div>
<div class="login-block">
    <h1>Login</h1>
    <p class="error">
        <?php
        $feedback=$this->session->userdata('error');
        if(isset($feedback)){echo $feedback;}
        $this->session->unset_userdata('error');
        ?></p>
    <form action="login" method="post">
        <input type="text" name="username" value="" placeholder="Username/email" id="username"/>
        <input type="password" name="txtPassword" value="" placeholder="Password" id="password"/>
        <button type="button" id="btnSubmit">Submit</button>

    </form>
</div>


</body>

</html>