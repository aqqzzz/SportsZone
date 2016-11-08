<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>网页计算器</title>
    <style type="text/css">
        #calculators {
            margin: 10% auto;
            width: 430px;
            border: 1px solid #000;
        }
    </style>
</head>

<body>
<div id="calculators">
    <?php
    //从控制器接受数据并对数据进行操作
    if(is_numeric($num1) && is_numeric($num2) && $op && $result && $result!=FALSE){
        echo $num1." ".$op." ".$num2." = ".$result."<br />";
    }else {
        echo "计算错误<br />";
    }
    ?>
    <a href="/CodeIgniter-3.1.2">返回首页</a>
</div>
</body>
</html>