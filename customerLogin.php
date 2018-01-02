<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php require_once("cartFunction.php"); ?>
<?php 

    //calling  cart function
    addToCart();
    //calling customer logingin function
    customerLogin();
    
?>
<?php 

    include("layout/header.php");
    
?>
<?php 

    //ALL PRODUCTS NAVBAR
    include("layout/mainnavbar.php");
    
?>


<!-- MAIN CUSTOMER LOGIN PAGE -->
<div style="margin-top: 100px">
<div class="container mx-auto mt-5 mb-5">
<div class="w-75 p-3 mx-auto">
    <h3>Login Here</h3>
<?php echo errorMessage(); ?>
<?php echo successMessage(); ?>
<form action="customerLogin.php" method="POST">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" id="" placeholder="Enter Your Firstname">
        </div>
        <div class="form-group col-md-6">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" id="" placeholder="Enter Your Lastname">
        </div>        
    </div>
    <div class="mb-2">
        <a id="atags" href="customerRegistration.php">Register Here</a>
        <a id="atags" class="float-right" href="customerpasswordreset.php">Forgot Password?</a>
    </div>
  <button type="submit" name="submit" class="btn btn-dark btn-block">Login</button>
</form>
</div>
</div>
</div>




<!-- CUSTOMER FOOTER -->
<?php 

    include("layout/footer.php");
    
?>