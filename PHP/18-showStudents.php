<?php

    /* 
        PHP可以和HTML混编
    */

    header('content-type:text/html;charset= "utf-8"');
    //连接数据库    8部 天龙八部
    //1.连接数据库
    /* 
        第一个参数：链接数据库的IP/域名(localhost,本地)
        第二个参数：用户名：root
        第三个参数：密码
        会返回一个值(true/false)
    */
    $link = mysql_connect("localhost","root","123456");
    //2.判断是否连接成功
    if(!$link){
         echo "连接失败";
         exit;//终止后续所有操作
    }
    //3.设置字符集
    mysql_set_charset("utf8");
    //4.选择数据库
    mysql_select_db("yyy");

    //5.准备sql语句
    $sql = "select * from students";

    //6.发送sql语句
    $res = mysql_query($sql);
    var_dump($res);

    //7.处理结果集  函数
    while($row = mysql_fetch_assoc($res)){
        var_dump($row);
    }
    //8.关闭数据库
    mysql_close($link);
?>