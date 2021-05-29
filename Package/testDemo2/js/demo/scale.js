/* 
    小A写
*/

define(["drag"],function(drag){
    /* 
        node1:被缩放的控件
        node2:按下的控件
    */
    function scale(node1,node2){
        node2.onmousedown = function(ev){
            var e = ev || window.event;
            //1.记录原来缩放控件的宽高
            var w = node1.offsetWidth;
            var h = node1.offsetHeight;
            //记录鼠标位置
            var l = e.clientX;
            var t = e.clientY;

            document.onmousemove = function(ev){
                //改变被缩放控件的宽和高
                var e = ev || window.event;
                var W = w + (e.clientX - l) ;
                var H = h + (e.clientY - t);
                //限制出界
                W = drag.range(W,100,500);
                H = drag.range(H,100,500);
                node1.style.width = W + "px";
                node1.style.height =H  + "px";
            }
        }
        //鼠标抬起之后，将改变宽高此事件取消
        document.onmouseup = function(){
            document.onmousemove = null;
        }
    }
    //对外暴露
    return{
        scale:scale
    }
})