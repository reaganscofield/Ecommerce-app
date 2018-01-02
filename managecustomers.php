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
  


<div class="container mt-5">
<div class="mx-auto">
    <a href="admin.php"><button class="btn btn-dark">Go Back To Dashboard</button> </a>
           
                <div class="mx-auto">
                <h1 class="text-center">CUSTOMERS LIST</h1>

                <div>
                    <?php echo errorMessage(); ?>
                    <?php echo successMessage(); ?>
                </div>
                
                 
                  <!-- SHOWING ALL BRAND FROM DB -->
                  <div class="mt-4 ">
                    <table class="table table-sm table-bordered table-responsive">
                      <thead>
                        <tr class="text-center">
                          <th scope="col">#</th>
                          <th scope="col">Customer Name</th>
                          <th scope="col">Customer Phone Number</th>
                          <th scope="col">Customer Email</th>
                          <th scope="col">Customer IP</th>
                          <th scope="col">Customer Country</th>
                          <th scope="col">Customer City</th>
                          <th scope="col">Customer Zip</th>
                          <th scope="col">Customer Picture</th>
                          <th scope="col">Live Views Customer</th>
                          <th scope="col">Delete Product</th>
                        </tr>
                        </thead>
                        <?php

                            global $dbConnection;

                            $sql = "SELECT * FROM customers";
                            $runQuery = mysql_query($sql);
                            if($runQuery){
                              $defaultWhileLoop = 0;
                            while($rows = mysql_fetch_array($runQuery)){
                                $id = $rows['customerID'];
                                $id1 = $rows['customerIP'];
                                $name = $rows['customerFirstname'];
                                $lastname = $rows['customerLastname'];
                                $phone = $rows['customerNumber'];
                                $email = $rows['customerEmail'];
                                $country = $rows['customerCountry'];
                                $city = $rows['customerCity'];
                                $zip = $rows['customerZip'];
                                $street = $rows['customerStreet'];
                                $apart = $rows['customerApart'];
                                $picture = $rows['customerImage'];
                                $defaultWhileLoop++;
                               
                        ?>
                        <tbody>
                        <tr class="text-center">
                          <th scope="row"><?php echo $defaultWhileLoop; ?></th>
                          <td><?php echo $name . $lastname ; ?></td>
                          <td><?php echo $phone; ?></td>
                          <td><?php echo $email; ?></td>
                          <td><?php echo "ip goes here"; ?></td>
                          <td><?php echo $country; ?></td>
                          <td><?php echo $city; ?></td>
                          <td><?php echo $zip; ?></td>          
                          <td><img src="customersProfiles/<?php echo $picture; ?>" alt="" width="40px" height="40px"></td>
                          <td><a href="viewCustomer.php?ViewCustomer=<?php echo $id; ?>"><button class="btn btn-sm btn-dark"><i class="fa fa-circle-o-notch"></i> Views Details</button></a></td>
                          <td><a href="deleteCustomerAdmin.php?DeleteCustomer=<?php echo $id; ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Delete</button></a></td>
                        </tr>
                      </tbody>
                      <?php }} ?> <!--ENDING WHILE LOOP--> 
                  </table>                    
        </div>
</div><!--/.container-->
</div>

<?php
      
    include("adminlayout/footer.php");

?> 


