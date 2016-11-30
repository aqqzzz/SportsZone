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
<body id="activity">

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Activities<span class="caret"></span></a>
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

<header id="home">
    <!--主页面的背景图-->
    <div class="header-content">
        <div class="header-content-inner">

            <h1 id="activityHeading">生命不息，运动不止</h1>
        </div>
    </div>
</header>



<section id="activity-info">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-md-offset-1" id="guiding">
                <div class="list-group hidden-sm hidden-xs">
                    <h2>竞赛</h2>
                    <hr>
                    <a href="<?php echo site_url()."activity/show_all_act/0/1"?>" class="list-group-item total-act" id="t0">单人PK</a>
                    <a href="<?php echo site_url()."activity/show_all_act/1/1"?>" class="list-group-item total-act" id="t1">多人竞赛</a>
                    <h2>接力</h2>
                    <hr>
                    <a href="<?php echo site_url()."activity/show_all_act/2/1"?>" class="list-group-item total-act" id="t2">小组活动</a>
                    <h2>我的</h2>
                    <hr>
                    <a href="#" class="list-group-item my-activity">我参加的</a>
                    <a href="#" class="list-group-item my-activity">我发起的</a>
                    <a href="<?php echo site_url()."activity/create_activity"?>" class="list-group-item"><i class="fa fa-plus-circle"></i>创建活动</a>
                </div>

                <div class="visible-sm visible-xs">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#">单人PK</a></li>
                        <li><a href="#">多人竞赛</a></li>
                        <li><a href="#">小组活动</a></li>
                        <li><a href="create-activity.html"><i class="fa fa-plus-circle"></i>创建活动</a></li>
                    </ul>
                </div>

            </div>




            <div class="col-sm-12 col-md-8 col-lg-8" id="portfolio-box-content">

                <section id="search" class="container">
                    <div class="search-box text-center">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <input type="text" class="form-control" placeholder="我想找...">
                                <button class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>

                        </div>

                    </div>

                </section>

                <?php foreach($actItem as $item):?>
                    <div class="col-sm-6 col-md-6 portfolio-box">
                        <a href="<?php echo site_url()."activity/get_single_act/".$item->activityid?>">
                            <img class="img-responsive img-hover" src="<?php echo $item->des_image?>" alt="<?php echo $item->activityname?>">
                        </a>
                        <h3>
                            <a href="<?php echo site_url()."activity/get_single_act/".$item->activityid?>"><?php echo $item->activityname?></a>
                        </h3>
                        <p class="act-type">
                        <?php
                            $type = $item->type;
                            if($type==0){
                                $type = '单人PK';
                            }else if($type==1){
                                $type = '多人竞赛';
                            }else if($type==2){
                                $type = '小组活动';
                            }

                            echo $type;

                        ?>
                        </p>
                        <p class="des-content">
                            <?php echo $item->description;?>
                        </p>
                        <button class="btn btn-primary" id="查看详情" onclick='window.location="<?php echo site_url()."activity/get_single_act/".$item->activityid;?>"'>查看详情</button>

                    </div>

                <?php endforeach; ?>

            </div>

            <!--底部翻页-->
            <div class="row text-center">
                <div class="col-lg-12">
                    <ul class="pagination">
                        <li>
                            <a href="<?php echo site_url()."activity/show_all_act/".$actType."/".($current_page-1);?>">&laquo;</a>
                        </li>
                        <?php
                            for($i=1; $i<=$page_num; $i++){

                                echo "<li>";
                                echo "<a href='".site_url()."activity/show_all_act/".$actType."/".$i."' id='".$i."''>";
                                echo $i;
                                echo "</a>";
                                echo "</li>";
                            }

                        ?>
                        <li>
                            <a href="<?php echo site_url()."activity/show_all_act/".$actType."/".($current_page+1);?>">&raquo;</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--翻页结束-->
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
        var currentPage = <?php echo $current_page?>;
        var pages = <?php echo $page_num?>;
        $(".pagination a#"+currentPage).attr("class","active");

        var type = <?php echo $actType?>;
        switch(type){
            case 0: type="t0";break;
            case 1: type="t1";break;
            case 2: type="t2";break;
            default: type=null;break;
        }

//        $("#guiding .total-act").click(function(){
//            if(type!=null){
//                var old_class = $("#"+type).attr("class");
//                old_class += " active";
//                $("#"+type).attr("class",old_class);
//                $("#"+type).attr("href","#");
//            }
//
//            for(var i = 1; i < pages; i++){
//                if(i!=currentPage){
//                    $(".pagination a#"+i).removeAttr("class");
//                }
//            }
            //点击不同的竞赛类型，应该使用ajax发送请求
//            $.ajax({
//                type:"GET",
//                url:<?php //echo site_url()."activity/?>"
//            });
//        });

        if(type!=null){
            var old_class = $("#"+type).attr("class");
            old_class += " active";
            $("#"+type).attr("class",old_class);
            $("#"+type).attr("href","#");
        }

        for(var i = 1; i < pages; i++){
            if(i!=currentPage){
                $(".pagination a#"+i).removeAttr("class");
            }
        }


    })
</script>
</body>
</html>