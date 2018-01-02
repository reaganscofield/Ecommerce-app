<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php

    global $dbConnection;

    $getSuper = $_GET['deletebrand'];

    $sql = "DELETE FROM brand WHERE brandID='$getSuper' ";
    $runSQL = mysql_query($sql);

    if($runSQL){
        $_SESSION["successMessage"] = "You Have Successfull Deleted Brand";
        header("Location: addbrand.php");
        exit;
    } else {
        $error = die(mysql_error());
        echo $error;
    }

?>