<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php require_once("cartFunction.php"); ?>
<?php 

    //calling  cart function
    addToCart();
    
?>
<?php 

    include("layout/header.php");
    
?>
<?php 

    //ALL PRODUCTS NAVBAR
    include("layout/navbar.php");
    
?>




<!-- MAIN RESULT (SEARCH) PAGE -->
<div class="d-flex p-2">
  
    <?php

if(isset($_GET['submit'])) {
    
    $getData = $_GET['getproduct'];
    
    global $dbConnection;
    
            $sql = "SELECT * FROM products WHERE productName like '%$getData%' OR productBrand like '%$getData%'
                                                OR productCategory like '%$getData%' ";
            $runQuery = mysql_query($sql);
              if(!$runQuery){
                $error = die(mysql_error());
                echo $error;
              }
            while($rowDatas = mysql_fetch_array($runQuery)){
              $id = $rowDatas['productID'];
              $name = $rowDatas['productName'];
              $category = $rowDatas['productCategory'];
              $brand = $rowDatas['productBrand'];
              $price = $rowDatas['productPrice'];
              $desc = $rowDatas['productDesc'];
              $image = $rowDatas['productImage'];



    
    ?>
    <div class="row">
        <div class="col-lg-12  mr-3 text-center">
          <img  src="fileUploads/<?php echo $image; ?>" alt="Card image cap">
        </div>
        <div class="col-lg-12">
          <h4 class="card-title"><?php echo $brand . " " . $name; ?></h4>
          <h4 class="card-title"><?php echo "$" . $price; ?></h4>
          <a href="details.php?showall=<?php echo $id; ?>"><button class="btn btn-sm btn-primary">Description</button></a>
          <a href="index.php?proCart=<?php echo $id; ?>"><button class="btn btn-sm btn-success ">Add to Card</button></a>
        </div>
    </div>
  <?php  } ?><!-- Ending while loop  --> 
  <?php  } ?><!-- Ending while loop  -->      
</div>


<!-- CUSTOMER FOOTER -->

<?php 

    include("layout/footer.php");
    
?>