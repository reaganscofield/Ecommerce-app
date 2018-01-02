<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php
    if(!isset($_SESSION['email'])){
        header("Location: adminlogin.php");
    }
?>
<?php
      
    include("adminlayout/header.php");

?>
<?php
      
    include("adminlayout/navbar.php");

?> 

  

<!-- ADD PRODUCT MAIN PAGE -->
<main role="main" class="container mt-5">
      
        <a href="admin.php"><button class="btn btn-dark">Go Back To Dashboard</button> </a>
          
                <div class="mt-3 mx-auto">
                    <h1>CUSTOMERS ORDERS</h1>
                    <?php echo errorMessage(); ?>
                    <?php echo successMessage(); ?>



                    <div class="mt-4">
                    <table class="table table-bordered table-sm table-responsive text-center">
                      <thead>
                        <tr class="text-center">
                          <th scope="col">#</th>
                          <th scope="col">Customer Name</th>
                          <th scope="col">Customer Email</th>
                          <th scope="col">Product Names</th>
                          <th scope="col">Quantite</th>
                          <th scope="col">Invoice Number</th>
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
                              $customerID = $rowFetch['custmerID'];
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

                            $sql = "SELECT * FROM customers WHERE customerID='$customerID' ";
                              $runQuery = mysql_query($sql);
                              $rows = mysql_fetch_array($runQuery);
                                   $first = $rows['customerFirstname'];
                                   $email = $rows['customerEmail'];
                                   $lastname = $rows['customerLastname'];
                                      
                        ?>
                        <tbody>
                        <tr>
                          <th scope="row"><?php echo $default; ?></th>
                          <td><?php echo $first. ' ' .$lastname; ?></td>
                          <td><?php echo $email; ?></td>
                          <td><?php echo $name; ?></td>
                          <td><?php echo $orderQuantite; ?></td>
                          <td><?php echo $invoiceNumber; ?></td>
                          <td><?php echo $orderDate; ?></td>
                          <td><img src="fileUploads/<?php echo $image; ?>" alt="" width="40px" height="40px"></td>
                          <td class="text-success"><a  onclick='changeContent()' href="completeorder.php?CompleteOrder=<?php echo $orderID; ?>"><span id="change">
                            <?php

                            if($status === "In Progress"){
                              echo "Complete This Order";
                            } else {
                              echo "Completed";
                            }
                            ; ?>
                            <span></a></td>
                        </tr>
                      </tbody>
                      <?php } ?> <!--ENDING WHILE LOOP--> 
                  </table>                    
                </div>
        
      </div><!--/row-->
</main><!--/.container-->






<?php
      
    include("adminlayout/footer.php");

?> 
 
   