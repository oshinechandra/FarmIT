<?php
 require 'connect.php';
 session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <!--Bootstrap cdn script-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,200;0,300;0,500;0,700;1,200&display=swap" rel="stylesheet">

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
        <li class="nav-item">
            <a class="nav-link" href="branch.php">Our branches</a>
          </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Login</a>


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

<div class="login-box">
  <h1>Login</h1>
  <form action="" method="POST">
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="email" placeholder="Email" name="e_email">
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" placeholder="Password" name="e_pass">
  </div>
  <div class="form-group">
                            <input type="submit" class="btn btn-success btn-sm" name="e_clog" value="Customer login">
                            <input type="submit" class="btn btn-success btn-sm" name="e_flog" value="Farmer login" >
                            <input type="submit" class="btn btn-success btn-sm" name="e_mlog" value="Manager login" >

                            <a href="signup.php" class="btn btn-info btn-sm">Register</a>
                            <a href="forgotpassword.php" class="btn btn-info btn-sm">Forgot password</a>
                        </div>
                        </form>
 <?php

if(isset($_POST['e_clog'])){
    $e_email=$_POST['e_email'];
    $e_pass=$_POST['e_pass'];


    $sql="SELECT * FROM u_list WHERE e_email='$e_email'";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
            while($user=mysqli_fetch_assoc($res)){
                if($e_email== $user['e_email'] AND $e_pass==$user['e_pass'] AND  $user['e_role']=="Customer"){
                  $_SESSION['e_email']=$e_email;
                    header('Location:customer.php');
                }
                else
                {
                    echo "<script>alert('Invalid Login....Try again');</script>";
                }
            }
    }else {
        echo "<script>alert('Invalid Login....Try again');</script>";
    }
}
if(isset($_POST['e_flog'])){
    $e_email=$_POST['e_email'];
    $e_pass=$_POST['e_pass'];

    $sql="SELECT * FROM u_list WHERE e_email='$e_email'";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
            while($user=mysqli_fetch_assoc($res)){
                if($e_email== $user['e_email'] AND $e_pass==$user['e_pass'] AND $user['e_role']=="Farmer"){
                  $_SESSION['e_email']=$e_email;
                    header('Location:fdash.php');
                }
                else{
                    echo "<script>alert('Invalid Login....Try again');</script>";
                }
            }
    }else {
        echo "<script>alert('Invalid Login....Try again');</script>";
    }
}

if(isset($_POST['e_mlog'])){
    $e_email=$_POST['e_email'];
    $e_pass=$_POST['e_pass'];

    $sql="SELECT * FROM u_list WHERE e_email='$e_email'";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
            while($user=mysqli_fetch_assoc($res)){
                if($e_email== $user['e_email'] AND $e_pass==$user['e_pass'] AND $user['e_role']=="Manager"){
                  $_SESSION['e_email']=$e_email;
                  $branch=$user['branch_name'];
                  $_SESSION['branch']=$branch;


                    header('Location:mdash.php');
                }
                else{
                    echo "<script>alert('Invalid Login....Try again');</script>";
                }
            }
    }else {
        echo "<script>alert('Invalid Login....Try again');</script>";
    }
}
?>
  </body>
</html>
