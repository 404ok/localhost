var modulA = (function(mod){
    var count =10;
    function showA(){
         count += 20;
         alert(count)
    }
    function showB(){
         count += 10;
         alert(count)
    }

    //对外暴露
    return{
        outA:showA,
        outB:showB
    }
    mod.outA = showA;
    mod.outB = showB
})(modulA || {});
