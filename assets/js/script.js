$(document).ready(function () {
    $("#SignUpForm").click(function(){
        $("#FormContent").html(`<div class="form-floating">
        <input type="Name" class="form-control" id="floatingName" placeholder="Name">
        <label for="floatingName">Name</label>
        </div>
        <div class="form-floating">
        <input type="First Name" class="form-control" id="floatingFirstName" placeholder="First Name">
        <label for="floatingFirstName">First Name</label>
        </div>
        <div class="form-floating">
        <input type="Password" class="form-control" id="SignUpPassord" placeholder="Password">
        <label for="SignUpPassord">Password</label>
        </div>
        <div class="form-floating">
        <input type="PasswordConfirmation" class="form-control" id="PasswordConfirmation"
            placeholder="PasswordConfirmation">
        <label for="PasswordConfirmation">Password Confirmation</label>
        </div>
        <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
        <input type="LastInput" class="form-control" id="EmailConfirmation"
            placeholder="EmailConfirmation">
        <label for="EmailConfirmation">Email Confirmation</label>
        </div>`);
    });

    $("#SignInForm").click(function(){
        $("#FormContent").html = (`  <div class="form-floating">
                                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Email address</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="LastInput" class="form-control" id="floatingPassword" placeholder="Password">
                                        <label for="floatingPassword">Password</label>
                                    </div>`)
    });
});

