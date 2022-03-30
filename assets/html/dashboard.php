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

    <link rel="stylesheet" href="../vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/accueil2.css">
    <link rel="stylesheet" href="../css/header.css">
</head>

<body>
    <?php
    require('../php/CreateHeader.php');
    ?>

    <nav class="container" style="margin-top: 15px;">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active navleft" id="nav-saved-tab" data-bs-toggle="tab" data-bs-target="#nav-saved" type="button" role="tab" aria-controls="nav-saved" aria-selected="true"><i class="fas fa-heart"></i></button>
            <button class="nav-link navright" id="nav-messaged-tab" data-bs-toggle="tab" data-bs-target="#nav-messaged" type="button" role="tab" aria-controls="nav-messaged" aria-selected="false"><i class="fas fa-paper-plane"></i></button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show container active" id="nav-saved" role="tabpanel" aria-labelledby="nav-saved-tab">
            <div id="entredeux">
                <?php
                require('../php/querysaved.php');
                ?>
            </div>

        </div>
        <div class="tab-pane fade show container" id="nav-messaged" role="tabpanel" aria-labelledby="nav-messaged-tab">
            <?php
            require('../php/querypostulation.php');
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="../vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/accueil.js"></script>
    <script src="../js/disconnect.js"></script>
    <script src="/sw.js"></script>
</body>

</html>