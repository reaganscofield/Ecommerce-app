<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php

    if(!isset($_SESSION['customerEmail'])){
        header("Location: customerLogin.php");
    } else {
        header("Location: payments.php");
    }
?>

