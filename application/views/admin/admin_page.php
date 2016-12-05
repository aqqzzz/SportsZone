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
                <div class="portfolio-box" id="img-ref">
                    <a href="<?php echo site_url()."user_authentication/show_admin_page/".$userInfo['userid']."/".$userInfo['username']?>">
                        <img src="<?php echo $userInfo['avatar']?>" class="img-circle" alt="avator">
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
                <p class="user-name"><?php echo $userInfo['username']?></p>
                <i class="fa fa-venus"></i>
                <p>一句话介绍一下自己吧</p>

            </div>
        </div>
        <div class="user-navbar">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#" id="main-page">main</a></li>
                        <li><a href="<?php echo site_url()."sports/show_sports_page/".$userInfo['userid']?>" id="sport">sport</a></li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="body">
            <div class="row interest">
                <div class="col-md-3">
                    <ul class="nav nav-tabs nav-justified">
                        <li><a type="button" id="following">关注</a></li>
                        <li><a type="button" id="followers">粉丝</a></li>
                        <li><a type="button" id="my-act">活动</a></li>
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
                            <p class="list-group-item">本周运动天数：<?php echo $weekOverview['days']?>天</p>
                            <p class="list-group-item">本周运动量：<?php echo $weekOverview['distance']?>km</p>
                            <p class="list-group-item">本周运动消耗热量：<?php echo $weekOverview['calories']?>千卡</p>
                            <a href="<?php echo site_url()."sports/show_sports_page/".$userInfo['userid']?>" class="list-group-item text-center">查看更多</a>
                        </div>
                    </div>

                    <div class="edit-message text-center" data-spy="affix" data-offset-top="820">
                        <a type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o fa-2x"></i></a>
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
                                <button type="button" class="btn btn-primary" id="release-bttn">提交更改</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

                <div class="col-md-9 col-xs-10 user-message-box">
                    <?php if(isset($newsInfo)){?>
                        <?php foreach ($newsInfo as $item):?>
                            <div id="message-content-box">
                                <div class="message-item">
                                    <div class="message-header">

                                        <img src="<?php echo $userInfo['avatar']?>" class="img-circle">
                                        <p class="user-name"><?php echo $userInfo['username']?><br><?php echo $item['reltime']?></p>
                                    </div>
                                    <div class="message-content">
                                        <?php echo $item['content']?>;
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
                    <?php }else{?>

                        <div class="null-news" style="display:none">
                            <p>
                                <?php if(isset($null_news)) {
                                    echo $null_news;
                                }?>
                            </p>

                        </div>
                    <?php }?>

                </div>
                <div class="user-follow col-md-9 col-xs-10" id="following-box" style="display: none">

                </div>
                <div class="user-act col-md-9 col-xs-10" id="my-activity-box" style="display:none"></div>



            </div>
        </div>


    </div>


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
    $(function(){
        var session_user = <?php echo $userid?>;
        var page_user = <?php echo $userInfo['userid']?>;
        var follow_text="我的关注";
        var follower_text="我的粉丝";
        var activity_text = "我的活动";
        var sports_text = "我的运动";

        if(session_user==page_user){

            $('.user-navbar .row #main-page').html("我的主页");
            $('.user-navbar .row #sport').html("我的运动");

            $('#img-ref .project-category').html("设置");
            $('#img-ref a').attr("href","<?php echo site_url()."user_authentication/user_info_setting"?>");

            $("#user-nav").attr("class","active");
            $("#community-nav").attr("class","");


        }else{

            appendFollowListener(session_user,page_user);

            $('.user-navbar .row #main-page').html("Ta的主页");
            $('.user-navbar .row #sport').html("Ta的运动");

            $('.edit-message').css("display","none");

            $("#user-nav a").attr("href","<?php echo site_url()."user_authentication/login_process"?>");

            $("#community-nav a").attr("class","page-scroll");
            $("#user-nav a").attr("class","");

            follow_text="Ta的关注";
            follower_text="Ta的粉丝";
            activity_text="Ta的活动";
            sports_text="Ta的运动";
//            $('#img-ref a').attr("href","<?php //echo site_url()."user_authentication/user_info_setting"?>//");
        }

        $(".nav #following").click(function() {
//            window.location="<?php //echo site_url()."user_authentication/show_follow_page/"?>//"+page_user+"/"+0;
            $(".user-message-box").css("display","none");
            $(".user-act#my-activity-box").css("display","none");

            $(".user-follow#following-box").html("");

            $.ajax({
                type:"GET",
                url:"<?php echo site_url()."user_authentication/get_all_followings/".$userInfo['userid']?>",
                dataType:'json',
                data:{userid:page_user},
                success:function(result){
                    if(result){

                        $(".user-follow#following-box").css("display","block");
                        var header="<h3>"+follow_text+"</h3>";
                        $(".user-follow#following-box").append(header);

                        if(result['null_message']!=null){

                            $(".null-news").html("<p>"+result['null_message']+"</p>");
                            $(".null-news").css("display","block");
                        }else{


                            $.each(result['following'],function(n,value){
                                var output_text='<div class="col-lg-5 col-md-5 col-sm-5 following-user">'+
                                    '<div class="image">'+
                                    '<a href="<?php echo site_url()."user_authentication/show_admin_page/"?>'+value.userid+'/'+value.username+'">'+
                                    '<img src="'+value.avatar+'" class="img-responsive img-circle">'+
                                    '</a> ' +
                                    '</div> ' +
                                    '<div class="description"> ' +
                                    '<p class="user-name">'+value.username+'</p> '+
                                    '<p class="user-description">简介：一只爱跳舞的程序猿'+
                                    '</p>'+
                                    '</div> ' +
                                    '</div>';
                                $(".user-follow#following-box").append(output_text);
                            });
                        }

                    }
                }
            });<!--end of following's ajax-->
        });

        $(".nav #followers").click(function() {

            $(".user-message-box").css("display","none");
            $(".user-act#my-activity-box").css("display","none");
            $(".user-follow#following-box").html("");

            $.ajax({
                type:"GET",
                url:"<?php echo site_url()."user_authentication/get_all_followers/".$userInfo['userid']?>",
                dataType:'json',
                data:{userid:page_user},
                success:function(result){
                    if(result){

                        $(".user-follow#following-box").css("display","block");
                        var header="<h3>"+follower_text+"</h3>";
                        $(".user-follow#following-box").append(header);

                        if(result['null_message']!=null){
                            $(".null-news").html("<p>"+result['null_message']+"</p>");
                            $(".null-news").css("display","block");
                        }else{

                            $.each(result['followers'],function(n,value){
                                var output_text='<div class="col-lg-5 col-md-5 col-sm-5 following-user">'+
                                    '<div class="image">'+
                                    '<a href="<?php echo site_url()."user_authentication/show_admin_page/"?>'+value.userid+'/'+value.username+'">'+
                                    '<img src="'+value.avatar+'" class="img-responsive img-circle">'+
                                    '</a> ' +
                                    '</div> ' +
                                    '<div class="description"> ' +
                                    '<p class="user-name">'+value.username+'</p> '+
                                    '<p class="user-description">简介：一只爱跳舞的程序猿'+
                                    '</p>'+
                                    '</div> ' +
                                    '</div>';
                                $(".user-follow#following-box").append(output_text);
                            });
                        }

                    }
                }
            });
        });

        var type_array = ['单人PK','多人竞赛','小组活动'];
        loadMyAct(page_user,type_array,activity_text);

        $(".message-comment #favor").click(function(){
            var person="<img src='<?php echo $this->session->userdata['logged_in']['avatar']?>' class='img-circle'>";
            $(".message-favor").append(person);
        })

        appendCreateActListener();


    });

    function appendFollowListener(session_user,page_user){

        $.ajax({
            type:"GET",
            url:"<?php echo site_url()."user_authentication/is_following/"?>"+session_user+"/"+page_user,
            dataType:'json',
            data:{userid:session_user, followid:page_user},
            success:function(is_following){
                if(is_following){
                    $('#img-ref .project-category').html("取消关注");
                }else{
                    $('#img-ref .project-category').html("关注");
                }
                $('#img-ref .project-category').unbind("click").click(function(){
                    if(is_following){
                        $('#img-ref .project-category').html("取消关注");
                        $.ajax({
                            type:"POST",
                            url:"<?php echo site_url()."user_authentication/unfollow/"?>"+session_user+"/"+page_user,
                            dataType:'json',
                            data:{userid:session_user,unfollowid:page_user},
                            success:function(result){
                                if(result){
                                    alert("成功取消关注");
                                    $('#img-ref .project-category').html("关注");
                                }
                            }
                        });

                    }else{
                        $('#img-ref .project-category').html("关注");
                        $.ajax({
                            type:"POST",
                            url:"<?php echo site_url()."user_authentication/follow/"?>"+session_user+"/"+page_user,
                            dataType:'json',
                            data:{userid:session_user,unfollowid:page_user},
                            success:function(result){
                                if(result){
                                    alert("成功关注");
                                    $('#img-ref .project-category').html("取消关注");
                                }
                            }
                        });

                    }

                })

            }
        });
    }

    function loadMyAct(userid,type_array,activity_text){

        $(".nav #my-act").unbind('click').click(function(){

            $(".user-message-box").css("display","none");
            $(".user-follow#following-box").css("display","none");

            $(".user-act#my-activity-box").html("");

            $(".user-act#my-activity-box").append("<h3>"+activity_text+"</h3><hr>");

//            var page=$(this).attr("myid");
            $.ajax({
                    type:"GET",
                    url:"<?php echo site_url()."activity/get_act_by_user/"?>"+userid+"/1/6",
                    dataType:'json',
                    data:{userid:userid},
                    success:function(result){
                        if(result){
                            $(".user-act#my-activity-box").css("display","block");
                            reload(result,type_array,-1,1);
                        }
                    }
                });
            });
    }

    function reload(result,type_array,type,page){

        var item;
        var body="";
        $.each(result['actInfo'],function(n,value){

            var elem = '<div class="col-lg-10 col-md-10 col-sm-10 activity-item">' +
                    '<div class="image">'+
                '<a href="<?php echo site_url()."activity/get_single_act/"?>'+value.activityid+'">'+
                '<img src='+value.des_image+' alt='+value.activityname+' class="img-responsive">'+
                '</a> ' +
                '</div>' +
                '<div class="description"> ' +
                '<h3 class="user-name">'+value.activityname+'</h3> ' +
                '<p class="act-type"> ' +type_array[value.type]+
                '</p> ' +
                '<p class="user-description">' +value.description+
                '</p> ' +
                '</div>'+
                '<button class="btn btn-primary"; id="more-info" onclick=\'window.location="<?php echo site_url()."activity/get_single_act/"?>'+value.activityid+'"\'>查看详情</button>'+
                '</div>';
            body+=elem;
        });
        $('.user-act#my-activity-box').append(body);


    }

    function appendCreateActListener(){
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
                        $(".user-message-box").prepend(news_item);

                        $(".null-news").css("display","none");
                    }
                }
            });
        })


    }




</script>
</body>
</html>