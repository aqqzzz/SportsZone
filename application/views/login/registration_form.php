<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta http-equiv="x-ua-compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Sports Zone</title>

<!-- Bootstrap Core CSS -->
<link href="<?=base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="<?=base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

<!-- Plugin CSS -->
<link href="<?=base_url();?>assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
<link href="<?=base_url();?>assets/vendor/supersized/css/supersized.css" rel="stylesheet">

<!-- Theme CSS -->

<link href="<?=base_url();?>assets/css/index.css" rel="stylesheet">
<link href="<?=base_url();?>assets/css/login.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<?php
if(isset($this->session->userdata['logged_in'])){
    header("location:http://localhost/user_authentication/login_process");
}
?>
<head>
    <title>注册</title>
</head>
<body>
<div id="main">
    <div id="login">
        <h2>注册</h2>
        <hr>
        <div class="loginForm">
            <?php
            echo form_open('user_authentication/register_process');
            echo "<div class='error_message'>".validation_errors()."</div>";
            ?>

            <div class="input-group input-group-lg center-input">
                <input type="text" class="form-control" name="username" id="name" placeholder="用户名"/>
            </div>
            <?php
            echo "<div class='error_message'>";
            if(isset($message_display)){
                echo $message_display;
            }
            echo "</div>";
            ?>
            <div class="input-group input-group-lg center-input">
                <input type="password" class="form-control" name="password" id="password" placeholder="密码"/>
            </div>

            <div class="input-group input-group-lg center-input">
                <input type="password" class="form-control" name="password" id="password" placeholder="再次输入密码"/>
            </div>

            <input type="submit" class="btn btn-primary" value="注册" name="submit"/><br />
            <?php
            echo form_close();
            ?>
            <div class="connect">
                <p>Or connect with:</p>
                <p>
                    <a class="facebook" href=""><i class="fa fa-2x fa-facebook"></i></a>
                    <a class="twitter" href=""><i class="fa fa-2x fa-twitter"></i></a>
                </p>
            </div>
            <a href="<?php echo base_url() ?>">For Login Click Here</a>
        </div>


    </div>
</div>

<script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>


<script src="<?=base_url();?>assets/vendor/supersized/supersized.3.2.7.min.js"></script>
<script src="<?=base_url();?>assets/vendor/supersized/supersized-init.js"></script>
</body>
</html>