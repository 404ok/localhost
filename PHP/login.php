<?php
    header('content-type:text/html;charset= "utf-8"');
    // 定一个统一的返回格式
    $responseData = array("code" => 0,"message" => "");
    //取出传过来的数据
    $username = $_POST["username"];
    $password = $_POST["password"];

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

    //存储时进行了md5加密
    $str =md5(md5(md5($password)."xxx")."yyy");

    //5.登录    查询用户名和密码(有编码)是否正确
    //准备sql语句进行登录   1.用用户名和密码同时进行查询
    $sql = "select * from users where username = '{$username}' and password = '{$str}'";
    //发送数据
    $res = mysql_query($sql);
    //取出第一行数据
    $row = mysql_fetch_assoc($res);
    //如果存在，则登录成功
    if(!$row){
        $responseData["code"] = 4;
        $responseData["message"] = "用户名或密码错误";
        echo json_encode($responseData);
    }else{
        $responseData["message"] = "登录成功";
        echo json_encode($responseData);
    }

    //8.数据库关闭
    mysql_close($link);
?>