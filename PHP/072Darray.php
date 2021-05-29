<?php
    header('content-type:text/html;charset= "utf-8"');
    //二维数组  统计一个班的成绩
    $arr = array(
        array("name" => "小白","English" => 100,"math" => 50),
        array("name" => "小花","English" => 60,"math" => 90),
        array("name" => "小红","English" => 100,"math" => 90),
    );
    for($i = 0;$i < count($arr);$i++){
        var_dump($arr[$i]."<br/>");
    }
    //访问小红的数学成绩
    echo $arr[2]["math"];
?>