<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php
    if(!isset($_SESSION['email'])){
        header("Location: adminlogin.php");
    }
?>
<?php
      
    addProduct();

?>
<?php
      
    include("adminlayout/header.php");

?>
<?php
      
    include("adminlayout/navbar.php");

?> 
  
 



<!-- ADD PRODUCT MAIN PAGE -->
<main role="main" class="container mt-5">
      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-9">
          <p class="float-right d-md-none">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Toggle nav</button>
          </p>
          
          <div class="row">
            <div class="col-12 col-lg-12">
                <div class="w-75 p-3 mx-auto">
                    <h1>ADD NEW PRODUCTS</h1>
                    <?php echo errorMessage(); ?>
                    <?php echo successMessage(); ?>
                    <form action="admin.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Products Name</label>
                            <input type="text" name="productname" class="form-control" id="" placeholder="Enter Product Name">
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
                                <option><?php echo $brandName; ?></option>
                                    <?php  } ?><!-- ending while loop -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Products Name</label>
                            <input type="FILE" name="image" class="form-control" id="" placeholder="Enter Product Name">
                        </div>
                        <div class="form-group">
                            <label for="">Products Prix</label>
                            <input type="number" name="productprix" class="form-control" id="" placeholder="Enter Product Prix">
                        </div>
                        <div class="form-group">
                            <label for="">Products Description</label>
                            <textarea name="productdescription" class="form-control" id="" rows="3"></textarea>
                        </div>
                        <button name="submit" type="submit" class="btn btn-dark btn-block">Submit</button>
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
 
   