<?php
    header('content-type:text/html;charset= "utf-8"');
    //关联数组  键值数组
    $arr = array("王五" => "大鱼的","李四" => "好人","张三" => "打猎的");
    var_dump($arr);
    //用foreach..as进行遍历
    foreach($arr as $key => $value){
        echo "<br/>下标:{$key},数据:{$value}<br/>";
    }
?>