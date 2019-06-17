<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <script src="js/jquery.slim.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src="jquery.js"></script>
    <script src="jquery-1.12.0.min.js"></script>

    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Sri Hari Traders</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="stock.php"> <i class="fas fa-cubes"></i> Stock</a>
      <a class="nav-item nav-link" href="customer.php"> <i class='fas fa-user'></i> Customer</a>
      <a class="nav-item nav-link" href="generatebill.php"> <i class="fas fa-file-invoice"></i> Generate Bill</a>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cogs"></i>
          Settings
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="user.php"><i class="fas fa-users"></i> Users</a>
          <a class="dropdown-item" href="company.php"> <i class="fas fa-address-card"></i> Company</a>
        </div>
      </li>
      <a href="logout.php" class="btn btn-outline-success float-right">Sign Out of Your Account</a>
    </div>
  </div>
</nav>
</body>
</html>

