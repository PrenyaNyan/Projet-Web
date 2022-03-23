$(document).ready(function () {
    $("#buttonlike").on("click", "#likebutton", function(){
        if ($("#heartimg").hasClass("liked")) {
            $("#heartimg").removeClass("liked");
            $("#heartimg").removeClass("fas");
            $("#heartimg").addClass("far");
      
          } else {
            $("#heartimg").addClass("liked");
            $("#heartimg").removeClass("far");
            $("#heartimg").addClass("fas");
      
          }
    });
  });