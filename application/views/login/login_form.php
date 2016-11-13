<html>
<?php
if (isset($this->session->userdata['logged_in'])){
    header("location:http://localhost/user_authentication/login_process");
}
?>
<head>
    <title>login</title>
</head>
<body>
<?php
if (isset($logout_message)){
    echo "<div class='message'>";
    echo $logout_message;
    echo "</div>";
}
?>
<?php
if(isset($message_display)){
    echo "<div class='message'>".$message_display."</div>";
}
?>
<div id="main">
    <div id="login">
        <h2>Login Form</h2>
        <?php echo form_open('user_authentication/login_process');?>
        <?php
            echo "<div class='error_message'>";
            if(isset($error_message)){
                echo $error_message;
            }
            echo validation_errors();
            echo "</div>";
        ?>
        <label>UserName :</label>
        <input type="text" name="username" id="name" placeholder="username"/><br /><br />
        <label>Password :</label>
        <input type="password" name="password" id="password" placeholder="**********"/><br/><br />
        <input type="submit" value=" Login " name="submit"/><br />
        <a href="<?php echo base_url() ?>user_authentication/show_registration">To SignUp Click Here</a>
        <?php echo form_close(); ?>
    </div>
</div>
</body>
</html>