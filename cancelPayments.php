<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php 

    include("layout/header.php");
    
?>
<?php 

    //ALL PRODUCTS NAVBAR
    include("layout/returnNavbar.php");
    
?>



<!-- MAIN INDEX PAGE -->
<div class="container mt-5">
  <h4 class="text-center">Your Payments Wasn't Successfull Try Again</h4>
  <div class="text-center mt-5 mb-5">
    <a href="index.php"><button class="btn btn-dark">Continue Shopping</button></a>
    <a href="customerAccount.php"><button class="btn btn-dark">Got to Your Acccount</button></a>
  </div>
</div>





<!-- CUSTOMER FOOTER -->
<?php 

    include("layout/footer.php");
    
?>