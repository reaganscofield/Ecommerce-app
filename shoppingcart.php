<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php require_once("cartFunction.php"); ?>
<?php 

    //calling  cart function
    addToCart();
   
    
?>
<?php

    if(isset($_POST['submit'])){
      $getQTY = mysql_escape_string($_POST['qty']);
      global $dbConnection;
      $sql = "UPDATE cart set qty='$getQTY' ";
      $runSQL = mysql_query($sql);
        if($runSQL){
          $_SESSION['qty'] = $getQTY;
          header("Location: shoppingcart.php");
        }
    }

?>
<?php 

    include("layout/header.php");
    
?>
<?php 

    //ALL PRODUCTS NAVBAR
    include("layout/mainnavbar.php");
    
?>



<!-- MAIN SHOPPING CART PAGE -->
<div class="container mx-auto mt-3 mb-3">
  <div class="card mx-auto">
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="d-flex p-2">
  
    <?php

        //storing the default price to zero
        $defaultPrice = 0;
        global $dbConnection;
        //storing IPDetected function inside the variable
        $ipDetected = get_ip_address();
        
        $selectID = "SELECT * FROM cart WHERE ipAddress='$ipDetected' ";
        $runSelect = mysql_query($selectID);
          //fetch record with while loop
          while($productsID = mysql_fetch_array($runSelect)){
            //store cart record
            $productID = $productsID['proID'];
        
        
        //RUN TABLES RELATIONSHIPS
        
        
          //getting prix from products table
          $selectPrix = "SELECT * FROM products WHERE productID = '$productID' ";
                           
          $runSelect = mysql_query($selectPrix);
          //while loop to fetch from prices from products table
          while($fetchPrice = mysql_fetch_array($runSelect)){
          //fetching multiples prices with php function
            $getPrices = array($fetchPrice['productPrice']);
            //print_r($getPrices);
            //calculting prices that coming from array function
            $valuesOfTotalPrices = array_sum($getPrices);
            //updating the default prices to the total prices fund
            //in databases                             
            $defaultPrice += $valuesOfTotalPrices;
                                       
            $singlePrice = $fetchPrice['productPrice'];
            $proID = $fetchPrice['productID'];
            $name = $fetchPrice['productName'];
            $brand = $fetchPrice['productBrand'];
            $image = $fetchPrice['productImage'];

    ?>
    <div class="row">
        <div class="col-lg-12  mr-3 text-center">
          <img  src="fileUploads/<?php echo $image; ?>" alt="Card image cap">
        </div>
        <div class="col-lg-12">
          <h5 class="card-title text-center"><?php echo $brand . " " . $name; ?></h5>
          <h4 class="card-title text-center"><?php echo "$" . $singlePrice; ?></h4>
          <div class="form-check">
            <label class="form-check-label">
            <input name="remove[]" type="checkbox" class="form-check-input" value="<?php echo $proID; ?>">
              Remove From Cart
            </label>
          </div>
          <div class="text-center">
            <label for="">Quantity</label>
          <input style="width: 70px" type="number" name="qty" value="<?php echo $_SESSION['qty']; ?>">
          </div>
        </div>
    </div>
  <?php  } ?><!-- Ending while loop  -->
  <?php  } ?><!-- Ending while loop  -->       
</div>
<div class="mb-5 ml-2 mr-2">
          
          <span class="float-left">
            <input type="submit" name="submit" class="btn btn-dark" value="Update Cart">
          </span>
 </form>        
</div>
<div class="mb-5 ml-2 mr-2">
<h2 class="float-left">Sub Total <?php echo $defaultPrice; ?></h2>
<span class="float-right">
  <a href="index.php"><button class="btn btn-dark">Continue Shopping</button></a>
  <a href="checkout.php"><button class="btn btn-dark">Check Out</button></a>     
</span>
</div>
</div>
</div>


<?php

    if(isset($_POST['submit'])) {
      global $dbConnection;
      $getIP = get_ip_address();
      
      foreach($_POST['remove'] as $removeID){
        $sql = "DELETE FROM cart WHERE proID='$removeID' AND ipAddress='$getIP' ";
        $runSQL = mysql_query($sql);
        if($runSQL){
          header("Location: shoppingcart.php");
        }
      }
    }

?>




<!-- CUSTOMER FOOTER -->
<?php 

    include("layout/footer.php");
    
?>