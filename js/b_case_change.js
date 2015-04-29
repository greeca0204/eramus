$(document).ready(function(){
    var hash=window.location.hash || "#case-a";
    if(hash){
        var lis=$("#nav_lis>li"),
        divs=$("#nav_uls>div");
        lis.each(function(index, v) {
            if(hash == v.getAttribute("data-hash")){
                v.className="hover";
                //.var divs = $("#nav_uls>div");
                for(var i=0,ci; ci = divs[i]; i++){
                    if(index == ci.getAttribute("data-index")){
                        $(ci).addClass("show");
                    }else{
                        $(ci).removeClass("show");
                    }
                }
            }
        });
    }
    
    $("#nav_lis").on("mouseover", function(e){
        $(this).find("li").removeClass("hover");
        e.target.className = "hover";
        var index = e.target.getAttribute("data-index");

        var divs = $("#nav_uls>div");
        for(var i=0,ci; ci = divs[i]; i++){
            if(index == ci.getAttribute("data-index")){
                $(ci).addClass("show");
            }else{
                $(ci).removeClass("show");
            }
        }
    });		
});