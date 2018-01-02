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


<!-- MAIN DETAILS (DESCRIPTION) PAGE -->
<div class="d-flex p-2">
  
    <?php           
            global $dbConnection;

            $getSingleData = $_GET['showall'];

        
            $sql = "SELECT * FROM products WHERE productID = '$getSingleData' ";
            
            $runQuery = mysql_query($sql);
              if(!$runQuery){
                $error = die(mysql_error());
                echo $error;
              } else {
                    while($rowDatas = mysql_fetch_array($runQuery)){
                        $id = $rowDatas['productID'];
                        $name = $rowDatas['productName'];
                        $category = $rowDatas['productCategory'];
                        $brand = $rowDatas['productBrand'];
                        $price = $rowDatas['productPrice'];
                        $desc = $rowDatas['productDesc'];
                        $image = $rowDatas['productImage'];
                    }
              }
    ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <img  src="fileUploads/<?php echo $image; ?>"  width="230px" alt="Card image cap">
                </div>
                <div class="col-lg-6 ml-5">
                    <h4 class="card-title"><?php echo $brand . " " . $name; ?></h4>
                    <h4 class="card-title"><?php echo "$" . $price; ?></h4>
                    <p><?php echo $desc; ?></p>
                    <a href="index.php"><button class="btn btn-sm btn-primary">Go Back!</button></a>
                    <a href="index.php?pro_id=<?php echo $id; ?>"><button class="btn btn-sm btn-success ">Add to Card</button></a>
                </div>
            </div>
        </div>
    </div>   
</div>



<!-- CUSTOMER FOOTER -->
<?php 

    include("layout/footer.php");
    
?>