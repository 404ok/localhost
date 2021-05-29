/* 
    AMD规范
*/

//要依赖缩放那个模块
define(["scale","drag"],function(scale,drag){
    //封装函数
    function init(){
        //点击按钮，显示div1
        var btn = document.getElementById("btn1");
        var div1 = document.getElementById("div1");
        var div2 = document.getElementById("div2");
        var div3 = document.getElementById("div3");

        btn.onclick = function(){
            //显示div1
            div1.style.display = "block";
            btn.style.display = "none";
            scale.scale(div1,div2);
        }
        drag.drag(div3);
    }

    //暴露函数
    return{
        init:init
    }
})