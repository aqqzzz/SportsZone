
<body>
<div id="profile">
    <?php
    echo "Hello <b id='welcome'><i>".$this->session->userdata['logged_in']['username']."</i>!</b>";
    echo "<br />";
    echo "<br />";
    echo "Welcome to Admin Page";
    echo "<br />";
    echo "<br />";
    echo "Your Username is ".$this->session->userdata['logged_in']['username'];
    echo "<br />";
    ?>
    <b id="logout"><a href="<?php echo base_url()?>user_authentication/logout">Logout</a></b>
</div>
</body>
</html>
