<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php
            if(isset($_POST['submit'])){

                $getIP =  get_ip_address();
     
                $costName = mysql_escape_string($_POST['customerFirstname']);
                $costLastname = mysql_escape_string($_POST['customerLastname']);
                $costNumber = mysql_escape_string($_POST['customerNumber']);
                $costEmail = mysql_escape_string($_POST['customerEmail']);
                $costStreet = mysql_escape_string($_POST['customerStreet']);
                $costApart = mysql_escape_string($_POST['customerAppart']);
                $costCity = mysql_escape_string($_POST['customerCity_State']);
                $costCountry = mysql_escape_string($_POST['customerCountry']);
                $costZip = mysql_escape_string($_POST['customerZipCode']);

                $costImage = $_FILES['image'] ['name'];
                $saveImage = "customersProfiles/".basename($_FILES['image'] ['name']);
                move_uploaded_file($_FILES['image'] ['tmp_name'], $saveImage);
        
                    if(empty($costName)) {
                        $_SESSION["errorMessage"] = "Please Enter Your Name";
                        header("Location: editcustomeraccount.php");
                        exit; 
                    } else if(empty($costLastname)) {
                        $_SESSION["errorMessage"] = "Please Enter Your Lastname";
                        header("Location: editcustomeraccount.php");
                        exit; 
                    } else if(empty($costNumber)) {
                        $_SESSION["errorMessage"] = "Please Enter Your Phone Number";
                        header("Location: editcustomeraccount.php");
                        exit;
                    } else if(empty($costEmail)) {
                        $_SESSION["errorMessage"] = "Please Enter Your Email";
                        header("Location: editcustomeraccount.php");
                        exit;
                    } else if(!filter_var($costEmail, FILTER_VALIDATE_EMAIL)) {
                        $_SESSION["errorMessage"] = "Your is Invalid";
                        header("Location: editcustomeraccount.php");
                        exit;
                    }
                     else if(empty($costStreet) || empty($costApart)) {
                        $_SESSION["errorMessage"] = "Comfirm Your Address in the Address field";
                        header("Location: editcustomeraccount.php");
                        exit;
                    } else if(empty($costCity) || empty($costCountry)) {
                        $_SESSION["errorMessage"] = "Comfirm Your Address in the Address field";
                        header("Location: editcustomeraccount.php.php");
                        exit;
                    } 
        
                    else {
                        
                        global $dbConnection;

                        $getIP  = get_ip_address();

                        $superGet = $_GET['editCustomerAccount'];

                    
                              
                        $costName = filter_var($costName, FILTER_SANITIZE_STRING);
                        $costLastname = filter_var($costLastname, FILTER_SANITIZE_STRING);
                        $costNumber = filter_var($costNumber, FILTER_SANITIZE_STRING);
                        $costEmail = filter_var($costEmail, FILTER_SANITIZE_EMAIL);
                        $costStreet = filter_var($costStreet, FILTER_SANITIZE_STRING);
                        $costApart = filter_var($costApart, FILTER_SANITIZE_STRING);
                        $costCity = filter_var($costCity, FILTER_SANITIZE_STRING);
                        $costCountry = filter_var($costCountry, FILTER_SANITIZE_STRING);
                        $costZip = filter_var($costZip, FILTER_SANITIZE_STRING);
        
                        
                        $sql = "UPDATE customers SET customerIP='$getIP', 
                                                     customerFirstname='$costName', 
                                                     customerLastname='$costLastname',
                                                     customerNumber='$costNumber', 
                                                     customerEmail='$costEmail', 
                                                     customerStreet='$costStreet', 
                                                     customerApart='$costApart', 
                                                     customerCity='$costCity', 
                                                     customerCountry='$costCountry', 
                                                     customerZip='$costZip', 
                                                     customerImage='$costImage'
                                                 WHERE customerID = '$superGet' ";

                        $runQuery = mysql_query($sql);
                            if(!$runQuery){
                                $error = die(mysql_error());
                                echo $error;
                            } else {
                                header("Location: customerAccount.php");
                                $_SESSION["successMessage"] = "You Have Successful Updated Your Account"; 
                                exit; 
                            }
                    }
                   
            }

