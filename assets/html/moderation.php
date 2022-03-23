<?php
require('../php/isnotconnected.php');
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>DepiStage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/moderation.css">



</head>

<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <img src="https://cdn.discordapp.com/attachments/950033739604434965/950403057567551528/logo.png" class="bi me-2" style="width: 100px;">
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                </form>

                <div class="text-end">
                    <button type="button" class="btn btn-outline-light me-2">Login</button>
                    <button type="button" class="btn btn-warning">Sign-up</button>
                </div>
            </div>
        </div>
    </header>

    <nav class="container" style="margin-top: 15px;">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <?php
            require('../php/createPDO.php');
            require('../php/moderationmenu.php');
            ?>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show container active" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <button style="float: right; margin: 20px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Create a user
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="../html/moderation.php" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">User creation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="accordion-body">

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input class="form-control" id="floatingFirstname" placeholder="Firstname" name="createfirstname" value="">
                                                    <label for="floatingFirstname">First name</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input class="form-control" id="floatingLastname" placeholder="Lastname" name="createlastname" value="">
                                                    <label for="floatingLastname">Last name</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input class="form-control FirstInput" id="floatingUsername" placeholder="Username" name="createusername" value="">
                                                    <label for="floatingUsername">Username</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input class="form-control LastInput" id="floatingPassword" placeholder="Password" name="createpassword" value="">
                                                    <label for="floatingPassword">Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating col-sm-3">
                                            <?php
                                            require('../php/moderationtabusercreate.php');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                require('../php/moderationtabuserupdate.php');
                ?>
            </div>
        </div>



        <div class="tab-pane fade show container" id="nav-company" role="tabpanel" aria-labelledby="nav-company-tab">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <button style="float: right; margin: 20px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Create a user
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="../html/moderation.php" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">User creation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="accordion-body">

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input class="form-control" id="floatingFirstname" placeholder="Firstname" name="createfirstname" value="">
                                                    <label for="floatingFirstname">First name</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input class="form-control" id="floatingLastname" placeholder="Lastname" name="createlastname" value="">
                                                    <label for="floatingLastname">Last name</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input class="form-control FirstInput" id="floatingUsername" placeholder="Username" name="createusername" value="">
                                                    <label for="floatingUsername">Username</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input class="form-control LastInput" id="floatingPassword" placeholder="Password" name="createpassword" value="">
                                                    <label for="floatingPassword">Password</label>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-floating col-sm-3">
                                            <?php
                                            require('../php/moderationtabusercreate.php');
                                            ?>



                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                require('../php/moderationtabuserupdate.php');
                ?>
            </div>
        </div>

        <div class="tab-pane fade show container" id="nav-offer" role="tabpanel" aria-labelledby="nav-offer-tab">
            offer

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="../vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/moderation.js"></script>
</body>

</html>