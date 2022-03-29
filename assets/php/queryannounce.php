<?php



if (isset($_GET['FilterApply'])) {


    //$Annee = $_GET['Annee'];
    $date = $_GET['date'];
    $localisation = $_GET['localisation'];
    // $rate = $_GET['rate']; 


    try {




        if ($date != '' or $localisation != '') {
            $WHERE = "WHERE";

            if ($date != '' and $localisation != '') {
                $et = "AND";
            } else {
                $et = '';
            }
        } else {
            $WHERE = '';
            $et = '';
        }

        $FILTER_DATE = ($date == '') ? '' : "offer.STARTDATE >= '$date'";
        $FILTER_LOCATION = ($localisation == '') ? '' : "location.ID_Location = $localisation";





        $stmt = $pdo->prepare('SELECT company.Name AS NAMECOMPANY, offer.NAME AS NAMEOFFER, offer.STARTDATE AS STARTDATE, offer.ENDDATE AS ENDDATE, offer.DESCRIPTION AS THEDESCRIPTION, offer.ID_Offer AS IDOFFER, location.City AS LOCALISATION 
                                FROM `offer` inner JOIN company ON offer.ID_Company = company.ID_Company 
                                inner JOIN location ON offer.ID_Location = location.ID_Location 
                                ' . $WHERE . ' ' . $FILTER_DATE . ' ' . $et . ' ' . $FILTER_LOCATION . '   ;');


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
              <font style="vertical-align: inherit;">' . $row['NAMECOMPANY'] . '</font>
            </strong>
            <h3 class="mb-0">
              <font style="vertical-align: inherit;">' . $row['NAMEOFFER'] . '</font>
            </h3>
            <div class="mb-1 text-muted">
              <font style="vertical-align: inherit;">' . $row['STARTDATE'] . '/' . $row['ENDDATE'] . '</font>
            </div>
            <p class="card-text mb-auto">
              <font style="vertical-align: inherit;">' . $row['THEDESCRIPTION'] . '</font>
            </p>
            <form action="../html/postuler.php" method="post" class="buttonPosition">
              <input type="hidden" name="id" value="' . $row['IDOFFER'] . '">
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
          <button class="leboutonpourlike" id="likebutton'.$row['IDOFFER'].'" value="'.$row['IDOFFER'].'">
          <i class="far fa-heart fa-2x" id="heartimg'.$row['IDOFFER'].'"></i>
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
} else {

    $stmt = $pdo->prepare('SELECT company.Name AS NAMECOMPANY, offer.NAME AS NAMEOFFER, offer.STARTDATE AS STARTDATE, offer.ENDDATE AS ENDDATE, offer.DESCRIPTION AS THEDESCRIPTION, offer.ID_Offer AS IDOFFER, location.City AS LOCALISATION 
                                FROM `offer` inner JOIN company ON offer.ID_Company = company.ID_Company 
                                inner JOIN location ON offer.ID_Location = location.ID_Location 
                                ;');


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
              <font style="vertical-align: inherit;">' . $row['NAMECOMPANY'] . '</font>
            </strong>
            <h3 class="mb-0">
              <font style="vertical-align: inherit;">' . $row['NAMEOFFER'] . '</font>
            </h3>
            <div class="mb-1 text-muted">
              <font style="vertical-align: inherit;">' . $row['STARTDATE'] . '/' . $row['ENDDATE'] . '</font>
            </div>
            <p class="card-text mb-auto">
              <font style="vertical-align: inherit;">' . $row['THEDESCRIPTION'] . '</font>
            </p>
            <form action="../html/postuler.php" method="post" class="buttonPosition">
              <input type="hidden" name="id" value="' . $row['IDOFFER'] . '">
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
            <button class="leboutonpourlike" id="likebutton'.$row['IDOFFER'].'" value="'.$row['IDOFFER'].'">
              <i class="far fa-heart fa-2x" id="heartimg'.$row['IDOFFER'].'"></i>
            </button>
          </div>
        </div>
      </div>';
    }
    echo $buffer;
}
