<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php

    global $dbConnection;

    $getSuper = $_GET['DeleteCustomer'];

    $sql = "DELETE FROM customers WHERE customerID='$getSuper' ";
    $runSQL = mysql_query($sql);

    if($runSQL){
        $_SESSION["successMessage"] = "You Have Successfull Deleted Customer";
        header("Location: managecustomers.php");
        exit;
    } else {
        $error = die(mysql_error());
        echo $error;
    }

?>
