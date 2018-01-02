<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php

if(isset($_POST['submit'])){
    
    $brandName = mysql_escape_string($_POST['brand']);
   
    if(empty($brandName)){
        $_SESSION["errorMessage"] = "Please Enter Category Name";
        header("Location: editbrand.php");
        exit;
    }  else {
        
            global $dbConnection;

            $getSuper = $_GET['EditBrand'];

            $brandName = filter_var($brandName, FILTER_SANITIZE_STRING);
           

            $sql = "UPDATE brand SET 
                                        brandName='$brandName' 
                                    WHERE brandID = '$getSuper' ";

            
            $runQuery = mysql_query($sql);
                if($runQuery) {
                    $_SESSION["successMessage"] = "You Have Successfull Updated Brand";
                    header("Location: addbrand.php");
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
 
 


<main role="main" class="container mt-5">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-9">
          <p class="float-right d-md-none">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Toggle nav</button>
          </p>
          
          <div class="row">
          <?php

                    $getSuper = $_GET['EditBrand'];
                    
                    global $dbConnection;

                    $sql = "SELECT * FROM brand WHERE brandID='$getSuper' ";
                    $runSQL = mysql_query($sql);

                    while($rows = mysql_fetch_array($runSQL)){
                        $id = $rows['brandID'];
                        $name = $rows['brandName'];                      
                    }
                ?>
            <div class="col-12 col-lg-12">
                <div class="w-75 p-3 mx-auto">
                <h1>EDIT BRAND</h1>
                <?php echo errorMessage(); ?>
                <?php echo successMessage(); ?>
                    <form action="editbrand.php?EditBrand=<?php echo $id; ?>" method="POST">
                        <div class="form-group">
                            <label for="">Brand Name</label>
                            <input type="text" name="brand" class="form-control" value="<?php echo $name; ?>">
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
 















