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
            $branch=$user['branch_name'];
            $_SESSION['branch']=$branch;


            $_SESSION['e_email']=$e_email;

          }
        }
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,200;0,300;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <!--Bootstrap cdn script-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
    <style>
      .panel-heading{
        margin-top: 50px;
        padding: 20px;
        background-color:  #f1f1f1;
        font-size: large;
        font-weight: bold;                             ;
      }
      #IT{
        color: red;
      }
    </style>
    
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
        <li class="nav-item">
          <a class="nav-link" href="fdash.php"> <?php echo $e_fname; ?> <?php echo $e_lname; ?> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="f_feedback.php?e_email=<?php echo $e_email; ?>"> Feedback </a>
        </li>
      <li class="nav-item">
          <a class="nav-link" href="fdash.php#contact">Contact Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php?e_email=<?php echo $e_email; ?>">Logout</a>
          </li>
  
      </ul>
    </div>
    </nav>
    <!-- navbar ends -->
<!--main content-->
<div class="container">
<div class="row">
<div class="class col-lg-3 col-md-3">
<div class="panel panel-default">
<div class="panel-heading">Products</div>
<ul class="list-group">
<li class="list-group-item"><a href=fdash.php#added_prod>View all products</a></li>

</ul>
</div>
</div>
<div class="class col-lg-9 col-md-9">
<div class="panel panel-default">
<div class="panel-heading">Add Products </div>
<div class="panel-body">
<form action="" method="POST">
        <div class="form-group">
          <h4>Product name</h4>
          <input class="form-control input-sm" type="text" placeholder="Product Name" name="p_name">
        </div>
        <div class="form-group">
          <h4>Product Quantity</h4>
          <input class="form-control input-sm" type="text" placeholder="Product quantity" name="p_quan">
        </div>
        <div class="form-group">
          <h4>Product price</h4>
          <input class="form-control input-sm" type="text" placeholder="Price per kg" name="p_price">
        </div>
        <h2>Product type</h2><br />
          <br><input  type="radio" class="radio-btn" name="type" value="Fruits and vegetables" aria-label="Fruits and vegetables"><label class="radio-label"for="bs_radio"> Fruits and vegetables </label></br>
          <br><input  type="radio" class="radio-btn"name="type"  value="Rice and Pulses" aria-label="Rice and Pulses"><label class="radio-label" for="bn_radio">  Rice and Pulses  </label></br>
          <br><input  type="radio" class="radio-btn" name="type" value="Nuts and Spices" aria-label="Nuts and Spices"><label class="radio-label"for="be_radio"> Nuts and Spices  </label></br>
          <br><input  type="radio" class="radio-btn"name="type"  value="Dairy Products" aria-label="Dairy Products"><label class="radio-label" for="bw_radio">  Dairy Products  </label></br>

        <div class="form-group">
          <input class="btn btn-lg btn-success" type="submit" value="Add product" name="p_add">
        </div>
        </form>
        
         
</div>
</div>

</div>

</div>

</div>

<?php

if ( isset($_POST['p_add']) ) {
    $p_name=$_POST['p_name'];
    $p_quan=$_POST['p_quan'];
    $p_price=$_POST['p_price'];
    $e_email=$_SESSION['e_email'];
    $p_type=$_POST['type'];
    $total=$p_quan*$p_price;
    if(empty($p_name))
    {
    echo "<script>alert('Please enter product name'');</script>";
    
    }  
    if(empty($p_quan))
    {
    echo "<script>alert('Please enter quantity'');</script>";
    
    }
    if(empty($p_price))
    {
    echo "<script>alert('Please enter price of the product'');</script>";
    
    }

    $sql="INSERT INTO farm_order (p_name,p_price,p_quan,total_price,p_type,e_email,branch,ord_status) VALUES ('$p_name','$p_price','$p_quan','$total','$p_type','$e_email','$branch','Waiting')";

    if (mysqli_query($conn,$sql)){
        echo "<script>alert('Products added Successfully');
        window.location.href='fdash.php';        
        </script>";
    }  
    else{
        echo "Error:". $sql."<br>". mysqli_error($conn);
    }
}

  ?>  
</body>
</html>