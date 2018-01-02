<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php

    global $dbConnection;

    $getSuper = $_GET['deletecat'];

    $sql = "DELETE FROM category WHERE productID='$getSuper' ";
    $runSQL = mysql_query($sql);

    if($runSQL){
        header("Location: addcategory.php");
        $_SESSION["successMessage"] = "You Have Successfull Deleted Category";    
        exit;
    } else {
        $error = die(mysql_error());
        echo $error;
    }

?>
<?php

    if(!$_SESSION['email']){
        header("Location: adminlogin.php");
    }
?>