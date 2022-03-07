$(document).ready(function () {
    $("#FormButton").on("click", "#SignUpForm", function() {
        $("#FormContent").html(`    <div class="form-floating">
                                        <input type="FirstInput" class="form-control" id="floatingName" placeholder="Name">
                                        <label for="floatingName">Name</label>
                                    </div>
                                    <div class="form-floating">
                                         <input type="MiddleInput" class="form-control" id="floatingFirstName" placeholder="First Name">
                                         <label for="floatingFirstName">First Name</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="MiddleInput" class="form-control" id="SignUpPassord" placeholder="Password">
                                        <label for="SignUpPassord">Password</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="MiddleInput" class="form-control" id="PasswordConfirmation"
                                        placeholder="PasswordConfirmation">
                                        <label for="PasswordConfirmation">Password Confirmation</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="MiddleInput" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Email address</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="MiddleInput" class="form-control" id="EmailConfirmation"
                                        placeholder="EmailConfirmation">
                                        <label for="EmailConfirmation">Email Confirmation</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="MiddleInput" class="form-control" id="Role"
                                        placeholder="Role">
                                        <label for="Role">Role</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="LastInput" class="form-control" id="EmailConfirmation"
                                        placeholder="EmailConfirmation">
                                        <label for="EmailConfirmation">Email Confirmation</label>
                                    </div>`);
        $("#FormButton").html(`<button class="btn btn-secondary btn-lg" type="submit" id="SignUpSubmit">Submit</button><btn class="btn btn-primary btn-lg espace" id="SignInForm">Login</btn>`);
    });

    $("#FormButton").on("click", "#SignInForm", function () {
        $("#FormContent").html(`  <div class="form-floating">
                                        <input type="FirstInput" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Email address</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="LastInput" class="form-control" id="floatingPassword" placeholder="Password">
                                        <label for="floatingPassword">Password</label>
                                    </div>`);
        $("#FormButton").html(`                <button type="button" class="btn btn-secondary btn-lg" id="SignInSubmit">Submit</button><button type="button" class="btn btn-lg btn-primary espace" id="SignUpForm">Sign Up</button>`);
    });
    

});


