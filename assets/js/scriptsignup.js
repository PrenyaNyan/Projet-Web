$(document).ready(function () {
    $("#roleselect").change(function () {
        $(".added").remove();
        if ($("#roleselect").val() == 1) {
            $("#roleselect").removeClass("MiddleInput");
            $("#roleselect").addClass("LastInput");
        } else if ($("#roleselect").val() == 2) {
            $("#roleselect").removeClass("LastInput");
            $("#roleselect").addClass("MiddleInput");
            $("#FormContent").append(`  <div class="form-floating added">
                                            <input class="form-control LastInput" id="inputpromocontroled" placeholder="inputpromocontroled" name="promoControled">
                                             <label for="inputpromocontroled">Promotion Controled</label>
                                         </div>`);
        } else if ($("#roleselect").val() == 3) {
            $("#roleselect").removeClass("LastInput");
            $("#roleselect").addClass("MiddleInput");
            $("#FormContent").append(`  <div class="form-floating added">
                                            <input class="form-control LastInput" id="inputpromo" placeholder="inputpromo" name="promo">
                                             <label for="inputpromo">Promotion</label>
                                         </div>`);
        }

    })
});