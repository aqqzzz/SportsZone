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
                    <a href="<?php echo site_url()."user_authentication/logout"?>">Logout</a>
                </li>

                <li>
                    <a href="<?php echo site_url()."user_authentication/user_info_setting"?>"><i class="fa fa-cog"></i></a>
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
                    <h2>举报</h2>
                    <hr>
                        <a type="button" class="list-group-item report-list active" id="t-1" myid="1">举报列表</a>
                    <h2>竞赛</h2>
                    <hr>
                    <!--                    <a href="--><?php //echo site_url()."activity/show_all_act/0/1"?><!--" class="list-group-item total-act" id="t0">单人PK</a>-->
                    <a type="button" class="list-group-item total-act" id="t0" myid="1">单人PK</a>
                    <a type="button" class="list-group-item total-act" id="t1" myid="1">多人竞赛</a>
                    <h2>接力</h2>
                    <hr>
                    <a type="button" class="list-group-item total-act" id="t2" myid="1">小组活动</a>
                </div>

                <div class="visible-sm visible-xs">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#">单人PK</a></li>
                        <li><a href="#">多人竞赛</a></li>
                        <li><a href="#">小组活动</a></li>

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
                <div id="null-message">
                    <?php if(isset($null_message)){
                        echo "<div class='text-center' style='padding:200px'>";
                        echo $null_message;
                        echo "</div>";
                    ?>
                </div>

                <?php }else{?>
                <section id="act-content">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <h3>待审核活动列表</h3>
                            <hr>
                            <thead>
                                <tr>
                                        <th>举报编号</th>
                                        <th>活动编号</th>
                                        <th>活动名称</th>
                                        <th>举报者</th>
                                        <th>举报理由</th>
                                        <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php foreach($reportInfo as $item):?>
                                <tr type="button">
                                    <td><?php echo $item['reportid']?></td>
                                    <td><?php echo $item['actid']?></td>
                                    <td><?php echo $item['actname']?></td>
                                    <td><?php echo $item['username']?></td>
                                    <td><?php echo $item['reason']?></td>
                                    <td><button class="btn btn-primary ignore">忽略</button></td>
                                </tr>
                            <?php endforeach;?>



                            </tbody>
                        </table>
                    </div>
                </section>
                <?php }?>



            </div>

            <!--底部翻页-->
            <div class="row text-center">
                <div class="col-lg-12">
                    <ul class="pagination">
                        <li>
                            <a type="button" class="total-act" id="t<?php echo $actType?>" myid="<?php echo ($current_page-1)?>" >&laquo;</a>
                        </li>
                        <?php
                        for($i=1; $i<=$page_num; $i++){

                            echo "<li>";
                            echo "<a type='button' class='total-act' id='t$actType' myid='$i'>";
                            echo $i;
                            echo "</a>";
                            echo "</li>";
                        }

                        ?>
                        <li>
                            <a type="button" class="total-act" id="t<?php echo $actType?> myid="<?php echo ($current_page+1)?>">&raquo;</a>
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
        var userid=<?php echo $userid?>;
        var type_array = ['单人PK','多人竞赛','小组活动'];
        reloadActByType(type_array);
        loadMyAct(userid,type_array);
        loadMyCreateAct(userid,type_array);

        reloadReportList();

        addTableListener();
    })

    function reloadActByType(type_array){
        $(".total-act").unbind('click').click(function(){


            var type=$(this).attr("id");
            var page=$(this).attr("myid");


            switch(type){
                case "t0":type=0;break;
                case "t1":type=1;break;
                case "t2":type=2;break;
                default: type=-1;break;
            }

            //点击不同的竞赛类型，应该使用ajax发送请求
            $.ajax({
                type:"GET",
                url:"<?php echo site_url()."activity/get_all_act/"?>"+type+"/"+page,
                dataType:'json',
                data:{type:type,page_num:page},
                success: function(result){

                    if(result){

                        reload(result,type_array,type,page);

                    }
                }
            });



        });
    }

    function loadMyAct(userid,type_array){
        $(".my-activity#parti").unbind('click').click(function(){
            var page=$(this).attr("myid");
            $.ajax({
                type:"GET",
                url:"<?php echo site_url()."activity/get_act_by_user/"?>"+userid+"/"+page+"/6",
                dataType:'json',
                data:{userid:userid},
                success:function(result){
                    if(result){
                        reload(result,type_array,-1,1);
                    }
                }
            });
        });
    }

    function loadMyCreateAct(userid,type_array){
        $(".my-activity#create").unbind('click').click(function(){
            var page=$(this).attr("myid");
            $.ajax({
                type:"GET",
                url:"<?php echo site_url()."activity/get_act_by_author/"?>"+userid+"/"+page+"/6",
                dataType:'json',
                data:{userid:userid},
                success:function(result){
                    if(result){
                        reload(result,type_array,-1,1);
                    }
                }
            });
        });
    }

    function reload(result,type_array,type,page){
        $('#act-content').html('');
        var item;
        var body="";
        $.each(result['actInfo'],function(n,value){

            var elem = '<div class="col-sm-6 col-md-6 portfolio-box">' +
                '<a href="<?php echo site_url()."activity/get_single_act/"?>'+value.activityid+'"> ' +
                '<img class="img-responsive img-hover" src='+value.des_image+' alt='+value.activityname+'>'+
                '</a> ' +
                '<h3> ' +
                '<a href="<?php echo site_url()."activity/get_single_act/"?>'+value.activityid+'">'+value.activityname+'</a> ' +
                '</h3> ' +
                '<p class="act-type"> ' +type_array[value.type]+
                '</p> ' +
                '<p class="des-content"> ' +value.description+
                '</p> ' +
                '<button class="btn btn-primary"; id="查看详情" onclick=\'window.location="<?php echo site_url()."activity/get_single_act/"?>'+value.activityid+'"\'>查看详情</button>' +
                '</div>';
            body+=elem;
        });
        $('#act-content').append(body);

        $(".report-list").removeClass("active");
        $("#null-message").css("display:none");

        var origin_a_class="list-group-item total-act";
        for(var i = 0; i <= 2; i++){
            if(i!=type){
                $("#guiding #t"+i).attr("class",origin_a_class);
            }else{
                var new_class=origin_a_class+" active";
                $("#guiding #t"+i).attr("class",new_class);
            }
        }





        var origin_pag_class="total-act";

        var pages =  result['total_nums'];
//        var pages=1;

        var pagination = "";
        $(".pagination").html("");

        $(".pagination").append('<li><a type="button" class="total-act" id="t"'+type+' myid="'+(page-1)+'" >&laquo;</a></li>');
        for(i = 1; i <= pages; i++){
            var tem = "<li><a type='button' class='total-act' id='t'"+type+" myid='"+i+"'>"+i+"</a></li>";
            pagination+=tem;
            $(".pagination").append(tem);
            if(i!=page){
                $(".pagination a[myid="+i+"]").attr("class",origin_pag_class);
            }else{
                var new_pag_class=origin_pag_class+" active";
                $(".pagination a[myid="+i+"]").attr("class",new_pag_class);
            }
        }

        $(".pagination").append('<li><a type="button" class="total-act" id="t"'+type+' myid="'+(page+1)+'" >&raquo;</a></li>');


    }

    function reloadReportList(){
        $(".report-list").unbind('click').click(function () {
            $(".report-list").addClass("active");

            $("#guiding .total-act").removeClass("active");

            $.ajax({
               type:"GET",
                url:"<?php echo site_url()."/activity/get_all_report"?>",
                dataType:'json',
                success:function(result){
                    if(result){
                        $("#act-content").html("");

                        var header = $('<div class="table-responsive"> ').appendTo("#act-content");
                        var caption = $('<h3>待审核活动列表</h3>').appendTo(header);
                        var hr = $('<hr>').appendTo(header);
                        var table = $('<table class="table table-hover table-striped"> ').appendTo(header);


                        var thead = $('<thead>').appendTo(table);
                        var headContent = $('<tr> ' +
                                '<th>举报编号</th>'+
                            '<th>活动编号</th> ' +
                            '<th>活动名称</th> ' +
                            '<th>举报者</th> ' +
                            '<th>举报理由</th> ').appendTo(thead);

                        var tbody = $('<tbody>').appendTo(table);

                        $.each(result,function(n,value){

                            var elem='<tr> ' +
                                '<td>'+value.reportid+'</td>'+
                                '<td>'+value.actid+'</td> ' +
                                '<td>'+value.actname+'</td> ' +
                                '<td>'+value.username+'</td> '+
                                '<td>'+value.reason+'</td> ' +
                                '</tr>';
                            tbody.append(elem);
                        })

                        addTableListener();


                    }
                }
            });
        });
    }

    function addTableListener(){
        $('table tbody tr').on('click', function () {
            var activityid = $(this).find('td:eq(1)').text();
            window.location="<?php echo site_url()."activity/get_single_act/"?>"+activityid;

        } );

        $("tr").hover(
            function () {
                $(this).addClass("hover");
            },
            function () {
                $(this).removeClass("hover");
            }
        );

//        $('table').on('click','.ignore',function(){
//            event.stopPropagation();
//
//            $(this).closest ('tr').remove ();
//        })

        //不能真正删除，只能删掉界面上的
        $('table tbody tr .ignore').on('click',function(){
           event.stopPropagation();
            $(this).closest('tr').remove();

            alert(reportid);
            $.ajax({
                type:"POST",
                url:"<?php echo site_url()."activity/delete_report/"?>"+reportid,
                dataType:'json',
                data:{reportid:reportid},

            });
        });

    }
</script>
</body>
</html>