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
    <link href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="<?php echo base_url()?>assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?php echo base_url()?>assets/css/navbar.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body id="community" data-spy="scroll" data-target="sidebarMenu">

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-nav">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="<?php echo base_url()?>">Sport Zone 运动空间</a>
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
                <li>
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

        <div class="body">
            <div class="row">
                <div class="user">
                    <div class="col-md-3 com-sm-3 nav">
                        <div class="card">
                            <img class="card-img-top img-responsive" src="<?php echo $userInfo['avatar']?>" alt="Card image cap">
                            <div class="card-block user-information">
                                <h4 class="card-title"><?php echo $userInfo['username']?></h4>
                                <p class="card-text">不爱跳舞的迷妹不是好程序猿</p>
                            </div>

                            <div class="card-block">
                                <ul class="nav nav-tabs nav-justified text-center">
                                    <li><span id="following-nums">2</span><br><a href="<?php echo site_url()."user_authentication/show_follow_page/".$userid."/0"?>">关注</a></li>
                                    <li><span id="follower-nums">3</span><br><a href="<?php echo site_url()."user_authentication/show_follow_page/".$userid."/1"?>">粉丝</a></li>
                                </ul>
                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a href="<?php echo site_url()."user_authentication/login_process"?>">我的动态</a></li>
                                <li class="list-group-item"><a href="<?php echo site_url()."sports/show_sports_page/".$userid?>">我的运动</a></li>

                            </ul>


                        </div>

                    </div>
                </div>


                <div class="col-md-9 col-sm-9 user-message-box">
                    <div class="credit-message">
                        <p>有什么新鲜事想告诉大家</p>
                        <textarea rows="5"></textarea>
                        <button class="btn btn-default">发布</button>
                    </div>
                    <div class="message-item">
                        <div class="message-header">

                            <img src="<?php echo base_url()."assets/images/users/6.jpg"?>" class="img-circle">
                            <p class="user-name">张耳朵<br>10月19日 20:11</p>
                        </div>
                        <div class="message-content">
                            这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容
                            这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容
                        </div>
                        <div class="message-comment">
                            <ul class="nav nav-tabs nav-justified">
                                <li><a href="#"><i class="fa fa-thumbs-o-up"></i>点赞</a></li>
                                <li><a href="#"><i class="fa fa-comment-o"></i>评论</a></li>
                            </ul>


                        </div>
                        <div class="message-favor">
                            <i class="fa fa-thumbs-up"></i>
                            <a href="<?php echo site_url()."user_authentication/show_admin_page/1/啊扣扣0"?>"
                            <img src="<?php echo base_url()."assets/images/users/1.jpg"?>" class="img-circle">
                            </a>
                        </div>
                    </div>

                    <div class="message-item">
                        <div class="message-header">
                            <a href="<?php echo site_url()."user_authentication/show_admin_page/1/啊扣扣0"?>">
                            <img src="<?php echo base_url()."assets/images/users/1.jpg"?>" class="img-circle">
                            </a>
                            <p class="user-name">啊扣扣0<br>10月19日 20:11</p>
                        </div>
                        <div class="message-content">
                            这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容
                            这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容
                        </div>
                        <div class="message-comment">
                            <ul class="nav nav-tabs nav-justified">
                                <li><a href="#"><i class="fa fa-thumbs-o-up"></i>点赞</a></li>
                                <li><a href="#"><i class="fa fa-comment-o"></i>评论</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="message-item">
                        <div class="message-header">
                            <img src="<?php echo base_url()."assets/images/users/6.jpg"?>" class="img-circle">
                            <p class="user-name">张耳朵<br>10月19日 20:11</p>
                        </div>
                        <div class="message-content">
                            这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容
                            这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容
                        </div>
                        <div class="message-comment">
                            <ul class="nav nav-tabs nav-justified">
                                <li><a href="#"><i class="fa fa-thumbs-o-up"></i>点赞</a></li>
                                <li><a href="#"><i class="fa fa-comment-o"></i>评论</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="message-item">
                        <div class="message-header">
                            <a href="<?php echo site_url()."user_authentication/show_admin_page/2/啊扣扣1"?>">
                            <img src="<?php echo base_url()."assets/images/users/2.jpg"?>" class="img-circle">
                            </a>
                            <p class="user-name">啊扣扣1<br>10月19日 20:11</p>
                        </div>
                        <div class="message-content">
                            这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容
                            这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容
                        </div>
                        <div class="message-comment">
                            <ul class="nav nav-tabs nav-justified">
                                <li><a href="#"><i class="fa fa-thumbs-o-up"></i>点赞</a></li>
                                <li><a href="#"><i class="fa fa-comment-o"></i>评论</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="message-item">
                        <div class="message-header">
                            <a href="<?php echo site_url()."user_authentication/show_admin_page/5/啊扣扣2"?>">
                            <img src="<?php echo base_url()."assets/images/users/3.jpg"?>" class="img-circle">
                                </a>
                            <p class="user-name">啊扣扣2<br>10月19日 20:11</p>
                        </div>
                        <div class="message-content">
                            这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容
                            这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容
                        </div>
                        <div class="message-comment">
                            <ul class="nav nav-tabs nav-justified">
                                <li><a href="#"><i class="fa fa-thumbs-o-up"></i>点赞</a></li>
                                <li><a href="#"><i class="fa fa-comment-o"></i>评论</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="message-item">
                        <div class="message-header">
                            <img src="<?php echo base_url()."assets/images/users/6.jpg"?>" class="img-circle">
                            <p class="user-name">张耳朵<br>10月19日 20:11</p>
                        </div>
                        <div class="message-content">
                            这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容
                            这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容
                        </div>
                        <div class="message-comment">
                            <ul class="nav nav-tabs nav-justified">
                                <li><a href="#"><i class="fa fa-thumbs-o-up"></i>点赞</a></li>
                                <li><a href="#"><i class="fa fa-comment-o"></i>评论</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="message-item">
                        <div class="message-header">
                            <img src="<?php echo base_url()."assets/images/users/6.jpg"?>" class="img-circle">
                            <p class="user-name">张耳朵<br>10月19日 20:11</p>
                        </div>
                        <div class="message-content">
                            这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容
                            这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容
                        </div>
                        <div class="message-comment">
                            <ul class="nav nav-tabs nav-justified">
                                <li><a href="#"><i class="fa fa-thumbs-o-up"></i>点赞</a></li>
                                <li><a href="#"><i class="fa fa-comment-o"></i>评论</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="message-item">
                        <div class="message-header">
                            <img src="<?php echo base_url()."assets/images/users/6.jpg"?>" class="img-circle">
                            <p class="user-name">张耳朵<br>10月19日 20:11</p>
                        </div>
                        <div class="message-content">
                            这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容
                            这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容这是动态内容
                        </div>
                        <div class="message-comment">
                            <ul class="nav nav-tabs nav-justified">
                                <li><a href="#"><i class="fa fa-thumbs-o-up"></i>点赞</a></li>
                                <li><a href="#"><i class="fa fa-comment-o"></i>评论</a></li>
                            </ul>
                        </div>
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



<script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>

<script src="http://cdn.hcharts.cn/highcharts/highcharts.js"></script>
<script src="http://cdn.hcharts.cn/highcharts/modules/exporting.js"></script>

<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>



<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>



<script type="text/javascript" src="<?php echo base_url()?>assets/js/scripts.js"></script>



</body>
</html>