<?php

/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/2 0002
 * Time: 17:16
 */
//php创建数据库
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('sqlite3.db');
    }

}
$db=new MyDB();
if(!$db){
    echo $db->lastErrorMsg();
}else{
    echo "Opened database successfully\n";
}

//php创建表
$sql=<<<EOF
    CREATE TABLE COMPANY
    (userid INT PRIMARY KEY NOT NULL,
     username           TEXT NOT NULL,
     password           TEXT  NOT NULL,);
EOF;

$ret = $db->exec($sql);
if(!$ret){
    echo $db->lastErrorMsg();
}else {
    echo "Table created successfully\n";
}

//php插入数据
$sql2=<<<EOF
    INSERT INTO COMPANY (userid, username, password)
    VALUES(1, 'popy32', $(MD5("popy32")));
EOF;

$ret = $db->exec($sql2);
if(!$ret){
    echo $db->lastErrorMsg();
}else{
    echo "Insert data successfully\n";
}
$db->close;
?>


