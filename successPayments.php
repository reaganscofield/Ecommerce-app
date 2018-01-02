<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php require_once("cartFunction.php"); ?>
<?php 

    include("layout/header.php");
    
?>
<?php 

    //ALL PRODUCTS NAVBAR
    include("layout/returnNavbar.php");
    
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
                $proName = $fetchPrice['productName'];
                $proBrand = $fetchPrice['productBrand'];
                $proImage = $fetchPrice['productImage'];
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

    global $productID;
    global $proID;
    global $proName;


    //GETTING QUANTITE FROM CART TABLE
    $sql = "SELECT * FROM cart WHERE proID='$productID' ";
    $runQuery = mysql_query($sql);
    $rowQty = mysql_fetch_array($runQuery);
    	$getQuantite = $rowQty['qty'];

    	if($getQuantite == 0){
    		$getQuantite = 1;
    	}else {
    		$getQuantite = $getQuantite;
    		$defaultPrice = $defaultPrice * $getQuantite;
    	}



    //GETTING CUSTOMER DETAILS
    $customer = $_SESSION['customerEmail'];
    $sqlSelect = "SELECT * FROM customers WHERE customerEmail='$customer' ";
    $runQuery = mysql_query($sqlSelect);
    $rowCustomer = mysql_fetch_array($runQuery);
    	$customerID = $rowCustomer['customerID'];
    	$customerEmail = $rowCustomer['customerEmail'];
    	$customerName = $rowCustomer['customerFirstname'];
    	$customerLastname = $rowCustomer['customerLastname'];
    	$customerStreet = $rowCustomer['customerStreet'];
    	$customerApart = $rowCustomer['customerApart'];
    	$customerCity = $rowCustomer['customerCity'];
    	$customerCountry = $rowCustomer['customerCountry'];
    	$customerZip = $rowCustomer['customerZip'];


    //GETTING PAYPAL RETURN PARAMETERS
    $paidAmount = $_GET['amt'];
    $currency = $_GET['cc'];
    $transactionNumber = $_GET['tx'];


    //Generating random number for invoices
    mt_rand();
    $getInvoices = mt_rand();



    //Checking if the amount paid is equal to the amout which have been store cart databases\
    if($paidAmount == $defaultPrice) {
    	echo 	'
    				<div class="container mt-5">
    					<h3 class="text-center">Dear' . ' ' . $customerName . '
  						<h4 class="text-center">You Have Successfull Made Payments</h4>
  						<div class="text-center mt-5 mb-5">
    						<a href="index.php"><button class="btn btn-dark">Continue Shopping</button></a>
    						<a href="customerAccount.php"><button class="btn btn-dark">Got to Your Acccount</button></a>
  						</div>
					</div>
    			';
    } else {
    	echo 	'
    				<div class="container mt-5">
    					<h3 class="text-center">Dear' . ' ' . $customerName . '
  						<h4 class="text-center">You Payments is Failed Try Again</h4>
  						<div class="text-center mt-5 mb-5">
    						<a href="shoppingcart.php"><button class="btn btn-dark">Go to Shopping Cart</button></a>
    						<a href="customerAccount.php"><button class="btn btn-dark">Got to Your Acccount</button></a>
  						</div>
					</div>
    			';
    }



    //Storing payments details
    $sqlPayments = "INSERT INTO payments(
    										paidAmount, 
    										custmerID, 
    										productID,
    										transactionID,
    										current,
    										paymentDate
    								) VALUES 
									(
											'$paidAmount',
											'$customerID',
											'$proID',
											'$transactionNumber',
											'$currency',
											NOW()	
									)";
	
	$runQuery = mysql_query($sqlPayments);
	// if($runQuery){
	// 	echo "Successfull insering imto payments table";
	// } else {
	// 	$error = die(mysql_error());
	// 	echo $error;
	// }

	//echo '<br />';


	//Storing details to orders tables
	$sqlOrder = "INSERT INTO orders(
    										custmerID, 
    										productID,
    										quantite,
    										invoiceNumber,
    										orderDate,
    										status
    								) VALUES 
									(
											'$customerID',
											'$proID',
											'$getQuantite',
											'$getInvoices',
											 NOW(),
											'In Progress'	
									)";
	
	$runQuery = mysql_query($sqlOrder);
	// if($runQuery){
	// 	echo "Successfull insering imto orders table";
	// } else {
	// 	$error = die(mysql_error());
	// 	echo $error;
	// }




	//Removing orders from cart
	$sqlDelete = "DELETE FROM cart";
	$runQuery = mysql_query($sqlDelete);



	//Sending Customers Mail
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: <scofilesale@gmail.com>' . "\r\n";
			
	$subject = "Order Details";
			
	$message = "<html> 
			<p>
			
			Hello dear <b style='color:blue;'>$customerName $customerLastname</b> you have ordered some products on our website onlinetuting.com, please find your order details, your order will be processed shortly. Thank you!</p>
			
				<table width='600' align='center' bgcolor='#FFCC99' border='2'>
			
					<tr align='center'><td colspan='6'><h2>Your Order Details from ScofiledShop</h2></td></tr>
					
					<tr align='center'>
						<th><b>S.N</b></th>
						<th><b>Product Name</b></th>
						<th><b>Quantity</b></th>
						<th><b>Paid Amount</th></th>
						<th>Invoice No</th>
					</tr>
					
					<tr align='center'>
						<td>1</td>
						<td>$proName</td>
						<td>$getQuantite</td>
						<td>$paidAmount</td>
						<td>$getInvoices</td>
					</tr>
			
				</table>

				<h5>To Be Deliver Here:

				<ul>
					<li>Street: $customerStreet</li>
					<li>Appartement: $customerApart</li>
					<li>City: $customerCity</li>
					<li>Zip: $customerZip</li>
					<li>Country: $customerCountry</li>
				</ul>
				
				<h3>Please go to your account and see your order details!</h3>
				
				<h2> <a href='http://reaganblog-com.stackstaging.com/'>Click here</a>Login to Your Account Here</h2>
				
				<h3>Thank You For Your Order  ScofieldShop</h3>
				
			</html>
			
			";
			
			mail($customerEmail, $subject, $message, $headers);



?>


<!-- MAIN INDEX PAGE -->

<!-- CUSTOMER FOOTER -->
<?php 

    include("layout/footer.php");
    
?>