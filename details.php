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
        font-weight: bold;
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
<li class="list-group-item"><a href=add_prod.php>Add new products</a></li>
<li class="list-group-item"><a href=fdash.php>View all products</a></li>

</ul>
</div>
</div>
<div class="class col-lg-9 col-md-9">
<div class="panel panel-default">
<div class="panel-heading"><h3>PRODUCTS LIST</h3></div>
<table class="table table-bordered">
<tr>

<?php
$p_id=$_GET['p_id'];
$sql="SELECT * FROM farm_order WHERE p_id='$p_id'";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
        while($prod=mysqli_fetch_assoc($res)){ ?>
        
        <tr >
            <th "width:130px">NAME</th>
            <TD><?php echo $prod['p_name']; ?></TD>
        </tr>
        <tr >
            <th>QUANTITY</th>
            <TD><?php echo $prod['p_quan']; ?></TD>
        </tr>
        <tr >
            <th>PRICE(per kg)</th>
            <TD><?php echo $prod['p_price']; ?></TD>
        </tr>
        
        <tr >
            <th>TOTAL PRICE(in ₹)</th>
            <TD><?php echo $prod['total_price']; ?></TD>
        </tr>
        <tr>
        <td>
       <a href="del_prod.php?p_id=<?php echo $prod['p_id']; ?>" class="btn btn-block  btn-danger">Delete</a>
       </td>
</tr>
           
     <?php   }
}else {
    echo "NO PRODUCTS ADDED";
}

?>
</table>
</div>

</div>

</div>

</div>
          
    
</body>
</html>