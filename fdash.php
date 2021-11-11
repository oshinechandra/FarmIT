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
  <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,200;0,300;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <!--Bootstrap cdn script-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!-- css -->
        <link rel="stylesheet" href="css/fdash.css">
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
        <a class="nav-link" href="f_feedback.php">Feedback</a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="#contact">Contact Us</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>

    </ul>
  </div>
  </nav>
  <!-- navbar ends -->
<!--main content-->
<div class="container">
<!--<div class="row"> -->

<div class="panel panel-default">
<h1 class="header">Welcome to FarmIT</h1>
<a class="btn btn-outline-success btn-block" href=add_prod.php>Add new products</a>
</div>
<div class="added_prod">
<table class="child">
<h3 class="head">Products added</h3>


<?php
$sr=0;
$e_email=$_SESSION['e_email'];
$sql="SELECT * FROM farm_order WHERE e_email='$e_email'";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
        while($prod=mysqli_fetch_assoc($res)){ 
          $sr=$sr+1;
          ?>

<table class="table">
                <thead class="text-center">
                    <tr>
                    <th scope="col">Serial no</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Details</th>
                    <th scope="col">delete</th>



                    </tr>
                </thead>
                <tbody class="text-center">
                
                      
                            <tr>
                                <td><?php echo $sr?></td>
                                <td><?php echo $prod['p_name'];?></td>
                                <td><a href="details.php?p_id=<?php echo $prod['p_id']; ?>" class="btn btn-block btn-xs btn-info"> Details </a></td>
                                <td><a href="del_prod.php?p_id=<?php echo $prod['p_id']; ?>" class="btn btn-block btn-xs btn-danger"> Delete </a></td>

                               
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


<!-- Press -->

   <section id="press">
       <h2>Our Trusted Partners</h2>
    <img class="press-img" src="images/client-2.png" alt="tc-logo">
    <img class="press-img" src="images/client-3.png" alt="tnw-logo">
    <img class="press-img" src="images/client-4.png" alt="biz-insider-logo">


  </section>


<!-- Press ends -->
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


</body>
</html>

          
    

