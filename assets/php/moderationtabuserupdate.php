<?php
try {
    $stmt = $pdo->prepare(" SELECT ID_Session 
                            FROM users 
                            WHERE users.USERNAME = ?;");
    $stmt->bindParam(1, $_SESSION["newsession"]);
    $stmt->execute();
    $res = $stmt->fetch();
    $stmt->closeCursor();
    $currentsession = $res['ID_Session'];

    if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["iduser"]) && isset($_POST["sessionuser"]) && isset($_POST["send"])) {
        try {
            if ($_POST['send'] == 'delete') {
                $stmt = $pdo->prepare(" DELETE FROM `users` WHERE ID_User = ?;");
                $stmt->bindParam(1, $_POST["iduser"]);
            } else {
                $stmt = $pdo->prepare(" UPDATE `users` SET `FIRSTNAME`=?, `LASTNAME`=?, `USERNAME`=?, `PASSWORD`=?, `ID_Session`=? WHERE users.ID_User = ?;");

                $stmt->bindParam(1, $_POST["firstname"]);
                $stmt->bindParam(2, $_POST["lastname"]);
                $stmt->bindParam(3, $_POST["username"]);
                $stmt->bindParam(4, $_POST["password"]);
                $stmt->bindParam(5, $_POST["sessionuser"]);
                $stmt->bindParam(6, $_POST["iduser"]);
            }


            $stmt->execute();
            $res = $stmt->fetch();
            $stmt->closeCursor();
        } catch (\Throwable $th) {
            echo '<div class="alert alert-danger" style="margin-left: auto;margin-right: auto;" role="alert">Erreur de connexion a la base de données</div>';
        }
    }



    if ($currentsession == 1 || $currentsession == 2 || $currentsession == 4) {
        $querybuffer = '    SELECT * FROM `users` WHERE users.ID_Session = 3 OR users.ID_Session = 4 ';

        if ($currentsession == 1 || $currentsession == 2) {
            $querybuffer .= 'OR users.ID_Session = 2 ';
        }
        if ($currentsession == 1) {
            $querybuffer .= 'OR users.ID_Session = 1 ';
        }
        if (isset($_POST['page'])) {
            $page = $_POST['page'];
        } else {
            $page = 1;
        }
    }

    $stmt = $pdo->prepare($querybuffer);
    $stmt->execute();
    $res = $stmt->fetchAll();
    $stmt->closeCursor();

    $buffer = "";
    $createuseroption = '';
    foreach ($res as $row) {
        if ($row['ID_Session'] == 1) {
            $createuseroption = '    <option value="1" selected>Admin</option>
                                <option value="2">Pilote</option>
                                <option value="4">Delegue</option>
                                <option value="3">Etudiant</option>';
        } else if ($row['ID_Session'] == 2) {
            $createuseroption = '    <option value="2" selected>Pilote</option>
                                <option value="4">Delegue</option>
                                <option value="3">Etudiant</option>';
            if ($currentsession == 1) {
                $createuseroption .= '<option value="1">Admin</option>';
            }
        } elseif ($row['ID_Session'] == 4) {
            $createuseroption = '    <option value="4" selected>Delegue</option>
                                <option value="3">Etudiant</option>';
            if ($currentsession == 2 || $currentsession == 1) {
                $createuseroption .= '<option value="2">Pilote</option>';
            }
            if ($currentsession == 1) {
                $createuseroption .= '<option value="1">Admin</option>';
            }
        } elseif ($row['ID_Session'] == 3) {
            $createuseroption = '<option value="3" selected >Etudiant</option>';
            if ($currentsession == 4 || $currentsession == 2 || $currentsession == 1) {
                $createuseroption .= '<option value="4">Delegue</option>';
            }
            if ($currentsession == 2 || $currentsession == 1) {
                $createuseroption .= '<option value="2">Pilote</option>';
            }
            if ($currentsession == 1) {
                $createuseroption .= '<option value="1">Admin</option>';
            }
        }



        $stmt = $pdo->prepare(" SELECT COUNT(*) as COUNTAPPLYUSER 
                                FROM applyfor WHERE 
                                ID_User = ?;");
        $stmt->bindParam(1, $row['ID_User']);
        $stmt->execute();
        $rescountapply = $stmt->fetch();
        $stmt->closeCursor();


        $buffer .= '    <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse' . $row['ID_User'] . '" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    ' . $row['FIRSTNAME'] . ' ' . $row['LASTNAME'] .'<p class="text-secondary" style="margin-top: 16px; margin-left: 20px;">( A postulé a '. $rescountapply['COUNTAPPLYUSER'] .' annonce(s))</p>
                                </button>
                            </h2>
                            <div id="flush-collapse' . $row['ID_User'] . '" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample1">
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
                                                    ' . $createuseroption . '
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <input type="hidden" value="' . $row['ID_User'] . '" name="iduser">
                                        <button type="submit" class="btn btn-primary btn-block mb-4" value="update" name="send">Update</button>

                                        <button type="submit" class="btn btn-secondary btn-block mb-4" value="delete" name="send">Delete</button>
                                        <input type="hidden" name="tabmoderation" value="user">
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
