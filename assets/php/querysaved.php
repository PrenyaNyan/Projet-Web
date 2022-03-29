<?php
try {
    $stmt = $pdo->prepare(" SELECT company.NAME AS COMPANYNAME, company.EMAIL, company.DESCRIPTION AS COMPANYDESC,offer.ID_Offer ,offer.NAME AS OFFERNAME, offer.STARTDATE, offer.ENDDATE, offer.REALEASEDATE, offer.SALARY, offer.NBPLACE, offer.DESCRIPTION AS OFFERDESC 
                            FROM `offer` inner JOIN location ON offer.ID_Location = location.ID_Location 
                            inner JOIN save ON offer.ID_Offer = save.ID_Offer 
                            inner JOIN users ON save.ID_User = users.ID_User 
                            inner JOIN company on offer.ID_Company = company.ID_Company
                            WHERE users.USERNAME = ?;");
    $stmt->bindParam(1, $_SESSION["newsession"]);
    $stmt->execute();
    $res = $stmt->fetchAll();
    $stmt->closeCursor();
    $buffer = "";

    foreach ($res as $row) {
        $buffer .= '
        <div class="container announceBackground lamarge">
        <div class="row">
    
          <div class="col-sm-8">
            <strong class="d-inline-block mb-2 text-primary">
              <font style="vertical-align: inherit;">' . $row['COMPANYNAME'] . '</font>
            </strong>
            <h3 class="mb-0">
              <font style="vertical-align: inherit;">' . $row['OFFERNAME'] . '</font>
            </h3>
            <div class="mb-1 text-muted">
              <font style="vertical-align: inherit;">' . $row['STARTDATE'] . '/' . $row['ENDDATE'] . '</font>
            </div>
            <p class="card-text mb-auto">
              <font style="vertical-align: inherit;">' . $row['OFFERDESC'] . '</font>
            </p>
            <form action="../html/postuler.php" method="post" class="buttonPosition">
              <input type="hidden" name="id" value="' . $row['ID_Offer'] . '">
              <button type="submit" class="btn btn-primary btn-lg buttonAnnounce">
                <font style="vertical-align: inherit;">voir plus</font>
              </button>
            </form>
          </div>
    
          <div class="col-sm-3">
            <img src="https://img-0.journaldunet.com/la7i_1Y8UNwnsDRdLYjaR2CHPKA=/1500x/smart/da9bdec385c74c66b032708cfe1453a6/ccmcms-jdn/28990032.jpg" alt="" width="100%" style="border-radius: 8px;" />
            </svg>
    
    
          </div>
          <div class="col-sm-offset-0 col-sm-1">
            <button class="leboutonpourlike" id="likebutton' . $row['ID_Offer'] . '" value="' . $row['ID_Offer'] . '">
              <i class="fas fa-heart fa-2x liked" value="dashboard" id="heartimg' . $row['ID_Offer'] . '"></i>
              <input type="hidden" id="likedashboard" value="dashboard">
            </button>
          </div>
        </div>
      </div>';
    }
    echo $buffer;
} catch (\Throwable $th) {
    echo '<option value="erreur">Erreur de connexion a la base de données</option>';
    echo $th;
}
