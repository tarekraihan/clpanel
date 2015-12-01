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

                if($("#username").val() == ''){
                    $("input[name='username']").focus();
                    $('#message').html("User Name can't be blank");
                    return false;
                }else{
                    //return true;
                }

                if($("#password").val() == '') {
                    $("input[name='txtPassword']").focus();
                    $('#message').html("Password can't be blank");
                    return false;
                }else{
                    return true;
                }

            })
            $("#username").click(function(){
                $('#message').hide(300);
            });
            $("#password").click(function(){
                $('#message').hide(300);
            });
        });
    </script>
</head>

<body>

<div class="logo"></div>
<div class="login-block">
    <h1>Login</h1>
    <p id="message" class="error">
        <?php
        $feedback=$this->session->userdata('error');
        if(isset($feedback)){echo $feedback;}
        $this->session->unset_userdata('error');
        ?></p>
    <form action="<?php echo base_url();?>login" method="post">
        <input type="email" name="username" value="" placeholder="Username/email" id="username"/>
        <input type="password" name="txtPassword" value="" placeholder="Password" id="password"/>
        <button type="button" id="btnSubmit">Submit</button>

    </form>
</div>


</body>

</html>