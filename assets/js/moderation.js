$(document).ready(function () {

  setpagination(  parseInt( $("#currentuserpage").html()  )  , false);

  $(".page-item").click(function () {
    let currentpage = parseInt($(this).find("a").html());
    setpagination(parseInt(currentpage, true));
  })
});

function setpagination(page, change) {
  $("#currentuserpage").html(page);
  $("#inputpageuser").val(page);



  $("#nextuserpage").html(page + 1);
  $("#nextuserpage2").html(page + 2);
  $("#previoususerpage").html(page - 1);

  if (page == 1) {
    $("#paginationuserprevious").addClass("disabled")
    $("#previoususerpage").hide();
  } else {
    $("#paginationuserprevious").removeClass("disabled");
    $("#previoususerpage").show();

  }
  if (page == 2 || page == 1) {
    $("#previoususerpage2").hide();
  } else {
    $("#previoususerpage2").show();
    $("#previoususerpage2").html(page - 2);
  }

  if (change == true) {
    $("#moderationpageuserform").submit();
  }
}


