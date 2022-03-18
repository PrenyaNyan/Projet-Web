<?php
try {
    $stmt = $pdo->prepare("SELECT * FROM `promotion`");
    $stmt->execute();
    $res = $stmt->fetchAll();

    print_r($res);
    $stmt->closeCursor();

    foreach ($res as $row) {
        echo '<option value="' . $row['ID_Promotion'] . '">' . $row['NAME'] . '</option>';
    }
} catch (\Throwable $th) {
    echo '<option value="erreur">Erreur de connexion a la base de données</option>';
}
