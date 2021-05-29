var modulA = (function(mod){
    function showC(){
        alert("hello world");
    }
    mod.outC = showC;
    return mod;
})(modulA || {});