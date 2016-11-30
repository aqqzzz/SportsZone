<!DOCTYPE html>
<html lang="en">
<?php
if (isset($this->session->userdata['logged_in'])) {
    $userid = ($this->session->userdata['logged_in']['userid']);
    $username = ($this->session->userdata['logged_in']['username']);

} else {
    header("location: user_authentication/login_process");
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
<body id="activity" data-spy="scroll" data-target="sidebarMenu">

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">

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
                    <a class="page-scroll" href="user.html">User</a>
                </li>

                <li>
                    <a class="page-scroll" href="#contact">Contact us</a>
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

<section id="activity-info">
    <div class="container">

        <div class="body">
            <div class="row">

                <div class="col-md-2 col-md-offset-1" id="guiding">
                    <div class="list-group hidden-sm hidden-xs">
                        <a href="#" class="list-group-item">单人PK</a>
                        <a href="#" class="list-group-item">多人竞赛</a>
                        <a href="#" class="list-group-item">小组活动</a>
                        <a href="#" class="list-group-item my-activity">我的活动</a>
                        <a href="create-activity.html" class="list-group-item active"><i class="fa fa-plus-circle"></i>创建活动</a>
                    </div>

                    <div class="visible-sm visible-xs">
                        <ul class="nav nav-tabs nav-justified">
                            <li><a href="#">单人PK</a></li>
                            <li><a href="#">多人竞赛</a></li>
                            <li><a href="#">小组活动</a></li>
                            <li class="active"><a href="create-activity.html"><i class="fa fa-plus-circle"></i>创建活动</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-10" id="create-activity-info">
                    <h1>创建活动</h1>
                    <hr>
                    <div id="activity-content">
                        <?php echo form_open("activity/create_activity")?>
                        <p><label>活动名称：</label><input type="text" class="form-control" name="act-name"></p>

                        <p><label>活动类型：</label>
                            <select class="form-control" name="act-type">
                                <option>单人PK</option>
                                <option>多人竞赛</option>
                                <option>小组活动</option>
                            </select>
                        </p>
                        <p>
                            <label>活动时间：</label>
                            <input type="date" class="form-control" name="start-time">至<input type="date" class="form-control" name="end-time">
                        </p>
                        <p><label>活动奖励：</label><input type="text" class="form-control" name="bonus">跑币</p>
                        <p><label id="ac-simple-des">活动简介：</label><textarea class="form-control" rows="5" name="act-description"></textarea>
                        </p>
                        <p><label id="des-img">封面图片</label>
                            <input type="file" id="upload-file" name="inputfile">
                            <p id="upload-show">
                            <img src="<?php echo base_url()?>assets/images/single-project.jpg" class="img-responsive"/>
                            </p>

                        </p>
                        <p class="central-sub-btn">
                            <input type="submit" class="form-control btn btn-primary" name="submit" value="发布">
                            <input type="reset" class="btn btn-default" name="cancel" value="取消">
                        </p>

                        <?php echo form_close()?>
                    </div>


                </div>


            </div>
        </div>


    </div>


</section>





<script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>

<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="http://cdn.hcharts.cn/highcharts/highcharts.js"></script>
<script src="http://cdn.hcharts.cn/highcharts/modules/exporting.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>


<script type="text/javascript" src="<?php echo base_url()?>assets/js/scripts.js"></script>
</body>
</html>
