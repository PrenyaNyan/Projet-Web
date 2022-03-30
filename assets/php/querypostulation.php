<?php
try {
    $stmt = $pdo->prepare(" SELECT company.NAME AS COMPANYNAME, company.EMAIL, company.DESCRIPTION AS COMPANYDESC, offer.NAME AS OFFERNAME, offer.STARTDATE, offer.ENDDATE, offer.REALEASEDATE, offer.SALARY, offer.NBPLACE, offer.DESCRIPTION AS OFFERDESC , Step
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
        switch ($row['Step']) {
            case 1:
                $Stepbuffer = ' <div class="alert alert-primary" role="alert">
                                    1 : Votre postulation a bien été transmise à la société ' . $row['COMPANYNAME'] . ', une réponse vous sera renvoyée dans les plus brefs délais !
                                </div>';
                break;
            case 2:
                $Stepbuffer = ' <div class="alert alert-primary" role="alert">
                                    2 : La société  ' . $row['COMPANYNAME'] . ' vous a répondu par mail !
                                </div>';
                break;
            case 3:
                $Stepbuffer = ' <div class="alert alert-primary" role="alert">
                                    3 : Votre fiche de validation de stage a été remplie par la société ' . $row['COMPANYNAME'] . ' !
                                </div>';
                break;
            case 4:
                $Stepbuffer = ' <div class="alert alert-primary" role="alert">
                                    4 : Votre fiche de validation a été signée par le pilote !
                                </div>';
                break;
            case 5:
                $Stepbuffer = ' <div class="alert alert-primary" role="alert">
                                    5 : Vos conventions de stage ont été transmises à l\'entreprise ' . $row['COMPANYNAME'] . ' !
                                </div>';
                break;
            case 6:
                $Stepbuffer = ' <div class="alert alert-success" role="alert">
                                    6 : Vos conventions de stage ont été retournées signées par l\'entreprise ' . $row['COMPANYNAME'] . ' !
                                </div>';
                break;

            default:
                $Stepbuffer = ' <div class="alert alert-danger" role="alert">
                                    Une erreur est survenue lors de votre postulation !
                                </div>';
                break;
        }

        $buffer .= '
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">' . $row['COMPANYNAME'] . '</font>
                        </font>
                    </strong>
                    <h3 class="mb-0">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">' . $row['OFFERNAME'] . '</font>
                        </font>
                    </h3>
                    <div class="mb-1 text-muted">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">' . $row['REALEASEDATE'] . '</font>
                        </font>
                    </div>
                    <p class="card-text mb-auto">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Description de l\'entreprise :<br>' . $row['COMPANYDESC'] . '<br><br>Description de l\'offre :<br>' . $row['OFFERDESC'] . '<br><br>' . $row['STARTDATE'] . ' | ' . $row['ENDDATE'] . '<br><br>Contact :<br>' . $row['EMAIL'] . '</font>
                        </font>
                    </p>

                    <div class="mt-4">
                    ' . $Stepbuffer . '
                    </div>
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
