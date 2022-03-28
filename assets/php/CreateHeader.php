<?php
try {
    session_start();
    $stmt = $pdo->prepare(" SELECT ID_Session
                            FROM users 
                            WHERE users.USERNAME = ?;");
    $stmt->bindParam(1, $_SESSION["newsession"]);
    $stmt->execute();
    $res = $stmt->fetch();
    $stmt->closeCursor();
    $modo = '';

if ($row['ID_Session'] =! 3){
    $modo = '<li><a class="dropdown-item" href="http://localhost/assets/html/moderation.php">Modération</a></li>';
}

        $buffer = '
        <header class="p-3 bg-white text-black">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <img src="https://cdn.discordapp.com/attachments/950033739604434965/950403057567551528/logo.png" class="bi me-2" style="width: 100px;">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="http://localhost/assets/html/accueil.php" class="nav-link px-2 text-black">Accueil</a></li>
                    <li><a href="http://localhost/assets/html/dashboard.php" class="nav-link px-2 text-black">DashBoard</a></li>
                </ul>



                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/assets/vendors/Frogs/Frog3_right.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="http://localhost/assets/html/annonce.html">Créer une annonce</a></li>
                        '. $modo .'
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>




            </div>
        </div>
    </header>';
    echo $buffer;


} catch (\Throwable $th) {
    echo '<option value="erreur" class="navmid">Erreur de connexion a la base de données</option>';
    echo $th;
}
