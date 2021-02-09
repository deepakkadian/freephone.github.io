<?php 
include('dbcon.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Ecommerce Page</title>
  

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
  <div class="row">
    <div class="col-md-2">
      <img src="https://image.freepik.com/free-vector/happy-shop-logo-template_57516-57.jpg" class="img-responsive">
    </div>
  </div>

</div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Happy Shop</a>
    </div>
     <?php
        if($_SESSION['user']==1)
        {
        ?>
    <div class="collapse navbar-collapse" id="myNavbar">
     
       <ul class="nav navbar-nav">

        <li class=""><a href="home.php">Home</a></li>
        
        <li><a href="category.php">Category</a></li>
        <li><a href="product.php">Product</a></li>
        <li><a href="#">Orders</a></li>
        
        <li><a href="#">User</a></li>
        <li><a href="add_cart.php">cart</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-user"></span>Hello Admin</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  <?php }
  else
  {
    ?>
    <div class="collapse navbar-collapse" id="myNavbar" style="padding-left: 131px;
    margin-top: -38px;">
     
       <ul class="nav navbar-nav">

        <li class=""><a href="home.php">Home</a></li>
     
        
        <li><a href="#">User</a></li>
        <li><a href="add_cart.php">cart</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-user"></span>Hello Admin</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
    <?php
  } ?>
  </div>
</nav>    