<?php
if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["id"]) && isset($_POST["sessionuser"])) {
    try {
        $stmt = $pdo->prepare(" UPDATE `users` SET `FIRSTNAME`=?, `LASTNAME`=?, `USERNAME`=?, `PASSWORD`=?, `ID_Session`=? WHERE users.ID_User = ?;");

        $stmt->bindParam(1, $_POST["firstname"]);
        $stmt->bindParam(2, $_POST["lastname"]);
        $stmt->bindParam(3, $_POST["username"]);
        $stmt->bindParam(4, $_POST["password"]);
        $stmt->bindParam(5, $_POST["sessionuser"]);
        $stmt->bindParam(6, $_POST["id"]);
        $stmt->execute();
        $res = $stmt->fetch();
        $stmt->closeCursor();
    } catch (\Throwable $th) {
        echo '<div class="alert alert-danger" style="margin-left: auto;margin-right: auto;" role="alert">Erreur de connexion a la base de données</div>';
        echo $th;
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

    if ($res['ID_Session'] == 1 || $res['ID_Session'] == 2 || $res['ID_Session'] == 4) {
        $querybuffer = '    SELECT * FROM `users` WHERE users.ID_Session = 3 OR users.ID_Session = 4 ';

        if ($res['ID_Session'] == 1 || $res['ID_Session'] == 2) {
            $querybuffer .= 'OR users.ID_Session = 2 ';
        }
        if ($res['ID_Session'] == 1) {
            $querybuffer .= 'OR users.ID_Session = 1';
        }
    }
    $currentsession = $res['ID_Session'];

    $stmt = $pdo->prepare($querybuffer);
    $stmt->execute();
    $res = $stmt->fetchAll();
    $stmt->closeCursor();

    $buffer = "";
    $queryoption = '';
    foreach ($res as $row) {
        if ($row['ID_Session'] == 1) {
            $queryoption = '    <option value="1" selected>Admin</option>
                                <option value="2">Pilote</option>
                                <option value="4">Delegue</option>
                                <option value="3">Etudiant</option>';
        } else if ($row['ID_Session'] == 2) {
            $queryoption = '    <option value="2" selected>Pilote</option>
                                <option value="4">Delegue</option>
                                <option value="3">Etudiant</option>';
            if ($currentsession == 1) {
                $queryoption .= '<option value="1">Admin</option>';
            }
        } elseif ($row['ID_Session'] == 4) {
            $queryoption = '    <option value="4" selected>Delegue</option>
                                <option value="3">Etudiant</option>';
            if ($currentsession == 2 || $currentsession == 1) {
                $queryoption .= '<option value="2">Pilote</option>';
            }
            if ($currentsession == 1) {
                $queryoption .= '<option value="1">Admin</option>';
            }
        } elseif ($row['ID_Session'] == 3) {
            $queryoption = '<option value="3" selected >Etudiant</option>';
            if ($currentsession == 4 || $currentsession == 2 || $currentsession == 1) {
                $queryoption .= '<option value="4">Delegue</option>';
            }
            if ($currentsession == 2 || $currentsession == 1) {
                $queryoption .= '<option value="2">Pilote</option>';
            }
            if ($currentsession == 1) {
                $queryoption .= '<option value="1">Admin</option>';
            }
        }
        $buffer .= '    <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse' . $row['ID_User'] . '" aria-expanded="false" aria-controls="flush-collapseOne">
                                    ' . $row['FIRSTNAME'] . ' ' . $row['LASTNAME'] . '
                                </button>
                            </h2>
                            <div id="flush-collapse' . $row['ID_User'] . '" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <form action="../html/moderation.php" method="post">
                                        <!-- 2 column grid layout with text inputs for the first and last names -->
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input class="form-control" id="floatingFirstname" placeholder="Firstname" name="firstname" value="' . $row['FIRSTNAME'] . '">
                                                    <label for="floatingFirstname">First name</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input class="form-control" id="floatingLastname" placeholder="Lastname" name="lastname" value="' . $row['LASTNAME'] . '">
                                                    <label for="floatingLastname">Last name</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input class="form-control FirstInput" id="floatingUsername" placeholder="Username" name="username" value="' . $row['USERNAME'] . '">
                                                    <label for="floatingUsername">Username</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input class="form-control LastInput" id="floatingPassword" placeholder="Password" name="password" value="' . $row['PASSWORD'] . '">
                                                    <label for="floatingPassword">Password</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-sm-3">
                                                <div class="form-floating">
                                                    <select class="form-select" name="sessionuser" aria-label="Default select example">
                                                    ' . $queryoption . '
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Submit button -->
                                        <input type="hidden" value="' . $row['ID_User'] . '" name="id">
                                        <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
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
