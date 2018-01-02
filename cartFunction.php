<?php require_once("databases.php"); ?>
<?php 

    //a function to detected users IP ADRESS
    function get_ip_address() {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                        return $ip;
                    }
                }
            }
        }
      }

    //cart function to add product to the shopping catre
    function addToCart(){
      if(isset($_GET['proCart'])){
        global $dbConnection;
        //storing IPDetected function inside the variable
        $ipDetected = get_ip_address();
        //get SUPER GLOBAL VARIABLE for prducts ID
        $productsID = $_GET['proCart'];
        //checking if the same product exist in cart databases
        $checkProduct = "SELECT * FROM cart WHERE 
                                            ipAddress = '$ipDetected' 
                                            AND  proID = '$productsID'
                                            ";
        $runCheck = mysql_query($checkProduct);
          //logical checking if is greater than 0 products
          if(mysql_num_rows($runCheck) > 0){
            //do nothing which means don't add existing product
            //to cart databases
          } else {
            global $dbConnection; 
            //insert products to the cart
            $insertProduct = "INSERT INTO cart(proID, ipAddress) VALUES
                                              ('$productsID', '$ipDetected')
                                              ";
            $runInsert = mysql_query($insertProduct);
              if($runInsert){
                header("Location: shop.php");
                //echo "<script>window.open('index.php', '_self')</script>";
              } else {
                
              }

          }

      }
    
    }


    //function to get total items in cart databases
    function getItemsTotal(){
       if(isset($_GET['proCart'])) {
            global $dbConnection;
            //storing IPDetected function inside the variable
            $ipDetected = get_ip_address();

            $getItems = "SELECT * FROM cart WHERE ipAddress='$ipDetected' ";
            $runGet = mysql_query($getItems);
            //gitting total items find in cart db each depending on customer IP ADDRESS
            $countItems = mysql_num_rows($runGet);       
       } else {
                global $dbConnection;
                //storing IPDetected function inside the variable
                $ipDetected = get_ip_address();

                $getItems = "SELECT * FROM cart WHERE ipAddress='$ipDetected' ";       
                $runGet = mysql_query($getItems);
                //gitting total items find in cart db each depending on customer IP ADDRESS
                $countItems = mysql_num_rows($runGet);

            }
            //echoing or returning total items fund in databases
            echo $countItems;    
       }
        
       
       //get toatal price function
       function getTotalPrix(){

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
                    //we use relationship between two table we fetch cart table record and we store
                    //products ID inside variable "$productID". and we select from products table and 
                    //we select from it where "productID is equal to productsID" which coming from
                    //cart tables
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
                            }

                            

                            
            } //ending cart tables while loop 


            //echoing or returning total prices
            echo "$" . $defaultPrice;
          
       }


?>