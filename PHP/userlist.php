<?php
    header('content-type:text/html;charset= "utf-8"');
    //对接数据库
    //1.连接数据库
    $link = mysql_connect("localhost","root","123456");
    //2.判断是否连接成功
    if(!$link){
        //直接报错
        echo "数据库连接失败";
        exit;
    }
    //3.设置字符集
    mysql_set_charset("utf8");
    //4.选择数据库
    mysql_select_db("yyy");
    //5.准备sql
    $sql = "select * from users";
    //发送sql语句
    $res = mysql_query($sql);
    //声明一个空数组
    $arr = array();
    //将每一行数据逐个取出来，并将其插入到空数组里面
    while($row = mysql_fetch_assoc($res)){
        array_push($arr,$row);
    }
    echo json_encode($arr);//转成json格式字符串
    //关闭数据库
    mysql_close($link);

?>