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
                <a class="nav-item nav-link custAccount" href="deletecustomer.php">Delete My Account</a>
            </nav>
            <div class="mt-3">
                <?php echo errorMessage(); ?>
                <?php echo successMessage(); ?>
            </div>

            <div class="mt-4">
                    <table class="table table-sm table-responsive text-center">
                      <thead>
                        <tr class="text-center">
                          <th scope="col">#</th>
                          <th scope="col">Product Names</th>
                          <th scope="col">Quantite</th>
                          <th scope="col">Invoice Number</th>
                          <th scope="col">Total Price</th>
                          <th scope="col">Order Date</th>
                          <th scope="col">Product Image</th>
                          <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <?php

                            global $dbConnection;


                            $sql = "SELECT * FROM orders";
                            $runSQL = mysql_query($sql);

                            $default = 0;
                            while($rowFetch = mysql_fetch_array($runSQL)) {
                              $orderID = $rowFetch['orderID'];
                              $orderQuantite = $rowFetch['quantite'];
                              $productID = $rowFetch['productID'];
                              $invoiceNumber = $rowFetch['invoiceNumber'];
                              $orderDate = $rowFetch['orderDate'];
                              $status = $rowFetch['status'];
                              $default++;

                              $sql = "SELECT * FROM products WHERE productID='$productID' ";
                              $runQuery = mysql_query($sql);
                              $rows = mysql_fetch_array($runQuery);
                                   $name = $rows['productName'];
                                   $image = $rows['productImage'];
                                   $price = $rows['productPrice'];     
                        ?>
                        <tbody>
                        <tr>
                          <th scope="row"><?php echo $default; ?></th>
                          <td><?php echo $name; ?></td>
                          <td><?php echo $orderQuantite; ?></td>
                          <td><?php echo $invoiceNumber; ?></td>
                          <td><?php echo $price; ?></td>
                          <td><?php echo $orderDate; ?></td>
                          <td><img src="fileUploads/<?php echo $image; ?>" alt="" width="40px" height="40px"></td>
                          <td class="text-success"><?php echo $status; ?></td>
                        </tr>
                      </tbody>
                      <?php } ?> <!--ENDING WHILE LOOP--> 
                  </table>                    
        </div>


        </div>
    </div>   
</div>






<!-- CUSTOMER FOOTER -->
<?php 

    include("layout/footer.php");
    
?>

