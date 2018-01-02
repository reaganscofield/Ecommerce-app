<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php
     if(!isset($_SESSION['email'])){
        header("Location: adminlogin.php");
    }
?>
<?php 

    //caling addbrand function 
    //from functions page
    //to add new brand
    addBrand();

 ?>
 <?php
      
    include("adminlayout/header.php");

?>
<?php
      
    include("adminlayout/navbar.php");

?> 
  


<main role="main" class="container mt-5">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-9">
          <p class="float-right d-md-none">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Toggle nav</button>
          </p>
          
          <div class="row">
            <div class="col-12 col-lg-12">
                <div class="w-75 p-3 mx-auto">
                <h1>ADD NEW BRAND</h1>
                <?php echo errorMessage(); ?>
                <?php echo successMessage(); ?>
                    <form action="addbrand.php" method="POST">
                        <div class="form-group">
                            <label for="">Products Name</label>
                            <input type="text" name="brand" class="form-control" id="" placeholder="Enter Product Name">
                        </div>
                        <button name="submit" type="submit" class="btn btn-dark btn-block">Submit</button>
                    </form>
                  
                  <!-- SHOWING ALL BRAND FROM DB -->
                  <div class="mt-4">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Brand Names</th>
                          <th scope="col">Edit Brand</th>
                          <th scope="col">Delete Brand</th>
                        </tr>
                        </thead>
                        <?php

                            global $dbConnection;

                            $sql = "SELECT * FROM brand";
                            $runQuery = mysql_query($sql);
                            if($runQuery){
                              $defaultWhileLoop = 0;
                              while($rows = mysql_fetch_array($runQuery)){
                                $id = $rows['brandID'];
                                $brandName = $rows['brandName'];
                                $defaultWhileLoop++;
                        ?>
                        <tbody>
                        <tr>
                          <th scope="row"><?php echo $defaultWhileLoop; ?></th>
                          <td><?php echo $brandName; ?></td>
                          <td><a href="editbrand.php?EditBrand=<?php echo $id; ?>"><button class="btn btn-sm btn-dark"><i class="fa fa-circle-o-notch"></i> Edit</button></a></td>
                          <td><a href="deletebrand.php?deletebrand=<?php echo $id; ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Delete</button></a></td>
                        </tr>
                      </tbody>
                      <?php }} ?> <!--ENDING WHILE LOOP--> 
                  </table>                    
                </div>
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


