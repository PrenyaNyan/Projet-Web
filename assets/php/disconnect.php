<?php
session_start();
if (isset($_SESSION['newsession'])) {
    unset($_SESSION['newsession']);
}
?>