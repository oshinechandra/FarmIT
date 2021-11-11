<?php require 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,200;0,300;0,500;0,700;1,200&display=swap" rel="stylesheet">
   <!--Bootstrap cdn script-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="css/branch.css">
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
              <a class="nav-link" href="home.php">Home </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="branch.php">Our branches</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>


            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.php">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="home.php#contact">Contact Us</a>
            </li>

          </ul>
        </div>
      </nav>
    <!-- navbar ends -->
<!--main content-->
<div class="container">
<div class="row">
<div class="class col-lg-12 col-md-6">
<div class="panel panel-default">
<h1 class="header">Welcome to FarmIT</h1>
<div class="panel-heading"><h3>OUR BRANCHES</h3></div>
</div>
</div>
<br>
<tr>
<table style="border:5px ">
<th>BRANCH ID</th>
<th>BRANCH NAME</th>
<th>ADDRESS</th>
<th>BRANCH PHONE_NO</th>
<th>MANAGER</th>
</tr>
</br>
<?php
$sql="CALL view_branch()";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
        while($branch=mysqli_fetch_assoc($res)){ ?>
       <tr>
       <br><td><?php echo $branch['branch_id']; ?></td>
       <td><?php echo $branch['branch_name']; ?></td>
       <td><?php echo $branch['address']; ?></td>
       <td><?php echo $branch['branch_phno']; ?></td>
       <td><?php echo $branch['mgr_name']; ?></td>
        </br>

       </tr>

     <?php   }
}else {
    echo " ";
}

?>
</table>

</div>

</div>


</body>
</html>
