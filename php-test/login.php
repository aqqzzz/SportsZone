<html>
<head>用户登录</head>
<form name="loginForm" method="post" action="login.php" onsubmit="return InputCheck(this)">
    <p>
        <label for="username" class="label">用户名：</label>
        <input id="username" name="username" type="text" class="input" />
    </p>
    <p>
        <label for="password" class="label">密  码：</label>
        <input id="password" name="password" type="password" class="input" />
    </p>
    <p>
        <input type="submit" name="submit" value=" 登录 " class="left" />
    </p>
</form>
</html>

<?php
    header("Content-Type: text/html; charset=utf-8");
    //登录
    if(!isset($_POST['submit'])){
        exit('非法访问！');
    }
    $username = htmlspecialchars($_POST['username']);
    $password = md5($_POST['password']);

    //包含数据库链接文件
    include('conn.php');

    $sql=<<<EOF
        SELECT * from COMPANY;
EOF;

$ret = $db->query($sql);
$row = $ret->fetchArray(SQLITE3_ASSOC);
//检测用户名及密码是否正确

if(($row['username']==$username)&&($row['password']==$password)){
    //登陆成功
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $row['userid'];
    echo $username, '欢迎你！进入<a href="my.php">用户中心</a><br />';
    echo '点击此处 <a href="login.php?action=logout">注销</a> 登录！<br />';

    $db->close();
}else {
    exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a>重试');

}

//注销登录
if($_GET['action']=="logout"){
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    echo '注销登录成功！点击此处<a href=login.php">登录</a>';
    exit;
}
?>
