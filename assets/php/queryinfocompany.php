<?php
if (empty($_POST["id"])) {
    header("Location: /assets/html/login.php");
    exit();
}
try {
    $stmt = $pdo->prepare(" SELECT company.NAME AS COMPANYNAME, company.EMAIL, company.DESCRIPTION AS COMPANYDESC, offer.NAME AS OFFERNAME, offer.STARTDATE, offer.ENDDATE, offer.REALEASEDATE, offer.SALARY, offer.NBPLACE, offer.DESCRIPTION AS OFFERDESC 
                            FROM `offer` inner JOIN location ON offer.ID_Location = location.ID_Location inner JOIN save ON offer.ID_Offer = save.ID_Offer 
                            inner JOIN users ON save.ID_User = users.ID_User 
                            inner JOIN company on offer.ID_Company = company.ID_Company 
                            WHERE offer.ID_Offer = ?;");
    $stmt->bindParam(1, $_POST['id']);
    $stmt->execute();
    $res = $stmt->fetchAll();
    $stmt->closeCursor();
    $buffer = "";

    foreach ($res as $row) {
        $buffer .= '
        <div class="h-100 p-5 row rounded-3">
        <h2 class="text-center p-1">' . $row['COMPANYNAME'] . '</h2>
        <h6 class="text-center p-1">' . $row['COMPANYDESC'] . '</h6>
        <img src="https://img-0.journaldunet.com/la7i_1Y8UNwnsDRdLYjaR2CHPKA=/1500x/smart/da9bdec385c74c66b032708cfe1453a6/ccmcms-jdn/28990032.jpg" class="mx-auto" style="width: 500px" ;>
        <div class="d-flex justify-content-center rating rating2 m-2">
            <div class="rate">
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
        </div>
        <div class="card-text mb-auto text-center p-2">
            <span>' . $row['OFFERNAME'] . '</span> /
            <span>' . $row['EMAIL'] . '</span> / Place disponible : 
            <span>' . $row['NBPLACE'] . '</span> / Date :
            <span>' . $row['STARTDATE'] . ' | ' . $row['ENDDATE'] . '</span>
        </div>
        <div>
            <p class="text-center">' . $row['OFFERDESC'] . '</p>
        </div>
    </div>';
    }
    echo $buffer;
} catch (\Throwable $th) {
    echo '<div class="alert alert-danger" role="alert">
    This is a danger alert—check it out!</div>';
}
