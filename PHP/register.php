<?php
    header('content-type:text/html;charset= "utf-8"');
    // 定一个统一的返回格式
    $responseData = array("code" => 0,"message" => "");
    //取出传过来的数据
    $username = $_POST["username"];
    $password = $_POST["password"];
    $addTime = $_POST["addTime"];

    //对于用户名和密码进行一个简单的表单验证(后台验证)
    //简单的验证
    if(!$username){
        $responseData["code"] = 1;
        $responseData["message"] = "用户名不能为空";
        echo json_encode($responseData);
        exit;
    }
    if(!$password){
        $responseData["code"] = 2;
        $responseData["message"] = "密码不能为空";
        echo json_encode($responseData);
        exit;
    }

    //1.连接数据库，看用户名是否重名
    $link = mysql_connect("localhost","root","123456");
    //2.判断是否连接成功
    if(!$link){
        echo "连接失败";
        $responseData["code"] = 3;
        $responseData["message"] = "数据库连接失败";
        echo json_encode($responseData);
        exit;//终止后续所有的代码
    }
    //3.设置字符集
    mysql_set_charset("utf8");
    //4.选择数据库
    mysql_select_db("yyy");
    //5.准备sql语句(验证用户名是否重名)
    $sql1 = "select * from users where username = '{$username}'";
    //6.发送sql语句
    $res = mysql_query($sql1); //query:查询，疑问
    //在mysql里面取出看是不是有一行数据，查询到数据了，肯定会取出一行，如果没有查询到，一行都取不到
    //7.取出 $res 的一行数据
    $row = mysql_fetch_assoc($res);
    if($row){
        //如果有一行，则重名了
        $responseData["code"] = 4;
        $responseData["message"] = "用户名已经存在";
        echo json_encode($responseData);
        exit;
    }

    //存储时要进行md5加密
    $str =md5(md5(md5($password)."xxx")."yyy");
    //可以进行注册了，准备sql语句将数据插入到数据库中

    $sql2 = "insert into users(username,password,create_time) values('{$username}','{$str}',{$addTime})";
    //返回布尔值
    $res = mysql_query($sql2);
    if(!$res){
        $responseData["code"] = 5;
        $responseData["message"] = "注册失败";
        echo json_encode($responseData);
    }else{
        $responseData["message"] = "注册成功";
        echo json_encode($responseData);
    }
    //8.数据库关闭
    mysql_close($link);
?>