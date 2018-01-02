<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php

    global $dbConnection;

    $getSuper = $_GET['deleteCustomerAccount'];

    $sql = "DELETE FROM customers WHERE customerID = '$getSuper' ";

    $runSQL = mysql_query($sql);
    if(!$runSQL){
        $error = die(mysql_query());
        echo $error;
    } else {
        header("Location: index.php");
    }

    session_destroy();

?>




    
