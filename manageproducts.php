<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
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
  


<main role="main" class="container mt-5 ">

    <a href="admin.php"><button class="btn btn-dark">Go Back To Dashboard</button> </a>
           
                <div class="mx-auto">
                <h1 class="text-center">MANAGER PRODUCTS</h1>

                <div>
                    <?php echo errorMessage(); ?>
                    <?php echo successMessage(); ?>
                </div>
                
                 
                  <!-- SHOWING ALL BRAND FROM DB -->
                  <div class="mt-4">
                    <table class="table table-bordered text-center">
                      <thead>
                        <tr class="text-center">
                          <th scope="col">#</th>
                          <th scope="col">Product Names</th>
                          <th scope="col">Product Category</th>
                          <th scope="col">Product Brand</th>
                          <th scope="col">Product Price</th>
                          <th scope="col">Product Description</th>
                          <th scope="col">Product Image</th>
                          <th scope="col">Edit Category</th>
                          <th scope="col">Delete Product</th>
                        </tr>
                        </thead>
                        <?php

                            global $dbConnection;

                            $sql = "SELECT * FROM products";
                            $runQuery = mysql_query($sql);
                            if($runQuery){
                              $defaultWhileLoop = 0;
                              while($rows = mysql_fetch_array($runQuery)){
                                $id = $rows['productID'];
                                $name = $rows['productName'];
                                $category = $rows['productCategory'];
                                $brand = $rows['productBrand'];
                                $price = $rows['productPrice'];
                                $description = $rows['productDesc'];
                                $image = $rows['productImage'];
                                $defaultWhileLoop++;
                        ?>
                        <tbody>
                        <tr>
                          <th scope="row"><?php echo $defaultWhileLoop; ?></th>
                          <td><?php echo $name; ?></td>
                          <td><?php echo $category; ?></td>
                          <td><?php echo $brand; ?></td>
                          <td><?php echo $price; ?></td>
                          <td>
                              <?php 
                                    if(strlen($description) > 15 ) {$description = substr($description, 0,15) . ' ....' ;}
                                        
                                        
                                    echo $description; 
                              ?>
                          </td>
                          <td><img src="fileUploads/<?php echo $image; ?>" alt="" width="40px" height="40px"></td>
                          <td><a href="editproduct.php?EditProduct=<?php echo $id; ?>"><button class="btn btn-sm btn-dark"><i class="fa fa-circle-o-notch"></i> Edit</button></a></td>
                          <td><a href="deleteproduct.php?DeleteProduct=<?php echo $id; ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Delete</button></a></td>
                        </tr>
                      </tbody>
                      <?php }} ?> <!--ENDING WHILE LOOP--> 
                  </table>                    
        </div>
</main><!--/.container-->


<?php
      
    include("adminlayout/footer.php");

?> 


