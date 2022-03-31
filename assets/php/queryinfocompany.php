<?php
if (empty($_POST["id"])) {
    header("Location: /assets/html/login.php");
    exit();
}
try {
    $stmt = $pdo->prepare(" SELECT company.ID_Company ,company.NAME AS COMPANYNAME, company.EMAIL, company.DESCRIPTION AS COMPANYDESC, offer.ID_offer,offer.NAME AS OFFERNAME, offer.STARTDATE, offer.ENDDATE, offer.REALEASEDATE, offer.SALARY, offer.NBPLACE, offer.DESCRIPTION AS OFFERDESC, location.City
                            FROM `offer` inner JOIN location ON offer.ID_Location = location.ID_Location 
                            inner JOIN company on offer.ID_Company = company.ID_Company 
                            WHERE offer.ID_Offer = ?;");
    $stmt->bindParam(1, $_POST['id']);
    $stmt->execute();
    $res = $stmt->fetch();
    $stmt->closeCursor();
    $buffer = "";


    $buffer .= '
        <div class="h-100 p-5 row rounded-3">
        <h2 class="text-center p-1">' . $res['COMPANYNAME'] . '</h2>
        <h6 class="text-center p-1">' . $res['COMPANYDESC'] . '</h6>
        <img src="https://img-0.journaldunet.com/la7i_1Y8UNwnsDRdLYjaR2CHPKA=/1500x/smart/da9bdec385c74c66b032708cfe1453a6/ccmcms-jdn/28990032.jpg" class="mx-auto" style="width: 500px" ;>
        <input type="number" name="rating" min="1" max="5" value="1">
        <!--<div class="d-flex justify-content-center rating rating2 m-2">
            <div class="rate">
                <input type="number" id="rate" name="rate" min="1" max="5"
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
            </div>
            </div> -->
        <input type="hidden" name="ID_OffrePostuler" value="' . $res['ID_offer'] . '">
        <input type="hidden" name="idducompany" value="' . $res['ID_Company'] . '">
        <div class="card-text mb-auto text-center p-2">
            <span>' . $res['OFFERNAME'] . '</span> /
            <span>' . $res['EMAIL'] . '</span> / Place disponible : 
            <span>' . $res['NBPLACE'] . '</span> / Date :
            <span>' . $res['STARTDATE'] . ' | ' . $res['ENDDATE'] . '</span> / Localisation : 
            <span>' . $res['City'] . '</span>
        </div>
        <div>
            <p class="text-center">' . $res['OFFERDESC'] . '</p>
        </div>
    </div>';

    echo $buffer;
} catch (\Throwable $th) {
    echo '<div class="alert alert-danger" role="alert">
    This is a danger alert—check it out!</div>';
}
