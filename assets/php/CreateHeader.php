<?php
try {
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
        <header class="p-3 headerColor text-black">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <img src="https://cdn.discordapp.com/attachments/950033739604434965/950403057567551528/logo.png" class="bi me-2" style="width: 100px;">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="http://localhost/assets/html/accueil.php" class="nav-link px-2 text-black">Accueil</a></li>
                    <li><a href="http://localhost/assets/html/dashboard.php" class="nav-link px-2 text-black">DashBoard</a></li>
                </ul>



                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                  </svg>
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="http://localhost/assets/html/moderation.php">Espace Modérateur</a></li>
                        '. $modo .'
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a id="headerdisconnect" class="dropdown-item" href="#">Sign out</a></li>
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
