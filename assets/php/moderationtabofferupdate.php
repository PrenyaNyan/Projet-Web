<?php
try {
    $stmt = $pdo->prepare(" SELECT ID_User 
                            FROM users 
                            WHERE users.USERNAME = ?;");
    $stmt->bindParam(1, $_SESSION["newsession"]);
    $stmt->execute();
    $res = $stmt->fetch();
    $stmt->closeCursor();
    $currentuser = $res['ID_User'];

    if (isset($_POST['updateoffername']) && isset($_POST['updateplaceavailable']) && isset($_POST['updatestartdate']) && isset($_POST['updateenddate']) && isset($_POST['updateofferdescription']) && isset($_POST['updatecreatecompanyoffer']) && isset($_POST['updatesalary']) && isset($_POST['updatelocalisation']) && isset($_POST["send"]) && isset($_POST["idoffer"])) {
        try {
            if ($_POST['send'] == 'delete') {
                $stmt = $pdo->prepare("DELETE FROM `offer` WHERE `offer`.`ID_Offer` = ?;");
                $stmt->bindParam(1, $_POST["idoffer"]);
            } else {
                $stmt = $pdo->prepare(" UPDATE `offer` SET `NAME`=?,`STARTDATE`=?,`ENDDATE`=?,`SALARY`=?,`NBPLACE`=?,`DESCRIPTION`=?,`ID_Company`=?,`ID_Location`=?
                                        WHERE ID_Offer = ?");

                $stmt->bindParam(1, $_POST["updateoffername"]);
                $stmt->bindParam(2, $_POST["updatestartdate"]);
                $stmt->bindParam(3, $_POST["updateenddate"]);
                $stmt->bindParam(4, $_POST["updatesalary"]);
                $stmt->bindParam(5, $_POST["updateplaceavailable"]);
                $stmt->bindParam(6, $_POST["updateofferdescription"]);
                $stmt->bindParam(7, $_POST["updatecreatecompanyoffer"]);
                $stmt->bindParam(8, $_POST["updatelocalisation"]);
                $stmt->bindParam(9, $_POST["idoffer"]);
            }


            $stmt->execute();
            $res = $stmt->fetch();
            $stmt->closeCursor();
        } catch (\Throwable $th) {
            echo '<div class="alert alert-danger" style="margin-left: auto;margin-right: auto;" role="alert">Erreur de connexion a la base de données</div>';
        }

    }



    if ($currentsession == 1 || $currentsession == 2 || $currentsession == 4) {
        $querybuffer = '    SELECT ID_Offer, offer.NAME as OFFERNAME, NBPLACE, STARTDATE, ENDDATE, offer.DESCRIPTION , company.ID_Company ,company.NAME as COMPANYNAME, SALARY, location.ID_Location ,location.City FROM `offer` 
                            INNER JOIN company on offer.ID_Company = company.ID_Company 
                            INNER JOIN users on company.ID_User = users.ID_User 
                            INNER JOIN location ON offer.ID_Location = location.ID_Location ';

        if ($currentsession == 2 || $currentsession == 4) {
            $querybuffer .= 'WHERE users.ID_User = ?';
        }
    }

    $stmt = $pdo->prepare($querybuffer);
    if ($currentsession == 2 || $currentsession == 4) {
        $stmt->bindParam(1, $currentuser);
    }
    $stmt->execute();
    $res = $stmt->fetchAll();
    $stmt->closeCursor();



    $buffer = "";
    foreach ($res as $row) {

        $buffer .= '  <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse' . $row['ID_Offer'] . '" aria-expanded="false" aria-controls="flush-collapseOne">
                                ' . $row['OFFERNAME'] . '
                            </button>
                        </h2>
                        <div id="flush-collapse' . $row['ID_Offer'] . '" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample3" style="">
                            <div class="accordion-body">
                                <form action="../html/moderation.php" method="post">
                                    <div class="accordion-body">
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input class="form-control" id="floatingOffername" placeholder="Offername" name="updateoffername" value="' . $row['OFFERNAME'] . '">
                                                    <label for="floatingOffername">Name</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control" id="floatingPlaceavailable" placeholder="PlacefloatingPlaceavailable" name="updateplaceavailable" value="' . $row['NBPLACE'] . '">
                                                    <label for="floatingPlaceavailable">Place</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control FirstInput" id="floatingStartdate" placeholder="Startdate" name="updatestartdate" value="' . $row['STARTDATE'] . '">
                                                    <label for="floatingStartdate">Start date</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control FirstInput" id="floatingEnddate" placeholder="Enddate" name="updateenddate" value="' . $row['ENDDATE'] . '">
                                                    <label for="floatingEnddate">End date</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-floating mb-4">
                                            <textarea class="form-control" style="height: 150px; resize: none;" id="floatingOfferdescription" placeholder="Offerdescription" name="updateofferdescription" value="" data-dl-input-translation="true">' . $row['DESCRIPTION'] . '</textarea>
                                            <label for="floatingOfferdescription">Description</label>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <select id="selectcompanycreateoffer" class="form-select" name="updatecreatecompanyoffer" aria-label="Default select example">
                                                        <option value="' . $row['ID_Company'] . '" selected>' . $row['COMPANYNAME'] . '</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control" id="floatingSalary" placeholder="PlacefloatingSalary" name="updatesalary" value="' . $row['SALARY'] . '">
                                                    <label for="floatingSalary">Salary</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <select id="selectcompanycreateoffer" class="form-select" name="updatelocalisation" aria-label="Default select example">
                                                        <option value="' . $row['ID_Location'] . '" selected>' . $row['City'] . '</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="' . $row['ID_Offer'] . '" name="idoffer">
                                    <button type="submit" class="btn btn-primary btn-block mb-4" value="update" name="send">Update</button>
                                    <button type="submit" class="btn btn-secondary btn-block mb-4" value="delete" name="send">Delete</button>
                                    <input type="hidden" name="tabmoderation" value="offer">
                                
                                    
                                </form>
                            </div>
                        </div>
                    </div>';
    }
    echo $buffer;
} catch (\Throwable $th) {
    echo '<div class="alert alert-danger" style="margin-left: auto;margin-right: auto;" role="alert">Vous n\'avez pas l\'autorisation suffisante pour cette action !</div>';
}
