<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php require_once("cartFunction.php"); ?>
<?php 

    //calling  cart function
    addToCart();
    //calling customer password reset function
    resetPassword();
    
?>
<?php 

    include("layout/header.php");
    
?>
<?php 

    //ALL PRODUCTS NAVBAR
    include("layout/mainnavbar.php");
    
?>




<!-- MAIN CUSTOMER FORGOT PASSWORD PAGE -->
<div style="margin-top: 100px">
<div class="container mx-auto mt-5 mb-5">
<div class="w-75 p-3 mx-auto">
    <h3>Reset Password</h3>
<?php echo errorMessage(); ?>
<?php echo successMessage(); ?>
<form action="customerpasswordreset.php" method="POST">
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="email"  class="form-control" id="" placeholder="Enter Your Existing Email">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="">New Password</label>
            <input type="password" name="password" class="form-control" id="" placeholder="Enter Your New Password">
        </div>
        <div class="form-group col-md-6">
            <label for="">Comfirm New Password</label>
            <input type="password" name="password2" class="form-control" id="" placeholder="Comfirm Your New Password">
        </div>
    </div> 
    <button type="submit" name="submit" class="btn btn-dark btn-block">Submit</button>
</form>
</div>
</div>
</div>






<!-- CUSTOMER FOOTER -->
<?php 

    include("layout/footer.php");
    
?>
