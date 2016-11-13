<html>
<?php
if(isset($this->session->userdata['logged_in'])){
    header("location:http://localhost/user_authentication/login_process");
}
?>
    <head>
        <title>registrate</title>
    </head>
<body>
<div id="main">
    <div id="login">
        <h2>Registration Form</h2>
        <hr>
        <?php
            echo form_open('user_authentication/register_process');
            echo "<div class='error_message'>".validation_errors()."</div>";

        echo form_label('Create Username:');
        echo "<br />";
        echo form_input('username');
        echo "<div class='error_message'>";
        if(isset($message_display)){
            echo $message_display;
        }
        echo "</div>";
        echo "<br />";
        echo form_label('Password');
        echo "<br />";
        echo form_input('password');
        echo "<br />";
        echo "<br />";
        echo form_submit('submit','注册');
        echo form_close();
        ?>
        <a href="<?php echo base_url() ?>">For Login Click Here</a>

    </div>
</div>
</body>
</html>