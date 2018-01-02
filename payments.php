<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php require_once("cartFunction.php"); ?>
<?php 

    include("layout/header.php");
    
?>
<?php 

    //ALL PRODUCTS NAVBAR
    include("layout/mainnavbar.php");
    
?>
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
                $proID = $fetchPrice['productID'];
                $name = $fetchPrice['productName'];
                $brand = $fetchPrice['productBrand'];
                $image = $fetchPrice['productImage'];
                //fetching multiples prices with php function
                $getPrices = array($fetchPrice['productPrice']);
                //print_r($getPrices);
                //calculting prices that coming from array function
                $valuesOfTotalPrices = array_sum($getPrices);
                //updating the default prices to the total prices fund
                //in databases                             
                $defaultPrice += $valuesOfTotalPrices;
            }
        }
        // $var = array(250, 250, 100);

        // $arraySum = array_sum($var);
        
        // echo $arraySum;
?>



<!-- MAIN PAYMENTS PAGE -->
<div class="container mt-5 mb-5">
  <div class="w-50 p-3 mx-auto">
    <h3 class="text-center">Process Payments</h3>
    <img src="img/paypal-payments.png" alt="">
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
        <!-- Identify your business so that you can collect the payments. -->
       <!--  <input type="hidden" name="business" value="scofieldreagan@outlook.com"> -->
        <input type="hidden" name="business" value="sriniv_1293527277_biz@inbox.com">

        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">

        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo $name; ?>">
        <input type="hidden" name="item_number" value="<?php echo $proID; ?>">
        <input type="hidden" name="amount" value="<?php echo $defaultPrice; ?>">
        <!-- <input type="hidden" name="quantity" value="<?php echo $qty; ?>"> -->
        <input type="hidden" name="currency_code" value="USD">
        
        <!-- SUCCESS AND CANCEL RETURN -->
        <input type="hidden" name="return" value="http://reaganblog-com.stackstaging.com/successPayments.php"/>
        <input type="hidden" name="cancel_return" value="http://reaganblog-com.stackstaging.com/cancelPayments.php"/>

        <!-- Display the payment button. -->
        <div class="text-center">
            <input  
                type="image" name="submit"
                src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                alt="PayPal - The safer, easier way to pay online" width="180px"
            >
        </div>
        </form>
  </div>
</div>





<!-- CUSTOMER FOOTER -->
<?php 

    include("layout/footer.php");
    
?>

        <!-- <input type="hidden" name="first_name" value="John">
        <input type="hidden" name="last_name" value="Doe">
        <input type="hidden" name="address1" value="9 Elm Street">
        <input type="hidden" name="address2" value="Apt 5">
        <input type="hidden" name="city" value="Berwyn">
        <input type="hidden" name="state" value="PA">
        <input type="hidden" name="zip" value="19312">
        <input type="hidden" name="night_phone_a" value="610">
        <input type="hidden" name="email" value="jdoe@zyzzyu.com"> -->