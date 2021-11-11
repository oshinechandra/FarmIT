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
    <title>Ordered products</title>
    <style media="screen">
    .panel-heading{
      background-color:#639a67;
      padding: 20px;
    }
    #IT{
      color: red;
    }
    </style>
    <!--Bootstrap cdn script-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
        <a class="nav-link" href="customer.php"><?php echo $e_fname; ?>  <?php echo $e_lname; ?><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="all_products.php?e_email=<?php echo $e_email; ?>">Products</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="#">Order</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="c_feedback.php">Feedback</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
  </ul>
    </nav>
  <!-- navbar ends -->
<!--main content-->
<div class="container">
<div class="row">

</ul>
</div>
</div>
<div class="class col-lg-9 col-md-9">
<div class="panel panel-default">
<div class="panel-heading"><h3>ORDERED PRODUCTS LIST</h3></div>
<table class="table table-bordered">
<tr>


</table>
</div>

</div>

</div>

</div>



</body>
</html>




<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
            <h1>PRODUCTS LIST</h1>
            </div>
            <div class="col-lg-8">
                <table class="table">
                <thead class="text-center">
                    <tr>
                    <th scope="col">Serial no</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">quantity</th>
                    <th scope="col">total</th>

                    <th scope="col">Date ordered</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                <?php
                $sr=0;
  $e_email=$_SESSION['e_email'];
$sql="SELECT * FROM c_order WHERE e_email='$e_email' ";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
        while($prod=mysqli_fetch_assoc($res)){ 
            $sr=$sr+1;
                     ?>
                      
                            <tr>
                                <td><?php echo $sr?></td>
                                <td><?php echo $prod['p_name'];?></td>
                                <td><?php echo $prod['p_price'];?></td>
                                <td><?php echo $prod['p_quan'];?></td>
                                <td><?php echo $prod['total'];?></td>
                                <td><?php echo $prod['dt'];?></td>

                               
                            </tr>
                        

                     <?php          }
}else {
    echo "NO orders";
}


?>
                </tbody>

                </table>
                </div>

                  </div>
    </div>
    
</body>
</html>
