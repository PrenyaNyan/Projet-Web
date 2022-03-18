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
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Entreprise1</font>
                        </font>
                    </strong>
                    <h3 class="mb-0">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Nom de l'annonce</font>
                        </font>
                    </h3>
                    <div class="mb-1 text-muted">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Date du stage</font>
                        </font>
                    </div>
                    <p class="card-text mb-auto">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Début de la description de l'annonce, blablablablablabla...</font>
                        </font>
                    </p>
                    <a href="#" class="stretched-link">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">consulter l'annonce</font>
                        </font>
                    </a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Espace réservé&nbsp;: Vignette" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                    </svg><img src="https://img-0.journaldunet.com/la7i_1Y8UNwnsDRdLYjaR2CHPKA=/1500x/smart/da9bdec385c74c66b032708cfe1453a6/ccmcms-jdn/28990032.jpg" alt="" width="375">

                </div>
            </div>
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Entreprise1</font>
                        </font>
                    </strong>
                    <h3 class="mb-0">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Nom de l'annonce</font>
                        </font>
                    </h3>
                    <div class="mb-1 text-muted">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Date du stage</font>
                        </font>
                    </div>
                    <p class="card-text mb-auto">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Début de la description de l'annonce, blablablablablabla...</font>
                        </font>
                    </p>
                    <a href="#" class="stretched-link">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">consulter l'annonce</font>
                        </font>
                    </a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Espace réservé&nbsp;: Vignette" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                    </svg><img src="https://img-0.journaldunet.com/la7i_1Y8UNwnsDRdLYjaR2CHPKA=/1500x/smart/da9bdec385c74c66b032708cfe1453a6/ccmcms-jdn/28990032.jpg" alt="" width="375">

                </div>
            </div>
        </div>
        <div class="tab-pane fade container" id="nav-messaged" role="tabpanel" aria-labelledby="nav-messaged-tab">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Entreprise1</font>
                        </font>
                    </strong>
                    <h3 class="mb-0">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Nom de l'annonce</font>
                        </font>
                    </h3>
                    <div class="mb-1 text-muted">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Date du stage</font>
                        </font>
                    </div>
                    <p class="card-text mb-auto">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Début de la description de l'annonce, blablablablablabla...</font>
                        </font>
                    </p>
                    <a href="#" class="stretched-link">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">consulter l'annonce</font>
                        </font>
                    </a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Espace réservé&nbsp;: Vignette" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                    </svg><img src="https://img-0.journaldunet.com/la7i_1Y8UNwnsDRdLYjaR2CHPKA=/1500x/smart/da9bdec385c74c66b032708cfe1453a6/ccmcms-jdn/28990032.jpg" alt="" width="375">

                </div>
            </div>
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Entreprise1</font>
                        </font>
                    </strong>
                    <h3 class="mb-0">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Nom de l'annonce</font>
                        </font>
                    </h3>
                    <div class="mb-1 text-muted">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Date du stage</font>
                        </font>
                    </div>
                    <p class="card-text mb-auto">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Début de la description de l'annonce, blablablablablabla...</font>
                        </font>
                    </p>
                    <a href="#" class="stretched-link">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">consulter l'annonce</font>
                        </font>
                    </a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Espace réservé&nbsp;: Vignette" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                    </svg><img src="https://img-0.journaldunet.com/la7i_1Y8UNwnsDRdLYjaR2CHPKA=/1500x/smart/da9bdec385c74c66b032708cfe1453a6/ccmcms-jdn/28990032.jpg" alt="" width="375">

                </div>
            </div>
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="../vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>