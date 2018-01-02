<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
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
                <a class="nav-item nav-link custAccount" href="deletecustomeraccount.php?deleteCustomerAccount=<?php echo $id; ?>">Delete My Account</a>
            </nav>
            <div class="mt-3">
                <?php echo errorMessage(); ?>
                <?php echo successMessage(); ?>
            </div>
            <h1 class="text-center">How Sure You Want Delete Your Account?</h1>
            <div class="text-center mt-4">
                <a href="deletecustomeraccount.php?deleteCustomerAccount=<?php echo $id; ?>"><button class="btn btn-danger"><i class="fa fa-trash-o"></i> Yes I Want</button></a>
                <a href="customeraccount.php"><button class="btn btn-dark" type="submit" name"no" ><i class="fa fa-circle-o-notch"></i> No I Don't!!</button></a> 
            </div>
        </div>
    </div>   
</div>








<!-- CUSTOMER FOOTER -->
<?php 

    include("layout/footer.php");
    
?>