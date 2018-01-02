<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php

    // if(!$_SESSION['email']){
    //     header("Location: adminlogin.php");
    // }

?>
 <?php
      
    include("adminlayout/header.php");

?>
<?php
      
    include("adminlayout/navbar.php");

?> 
  


<div class="container mt-2">
<div class="mx-auto">
    
                <div class="mx-auto">   
                <div class="mt-2 ">
                    
                        <?php

                            $getSuper = $_GET['ViewCustomer'];

                            global $dbConnection;

                            $sql = "SELECT * FROM customers";
                            $runQuery = mysql_query($sql);
                            if($runQuery){
                              $defaultWhileLoop = 0;
                            while($rows = mysql_fetch_array($runQuery)){
                                $id = $rows['customerID'];
                                $ipaddress = $rows['customerIP'];
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
                            }
                        }
                               
                    ?>
                    <div class="card mb-5">
                    <h4 class="card-header"><?php echo $name . "'s Profile"; ?></h4>
                        <div class="card-body ml-5">
                        <img class="rounded-circle" src="customersProfiles/<?php echo $picture; ?>"  alt="" width="250px">
                        <h4 class="card-title mt-2"><?php echo $name . " " . $lastname; ?></h4>
                         <div class="ml-4">
                            <h6 class="card-title mt-2">Phone Number: <?php echo $phone; ?></h6>
                            <h6 class="card-title mt-2">Email Address: <?php echo $email; ?></h6>
                            <h6 class="card-title mt-2">IP Address: <?php echo $ipaddress; ?></h6>
                            <h6 class="card-title mt-2">Country: <?php echo $country; ?></h6>
                            <h6 class="card-title mt-2">City: <?php echo $city; ?></h6>
                            <h6 class="card-title mt-2">Zip: <?php echo $zip; ?></h6>
                            <h6 class="card-title mt-2">Street: <?php echo $street; ?></h6>
                            <h6 class="card-title mt-2">Appartement: <?php echo $apart; ?></h6>
                        </div>
                        <a href="managecustomers.php"><button class="btn btn-dark">Go Back</button> </a>       
                    </div>
                   </div>
  
                    
</div>
</div><!--/.container-->
</div>

<?php
      
    include("adminlayout/footer.php");

?> 


