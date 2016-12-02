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