<?php
    header('content-type:text/html;charset= "utf-8"');
    //统一返回格式
    $responseData = array("code" => 0,"message" => "");
    $id = $_GET['id'];//拿到get请求下的id

    $link = mysql_connect("localhost","root","123456");
    if(!$link){
        $responseData['code'] = 1;
        $responseData['message'] = "数据库连接失败";
        //返回到前台页面
        echo json_encode($responseData);
        exit;
    }
    mysql_set_charset("utf8");
    mysql_select_db("yyy");
    //准备sql语句，通过id删除数据
    $sql = "delete from users where id = {$id}";
    $res = mysql_query($sql);
    if(!$res){
        $responseData['code'] = 2;
        $responseData['message'] = "删除用户数据失败";
        //返回到前台页面
        echo json_encode($responseData);
    }else{
        $responseData['message'] = "删除用户数据成功";
        //返回到前台页面
        echo json_encode($responseData);
    }
    mysql_close($link);
?>
 