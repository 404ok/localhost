/* 
    配置引入文件的路径
*/
// console.log("加载完成");
console.log("加载完成")

require.config({
    paths:{
        //jquery框架遵从AMD规范
        "jquery":"jquery-1.11.3",
        "jquery-cookie":"jquery.cookie",
        "parabola":"parabola",
        "index":"index"
    },
    /* 
        cookie需要在jquery加载后再 加载  
    */

    shim:{
        //设置依赖关系  先引入jquery.js     然后再隐去jquery-cookie
        "jquery-cookie":["jquery"],
        //声明当前模块不遵从AMD
        "parabola":{
            exports:"_"
        }
    }
})

require(["index"],function(index){
    index.index();
})