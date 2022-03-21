<?php
try {
    $stmt = $pdo->prepare(" SELECT company.NAME AS COMPANYNAME, company.EMAIL, company.DESCRIPTION AS COMPANYDESC, offer.NAME AS OFFERNAME, offer.STARTDATE, offer.ENDDATE, offer.REALEASEDATE, offer.SALARY, offer.NBPLACE, offer.DESCRIPTION AS OFFERDESC 
                            FROM `offer` inner JOIN location ON offer.ID_Location = location.ID_Location 
                            inner JOIN applyfor ON offer.ID_Offer = applyfor.ID_Offer 
                            inner JOIN users ON applyfor.ID_User = users.ID_User 
                            inner JOIN company on offer.ID_Company = company.ID_Company 
                            WHERE users.USERNAME = ?;");
    $stmt->bindParam(1, $_SESSION["newsession"]);
    $stmt->execute();
    $res = $stmt->fetchAll();
    $stmt->closeCursor();
    $buffer = "";

    foreach ($res as $row) {
        $buffer .= '
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">'. $row['COMPANYNAME'] .'</font>
                        </font>
                    </strong>
                    <h3 class="mb-0">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">'. $row['OFFERNAME'] .'</font>
                        </font>
                    </h3>
                    <div class="mb-1 text-muted">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">'. $row['REALEASEDATE'] .'</font>
                        </font>
                    </div>
                    <p class="card-text mb-auto">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Description de l\'entreprise :<br>'. $row['COMPANYDESC'] .'<br><br>Description de l\'offre :<br>'. $row['OFFERDESC'] .'<br><br>'.$row['STARTDATE'].' | '.$row['ENDDATE'].'<br><br>Contact :<br>'.$row['EMAIL'].'</font>
                        </font>
                    </p>
                    <a href="#" class="stretched-link">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"><br>Consulter l\'annonce</font>
                        </font>
                    </a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Espace réservé&nbsp;: Vignette" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                    </svg><img src="https://img-0.journaldunet.com/la7i_1Y8UNwnsDRdLYjaR2CHPKA=/1500x/smart/da9bdec385c74c66b032708cfe1453a6/ccmcms-jdn/28990032.jpg" alt="" width="375">

                </div>
            </div>';
        
    }
    echo $buffer;

} catch (\Throwable $th) {
    echo '<option value="erreur">Erreur de connexion a la base de données</option>';
    echo $th;
}