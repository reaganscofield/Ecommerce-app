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
<?php 

    include("layout/slider.php");
    
?>

<!-- MAIN ALL PRODUCTS PAGE -->

<div class="row">
  
    <?php

        global $dbConnection;

        $sql = "SELECT * FROM products";
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
    <div class="">
        <div class="col-md-2  mr-3 text-center">
          <img width="200px" src="fileUploads/<?php echo $image; ?>" alt="Card image cap">
        </div>
        <div class="col-lg-12">
          <h4 class="card-title"><?php echo $brand . " " . $name; ?></h4>
          <h4 class="card-title"><?php echo "$" . $price; ?></h4>
          <a href="details.php?showall=<?php echo $id; ?>"><button class="btn btn-sm btn-primary">Description</button></a>
          <a href="index.php?proCart=<?php echo $id; ?>"><button class="btn btn-sm btn-success ">Add to Card</button></a>
        </div>
    </div>
  <?php  } ?><!-- Ending while loop  -->       
</div>






<!-- CUSTOMER FOOTER -->

<?php 

    include("layout/footer.php");
    
?>