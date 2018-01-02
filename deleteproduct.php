<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php

    global $dbConnection;

    $getSuper = $_GET['DeleteProduct'];

    $sql = "DELETE FROM products WHERE productID='$getSuper' ";
    $runSQL = mysql_query($sql);

    if($runSQL){
        $_SESSION["successMessage"] = "You Have Successfull Deleted Product";
        header("Location: manageproducts.php");
        exit;
    } else {
        $error = die(mysql_error());
        echo $error;
    }

?>