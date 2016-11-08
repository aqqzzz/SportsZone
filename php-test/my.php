<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/2 0002
 * Time: 19:18
 */
header("Content-Type: text/html; charset=utf-8");
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.php");
    exit();
}

//包含数据库文件
include('conn.php');
$userid=$_SESSION['userid'];
$username = $_SESSION['username'];

echo '用户信息：<br />';
echo '用户ID：', $userid, '<br />';
echo '用户名：',$username, '<br />';
echo '<a href="login.php?action=logout">注销</a>登录<br />';
?>