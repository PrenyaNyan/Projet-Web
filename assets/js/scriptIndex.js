$(document).ready(function () {
    $("#FormButton").on("click", "#SignUpForm", function() {
        $("#FormContent").html(`    <div class="form-floating">
                                        <input class="form-control FirstInput" id="floatingName" placeholder="Name" name="name">
                                        <label for="floatingName">Name</label>
                                    </div>
                                    <div class="form-floating">
                                         <input class="form-control MiddleInput" id="floatingFirstName" placeholder="First Name" name="firstname">
                                         <label for="floatingFirstName">First Name</label>
                                    </div>                                    
                                    <div class="form-floating">
                                        <input class="form-control MiddleInput" id="floatingInput" placeholder="name@example.com" name="email">
                                        <label for="floatingInput">Email address</label>
                                    </div>
                                    <div class="form-floating">
                                        <input class="form-control MiddleInput" id="SignUpPassord" placeholder="Password" name="password">
                                        <label for="SignUpPassord">Password</label>
                                    </div>
                                    <div class="form-floating">
                                        <input class="form-control MiddleInput" id="PasswordConfirmation" placeholder="PasswordConfirmation" name="passwordconfirm">
                                        <label for="PasswordConfirmation">Password Confirmation</label>
                                    </div>
                                    <div class="form-floating">
                                        <input class="form-control MiddleInput" id="Role" placeholder="Role" name="role">
                                        <label for="Role">Role</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="date" class="form-control LastInput" id="BirthDate" placeholder="BirthDate" name="birthdate">
                                        <label for="BirthDate">Birth Date</label>
                                    </div>
                                    <div class="deleguecheckbox">
                                        <input class="form-check-input" type="checkbox" value="true" id="flexCheckIndeterminate" name="delegue"">
                                        <label class="form-check-label" for="flexCheckIndeterminate">Delegue</label>
                                    </div>`);
        $("#FormButton").html(`<button class="btn btn-primary btn-lg" id="SignInForm">Login</button><button class="btn btn-secondary btn-lg espace" type="submit" id="SignUpSubmit" method="post">Submit</button>`);
    });

    $("#FormButton").on("click", "#SignInForm", function () {
        $("#FormContent").html(`  <div class="form-floating">
                                        <input class="form-control FirstInput" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Email address</label>
                                    </div>
                                    <div class="form-floating">
                                        <input class="form-control LastInput" id="floatingPassword" placeholder="Password">
                                        <label for="floatingPassword">Password</label>
                                    </div>`);
        $("#FormButton").html(`     <button type="button" class="btn btn-lg btn-primary" id="SignUpForm">Sign Up</button>
                                    <button type="submit" class="btn btn-secondary btn-lg" id="SignInSubmit">Submit</button>
                                                `);
    });
    

});


