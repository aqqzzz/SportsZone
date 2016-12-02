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
                    <div class="col-md-3 com-sm-2 nav">
                        <div class="card hidden-xs hidden-sm">
                            <img class="card-img-top img-responsive" src="<?php echo $userInfo->avatar?>" alt="Card image cap">
                            <div class="card-block user-information">
                                <h4 class="card-title"><?php echo $userInfo->username?></h4>
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
                                <li class="list-group-item"><a type="button" data-toggle="modal" data-target="#myModal" class="create-btn"><i class="fa fa-pencil-square-o">发布动态</i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">有什么新鲜事想和大家分享</h4>
                            </div>
                            <div class="modal-body">
                                <textarea class="form-control" rows="5" id="news-content" name="news-content"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                <button type="button" class="btn btn-primary" id="release-bttn">发布</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>


                <div class="col-md-9 col-sm-9 user-message-box">
                    <div class="credit-message">
                        <p>有什么新鲜事想告诉大家</p>
                        <hr>

                        <textarea class="form-control" rows="5" id="news-content" name="news-content"></textarea>
                        <button class="btn btn-default" id="release-bttn" name="submit">发布</button>

                    </div>
                    <?php foreach ($newsInfo as $item):?>
                        <div id="user-message-box">
                            <div class="message-item">
                                <div class="message-header">

                                    <img src="<?php echo $item->avatar?>" class="img-circle">
                                    <p class="user-name"><?php echo $item->username?><br><?php echo $item->reltime?></p>
                                </div>
                                <div class="message-content">
                                    <?php echo $item->content?>;
                                </div>
                                <div class="message-comment">
                                    <ul class="nav nav-tabs nav-justified">
                                        <li><a href="#"><i class="fa fa-thumbs-o-up"></i>点赞</a></li>
                                        <li><a href="#"><i class="fa fa-comment-o"></i>评论</a></li>
                                    </ul>

                                </div>
                                <div class="message-favor">
                                    <i class="fa fa-thumbs-up"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    <?php endforeach;?>



                </div>


            </div>
        </div>


    </div>


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

<script type="text/javascript">
    $(document).ready(function(){
       $(".credit-message #release-bttn").unbind("click").click(function(){
           var content = $(".credit-message #news-content").val();
           var user = <?php echo $userid?>;

           if(content==null){

           }

           $.ajax({
               type:"POST",
               url:"<?php echo site_url()."community/create_news/"?>"+user+"/"+content,
               dataType:'json',
               data:{userid:user,content:content},
               success:function(result){
                   if(result){


                       var news_item='<div class="message-item">'+
                           '<div class="message-header"> ' +
                           '<img src="'+result.result_array[0].avatar+'" class="img-circle"> ' +
                           '<p class="user-name">'+result.result_array[0].username+'<br>'+result.result_array[0].reltime+'</p> ' +
                           '</div> ' +
                           '<div class="message-content"> ' +
                           result.result_array[0].content+
                           '</div> ' +
                           '<div class="message-comment"> ' +
                           '<ul class="nav nav-tabs nav-justified"> ' +
                           '<li><a href="#"><i class="fa fa-thumbs-o-up"></i>点赞</a></li> ' +
                           '<li><a href="#"><i class="fa fa-comment-o"></i>评论</a></li> ' +
                           '</ul> ' +
                           '</div> ' +
                           '<div class="message-favor"> ' +
                           '</div> ' +
                           '</div>';
                       $("#user-message-box").prepend(news_item);
                   }
               }
           });
       })

        $("#myModal #release-bttn").on('click',function(){
            var content = $("#myModal .modal-body textarea").val();
            var user = <?php echo $userid?>;

            $("#myModal").modal('hide');
            $.ajax({
                type:"POST",
                url:"<?php echo site_url()."community/create_news/"?>"+user+"/"+content,
                dataType:'json',
                data:{userid:user,content:content},
                success:function(result){
                    if(result){
                        var news_item='<div class="message-item">'+
                            '<div class="message-header"> ' +
                            '<img src="'+result.result_array[0].avatar+'" class="img-circle"> ' +
                            '<p class="user-name">'+result.result_array[0].username+'<br>'+result.result_array[0].reltime+'</p> ' +
                            '</div> ' +
                            '<div class="message-content"> ' +
                            result.result_array[0].content+
                            '</div> ' +
                            '<div class="message-comment"> ' +
                            '<ul class="nav nav-tabs nav-justified"> ' +
                            '<li><a href="#"><i class="fa fa-thumbs-o-up"></i>点赞</a></li> ' +
                            '<li><a href="#"><i class="fa fa-comment-o"></i>评论</a></li> ' +
                            '</ul> ' +
                            '</div> ' +
                            '<div class="message-favor"> ' +
                            '</div> ' +
                            '</div>';
                        $("#user-message-box").prepend(news_item);

                        $(".null-news").css("display","none");
                    }
                }
            });
        })
    });
</script>

</body>
</html>