<?php
    header('content-type:text/html;charset= "utf-8"');
    $responseData = array("code" => 0,"message" => "");

    //取出传过来的数据
    $username = $_POST["username"];
    $password = $_POST["password"];
    $id = $_POST["id"];
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
    if(!$id){
        $responseData["code"] = 3;
        $responseData["message"] = "修改的用户不存在";
        echo json_encode($responseData);
        exit;
    }

    $link = mysql_connect("localhost","root","123456");
    if(!$link){
        $responseData["code"] = 4;
        $responseData["message"] = "数据库连接失败";
        echo json_encode($responseData);
        exit;//终止后续所有的代码
    }
    //设置字符集
    mysql_set_charset("utf8");
    mysql_select_db("yyy");
    
    //首先判断要修改用户名是否与数据库里的数据重名
    $sql = "select * from users where username = '{$username}' and id != {$id}";
    $res1 = mysql_query($sql);
    $row = mysql_fetch_assoc($res1);
    if($row){
        $responseData["code"] = 4;
        $responseData["message"] = "用户名已存在，无法修改";
        echo json_encode($responseData);
        exit;//终止后续所有的代码
    }
    //存储时要进行md5加密
    $str =md5(md5(md5($password)."xxx")."yyy");
    //修改sql语句
    $sql2 = "update users set username ='{$username}',password = '{$str}' where id = '{$id}'";
    $res2 = mysql_query($sql2);
    if($res2){
        $responseData['message'] = '修改成功';
        echo json_encode($responseData);
    }else{
        $responseData['code'] = 5;
        $responseData['message'] = "用户名修改失败，请重试";
        echo json_encode($responseData);
        exit;
    }
    mysql_close($link);
?>