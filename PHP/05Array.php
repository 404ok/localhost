<?php
    header('content-type:text/html;charset= "utf-8"');
    /* 
        三大类：
            索引数组：下标是数字
            关联数组：下标是字符串  (类似与ECMA6的map类型 键值)
            全局数组：
                $_GET   接受通过get提交过来的所有的数据
                $_POST  接受通过post提交过来的所有的数据

                数组中的索引数组与关联数组可以互相结合，结合成多维数组
            数组的长度  count($cars)    返回数组的长度
    */

    //【注意】不可通过{}声明数组,通过array()声明数组
    //1.索引数组
    $cars = array("大众","别克","现代");
    var_dump($cars);
    //由于是字符串编码是utf-8，所以一个汉字=三个字符
    //输出某一个
    echo "<br/>".$cars[1];
    for($i = 0;$i < count($cars);$i++){
        echo "<br/>".$cars[$i]." 下标".$i;
    }
?>