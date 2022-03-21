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
    <link rel="stylesheet" href="../css/dashboard1.css">
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
            <button class="nav-link active navleft" id="nav-saved-tab" data-bs-toggle="tab" data-bs-target="#nav-saved" type="button" role="tab" aria-controls="nav-saved" aria-selected="true"><i class="fas fa-heart"></i></button>
            <button class="nav-link navright" id="nav-messaged-tab" data-bs-toggle="tab" data-bs-target="#nav-messaged" type="button" role="tab" aria-controls="nav-messaged" aria-selected="false"><i class="fas fa-paper-plane"></i></button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show container active" id="nav-saved" role="tabpanel" aria-labelledby="nav-saved-tab">
            <?php
            require('../php/createPDO.php');
            require('../php/querysaved.php');
            ?>
        </div>
        <div class="tab-pane fade show container" id="nav-messaged" role="tabpanel" aria-labelledby="nav-messaged-tab">

        </div>
    </div>





    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="../vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>