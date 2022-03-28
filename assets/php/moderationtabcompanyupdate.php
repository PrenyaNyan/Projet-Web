<?php
if (isset($_POST["updatecompanyname"]) && isset($_POST["updateemail"]) && isset($_POST["updatedescription"]) && isset($_POST["companyusername"]) && isset($_POST["send"]) && isset($_POST["idcompany"])) {
    try {
        if ($_POST['send'] == 'delete') {
            $stmt = $pdo->prepare("DELETE FROM `company` WHERE ID_Company = ?;");
            $stmt->bindParam(1, $_POST["idcompany"]);
        } else {
            $stmt = $pdo->prepare("UPDATE `company` SET `NAME`=?,`EMAIL`=?,`DESCRIPTION`=?,`ID_User`=? 
                                    WHERE company.ID_Company = ?;");

            $stmt->bindParam(1, $_POST["updatecompanyname"]);
            $stmt->bindParam(2, $_POST["updateemail"]);
            $stmt->bindParam(3, $_POST["updatedescription"]);
            $stmt->bindParam(4, $_POST["companyusername"]);
            $stmt->bindParam(5, $_POST["idcompany"]);
        }


        $stmt->execute();
        $res = $stmt->fetch();
        $stmt->closeCursor();
    } catch (\Throwable $th) {
        echo '<div class="alert alert-danger" style="margin-left: auto;margin-right: auto;" role="alert">Erreur de connexion a la base de données</div>';
    }
}




try {
    $stmt = $pdo->prepare(" SELECT ID_Session 
                            FROM users 
                            WHERE users.USERNAME = ?;");
    $stmt->bindParam(1, $_SESSION["newsession"]);
    $stmt->execute();
    $res = $stmt->fetch();
    $stmt->closeCursor();
    $currentsession = $res['ID_Session'];

    if ($currentsession == 1 || $currentsession == 2 || $currentsession == 4) {
        $optioncreatecompany = 'SELECT users.USERNAME, users.ID_User FROM `users` ';

        $stmt = $pdo->prepare($optioncreatecompany);
        $stmt->execute();
        $res = $stmt->fetchAll();
        $stmt->closeCursor();
        $companyuser = "";
        foreach ($res as $row) {
            $companyuser .= '<option value="' . $row["ID_User"] . '">' . $row["USERNAME"] . '</option>';
        }
    }

    if ($currentsession == 1 || $currentsession == 2 || $currentsession == 4) {
        $querybuffer = 'SELECT ID_Company, company.NAME AS "COMPANYNAME", EMAIL, DESCRIPTION,users.ID_User, users.USERNAME FROM `company` INNER JOIN users ON company.ID_User = users.ID_User ';

        if ($currentsession == 4 || $currentsession == 2) {
            $querybuffer .= "WHERE company.ID_User = ?;";
            $stmt->bindParam(1, $currentsession);
        }

        $stmt = $pdo->prepare($querybuffer);
        if ($currentsession == 4 || $currentsession == 2) {
            $stmt->bindParam(1, $currentsession);
        }
        $stmt->execute();
        $res = $stmt->fetchAll();
        $stmt->closeCursor();
    }



    $buffer = "";
    foreach ($res as $row) {

        $buffer .= '    <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse' . $row["ID_Company"] . '" aria-expanded="false" aria-controls="flush-collapseOne">
                                    ' . $row["COMPANYNAME"] . '
                                </button>
                            </h2>
                            <div id="flush-collapse' . $row["ID_Company"] . '" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">
                                    <form action="../html/moderation.php" method="post">

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input class="form-control" id="floatingCompanyname" placeholder="Companyname" name="updatecompanyname" value="' . $row["COMPANYNAME"] . '">
                                                    <label for="floatingCompanyname">Name</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input class="form-control" id="floatingEmail" placeholder="Email" name="updateemail" value="' . $row["EMAIL"] . '">
                                                    <label for="floatingEmail">Email</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-floating mb-4">
                                            <textarea class="form-control" style="height: 150px;" id="floatingDescription" placeholder="Description" name="updatedescription" value="" data-dl-input-translation="true">' . $row["DESCRIPTION"] . '</textarea>
                                            <label for="floatingDescription">Description</label>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-sm-3">
                                                <div class="form-floating">
                                                    <select class="form-select" name="companyusername" aria-label="Default select example">
                                                        <option value="' . $row["ID_User"] . '" selected>' . $row["USERNAME"] . '</option>
                                                        ' . $companyuser . '
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" value="' . $row["ID_Company"] . '" name="idcompany">
                                        <button type="submit" class="btn btn-primary btn-block mb-4" value="update" name="send">Update</button>
                                        <button type="submit" class="btn btn-secondary btn-block mb-4" value="delete" name="send">Delete</button>
                                        <input type="hidden" name="tabmoderation" value="company">
                                    </form>
                                </div>
                            </div>
                        </div>';
    }
    echo $buffer;
} catch (\Throwable $th) {
    echo '<div class="alert alert-danger" style="margin-left: auto;margin-right: auto;" role="alert">Vous n\'avez pas l\'autorisation suffisante pour cette action !</div>';
    echo $th;
}
