<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("cartFunction.php"); ?>
<?php

        //a function to detected users IP ADRESS
 
        $getIP  = get_ip_address();

        //addcategory function
        function addCategory(){
            if(isset($_POST['submit'])) {
                $cateName = mysql_escape_string($_POST['category']);
        
                if(empty($cateName)){
                    $_SESSION["errorMessage"] = "Please Enter Category";
                    header("Location: addcategory.php");
                    exit;
                } else {
                   global $dbConnection;
        
                   $cateName = filter_var($cateName, FILTER_SANITIZE_STRING);
        
                   $insert = "INSERT INTO category(categoryName) VALUES ('$cateName')";
                   $runQuery = mysql_query($insert);
                        if($runQuery){
                            $_SESSION["successMessage"] = "You Have Successfull added Category";
                            header("Location: addcategory.php");
                            exit;
                        } else {
                            //$error = die(mysql_error());
                            //echo  $error;
                            $_SESSION["errorMessage"] = "Sorry We Could not added Category Please Contact Your System Administator";                
                        }
                }
            }
        }






        //addbrand function
        function addBrand(){
            if(isset($_POST['submit'])) {
                $brandName = mysql_escape_string($_POST['brand']);
        
                if(empty($brandName)){
                    $_SESSION["errorMessage"] = "Please Enter Category";
                    header("Location: addbrand.php");
                    exit;
                } else {
                   global $dbConnection;
        
                   $brandName = filter_var($brandName, FILTER_SANITIZE_STRING);
        
                   $insert = "INSERT INTO brand(brandName) VALUES ('$brandName')";
                   $runQuery = mysql_query($insert);
                        if($runQuery){
                            $_SESSION["successMessage"] = "You Have Successfull added Category";
                            header("Location: addbrand.php");
                            exit;
                        } else {
                            //$error = die(mysql_error());
                            //echo  $error;
                            $_SESSION["errorMessage"] = "Sorry We Could not added Category Please Contact Your System Administator";                
                        }
                }
            }
        }






        //addproduct functions
        function addProduct(){
            if(isset($_POST['submit'])){
                
                $productName = mysql_escape_string($_POST['productname']);
                $productCategory = mysql_escape_string($_POST['productcategory']);
                $productBrand = mysql_escape_string($_POST['productbrand']);
                $productPrix = mysql_escape_string($_POST['productprix']);
                $productDesc = mysql_escape_string($_POST['productdescription']);
                
                $productImage = $_FILES['image'] ['name'];
                $saveImage = "fileUploads/".basename($_FILES['image'] ['name']);
                move_uploaded_file($_FILES['image'] ['tmp_name'], $saveImage);
        
                if(empty($productName)){
                    $_SESSION["errorMessage"] = "Please Enter Product Name";
                    header("Location: admin.php");
                    exit;
                } else if(empty($productPrix)){
                    $_SESSION["errorMessage"] = "Please Enter Product Prix";
                    header("Location: admin.php");
                    exit;
                } else {
                    
                        global $dbConnection;
        
                        $productName = filter_var($productName, FILTER_SANITIZE_STRING);
                        $productCategory = filter_var($productCategory, FILTER_SANITIZE_STRING);
                        $productBrand = filter_var($productBrand, FILTER_SANITIZE_STRING);
                        $productPrix = filter_var($productPrix, FILTER_SANITIZE_STRING);
                        $productDesc = filter_var($productDesc, FILTER_SANITIZE_STRING);
        
                        $sqlInsert = "INSERT INTO products(
                                                                productName,
                                                                productCategory,
                                                                productBrand,
                                                                productPrice,
                                                                productDesc,
                                                                productImage
                                                            ) VALUES
                                                            (
                                                                '$productName',
                                                                '$productCategory',
                                                                '$productBrand',
                                                                '$productPrix',
                                                                '$productDesc',
                                                                '$productImage'
                                                            )";
                        
                        $runQuery = mysql_query($sqlInsert);
                            if($runQuery) {
                                $_SESSION["successMessage"] = "You Have Successfull added Products";
                                header("Location: admin.php");
                                exit;
                            } else {
                                $error = die(mysql_error());
                                echo  $error;
                                $_SESSION["errorMessage"] = "Sorry We Could not added Products Please Contact Your System Administator";                
                            }                                   
                        }              
            }
        }


       


        //costomer registration function
        function customerRegistration(){
            $getIP =  get_ip_address();
            
                        if(isset($_POST['submit'])){
                            $costName = mysql_escape_string($_POST['customerFirstname']);
                            $costLastname = mysql_escape_string($_POST['customerLastname']);
                            $costNumber = mysql_escape_string($_POST['customerNumber']);
                            $costEmail = mysql_escape_string($_POST['customerEmail']);
                            $costPassword = mysql_escape_string($_POST['customerPassword']);
                            $costPassword2 = mysql_escape_string($_POST['customerPassword2']);
                            $costStreet = mysql_escape_string($_POST['customerStreet']);
                            $costApart = mysql_escape_string($_POST['customerAppart']);
                            $costCity = mysql_escape_string($_POST['customerCity_State']);
                            $costCountry = mysql_escape_string($_POST['customerCountry']);
                            $costZip = mysql_escape_string($_POST['customerZipCode']);

                            $productImage = $_FILES['image'] ['name'];
                            $saveImage = "customersProfiles/".basename($_FILES['image'] ['name']);
                            move_uploaded_file($_FILES['image'] ['tmp_name'], $saveImage);
                    
                                if(empty($costName)) {
                                    $_SESSION["errorMessage"] = "Please Enter Your Name";
                                    header("Location: customerRegistration.php");
                                    exit; 
                                } else if(empty($costLastname)) {
                                    $_SESSION["errorMessage"] = "Please Enter Your Lastname";
                                    header("Location: customerRegistration.php");
                                    exit; 
                                } else if(empty($costNumber)) {
                                    $_SESSION["errorMessage"] = "Please Enter Your Phone Number";
                                    header("Location: customerRegistration.php");
                                    exit;
                                } else if(empty($costEmail)) {
                                    $_SESSION["errorMessage"] = "Please Enter Your Email";
                                    header("Location: customerRegistration.php");
                                    exit;
                                } else if(!filter_var($costEmail, FILTER_VALIDATE_EMAIL)) {
                                    $_SESSION["errorMessage"] = "Your is Invalid";
                                    header("Location: customerRegistration.php");
                                    exit;
                                }
                                else if(empty($costPassword)) {
                                    $_SESSION["errorMessage"] = "Please Enter Your Password";
                                    header("Location: customerRegistration.php");
                                    exit;
                                }
                                else if(empty($costPassword2)) {
                                    $_SESSION["errorMessage"] = "Comfirm Your Password";
                                    header("Location: customerRegistration.php");
                                    exit;
                                } else if(empty($costStreet) || empty($costApart)) {
                                    $_SESSION["errorMessage"] = "Comfirm Your Address in the Address field";
                                    header("Location: customerRegistration.php");
                                    exit;
                                } else if(empty($costCity) || empty($costCountry)) {
                                    $_SESSION["errorMessage"] = "Comfirm Your Address in the Address field";
                                    header("Location: customerRegistration.php");
                                    exit;
                                } else if(!(strlen($costPassword) > 6)){
                                    $_SESSION["errorMessage"] = "Your Password Must Have at Least up to 6 Character";
                                    header("Location: customerRegistration.php");
                                    exit;
                                } else if($costPassword !== $costPassword2) {
                                    $_SESSION["errorMessage"] = "Make Sure Your Must Much Each Other";
                                    header("Location: customerRegistration.php");
                                    exit;
                                }
                    
                                else {
                                    
                                    global $dbConnection;
            
                                    $getIP  = get_ip_address();
                                          
                                    $costName = filter_var($costName, FILTER_SANITIZE_STRING);
                                    $costLastname = filter_var($costLastname, FILTER_SANITIZE_STRING);
                                    $costNumber = filter_var($costNumber, FILTER_SANITIZE_STRING);
                                    $costEmail = filter_var($costEmail, FILTER_SANITIZE_EMAIL);
                                    $costPassword = filter_var($costPassword, FILTER_SANITIZE_STRING);
                                    $costStreet = filter_var($costStreet, FILTER_SANITIZE_STRING);
                                    $costApart = filter_var($costApart, FILTER_SANITIZE_STRING);
                                    $costCity = filter_var($costCity, FILTER_SANITIZE_STRING);
                                    $costCountry = filter_var($costCountry, FILTER_SANITIZE_STRING);
                                    $costZip = filter_var($costZip, FILTER_SANITIZE_STRING);
                    
                                    $costPassword  = hash('sha256', $costPassword);
                    
                                    $sql = "SELECT * FROM customers WHERE customerEmail= '$costEmail' ";
                                    $runSQL = mysql_query($sql);
                                    $result = mysql_num_rows($runSQL);
                                       if($result){
                                        $_SESSION["errorMessage"] = "User With Same Email Exist Already Choose Another Email Address and Continues";
                                        header("Location: customerRegistration.php");
                                        exit; 
                                       }
                                    
                                    $sql = "INSERT INTO customers(customerIP,
                                                                  customerFirstname,
                                                                  customerLastname,
                                                                  customerNumber,
                                                                  customerEmail,
                                                                  customerPassword,
                                                                  customerStreet,
                                                                  customerApart,
                                                                  customerCity,
                                                                  customerCountry,
                                                                  customerZip,
                                                                  customerImage
                                                                ) VALUES
                                                                ('$getIP',
                                                                '$costName',
                                                                 '$costLastname',
                                                                 '$costNumber',
                                                                 '$costEmail',
                                                                 '$costPassword',
                                                                 '$costStreet',
                                                                 '$costApart',
                                                                 '$costCity',
                                                                 '$costCountry',
                                                                 '$costZip',
                                                                 '$productImage'
                                                                )"; 
                                    $runQuery = mysql_query($sql);
            
                                    $sql = "SELECT * FROM cart WHERE ipAddress='$getIP' ";
                                    $runQuery = mysql_query($sql);
                                    $checkRows = mysql_num_rows($runQuery);
                                       if($checkRows == 0){
                                          header("Location: customerAccount.php");
                                          $_SESSION['customerEmail'] = $cosCountry;
                                          $_SESSION["successMessage"] = "You Have Successfull";                                         
                                          exit;
                                       } else {
                                         $_SESSION['customerEmail'] = $costEmail;
                                          header("Location: checkout.php");
                                        exit;
                                       }  
                                }
                        }

        }




        
        //customer logingin function
        function customerLogin(){
            if(isset($_POST['submit'])) {
                $email = mysql_escape_string($_POST['email']);
                $password = mysql_escape_string($_POST['password']);
                
                   if(empty($email)){
                       $_SESSION["errorMessage"] = "Please Enter Email";
                       header("Location: customerLogin.php");
                       exit;
                   } else if(empty($password)){
                       $_SESSION["errorMessage"] = "Please Enter Password";
                       header("Location: customerLogin.php");
                       exit;
                   } else {
                       global $dbConnection;
                       $password = hash('sha256', $password);
                       $sql = "SELECT * FROM customers 
                                       WHERE customerEmail='$email'
                                       AND customerPassword= '$password' 
                                       ";
                       $runSQL = mysql_query($sql);
                       $checkNotExisting = mysql_num_rows($runSQL);
                           if($checkNotExisting !== 1) {
                           $_SESSION["errorMessage"] = "Wrong Password Try Again or Click Forgot password to reset";
                           header("Location: customerLogin.php");
                           exit;
                           } else {
              
                            $getIP = get_ip_address();
              
                            $sql = "SELECT * FROM cart WHERE ipAddress='$getIP' ";
                            $runSQL = mysql_query($sql);
                            $checkRows = mysql_num_rows($runSQL);
                 
                            if($checkNotExisting > 0 AND $checkRows == 0) {
                                header("Location: customerAccount.php");
                                $_SESSION['customerEmail'] = $email;
                                $uuid = $_SESSION['customerID'];                        
                            } else {
                              $_SESSION['customerEmail'] = $email;
                              header("Location: payments.php");
                            }
                          } 
                   }
              } 
                  
        }

      


        //customers password reset function
        function resetPassword(){
            if(isset($_POST['submit'])) {
                
                        $email = mysql_escape_string($_POST['email']);
                        $password = mysql_escape_string($_POST['password']);
                        $password2 = mysql_escape_string($_POST['password2']);
                
                            if(empty($email)){
                                $_SESSION["errorMessage"] = "Please Enter The Email Address Which Used When Signed UP";
                                header("Location: customerpasswordreset.php");
                                exit; 
                            } else if(empty($password)){
                                $_SESSION["errorMessage"] = "Please Enter Your Password";
                                header("Location: customerpasswordreset.php");
                                exit; 
                            } else if(empty($password2)){
                                $_SESSION["errorMessage"] = "Please Enter Your Second Password";
                                header("Location: customerpasswordreset.php");
                                exit; 
                            } else if(!(strlen($password) > 6)){
                                $_SESSION["errorMessage"] = "Your Password Must Have at Least up to 6 Character";
                                header("Location: customerpasswordreset.php");
                                exit;
                            } else if($password !== $password2) {
                                $_SESSION["errorMessage"] = "Make Sure Your Must Much Each Other";
                                header("Location: customerpasswordreset.php");
                                exit;
                            } else {
                
                                global $dbConnection;
                
                                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                                $password = filter_var($password, FILTER_SANITIZE_STRING);
                                
                                $password = hash('sha256', $password);
                                
                                $sql = "SELECT * FROM customers WHERE customerEmail='$email' ";
                                $runSQL = mysql_query($sql);
                                $checkResult = mysql_num_rows($runSQL);
                                    if($checkResult === 0) {
                                        $_SESSION["errorMessage"] = "We Could not find this email addreess Please Enter The Email Address Which Used When Signed UP";
                                        header("Location: customerpasswordreset.php");
                                        exit; 
                                    } else {
                                        $sql = "UPDATE customers SET customerPassword='$password' ";
                                        $runQuery = mysql_query($sql);
                                            if($runQuery) {
                                                $_SESSION["successMessage"] = "You Have Successfull Reset Your Password You can Login Now Using the New Password";
                                                header("Location: customerLogin.php");
                                                exit;
                                            } else {
                                                $_SESSION["errorMessage"] = "Oopss!!! Something Went Wrong Try AGAIN later";
                                                header("Location: customerpasswordreset.php");
                                                exit; 
                                            }
                                        
                                    }
                            }
                
                
                
                        
                    }
        }



?>