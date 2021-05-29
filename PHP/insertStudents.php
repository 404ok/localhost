<?php
    header('content-type:text/html;charset= "utf-8"');
    /* 
        怎么拿到想要提交的页面？因为是post传入，所以数据放在$_POST数组里面
    */

    //声明一个返回的关联数组格式
    $responseData = array("code => 0","message" => "");
    // var_dump($_POST)
    //从关联数组里面把数据一个一个取出来
    $name = $_POST['name'];
    $math = $_POST['math'];
    $english = $_POST['english'];
    $chinese = $_POST['chinese'];
    //经过天龙八部连接数据库
    //1.连接数据库
    $link = mysql_connect("localhost","root","123456");
    //2.判断是否连接成功
    if(!$link){
        $responseData['code'] = 1;
        $responseData['message'] = "数据库链接失败";
        //返回到前台页面,将关联数组转为json格式字符串
        echo json_encode($responseData);
        exit;
    }
    //3.设置字符集
    mysql_set_charset("utf8");
    //4.选择数据库
    mysql_select_db("yyy");
    //5.准备sql语句进行插入操作
    //字符串 '{}'   数字{}
    $sql = "insert into students(name,math,english,chinese) values('{$name}',{$math},{$english},{$chinese})";
    //6.发送sql语句
    $res = mysql_query($sql);
    //7.判断$res
    if(!$res){
        $responseData['code'] = 2;
        $responseData['message'] = "添加学员成绩失败";
        //返回到前台页面,将关联数组转为json格式字符串
        echo json_encode($responseData);
    }else{
        $responseData['message'] = "添加学员成绩成功";
        //返回到前台页面,将关联数组转为json格式字符串
        echo json_encode($responseData);
    }
    //8.关闭数据库
    mysql_close($link);
?>