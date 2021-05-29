console.log("加载成功")

/* 
    引入模块，遵从AMD规范
    第一个参数，必须是数组
*/

require(["add","mul"],function(addObj,mul){
    var res = addObj.outAdd(10,20);

    alert(res);
    addObj.outShow();

    alert(mul.mul(10,20));//mul里的mul方法
})

/* 
    我们可以配置好路径，就没必要再引入模块时再写路径
*/

require.config({
    paths:{
        //自定义模块名字：引入模块的路径
        add:"./demo/add",
        mul:"./demo/mul"
    }
})