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
                    <a href="logout">Logout</a>
                </li>

                <li>
                    <a href="<?php echo site_url()."user_authentication/user_info_setting/".$username?>"><i class="fa fa-cog"></i></a>
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
                <div class="portfolio-box">
                    <a href="<?=base_url();?>assets/images/users/6.jpg">
                        <img src="<?=base_url();?>assets/images/users/6.jpg" class="img-circle" alt="avator">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category">
                                    设置
                                </div>
                                <div class="project-name">

                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <br>
                <p class="user-name"><?php echo $username?></p>
                <i class="fa fa-venus"></i>
                <p>一句话介绍一下自己吧</p>

            </div>
        </div>
        <div class="user-navbar">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="user.html">我的主页</a></li>
                        <li><a href="statistic.html">我的运动</a></li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="body">
            <div class="row interest">
                <div class="col-md-3">
                    <ul class="nav nav-tabs nav-justified">
                        <li><a href="following.html">关注</a></li>
                        <li><a href="#">粉丝</a></li>
                        <li><a href="my-activities.html">活动</a></li>
                    </ul>

                    <!--<div class="user-information">
                        <div class="list-group">
                            <p class="list-group-item"><i class="fa fa-certificate"></i>等级：10级</p>
                            <p class="list-group-item"><i class="fa fa-map-marker"></i>地点：江苏 南京</p>
                            <p class="list-group-item"><i class="fa fa-file-text-o"></i>简介：爱跳舞的程序猿</p>
                            <p class="list-group-item"><i class="fa fa-universal-access"></i>兴趣：跑步 瑜伽</p>
                            <p class="list-group-item text-center">查看更多</p>
                        </div>
                    </div>-->
                    <div class="user-intCircle">
                        <!--第二版功能完善-->
                    </div>

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



                <div class="col-md-9 col-xs-10 user-message-box">
                    <div class="message-item">
                        <div class="message-header">
                            <img src="<?=base_url();?>assets/images/users/6.jpg" class="img-circle">
                            <p class="user-name"><?php echo $username?><br>10月19日 20:11</p>
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
                            <img src="<?=base_url();?>assets/images/users/1.jpg" class="img-circle">
                            <img src="<?=base_url();?>assets/images/users/2.jpg" class="img-circle">
                            <img src="<?=base_url();?>assets/images/users/3.jpg" class="img-circle">
                            <img src="<?=base_url();?>assets/images/users/4.jpg" class="img-circle">
                            <img src="<?=base_url();?>assets/images/users/5.jpg" class="img-circle">
                            <img src="<?=base_url();?>assets/images/users/4.jpg" class="img-circle">
                            <img src="<?=base_url();?>assets/images/users/3.jpg" class="img-circle">
                            <img src="<?=base_url();?>assets/images/users/2.jpg" class="img-circle">
                            <img src="<?=base_url();?>assets/images/users/1.jpg" class="img-circle">
                            <img src="<?=base_url();?>assets/images/users/2.jpg" class="img-circle">
                            <img src="<?=base_url();?>assets/images/users/3.jpg" class="img-circle">
                            <img src="<?=base_url();?>assets/images/users/4.jpg" class="img-circle">
                            <img src="<?=base_url();?>assets/images/users/4.jpg" class="img-circle">
                            <img src="<?=base_url();?>assets/images/users/4.jpg" class="img-circle">
                            <img src="<?=base_url();?>assets/images/users/4.jpg" class="img-circle">
                            <img src="<?=base_url();?>assets/images/users/4.jpg" class="img-circle">
                            <img src="<?=base_url();?>assets/images/users/4.jpg" class="img-circle">
                            <img src="<?=base_url();?>assets/images/users/4.jpg" class="img-circle">
                        </div>
                    </div>

                    <div class="message-item">
                        <div class="message-header">
                            <img src="<?=base_url();?>assets/images/users/6.jpg" class="img-circle">
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
                            <img src="<?=base_url();?>assets/images/users/6.jpg" class="img-circle">
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
                            <img src="<?=base_url();?>assets/images/users/6.jpg" class="img-circle">
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
                            <img src="<?=base_url();?>assets/images/users/6.jpg" class="img-circle">
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
                            <img src="<?=base_url();?>assets/images/users/6.jpg" class="img-circle">
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
                            <img src="<?=base_url();?>assets/images/users/6.jpg" class="img-circle">
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
                            <img src="<?=base_url();?>assets/images/users/6.jpg" class="img-circle">
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




<script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>

<script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?=base_url();?>assets/vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="<?=base_url();?>assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>


<script type="text/javascript" src="<?=base_url();?>assets/js/scripts.js"></script>
</body>
</html>