?>
<?php
    if(!isset($_SESSION['customerEmail'])){
      header("Location: customerLogin.php");
    }  
?>
<?php 
    include("layout/header.php"); 
?>
<?php 
    //ALL PRODUCTS NAVBAR
    include("layout/mainnavbar.php");   
?>





<!-- MAIN CUSTOMER ACCOUNT -->
<div class="container mt-5 mb-5">
    <?php

        $email = $_SESSION['customerEmail'];
       
        global $dbConnection;

       $sql = "SELECT * FROM customers WHERE customerEmail='$email' ";
       $runSQL = mysql_query($sql);

       while($row = mysql_fetch_array($runSQL)){
           $id = $row['customerID'];
           $name = $row['customerFirstname'];
           $surname = $row['customerLastname'];
           $number = $row['customerNumber'];
           $email = $row['customerEmail'];
           $street = $row['customerStreet'];
           $appart = $row['customerApart'];
           $city = $row['customerCity'];
           $country = $row['customerCountry'];
           $zip = $row['customerZip'];
           $image = $row['customerImage'];
       }

    ?>

    <div class="row">
        <div class="col-lg-4 text-center">
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h4 class="card-title">My Profile</h4>
                    <img src="customersProfiles/<?php echo $image ?>" alt="..." class="rounded-circle" width="180px">
                    <h4><?php echo $name. " " . $surname; ?></h4>
                    <h6><?php echo "Contact: " . $number; ?></h6>
                    <h6><?php echo "Email: " . $email; ?></h6>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <nav class="nav nav-pills nav-justified">
                <a class="nav-item nav-link custAccount" href="customerAccount.php">My Account</a>
                <a class="nav-item nav-link custAccount" href="editcustomeraccount.php?editCustomerAccount=<?php echo $id; ?>">Edit My Profile</a>
                <a class="nav-item nav-link custAccount" href="deletecustomer.php">Delete My Account</a>
            </nav>

<div class="mt-4">
<?php echo errorMessage(); ?>
<?php echo successMessage(); ?>
                <form action="editcustomeraccount.php?editCustomerAccount=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Firstname</label>
                            <input type="text" name="customerFirstname" class="form-control" value="<?php echo  $name; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Lastname</label>
                            <input type="text" name="customerLastname" class="form-control" value="<?php echo  $surname; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Phone Number</label>
                            <input type="number" name="customerNumber" class="form-control" value="<?php echo  $number; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Email</label>
                            <input type="text" name="customerEmail" class="form-control" value="<?php echo  $email; ?>">
                        </div>     
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" name="customerStreet"  class="form-control" value="<?php echo  $street; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Address 2</label>
                        <input type="text" name="customerAppart" class="form-control" value="<?php echo  $appart; ?>">
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" name="customerCity_State" class="form-control" value="<?php echo  $city; ?>">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="">Select Country</label>
                    <select name="customerCountry" id="" class="form-control">
                        <option><?php echo  $country; ?></option>
                        <option>United Kingdom</option>
                        <option>South Africa</option>
                        <option>D.R.Congo</option>
                        <option>Mexico</option>       
                    </select>
                    </div>
                    <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input name="customerZipCode" type="number" class="form-control" value="<?php echo  $zip; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Choose Profile Image</label>
                    <input type="file" class="form-control-file" name="image">
                </div>    
                <button type="submit" name="submit" class="btn btn-dark btn-block">Save Change</button>
                </form>

            </div>
        </div>
    </div>   
</div>






<!-- CUSTOMER FOOTER -->
<?php 

    include("layout/footer.php");
    
?>