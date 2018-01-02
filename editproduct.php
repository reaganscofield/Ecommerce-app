<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php

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
        header("Location: editproduct.php");
        exit;
    } else if(empty($productPrix)){
        $_SESSION["errorMessage"] = "Please Enter Product Prix";
        header("Location: editproduct.php");
        exit;
    } else {
        
            global $dbConnection;

            $getSuper = $_GET['EditProduct'];

            $productName = filter_var($productName, FILTER_SANITIZE_STRING);
            $productCategory = filter_var($productCategory, FILTER_SANITIZE_STRING);
            $productBrand = filter_var($productBrand, FILTER_SANITIZE_STRING);
            $productPrix = filter_var($productPrix, FILTER_SANITIZE_STRING);
            $productDesc = filter_var($productDesc, FILTER_SANITIZE_STRING);

            $sql = "UPDATE products SET 
                                        productName='$productName', 
                                        productCategory='$productCategory',
                                        productBrand='$productBrand', 
                                        productPrice='$productPrix', 
                                        productDesc='$productDesc', 
                                        productImage='$productImage'
                                    WHERE productID = '$getSuper' ";

            
            $runQuery = mysql_query($sql);
                if($runQuery) {
                    $_SESSION["successMessage"] = "You Have Successfull Updated Products";
                    header("Location: manageproducts.php");
                    exit;
                } else {
                    $error = die(mysql_error());
                    echo  $error;
                    $_SESSION["errorMessage"] = "Sorry We Could not added Products Please Contact Your System Administator";                
                }                                   
            }              
}

?>
<?php
     if(!isset($_SESSION['email'])){
        header("Location: adminlogin.php");
    }
?>
<?php
      
    include("adminlayout/header.php");

?>
<?php
      
    include("adminlayout/navbar.php");

?>
 
  
 



<!-- ADD PRODUCT MAIN PAGE -->
<main role="main" class="container mt-3">
      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-9">
          <p class="float-right d-md-none">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Toggle nav</button>
          </p>
          
          <div class="row">
            <div class="col-12 col-lg-12">
                <?php

                        $getSuper = $_GET['EditProduct'];
                    
                        global $dbConnection;

                    $sql = "SELECT * FROM products WHERE productID='$getSuper' ";
                    $runSQL = mysql_query($sql);

                    while($rows = mysql_fetch_array($runSQL)){
                        $id = $rows['productID'];
                        $name = $rows['productName'];
                        $category = $rows['productCategory'];
                        $brand = $rows['productBrand'];
                        $price = $rows['productPrice'];
                        $description = $rows['productDesc'];
                        $image = $rows['productImage'];
                        
                    }
                ?>

                <div class="w-75 p-3 mx-auto">
                    <h1>EDIT PRODUCTS</h1>
                    <?php echo errorMessage(); ?>
                    <?php echo successMessage(); ?>
                    <form action="editproduct.php?EditProduct=<?php echo $id; ?>"  method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Products Name</label>
                            <input type="text" name="productname" class="form-control" value="<?php echo $name; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="">Select Products Category</label>
                            <select name="productcategory" class="form-control" id="">
                                <?php

                                    global $dbConnection;
                                    $sql = "SELECT * FROM category";
                                    $runQuery = mysql_query($sql);
                                    while($dataRows = mysql_fetch_array($runQuery)) {
                                        $cateID = $dataRows['productID'];
                                        $cateName = $dataRows['categoryName'];

                                ?>
                                <option><?php echo $category; ?></option>
                                <option><?php echo $cateName; ?></option>
                                    <?php  } ?><!-- ending while loop -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Select Products Brand</label>
                            <select name="productbrand" class="form-control" id="">
                                <?php

                                    global $dbConnection;
                                    $sql = "SELECT * FROM brand";
                                    $runQuery = mysql_query($sql);
                                    while($dataRows = mysql_fetch_array($runQuery)) {
                                        $brandID = $dataRows['brandID'];
                                        $brandName = $dataRows['brandName'];
                                        
                                ?>
                                <option><?php echo $brand; ?></option>
                                <option><?php echo $brandName; ?></option>
                                    <?php  } ?><!-- ending while loop -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Products Name</label>
                            <input type="FILE" name="image" class="form-control" id="" placeholder="Enter Product Name">
                            <span>Current Product Image</span><br>
                            <img src="fileUploads/<?php echo $image; ?>" alt="" width="40px" height="45px">
                        </div>
                        <div class="form-group">
                            <label for="">Products Price</label>
                            <input type="number" name="productprix" class="form-control" value="<?php echo $price; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Products Description</label>
                            <textarea name="productdescription" class="form-control" id="" rows="3"><?php echo $description; ?></textarea>      
                        </div>
                        <button name="submit" type="submit" class="btn btn-dark btn-block">Save Change</button>
                    </form>
                </div>

            </div><!--/span-->   
          </div><!--/row-->
        </div><!--/span-->

        <div class="col-6 col-md-3 text-center sidebar-offcanvas" id="sidebar">
        <?php
      
                include("adminlayout/admindash.php");

            ?> 
        </div><!--/span-->
      </div><!--/row-->
</main><!--/.container-->




<?php
      
    include("adminlayout/footer.php");

?> 
 
   













<!-- $getSupre = $_GET['EditProduct'];
echo $getSupre; -->