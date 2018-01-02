<nav class="navbar navbar-expand-lg navbar-dark bg-dark hidden-md-down">
    <a class="navbar-brand" href="#">CELLPHONE</a>
    <ul class="navbar-nav ml-auto  ">
      <li class="nav-item">
        <a class="nav-link text-white" href="#"><i class="fa fa-globe"></i></a>
      </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="adminlogin.php">ADMIN</i></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-white" href="#"><i class="fa fa-facebook"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#"><i class="fa fa-twitter"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#"><i class="fa fa-instagram"></i></a>
      </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="#"><i class="fa fa-google-plus"></i></a>
      </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="#"><i class="fa fa-youtube-play"></i></a>
      </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="#"><i class="fa fa-mobile"></i></a>
      </li>
    </ul>


</nav>
<!-- NAV 2 -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">HOME<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="shop.php">ALL PRODUCTS</a>
      </li>
      <li class="nav-item">
      <a class="nav-link text-white" href="customerAccount.php">MY ACCOUNT</a>
      </li>
       <li class="nav-item">
        <a class="nav-link text-white" href="#">SERVICE DELIVERY</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-white" href="shoppingcart.php">
          <i class="fa fa-shopping-basket"> 
          <span class="badge badge-danger"><?php getItemsTotal(); ?></span> SHOPPING CART
        </i></a>
      </li>
      <li class="nav-item active">
      <span class="nav-link tex-white"><i class="fa fa-user-o"></i> 
           <?php
           
            if(!isset($_SESSION['customerEmail'])){
              echo '<a class="selfthis" style="color: white; font-size: 16px" href="customerLogin.php">LOGIN</a>';
            } else {
              echo '<a class="selfthis" style="color: white; font-size: 16px" href="customerLogout.php">LOGOUT</a>';
            }
           
           ?>
        </span>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#"><i class="fa fa-map-marker"></i> FIND US</a>
      </li>
    </ul>

  </div>
</nav>