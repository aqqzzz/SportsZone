<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/2 0002
 * Time: 19:21
 */
header("Content-Type: text/html; charset=utf-8");
class MyDB extends SQLite3
{
    function __construct(){
        $this->open('sqlite3.db');
    }
}
$db = new MyDB();
if(!$db){
    die("数据库访问错误".$db->lastErrorMsg());
}
?>