require(["jquery"], function($){
    $(function(){
        $("#hideList").click(function(){
            $(".mark").toggle(1000,function() {

            });
        });
    });
});
