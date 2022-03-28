$(document).ready(function () {
  $("#entredeux").on("click", ".leboutonpourlike", function () {
    if ($("#heartimg" + $(this).val()).hasClass("liked")) {
      $("#heartimg" + $(this).val()).removeClass("liked");
      $("#heartimg" + $(this).val()).removeClass("fas");
      $("#heartimg" + $(this).val()).addClass("far");

    } else {
      $("#heartimg" + $(this).val()).addClass("liked");
      $("#heartimg" + $(this).val()).removeClass("far");
      $("#heartimg" + $(this).val()).addClass("fas");

    }
    $.ajax({
      type: "GET",
      url: "../php/test.php",
      method: "GET",
    });
  });








});