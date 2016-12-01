<!DOCTYPE html>
<html lang="en">
<?php
if (isset($this->session->userdata['logged_in'])) {
    $userid = ($this->session->userdata['logged_in']['userid']);
    $username = ($this->session->userdata['logged_in']['username']);

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
                    <a href="<?php echo base_url()?>">Home</a>
                </li>
                <li class="dropdown">
                    <a href="<?php echo site_url()."activity/show_all_act"?>" class="dropdown-toggle" data-toggle="dropdown">Activities<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo site_url()."activity/show_all_act/"."0/1"?>">单人PK</a></li>
                        <li><a href="<?php echo site_url()."activity/show_all_act/"."1/1"?>">多人竞赛</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url()."activity/show_all_act/"."2/1"?>">小组活动</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url()."activity/create_activity"?>"><i class="fa fa-plus-circle text-center"></i></a></li>
                    </ul>
                </li>
                <li id="community-nav">
                    <a class="page-scroll" href="<?php echo site_url()."community/show_com_page/".$userid?>">Community</a>
                </li>

                <li>
                    <a href="<?php echo site_url()."sports/show_sports_page/".$userid?>">Statistic</a>
                </li>

                <li>
                    <a href="<?php echo site_url()."user_authentication/login_process"?>">User</a>
                </li>

                <li>
                    <a href="<?php echo site_url()."user_authentication/logout"?>">Logout</a>
                </li>

                <li>
                    <a href="<?php echo site_url()."user_authentication/user_info_setting"?>"><i class="fa fa-cog"></i></a>
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
        <div class="header text-center">
            <div class="user-portrait">
                <img src="<?php echo $userInfo['avatar']?>" class="img-circle">

                <p class="user-name"><?php echo $userInfo['username']?></p>
                <i class="fa fa-venus"></i>
                <p>一句话介绍一下自己吧</p>
            </div>
        </div>
        <div class="user-navbar">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="<?php echo site_url()."user_authentication/show_admin_page/".$userInfo['userid']."/".$userInfo['username']?>">我的主页</a></li>
                        <li><a href="<?php echo site_url()."sports/show_sports_page/".$userid?>">我的运动</a></li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="body">
            <div class="row">
                <div class="interest">
                    <div class="col-md-3 nav">
                        <ul class="nav nav-tabs nav-justified">
                            <li><a type="button">关注</a></li>
                            <li><a href="followers.html">粉丝</a></li>
                            <li><a href="my-activities.html">活动</a></li>
                        </ul>

                        <div class="user-statistic">
                            <div class="list-group">
                                <p class="list-group-item">本周运动天数：4天</p>
                                <p class="list-group-item">本周运动量：30km</p>
                                <p class="list-group-item">本周运动消耗热量：6.8千卡</p>
                                <a href="statistic.html" class="list-group-item text-center">查看更多</a>
                            </div>
                        </div>

                        <div class="edit-message text-center" data-spy="affix" data-offset-top="820">
                            <a href="#"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                            <br><a href="create-activity.html">发布活动</a>
                        </div>

                    </div>

                    <a href="#" class="toggle-nav visible-xs" id="bars"><i class="fa fa-bars"></i></a>
                </div>




                <div class="col-md-9 col-xs-10" id="following-box">
                    <h2>我的关注</h2>

                    <?php
                    if(isset($null_message)){
                        echo "<div class='error-box'>";
                        echo $null_message;
                        echo "<a href=".site_url()."show_community";
                        echo "</div>";
                    }else if(isset($following)){
                        foreach($following as $user):?>
                            <div class="col-lg-5 col-md-5 col-sm-5 following-user">
                                <div class="image">
                                    <a href="<?php echo site_url()."user_authentication/show_admin_page/".$user->userid."/".$user->username?>">
                                        <img src="<?php echo $user->avatar?>" class="img-responsive img-circle">
                                    </a>
                                </div>
                                <div class="description">
                                    <p class="user-name"><?php echo $user->username?></p>
                                    <p class="user-description">简介：一只爱跳舞的程序猿
                                    </p>
                                </div>

                            </div>
                            
                    <?php endforeach;
                    }else if(isset($followers)){
                        foreach($followers as $user):?>
                            <div class="col-lg-5 col-md-5 col-sm-5 following-user">
                                <div class="image">
                                    <a href="<?php echo site_url()."user_authentication/show_admin_page/".$user->userid."/".$user->username?>">
                                        <img src="<?php echo $user->avatar?>" class="img-responsive img-circle">
                                    </a>
                                </div>
                                <div class="description">
                                    <p class="user-name"><?php echo $user->username?></p>
                                    <p class="user-description">简介：一只爱跳舞的程序猿
                                    </p>
                                </div>
                            </div>

                        <?php endforeach;
                    }?>


                    </div>

                </div>


            </div>
        </div>


    </div>
    <!--底部翻页-->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li>
                    <a href="#">&laquo;</a>
                </li>
                <li>
                    <a href="#" class="active">1</a>
                </li>
                <li>
                    <a href="#">2</a>
                </li>
                <li>
                    <a href="#">3</a>
                </li>
                <li>
                    <a href="#">4</a>
                </li>
                <li>
                    <a href="#">5</a>
                </li>
                <li>
                    <a href="#">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
    <!--翻页结束-->

</section>





<script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>

<script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="http://cdn.hcharts.cn/highcharts/highcharts.js"></script>
<script src="http://cdn.hcharts.cn/highcharts/modules/exporting.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?=base_url();?>assets/vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="<?=base_url();?>assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>


<script type="text/javascript" src="<?=base_url();?>assets/js/scripts.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var session_user = <?php echo $userid?>;
        var page_user = <?php echo $userInfo['userid']?>;
        var follow_text="我的关注";
        var follower_text="我的粉丝";

        if(session_user==page_user){
            $('#img-ref .project-category').html("设置");
            $('#img-ref a').attr("href","<?php echo site_url()."user_authentication/user_info_setting"?>");
            $("#user-nav a").attr("href","#content");
            $("#user-nav").attr("class","active");
            $("#community-nav").attr("class","");


        }else{
            $('#img-ref .project-category').html("关注");
            $('.user-navbar .row #main-page').html("Ta的主页");
            $('.user-navbar .row #sport').html("Ta的运动");

            $('.edit-message').css("display","none");

            $("#user-nav a").attr("href","<?php echo site_url()."user_authentication/login_process"?>");
            $("#community-nav a").attr("href","#");
            $("#community-nav a").attr("class","page-scroll");
            $("#user-nav a").attr("class","");

            follow_text="Ta的关注";
            follower_text="Ta的粉丝";
//            $('#img-ref a').attr("href","<?php //echo site_url()."user_authentication/user_info_setting"?>//");
        }

    });
</script>
</body>
</html>