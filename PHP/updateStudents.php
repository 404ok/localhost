<?php
    header('content-type:text/html;charset= "utf-8"');
    $responseData = array("code" => 0,"message" => "");
    $id = $_GET["id"];
    if(!$id){
        $responseData['code'] = 1;
        $responseData['message'] = "没有要修改的数据";
        echo json_encode($responseData);
        exit;//终止后续所有的代码
    }
    $link = mysql_connect("localhost","root","123456");
    if(!$link){
        $responseData["code"] = 2;
        $responseData['message'] = "数据库连接失败";
        echo json_encode($responseData);
        exit;
    }
    mysql_set_charset("utf8");
    mysql_select_db("yyy");
    //5.通过sql语句查找数据
    $sql = "select * from users where id = {$id}";
    $res = mysql_query($sql);
    //取出第一行数据
    $row = mysql_fetch_assoc($res);
    if(!$row){
        $responseData['code '] = 3;
        $responseData['message'] = "修改的数据不存在";
        echo json_encode($responseData);
    }else{
        $responseData['message'] = json_encode($row);
        echo json_encode($responseData);
    }
    mysql_close($link);
?>