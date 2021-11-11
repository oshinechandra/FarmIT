<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">FarmIT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="customer.php">Home </a>
      </li>
     </ul>
     <div>
     <?php
      if(isset($_SESSION['shopping_cart'])){
        
        $count=count($_SESSION['shopping_cart']);
     ?>
     <a href="mycart.php" class="btn btn-outline-success" >My cart(<?php echo $count ?>)</a>
     <?php
    }
    else{
      $count=0;
      ?>
           <a href="mycart.php" class="btn btn-outline-success" >My cart(<?php echo $count ?>)</a>

      <?php
    }
    ?> </div>
    </div>
</nav> 
</body>
</html>