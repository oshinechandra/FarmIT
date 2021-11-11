<?php
require 'connect.php';
session_start();

if( !$_SESSION['e_email'] ) {
  header('Location:login.php');
  $e_email=$_SESSION['e_email'];

}
$e_email= $_SESSION['e_email'];
         $sql="SELECT * FROM u_list WHERE e_email='$e_email'";
     $res=mysqli_query($conn,$sql);
      if(mysqli_num_rows($res)>0){
          while($user=mysqli_fetch_assoc($res)){
            if($e_email== $user['e_email']){
            $e_fname=$user['e_fname'];
            $e_lname=$user['e_lname'];

            $_SESSION['e_email']=$e_email;
          }
        }
      }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FarmIT</title>
    <!--Font link-->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,200;0,300;0,500;0,700;1,200&display=swap" rel="stylesheet">
<!--Bootstrap cdn script-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <!--js n jquery script-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <!--link for glyphicons-->
  <script src="https://kit.fontawesome.com/b2cafe6aba.js" crossorigin="anonymous"></script>

  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Farm<strong id="IT">IT</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#"><?php echo $e_fname; ?>  <?php echo $e_lname; ?><span class="sr-only">(current)</span></a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="all_products.php?e_email=<?php echo $e_email; ?>">Products</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="view_order.php?e_email=<?php echo $e_email;?>">Order</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="c_feedback.php?e_email=<?php echo $e_email; ?>">Feedback</a>
        </li>
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
    ?>

        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
    </ul>
      </nav>
<!-- navbar ends -->
<!-- carousel -->
<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/slide_01.jpg" class="d-block w-100" alt="FreshVeggies">
        <div class="carousel-caption d-none d-md-block">
          <h2>First slide label</h2>
          <h3>Nulla vitae elit libero, a pharetra augue mollis interdum.</h3>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/slide_02.jpg" class="d-block w-100" alt="PaddyFeild">
        <div class="carousel-caption d-none d-md-block">
          <h2>Second slide label</h2>
          <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/slide_03.jpg" class="d-block w-100" alt="Tomatos">
        <div class="carousel-caption d-none d-md-block">
          <h2>Third slide label</h2>
          <h3>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</h3>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!-- carousel ends -->
<!-- category --><div class="category-box">
  <h2 class="heading">Categories</h2>
<div class="card-deck">
    <div class="col-lg-3 col-md-12 ">
      <div class="card mb-2">
      <img class="card-img-top" src="images/cat_01.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Fruits & Vegetables</h5>
        <a href="fruits.php?e_email=<?php echo $e_email; ?>" class="btn btn-primary"name="fruits">Select</a>

       </div>
       </div>
    </div>



      <div class=" col-lg-3 col-md-12 ">
        <div class="card mb-2">
          <img class="card-img-top" src="images/cat_02.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Rice,Pulses & Other Crops</h5>
            <a href="rice.php?e_email=<?php echo $e_email; ?>" class="btn btn-primary" name="rice">Select</a>
          </div>
        </div>
      </div>



      <div class=" col-lg-3 col-md-12">
        <div class="card mb-2">
          <img class="card-img-top" src="images/cat_03.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Nuts & Spices</h5>
            <a href="nuts.php?e_email=<?php echo $e_email; ?>" class="btn btn-primary" name="nuts">Select</a>
          </div>
       </div>
     </div>

    <div class=" col-lg-3 col-md-12 ">
        <div class="card ">
          <img class="card-img-top" src="images/cat_04.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Dairy & Packaged Products</h5>
            <a href="dairy.php?e_email=<?php echo $e_email; ?>" class="btn btn-primary" name="dairy">Select</a>
          </div>

</div>
</div>
<div class=" col-lg-3 col-md-12 ">
        <div class="card ">
          <img class="card-img-top" src="images/1.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">View all products</h5>
            <a href="all_products.php?e_email=<?php echo $e_email; ?>" class="btn btn-primary" name="view">Select</a>
          </div>
    
     </div>
  </div>




<!-- category ends -->


<!-- Contact -->
<section id="contact" class="contact-us">
  <div class="left">
    <h2>Contact Us</h2>
    <p>Email us:<br />customersupport@farmit.com<br /> Call:<br />7856954125</p>
    <p>

      Mail Us:<br />
  FarmIT Private Limited,<br />

  Buildings Alyssa, Begonia &<br />

  Clove Embassy Tech Village,<br />

  Outer Ring Road, Devarabeesanahalli Village,<br />

  Bengaluru, 560103,<br />

  Karnataka, India
    </p>

</section>
<!-- Contact ends -->


<footer>
<div class="footer">


<i class="fab fa-twitter"></i>
<i class="fab fa-facebook-square"></i>
<i class="fab fa-instagram"></i>
<i class="fas fa-envelope"></i>
<p>© Copyright 2020 FarmIT</p>
</div>
</footer>
