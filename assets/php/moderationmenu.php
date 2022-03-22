<?php
try {
    $stmt = $pdo->prepare(" SELECT users.ID_Session 
                            FROM users 
                            WHERE users.USERNAME = ?;");
    $stmt->bindParam(1, $_SESSION["newsession"]);
    $stmt->execute();
    $res = $stmt->fetch();
    $stmt->closeCursor();

    if ($res['ID_Session'] == 1 || $res['ID_Session'] == 2 ||$res['ID_Session'] == 4) {
        echo '  <button class="nav-link active navleft" id="nav-user-tab" data-bs-toggle="tab" data-bs-target="#nav-user" type="button" role="tab" aria-controls="nav-user" aria-selected="true"><i class="fas fa-user"></i></button>
                <button class="nav-link navmid" id="nav-company-tab" data-bs-toggle="tab" data-bs-target="#nav-company" type="button" role="tab" aria-controls="nav-company" aria-selected="false"><i class="fas fa-building"></i></button>
                <button class="nav-link navright" id="nav-offer-tab" data-bs-toggle="tab" data-bs-target="#nav-offer" type="button" role="tab" aria-controls="nav-offer" aria-selected="false"><i class="far fa-newspaper"></i></button>';
    }else{
        echo '<div class="alert alert-danger" style="margin-left: auto;margin-right: auto;" role="alert">Vous n\'avez pas l\'autorisation suffisante pour cette action !</div>';
    }

} catch (\Throwable $th) {
    echo '<option value="erreur" class="navmid">Erreur de connexion a la base de données</option>';
    echo $th;
}
?>