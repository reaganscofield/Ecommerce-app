<?php require_once("sessions.php"); ?>
<?php require_once("databases.php"); ?>
<?php require_once("function.php"); ?>
<?php

  if(isset($_POST['submit'])) {
      $username = mysql_escape_string($_POST['username']);
      $email = mysql_escape_string($_POST['email']);
      $password = mysql_escape_string($_POST['password']);
      
         if(empty($username)){
             $_SESSION["errorMessage"] = "Please Enter Your Username";
             header("Location: adminlogin.php");
             exit;
         } else if(empty($email)){
              $_SESSION["errorMessage"] = "Please Enter Your Email";
              header("Location: adminlogin.php");
              exit;
         } else if(empty($password)){
             $_SESSION["errorMessage"] = "Please Enter Password";
             header("Location: adminlogin.php");
             exit;
         } else {
             global $dbConnection;
             //$password = hash('sha256', $password);
             $sql = "SELECT * FROM adminlogin 
                             WHERE username ='$username'
                             AND email ='$email'
                             AND password = '$password' 
                             ";
             $runSQL = mysql_query($sql);
             if($fetchAdmin = mysql_fetch_assoc($runSQL)){
                 if($fetchAdmin){
                     header("Location: admin.php");
                     $_SESSION['email'] = $fetchAdmin['email']; 
                     exit;
                 } else {
                      $_SESSION["errorMessage"] = "Oops!!!";
                      header("Location: adminlogin.php");
                      exit; 
                 }
             }
               
         }
    } 
?>
<?php
      
    include("adminlayout/header.php");

?>
<?php
      
    include("adminlayout/navbar.php");

?> 


<!-- ADD ADMIN LOGIN MAIN PAGE -->
<!-- MAIN CUSTOMER FORGOT PASSWORD PAGE -->
<div style="margin-top: 100px">
<div class="container mx-auto mt-5 mb-5">
<div class="w-75 p-3 mx-auto">
    <h3>LOGIN AS AN ADMIN</h3>
<?php echo errorMessage(); ?>
<?php echo successMessage(); ?>
    <form action="adminlogin.php" method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Username</label>
                <input type="text" name="username" class="form-control" id="" placeholder="Enter Your Username">
            </div>
            <div class="form-group col-md-6">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" id="" placeholder="Enter Your Email">
            </div>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password"  class="form-control" id="" placeholder="Enter Your Password">
        </div> 
        <button type="submit" name="submit" class="btn btn-dark btn-block">Login</button>
    </form>
</div>
</div>
</div>

<?php
      
    include("adminlayout/footer.php");

?> 
 
   