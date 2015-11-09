<!DOCTYPE html>
<html>
<head>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">

    <title>Login</title>

    <link href="<?php echo base_url(); ?>resource/css/login.css" rel="stylesheet"/>
</head>

<body>

<div class="logo"></div>
<div class="login-block">
    <h1>Login</h1>

    <form action="login" method="post">
        <input type="text" name="username" value="" placeholder="Username" id="username"/>
        <input type="password" name="password" value="" placeholder="Password" id="password"/>
        <button type="submit">Submit</button>
    </form>
</div>
</body>

</html>