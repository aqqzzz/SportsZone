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
<body id="single-activity">

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
                    <a class="page-scroll" href="index.html">
                        <i class="fa fa-home visible-xs" ></i>Home</a>
                </li>
                <li class="dropdown">
                    <a href="activity.html" class="dropdown-toggle" data-toggle="dropdown">Activities<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">单人PK</a></li>
                        <li><a href="#">多人竞赛</a></li>
                        <li class="divider"></li>
                        <li><a href="#">小组活动</a></li>
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

            <h1 id="activityHeading">生命不息，运动不止</h1>
        </div>
    </div>
</header>

<section id="activity-info">
    <div class="container">
        <h1><?php echo $actInfo['activityname']?></h1>
        <span class="button_panel">
            <button class="btn btn-default" id="create"><i class="fa fa-plus-circle fa-2x"></i>创建活动</button>
        </span>




        <ol class="breadcrumb">
            <li><a href="<?php echo site_url()."welcome"?>">首页</a></li>
            <li><a href="<?php echo site_url()."activity/show_all_act/-1/1"?>">活动</a></li>
            <li><a href="<?php echo site_url()."activity/show_all_act/".$actInfo['type']."/1"?>">
                    <?php
                    $type = $actInfo['type'];
                    switch($type){
                        case 0:echo '单人PK';break;
                        case 1:echo '多人竞赛';break;
                        case 2:echo  '小组活动';break;
                    }
                    ?></a></li>
            <li class="active"><?php echo $actInfo['activityname']?></li>
        </ol>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <img src="<?php echo $actInfo['des_image']?>" class="img-responsive">
            </div>

            <div class="col-md-4 activity-info-box">
                <h2>活动简介</h2>
                <p><?php echo $actInfo['description']?></p>
                <div class="activity-info-nums">
                    <div id="time-show-box">
                        <i class="fa fa-calendar fa-2x"></i>
                        <span>剩余时间：00天23小时</span>
                        <br>
                        <span class="time" id="start-time"><?php echo $actInfo['start_time']?></span>至
                        <span class="time" id="end-time"><?php echo $actInfo['end_time']?></span>
                    </div>

                    <i class="fa fa-trophy fa-2x"><span>奖励：<?php echo $actInfo['bonus']?>跑币</span></i>
                </div>

            </div>
        </div>

    </div>

    <hr>
    <div class="user container-fluid">
        <div class="user-content">
            <h2>参与用户</h2>
            <div class="row" id="participaters">
                <?php isset($partiInfo)?>
                <?php foreach ($partiInfo as $user):?>
                    <div class="col-md-1 col-sm-2 col-xs-3">
                        <a type="button" class="user-info" id="<?php echo $user->userid?>" name="<?php echo $user->username?>">
                            <img src="<?php echo $user->avatar?>" class="img-responsive" alt="<?php echo $user->username?>">
                        </a>
                        <p><?php echo $user->username?></p>
                    </div>
                <?php endforeach;?>
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
<script type="text/javascript">
    $(document).ready(function(){
        var cur_id = <?php echo $userid?>;
        var author_id = <?php echo $actInfo['authorid']?>;

        if(cur_id==author_id){
            var delete_bttn = $("<button class='btn btn-default' id='delete_bttn'><i class='fa fa-trash fa-2x'></i>删除活动</button>");
            $(".button_panel").append(delete_bttn);

            var edit_bttn = $("<button class='btn btn-default' id='edit_bttn'><i class='fa fa-edit fa-2x'></i>编辑活动</button>");
            $(".button_panel").append(edit_bttn);
        }else{
            var is_parti = false;
            <?php foreach ($partiInfo as $user):?>
                if(cur_id==<?php echo $user->userid?>){
                    is_parti = true;
                }
            <?php endforeach; ?>



            if(is_parti){
                var exit_bttn = $("<button class='btn btn-default' id='exit_bttn'><i class='fa fa-sign-out fa-2x'></i>退出活动</button>");
                $(".button_panel").append(exit_bttn);
            }else{
                var parti_bttn = $("<button class='btn btn-default' id='parti_bttn'><i class='fa fa-sign-in fa-2x'></i>参加活动</button>");
                $(".button_panel").append(parti_bttn);
            }
        }

        $(document).on("click","#delete_bttn",function(){

            window.location="<?php echo site_url()."activity/delete_act/".$actInfo['actid']?>";
        });

        $(document).on("click","#edit_bttn",function(){
            window.location="<?php echo site_url()?>";
        });

        $(document).on("click","#exit_bttn",function(){
            window.location="<?php echo site_url()."activity/exit_activity/".$userid."/".$actInfo['actid']?>";
        });

        $(document).on("click","#parti_bttn",function(){
            window.location="<?php echo site_url()."activity/parti_activity/".$userid."/".$actInfo['actid']?>";
        });

        $(document).on("click",".user-info",function(){
            var userid = $(this).attr("id");
            var username = $(this).attr("name");

            window.location="<?php echo site_url()."user_authentication/show_admin_page/"?>"+userid+"/"+username;
        })
    });
</script>
</body>
</html>