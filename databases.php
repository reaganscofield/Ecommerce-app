<?php
  //connecting to server
  $dbConnection = mysql_connect("shareddb-f.hosting.stackcp.net", "mystore-32345e54", "3QV/mraAwBSb");
      // if(!$dbConnection){
      //   $error1 = "Could not Connected To The Server <br />";
      //   $error2 = die(mysql_error());
      //   echo   $error1 . " " . $error2 . "<br />";
      // } else {
      //   echo "Successfull Connected To The Server <br />";
      // }

            //creating databases
      // $createDB = "CREATE DATABASE myStore";
      // $runQuery = mysql_query($createDB);
      //     if($runQuery) {
      //       echo "Successfull Created phoneStore Database <br />";
      //     } else {
      //       $error1 = "Could not Created Databases";
      //       $error2 = die(mysql_error());
      //       echo   $error1 . " " . $error2 . "<br />";
      //     }

    //connecting to database
$dbConnection = mysql_select_db('mystore-32345e54', $dbConnection);
//       if(!$dbConnection){
//           $error1 = "Could not Connected To Databases <br />";
//           $error2 = die(mysql_error());
//           echo   $error1 . " " . $error2 . "<br />";
//       } else {
//           echo "Successfull Connected TO Databases <br />";
//       }

      
//           //creating products tables
//     $create = "CREATE TABLE products(
//                                       productID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
//                                       productName VARCHAR(20) NOT NULL,
//                                       productCategory VARCHAR(50) NOT NULL,
//                                       productBrand VARCHAR(50) NOT NULL,
//                                       productPrice VARCHAR(50) NOT NULL,
//                                       productDesc VARCHAR(200) NOT NULL,
//                                       productImage VARCHAR(200) NOT NULL
//                                     )";
// $runQuery = mysql_query($create);
//     if($runQuery) {
//           echo "Successfull Created Products Table <br />";
//     } else {
//         $error1 = "Could not Created Products Table <br />";
//         $error2 = die(mysql_error());
//         echo  $error1 . " " . $error2 . "<br />";
//     }



//     //creating brand tables
// $createTable = "CREATE TABLE brand(
//                                     brandID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
//                                     brandName VARCHAR(100) NOT NULL
//                                   )";
// $runQuery = mysql_query($createTable);
//     if($runQuery) {
//           echo "Successfull Created Brand Table <br />";
//       } else {
//           $error1 = "Could not Created Brand Table <br />";
//           $error2 = die(mysql_error());
//           echo  $error1 . " " . $error2 . "<br />";
// }

      

//       //creating products tables
// $createTable = "CREATE TABLE category(
//                                         productID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
//                                         categoryName VARCHAR(20) NOT NULL
//                                       )";
// $runQuery = mysql_query($createTable);
//       if($runQuery) {
//           echo "Successfull Created Category Table <br />";
//       } else {
//             $error1 = "Could not Created Category Table <br />";
//             $error2 = die(mysql_error());
//             echo  $error1 . " " . $error2 . "<br />";
//   }


    
//     //creating products cart tables
// $createTable = "CREATE TABLE cart(
//                                         proID INT(11) NOT NULL PRIMARY KEY,
//                                         ipAddress VARCHAR(255) NOT NULL,
//                                         qty INT(10) NOT NULL
//                                       )";
// $runQuery = mysql_query($createTable);
//       if($runQuery) {
//           echo "Successfull Created Category Table <br />";
//       } else {
//             $error1 = "Could not Created Category Table <br />";
//             $error2 = die(mysql_error());
//             echo  $error1 . " " . $error2 . "<br />";
//   }


    
//     //creating products customersTABLE tables
// $createTable = "CREATE TABLE customers(
//                                         customerID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
//                                         customerIP INT(100) NOT NULL,
//                                         customerFirstname VARCHAR(255) NOT NULL,
//                                         customerLastname VARCHAR(255) NOT NULL,
//                                         customerNumber INT(15) NOT NULL,
//                                         customerEmail VARCHAR(255) NOT NULL,
//                                         customerPassword VARCHAR(255) NOT NULL,
//                                         customerStreet VARCHAR(255) NOT NULL,
//                                         customerApart VARCHAR(255) NOT NULL,
//                                         customerCity VARCHAR(255) NOT NULL,
//                                         customerCountry VARCHAR(255) NOT NULL,
//                                         customerZip INT(255) NOT NULL,
//                                         customerImage VARCHAR(255) NOT NULL
//                                       )";
// $runQuery = mysql_query($createTable);
//       if($runQuery) {
//           echo "Successfull Created CUSTOMERS Table <br />";
//       } else {
//             $error1 = "Could not Created CUSTOMERS Table <br />";
//             $error2 = die(mysql_error());
//             echo  $error1 . " " . $error2 . "<br />";
//   }
    

//     //creating administation login tables
// $createTable = "CREATE TABLE adminlogin(
//                                         adminID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
//                                         username VARCHAR(255) NOT NULL,
//                                         email VARCHAR(255) NOT NULL,
//                                         password VARCHAR(255) NOT NULL
//                                       )";
// $runQuery = mysql_query($createTable);
//       if($runQuery) {
//           echo "Successfull Created Category Table <br />";
//       } else {
//             $error1 = "Could not Created Category Table <br />";
//             $error2 = die(mysql_error());
//             echo  $error1 . " " . $error2 . "<br />";
//   }


//     //creating payments tables
// $createTable = "CREATE TABLE payments(
//                                         paymentID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
//                                         paidAmount INT(255) NOT NULL,
//                                         custmerID INT(11) NOT NULL,
//                                         productID INT(11) NOT NULL,
//                                         transactionID VARCHAR(255) NOT NULL,
//                                         current VARCHAR(255) NOT NULL,
//                                         paymentDate DATETIME
//                                       )";
// $runQuery = mysql_query($createTable);
//       if($runQuery) {
//           echo "Successfull Created PAYMENTS Table <br />";
//       } else {
//             $error1 = "Could not Created PAYMENTS Table <br />";
//             $error2 = die(mysql_error());
//             echo  $error1 . " " . $error2 . "<br />";
//   }


//   $createTable = "CREATE TABLE orders(
//                                         orderID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
//                                         custmerID INT(11) NOT NULL,
//                                         productID INT(11) NOT NULL,
//                                         quantite INT(50) NOT NULL,
//                                         invoiceNumber INT(50) NOT NULL,
//                                         orderDate DATETIME,
//                                         status VARCHAR(255) NOT NULL
//                                       )";
// $runQuery = mysql_query($createTable);
//       if($runQuery) {
//           echo "Successfull Created ORDERS Table <br />";
//       } else {
//             $error1 = "Could not Created ORDERS Table <br />";
//             $error2 = die(mysql_error());
//             echo  $error1 . " " . $error2 . "<br />";
//   }



 ?>
