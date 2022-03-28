<?php
session_start();
echo 'Gros sexe';
if (isset($_SESSION['newsession'])) {
    unset($_SESSION['newsession']);
    echo ' sexe';
}
?>