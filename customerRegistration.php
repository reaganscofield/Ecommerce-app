<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php require_once("cartFunction.php"); ?>
<?php 

    //calling customer registrations function
    customerRegistration();
   
?>
<?php 

    include("layout/header.php");
    
?>
<?php 

    //ALL PRODUCTS NAVBAR
    include("layout/mainnavbar.php");
    
?>







<!-- MAIN CUSTOMER REGISTATION PAGE -->
<div class="container mx-auto mt-3 mb-3">
<div class="w-75 p-3 mx-auto">
<?php echo errorMessage(); ?>
<?php echo successMessage(); ?>
<form action="customerRegistration.php" method="POST" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="">Firstname</label>
            <input type="text" name="customerFirstname" class="form-control" id="" placeholder="Enter Your Firstname">
        </div>
        <div class="form-group col-md-6">
            <label for="">Lastname</label>
            <input type="text" name="customerLastname" class="form-control" id="" placeholder="Enter Your Lastname">
        </div>
        <div class="form-group col-md-6">
            <label for="">Phone Number</label>
            <input type="number" name="customerNumber" class="form-control" id="" placeholder="Enter Your Phone Number">
        </div>
        <div class="form-group col-md-6">
            <label for="">Email</label>
            <input type="text" name="customerEmail" class="form-control" id="" placeholder="Enter Your Email">
        </div>
        <div class="form-group col-md-6">
            <label for="">Password</label>
            <input type="password" name="customerPassword" class="form-control" id="" placeholder="Enter Your Password">
        </div>
        <div class="form-group col-md-6">
            <label for="">Confirm Password</label>
            <input type="password" name="customerPassword2" class="form-control" id="" placeholder="Re-Enter Password">
        </div>
    </div>
    <div class="form-group">
        <label for="">Address</label>
        <input type="text" name="customerStreet"  class="form-control" id="" placeholder="1234 Main St">
    </div>
    <div class="form-group">
        <label for="">Address 2</label>
        <input type="text" name="customerAppart" class="form-control" id="" placeholder="Apartment, studio, or floor">
    </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" name="customerCity_State" class="form-control" id="inputCity" placeholder="City, State/Province">
    </div>
    <div class="form-group col-md-4">
      <label for="">Select Country</label>
      <select name="customerCountry" id="" class="form-control">
        <option>United States</option>
        <option>United Kingdom</option>
        <option>South Africa</option>
        <option>D.R.Congo</option>
        <option>Mexico</option>       
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input name="customerZipCode" type="number" class="form-control" id="" placeholder="1456">
    </div>
  </div>
  <div class="form-group">
    <label for="">Choose Profile Image</label>
    <input type="file" class="form-control-file" name="image">
  </div>  
  <button type="submit" name="submit" class="btn btn-dark btn-block">Sign Up</button>
</form>
</div>
</div>







<!-- CUSTOMER FOOTER -->
<?php 

    include("layout/footer.php");
    
?>

