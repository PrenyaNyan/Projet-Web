<?php
require('../php/createPDO.php');
require('../php/isnotconnected.php');
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>DepiStage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- 
    <link rel="manifest" href="/manifest.json">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="/assets/images/hello-icon-152.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="white" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Hello World">
    <meta name="msapplication-TileImage" content="/assets/images/hello-icon-144.png">
    <meta name="msapplication-TileColor" content="#FFFFFF"> 
    -->

    <link rel="stylesheet" href="../vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/moderation.css">
    <link rel="stylesheet" href="../css/header.css">



</head>

<body>
    <header class="p-3 headerColor text-black">
        <?php
        require('../php/CreateHeader.php');
        ?>
    </header>

    <nav class="container" style="margin-top: 15px;">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <?php
            require('../php/moderationmenu.php');
            ?>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show container <?php if (empty($_POST["tabmoderation"])) {
                                                        echo "active";
                                                    }
                                                    if (isset($_POST["tabmoderation"])) {
                                                        if ($_POST["tabmoderation"] == "user") {
                                                            echo "active";
                                                        }
                                                    } ?> " id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
            <div class="accordion accordion-flush" id="accordionFlushExample1">
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
                                <input type="hidden" name="tabmoderation" value="user">
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                require('../php/moderationtabuserupdate.php');
                ?>
            </div>
        </div>



        <div class="tab-pane fade show container <?php if (isset($_POST["tabmoderation"])) {
                                                        if ($_POST["tabmoderation"] == "company") {
                                                            echo "active";
                                                        }
                                                    } ?>" id="nav-company" role="tabpanel" aria-labelledby="nav-company-tab">
            <div class="accordion accordion-flush" id="accordionFlushExample2">


                <button style="float: right; margin: 20px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                    Create company
                </button>

                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Company creation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="accordion-body">

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input class="form-control" id="floatingCompanyname" placeholder="Companyname" name="createcompanyname" value="">
                                                    <label for="floatingCompanyname">Name</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input class="form-control" id="floatingEmail" placeholder="Email" name="createemail" value="">
                                                    <label for="floatingEmail">Email</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-floating mb-4">
                                            <textarea class="form-control" style="height: 150px; margin-bottom:-40px; resize: none;" id="floatingDescription" placeholder="Description" name="createdescription" value="" data-dl-input-translation="true"></textarea>
                                            <label for="floatingDescription">Description</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                                <input type="hidden" name="tabmoderation" value="company">
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                require('../php/moderationtabcompanycreate.php');
                require('../php/moderationtabcompanyupdate.php');
                ?>
            </div>
        </div>

        <div class="tab-pane fade show container <?php if (isset($_POST["tabmoderation"])) {
                                                        if ($_POST["tabmoderation"] == "offer") {
                                                            echo "active";
                                                        }
                                                    } ?>" id="nav-offer" role="tabpanel" aria-labelledby="nav-offer-tab">
            <div class="accordion accordion-flush" id="accordionFlushExample3">


                <button style="float: right; margin: 20px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                    Create an offer
                </button>

                <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form action="" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Offer creation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="accordion-body">

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input class="form-control" id="floatingOffername" placeholder="Offername" name="createoffername" value="">
                                                    <label for="floatingOffername">Name</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control" id="floatingPlaceavailable" placeholder="PlacefloatingPlaceavailable" name="placeavailable" value="">
                                                    <label for="floatingPlaceavailable">Place</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control FirstInput" id="floatingStartdate" placeholder="Startdate" name="startdate" value="">
                                                    <label for="floatingStartdate">Start date</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control FirstInput" id="floatingEnddate" placeholder="Enddate" name="enddate" value="">
                                                    <label for="floatingEnddate">End date</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-floating mb-4">
                                            <textarea class="form-control" style="height: 150px; resize: none;" id="floatingOfferdescription" placeholder="Offerdescription" name="offerdescription" value="" data-dl-input-translation="true"></textarea>
                                            <label for="floatingOfferdescription">Description</label>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <select id="selectcompanycreateoffer" class="form-select" name="createcompanyoffer" aria-label="Default select example">
                                                        <option value="" selected>Choose a company</option>
                                                        <?php
                                                        require('../php/moderationtaboffercreate.php');
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control" id="floatingSalary" placeholder="PlacefloatingSalary" name="salary" value="">
                                                    <label for="floatingSalary">Salary</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col">
                                            <div class="form-floating">
                                                <select id="selectcompanycreateoffer" class="form-select" name="localisation" aria-label="Default select example">
                                                    <option value="" selected>Choose a localisation</option>
                                                    <?php
                                                    require('../php/querylocalisation.php');
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                                <input type="hidden" name="tabmoderation" value="offer">

                            </div>
                        </form>
                    </div>
                </div>
                <?php
                require('../php/moderationtabofferupdate.php');
                ?>
            </div>
        </div>
    </div>


    <!-- <script src="/sw.js"></script> -->

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="../vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/moderation.js"></script>
</body>

</html>