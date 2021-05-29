    /* 
            expires 传入对应的天数就ok了
        */
            function setCookie(name,value,{expires,path,domain,secure}){
                var cookieStr = encodeURIComponent(name) + "=" + encodeURIComponent(value);
                if(expires){
                    cookieStr += ";expires" + afterOfDate(expires);
                }
                if(path){
                    cookieStr += ";path" + path;
                }
                if(domain){
                    cookieStr += ";domain" + domain;
                }
                if(secure){
                    cookieStr += ";secure";
                }
                document.cookie = cookieStr;
            }
            setCookie("超级英雄","钢铁侠",{
                expires:7
            });
            setCookie("DC","海王",{
                expires:30
            });
            setCookie("神话","孙悟空",{
                expires:60
            });
            //超级英雄=钢铁侠; DC=海王; 神话=孙悟空
            //alert(decodeURIComponent(document.cookie));
    
            alert(getCookie("超级英雄"));
            alert(getCookie("DC"));
            alert(getCookie("神话"));
    
            function getCookie(name){   //将所有键值分开取出
                var cookieStr = decodeURIComponent(document.cookie);
                //看键是否存在
                var start = cookieStr.indexOf(name + "=");
                if(start == -1){
                    return null;
                }else{
                    //查询从start位置开始遇到的第一个分号
                    var end = cookieStr.indexOf(";",start);
                    if(end == -1){
                        end = cookieStr.length;
                    }
                    //进行字符串提取
                    var str = cookieStr.substring(start,end);
                    //字符串分割
                    var arr = str.split("=");
                    return arr[1];
                }
            }
    
            function removeCookie(name){
                //重新设置cookie
                document.cookie = encodeURIComponent(name) + "=;expires=" + new Date(0);
            }
            function afterOfDate(n){
                var d = new Date(); //获取到当前时间
                var day = d.getDate();//获取到当前时间的日期
                d.setDate(n+day);   //加上n
                return d;
            }



function $cookie(name){
    //arguments
    arguments
    //判断传入参数的个数
    switch(arguments.length){
            case 1:
            return getCookie(name)
            break;
            case 2:
                if(arguments[1] == null){
                    removeCookie(name);
                }else{
                    setCookie(name,arguments[1],{});
                }
                break;
            default:
            setCookie(name,arguments[1],arguments[2]);
                break;
    }
    
}