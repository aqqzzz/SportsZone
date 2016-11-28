<!DOCTYPE html>
<html lang="en">
<?php
if (isset($this->session->userdata['logged_in'])) {
    $userid = ($this->session->userdata['logged_in']['userid']);
    $username = ($this->session->userdata['logged_in']['username']);
    $avatar = ($this->session->userdata['logged_in']['avatar']);
    $sex = ($this->session->userdata['logged_in']['sex']);
    $city = ($this->session->userdata['logged_in']['cityid']);
} else {
    header("location: login");
}
header("Content-Type: text/html; charset=utf-8");
?>
<head>
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

    <!-- Theme CSS -->
    <link href="<?=base_url();?>assets/css/index.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/navbar.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet"

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!--可以通过$this->session->userdata['logged_in']['username']来获取当前登陆的用户名-->
<body id="user" data-spy="scroll" data-target="sidebarMenu">

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-nav">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">Sport Zone 运动空间</a>
        </div>

        <!--到其他页面的导航按钮-->
        <div class="collapse navbar-collapse" id="header-nav">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="page-scroll" href="index.html">Home</a>
                </li>
                <li class="dropdown">
                    <a href="activity.html" class="dropdown-toggle" data-toggle="dropdown">Activities<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">单人PK</a></li>
                        <li><a href="#">多人竞赛</a></li>
                        <li class="divider"></li>
                        <li><a href="#">小组活动</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-plus-circle text-center"></i></a></li>
                    </ul>
                </li>
                <li>
                    <a class="page-scroll" href="community.html">Community</a>
                </li>

                <li>
                    <a class="page-scroll" href="statistic.html">Statistic</a>
                </li>

                <li>
                    <a class="page-scroll" href="#page-top">User</a>
                </li>

                <li>
                    <a id="logout" href="<?php echo site_url()."user_authentication/logout"?>">Logout</a>
                </li>

                <li class="dropdown">
                    <a href="#"  class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">编辑资料</a></li>
                        <li><a href="#">修改密码</a></li>
                    </ul>
                </li>


            </ul>
        </div><!-- /.navbar-collapse-->
    </div>  <!--/.container-fluid-->
</nav>

<header>
    <!--主页面的背景图-->
    <div class="header-content">
        <div class="header-content-inner">

        </div>
    </div>
</header>

<section id="content">
    <div class="container">

        <div class="body">
            <div class="row interest">

                <div class="user-info-setting">
                    <div class="col-md-3 dol-sm-2 col-xs-10">
                        <a href="#"><img src="<?php echo base_url()?>assets/images/users/6.jpg" class="img-responsive"></a>
                    </div>
                    <div class="col-md-9 col-sm-10 col-xs-10 setting">
                        <fieldset>
                            <legend>个人信息</legend>
                            <div id="user-info-box">

                                <p class="user-info" id="username">
                                    用户名：<span><?php echo $userInfo['username']?></span>
                                </p>
                                <p class="user-info" id="sex">
                                    性别：<span>
                                        <?php
                                        $sex = $userInfo['sex'];
                                        if($sex==null){
                                            echo "未设置";
                                        }else{
                                            echo $sex;
                                        }
                                        ?></span>
                                </p>
                                <p class="user-info" id="city">
                                    所在城市：<span>
                                        <?php
                                        $city = $userInfo['cityid'];
                                        if($city==null){
                                            echo "未设置";
                                        }else{
                                            echo $city;
                                        }?></span>
                                </p>
                                <button class="btn btn-primary" id="user-info-edit">修改</button>
                            </div>
                            <div id="user-info-edit-box" style="display:none">
                                <?php echo form_open('user_authentication/user_info_edit');
                                echo "<div class='error-message'>".validation_errors()."</div>";?>
                                <p class="user-info" id="userid" style="display: none">
                                    <input type="text" name="userid" value="<?php echo $userInfo['userid']?>" />
                                </p>
                                <p class="user-info" id="username">
                                    用户名：<input type="text" class="form-control" name="username" placeholder="<?php echo $username?>">
                                </p>
                                <p class="user-info form-group" id="sex">
                                    性别：
                                    <label class="radio-inline">
                                        <input type="radio" name="sex" value="男">男
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="sex" value="女">女
                                    </label>

                                </p>
                                <p class="user-info" id="city">
                                    所在城市：<input type="text" class="form-control" name="city">
                                </p>
                                <button class="btn btn-primary" id="cancelbttn">取消更改</button>
                                <input type="submit" class="btn btn-primary" value="保存更改" name="submit">
                                <?php echo form_close()?>
                            </div>
                        </fieldset>

                    </div>

<!--                    <div class="col-md-5 col-sm-10 col-xs-10">-->
<!--                        <fieldset>-->
<!--                            <legend>头像-->
<!--                                <button class="btn btn-primary" id="upload">上传</button></legend>-->
<!--                            <img src="--><?php //echo base_url()?><!--assets/images/users/6.jpg">-->
<!--                        </fieldset>-->
<!--                    </div>-->


                </div>


            </div>
        </div>


    </div>

</section>




<script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>

<script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?=base_url();?>assets/vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="<?=base_url();?>assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>


<script type="text/javascript" src="<?=base_url();?>assets/js/scripts.js"></script>

<script type="text/javascript">
//    $(document).ready(function(){
//        $('#user-info-edit').click(function(){
//            var user_info = $('#user-info-box');
//            var html='<form>';
//            html+="<p><label>用户名：</label><input type='text' placeholder='张耳朵' /></p>" +
//                "<p><label>性别：</label><input type='radio' name='sex' value='男' />男<input type='radio' name='sex' value='女' />女</p>" +
//                "<p><label>城市：</label><input type='text' /></p></form>";
//            user_info.html(html);
//
//        });
//    });

    $(document).ready(function(){
        $('#user-info-edit').click(function(){
            $('#user-info-box').css("display","none");
            $('#user-info-edit-box').css("display","block");
        });

        $('#cancelbttn').click(function(){
            $('#user-info-box').css("display","block");
            $('#user-info-edit-box').css("display","none");
        });

    });
</script>
</body>
</html>