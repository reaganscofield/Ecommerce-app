<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php
  
 if(isset($_GET['CompleteOrder'])){

 	global $dbConnection;
   	$getSuper = $_GET['CompleteOrder'];

   	$completed = "Completed";


   	$update = "UPDATE orders SET status='$completed' WHERE orderID='$getSuper' ";
   	$runQuery = mysql_query($update);
   		if($runQuery){
   			header("Location: viewOrders.php");
   			$_SESSION["successMessage"] = "You Have Successfull Completed Order"; 
            exit;
   		} else {
   			header("Location: completeorder.php");
   			$error = die(mysql_error());
   			echo $error;
   		}
   }

 ?>