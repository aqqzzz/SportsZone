
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
    <meta name="description" content="和运动发烧友一起开启你的运动之旅">

    <meta name="keywords" content="HTML,sports,运动">

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<body id="page-top">
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
                        <a class="page-scroll" href="#contact">Contact us</a>
                    </li>



                </ul>
        </div><!-- /.navbar-collapse-->
    </div>  <!--/.container-fluid-->
</nav>


    <header>
        <div id="home">
            <!--主页面的背景图-->
            <div class="header-content">
                <div class="header-content-inner">

                    <h1 id="homeHeading">专属于你的运动社区</h1>
                    <hr>
                    <p>和运动发烧友一起开启你的运动之旅</p>
                    <a href="#activities" class="btn btn-primary btn-xl page-scroll">发现</a>
                </div>
            </div>
        </div>

    </header>

    <section id="activities">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">我们一起运动</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond text-primary sr-icons"></i>
                        <h3>单人PK</h3>
                        <p class="text-muted">比比谁更厉害</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
                        <h3>多人竞赛</h3>
                        <p class="text-muted">一人胜利，奖品抱走</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
                        <h3>小组合作</h3>
                        <p class="text-muted">互相激励，更有干劲</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart text-primary sr-icons"></i>
                        <h3>热爱运动</h3>
                        <p class="text-muted">欢迎加入我们</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter popup-gallery">
                <div class="col-lg-4 col-sm-6">
                    <a href="<?=base_url();?>assets/images/portfolio/thumbnail/1.jpg" class="portfolio-box">
                        <img src="<?=base_url();?>assets/images/portfolio/thumbnail/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="<?=base_url();?>assets/images/portfolio/thumbnail/2.jpg" class="portfolio-box">
                        <img src="<?=base_url();?>assets/images/portfolio/thumbnail/2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="<?=base_url();?>assets/images/portfolio/thumbnail/3.jpg" class="portfolio-box">
                        <img src="<?=base_url();?>assets/images/portfolio/thumbnail/3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="<?=base_url();?>assets/singleActivity.html" class="portfolio-box">
                        <img src="<?=base_url();?>assets/images/portfolio/thumbnail/4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="singleActivity.html" class="portfolio-box">
                        <img src="<?=base_url();?>assets/images/portfolio/thumbnail/5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="singleActivity.html" class="portfolio-box">
                        <img src="<?=base_url();?>assets/images/portfolio/thumbnail/6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>更多...</h2>
                <a href="<?php echo site_url()."activity/show_all_act"?>" class="btn btn-default btn-xl sr-button">查看更多</a>
            </div>
        </div>
    </aside>



    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">联系我们</h2>
                    <hr class="primary">
                    <p>对我们的网站有改进建议？来联系我们！</p>

                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <p>182****1234</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a href="#">feedback@163.com</a></p>
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
</body>
</html>