$(document).ready(function () {
    $("#entredeux").on("click", ".leboutonpourlike", function () {
      if ($("#heartimg" + $(this).val()).hasClass("liked")) {
        $("#heartimg" + $(this).val()).removeClass("liked");
        $("#heartimg" + $(this).val()).removeClass("fas");
        $("#heartimg" + $(this).val()).addClass("far");
  
        let request =
          $.ajax({
            type: "GET",
            url: "../php/test.php?valueoffer=" + $(this).val() + "&send=delete",
            method: "GET",
          });
        request.done(function (output) {
          console.log(output);
        });
        request.fail(function (error) {
          //Code à jouer en cas d'éxécution en erreur du script du PHP ou de ressource introuvable
          console.log("Snif ;(");
        });
        request.always(function () {
          //Code à jouer après done OU fail quoi qu'il arrive
          console.log("Request !");
        });
  
      } else {
        $("#heartimg" + $(this).val()).addClass("liked");
        $("#heartimg" + $(this).val()).removeClass("far");
        $("#heartimg" + $(this).val()).addClass("fas");
  
        let request =
          $.ajax({
            type: "GET",
            url: "../php/test.php?valueoffer=" + $(this).val() + "&send=add",
            method: "GET",
          });
      };
    });
  });
