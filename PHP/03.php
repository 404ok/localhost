<?php
    header('content-type:text/html;charset= "utf-8"');
    $isYes = true;
    if($isYes){
        echo "是";
    }else{
        echo "否";
    }
    for($i = 0;$i <=5;$i++){
        echo "下标".$i."<br/>";
    }
?>