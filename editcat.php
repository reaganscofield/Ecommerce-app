<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php
ob_start();
    if(isset($_POST['submit'])){
        $catName = mysql_escape_string($_POST['category']);
        if(empty($catName)){
            header("Location: editcat.php");
            $_SESSION["errorMessage"] = "Please Enter Category Name";      
            exit;
        }  else {
                global $dbConnection;
                $getSuper = $_GET['EditCat'];
                $catName = filter_var($catName, FILTER_SANITIZE_STRING);
                $sql = "UPDATE category SET 
                                        categoryName='$catName' 
                                        WHERE productID = '$getSuper' ";      
                $runQuery = mysql_query($sql);
                    if($runQuery) {
                        header("Location: addcategory.php");
                        $_SESSION["successMessage"] = "You Have Successfull Updated Category";      
                        exit;
                    } else {
                        $error = die(mysql_error());
                        echo  $error;
                        $_SESSION["errorMessage"] = "Sorry We Could not added Products Please Contact Your System Administator";                
                    }                                   
                }
    }
ob_end_flush(); 
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

 


<main role="main" class="container mt-5">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-9">
          <p class="float-right d-md-none">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Toggle nav</button>
          </p>
          
          <div class="row">
          <?php

                    $getSuper = $_GET['EditCat'];
                    
                    global $dbConnection;

                    $sql = "SELECT * FROM category WHERE productID='$getSuper' ";
                    $runSQL = mysql_query($sql);

                    while($rows = mysql_fetch_array($runSQL)){
                        $id = $rows['productID'];
                        $name = $rows['categoryName'];                      
                    }
                ?>
            <div class="col-12 col-lg-12">
                <div class="w-75 p-3 mx-auto">
                <h1>EDIT CATEGORY</h1>
                <?php echo errorMessage(); ?>
                <?php echo successMessage(); ?>
                    <form action="editcat.php?EditCat=<?php echo $id; ?>" method="POST">
                        <div class="form-group">
                            <label for="">Category Name</label>
                            <input type="text" name="category" class="form-control" value="<?php echo $name; ?>">
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
 






























<!-- <?php  //$getSupre = $_GET['EditCat']; echo $getSupre; ?> -->