const gulp = require("gulp");
const scss = require("gulp-sass");

/* 
    编写任务，编写.scss文件
*/


gulp.task("scss",function(){
    return gulp.src("*.{sass,scss}")
    .pipe(scss())
    .on("error",
    //处理错误的一种方法是“ 吞并错误 ”。 错误将由应用程序接受，以防止任务中断。 基本上，不会报告错误，并且任务将继续运行。
    function(err){
        console.log(err.toString());
        //从on的任务监听器。 on事件侦听器接受两个参数：事件和调用事件时要触发的函数。 被调用的函数接收错误对象。 然后，我们将错误的字符串化版本记录到终端。
        this.emit("end");
        //this.emit('end')绝对重要，如果未触发此事件，则永远不会调用此任务管道中的下一个管道，并且缓冲区将保持打开状态。
    })
    .pipe(gulp.dest("dist/css"));
})


const minifyCSS = require("gulp-minify-css");
const rename = require("gulp-rename");
gulp.task("scss2",function(){
    return gulp.src("7-scss注释.scss")
    .pipe(scss())
    .pipe(gulp.dest("dist/css"))
    .pipe(minifyCSS())
    .pipe(rename("7-scss注释.min.css"))
    .pipe(gulp.dest("dist/css"));
})

//实时监听
gulp.task("watch",function(){
    gulp.watch("*.{sass,scss}",["scss"])
})