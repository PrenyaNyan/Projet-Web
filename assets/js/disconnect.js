$(document).ready(function () {
  $("body").on("click", "#headerdisconnect", function () {
    let request =
      $.ajax({
        type: "GET",
        url: "../php/disconnect.php",
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
    window.location.reload();
  });
});


